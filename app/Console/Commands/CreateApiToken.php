<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateApiToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-api-token {name=api-token : The name for the generated token}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Sanctum API token for the admin (first) user';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $user = User::orderBy('id')->first();

        if (! $user) {
            $this->error('No users found. Create a user first.');

            return self::FAILURE;
        }

        $tokenName = $this->argument('name');

        $token = $user->createToken($tokenName);

        $this->info("Token created for: {$user->name} <{$user->email}>");
        $this->newLine();
        $this->line('Plain text token (copy it now, it will not be shown again):');
        $this->line($token->plainTextToken);

        return self::SUCCESS;
    }
}
