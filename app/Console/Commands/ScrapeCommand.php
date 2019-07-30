<?php

namespace App\Console\Commands;

use Illuminate\Console\Command; 
use Goutte\Client;
use GuzzleHttp\Client as GuzzleClient;

class ScrapeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scraper:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $client = new Client();

      $crawler = $client->request('GET', 'https://www.symfony.com/blog/');
        $crawler->filter('h2 > a')->each(function ($node) {
        print $node->text()."\n";
    });
    }
}
