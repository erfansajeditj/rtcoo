<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\Exhibition;
use Illuminate\Console\Command;
use Stichoza\GoogleTranslate\GoogleTranslate;

class AutoTranslate extends Command
{
    protected $signature = 'translate:auto {--model=all : products, exhibitions, lang, or all}';
    protected $description = 'Auto-translate missing Russian and Tajik content using Google Translate';

    public function handle(): void
    {
        $model = $this->option('model');

        if ($model === 'all' || $model === 'products') {
            $this->translateModel(Product::all(), 'products', ['name', 'description', 'category', 'specs']);
        }

        if ($model === 'all' || $model === 'exhibitions') {
            $this->translateModel(Exhibition::all(), 'exhibitions', ['title', 'description']);
        }

        if ($model === 'all' || $model === 'lang') {
            $this->translateLangFiles();
        }

        $this->info('Translation complete!');
    }

    private function translateModel($items, string $modelName, array $fields): void
    {
        $this->info("Translating {$modelName}...");
        $bar = $this->output->createProgressBar(count($items));

        foreach ($items as $item) {
            foreach ($fields as $field) {
                $en = $item->getTranslation($field, 'en', false);
                if (!$en) continue;

                foreach (['ru', 'tg'] as $locale) {
                    $existing = $item->getTranslation($field, $locale, false);
                    if ($existing) continue;

                    try {
                        $translated = (new GoogleTranslate($locale))->translate($en);
                        $item->setTranslation($field, $locale, $translated);
                    } catch (\Exception $e) {
                        $this->warn("Failed: {$field} ID {$item->id}: " . $e->getMessage());
                    }
                }
            }

            $item->save();
            $bar->advance();
            usleep(300000);
        }

        $bar->finish();
        $this->newLine();
    }

    private function translateLangFiles(): void
    {
        $this->info('Translating lang files...');

        $en = include base_path('lang/en/messages.php');

        foreach (['ru', 'tg'] as $locale) {
            $existing = include base_path("lang/{$locale}/messages.php");
            $missing = array_diff_key($en, $existing);

            if (empty($missing)) {
                $this->info("  {$locale}: nothing missing.");
                continue;
            }

            $this->info("  {$locale}: translating " . count($missing) . " keys...");
            $bar = $this->output->createProgressBar(count($missing));

            foreach ($missing as $key => $text) {
                $plainText = strip_tags((string) $text);
                if (!$plainText) {
                    $existing[$key] = $text;
                    $bar->advance();
                    continue;
                }

                try {
                    $translated = (new GoogleTranslate($locale))->translate($plainText);
                    $existing[$key] = $translated;
                } catch (\Exception $e) {
                    $existing[$key] = $text;
                    $this->warn("  Failed key '{$key}': " . $e->getMessage());
                }

                $bar->advance();
                usleep(300000);
            }

            $bar->finish();
            $this->newLine();

            $content = "<?php\nreturn " . var_export($existing, true) . ";\n";
            file_put_contents(base_path("lang/{$locale}/messages.php"), $content);
            $this->info("  Saved lang/{$locale}/messages.php");
        }
    }
}
