<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    // This defines the command you'll run in the terminal.
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the sitemap for the website.';

    public function handle()
    {
        $this->info('Generating sitemap...');

        // Get your app's URL from the .env file.
        $siteUrl = config('app.url');

        // Create the sitemap and save it to the public directory.
        SitemapGenerator::create($siteUrl)
                        ->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully at ' . public_path('sitemap.xml'));
    }
}
