<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Exhibition;

class SitemapController extends Controller
{
    private array $locales = ['en', 'tg', 'ru'];

    private array $staticPages = [
        ['route' => '/',              'priority' => '1.0', 'changefreq' => 'weekly'],
        ['route' => '/products',      'priority' => '0.9', 'changefreq' => 'weekly'],
        ['route' => '/about',         'priority' => '0.7', 'changefreq' => 'monthly'],
        ['route' => '/exhibitions',   'priority' => '0.7', 'changefreq' => 'weekly'],
        ['route' => '/collaboration', 'priority' => '0.6', 'changefreq' => 'monthly'],
        ['route' => '/contact',       'priority' => '0.6', 'changefreq' => 'monthly'],
    ];

    public function index()
    {
        $urls = [];

        // Static pages in all locales
        foreach ($this->staticPages as $page) {
            $entry = ['locales' => [], 'priority' => $page['priority'], 'changefreq' => $page['changefreq']];
            foreach ($this->locales as $locale) {
                $entry['locales'][$locale] = url("/{$locale}" . $page['route']);
            }
            $urls[] = $entry;
        }

        // Products in all locales
        $products = Product::where('is_active', true)->get();
        foreach ($products as $product) {
            $entry = ['locales' => [], 'priority' => '0.8', 'changefreq' => 'monthly'];
            $enSlug = $product->getTranslation('slug', 'en', false) ?: (string) $product->id;
            foreach ($this->locales as $locale) {
                $slug = $product->getTranslation('slug', $locale, false) ?: $enSlug;
                $entry['locales'][$locale] = url("/{$locale}/products/{$slug}");
            }
            $urls[] = $entry;
        }

        // Exhibitions
        $exhibitions = Exhibition::orderBy('start_date', 'desc')->get();
        foreach ($exhibitions as $exhibition) {
            $entry = ['locales' => [], 'priority' => '0.6', 'changefreq' => 'monthly'];
            foreach ($this->locales as $locale) {
                $entry['locales'][$locale] = url("/{$locale}/exhibitions");
            }
            // Deduplicate — all locales point to the same exhibitions listing
            if (!in_array($entry, $urls)) {
                // We already added /exhibitions as a static page, so skip individual exhibition entries
            }
        }

        return response()
            ->view('sitemap', compact('urls'))
            ->header('Content-Type', 'application/xml; charset=utf-8');
    }
}
