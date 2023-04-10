<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

use Spatie\Sitemap\Tags\Url;
use App\models\Hotel as Hotels;
use App\models\Flight as Flights;
use App\models\Umrah;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // modify this to your own needs
        SitemapGenerator::create(config('app.url'))
            ->writeToFile(public_path('sitemap.xml'));

        // SitemapGenerator::create('https://barakatravel.net/')->getSitemap()
        //     ->add(Url::create('/about-us')->setPriority(0.5))
        //     ->add(Url::create('/hotels')->setPriority(0.5))
        //     ->add(Url::create('/flights')->setPriority(0.5))
        //     ->writeToFile('sitemap.xml');
        
        $getHotels=Hotels::all();
        $getFlights=Flights::all();
        $getUmrahs=Umrah::all();

        $siteMapObject=SitemapGenerator::create('https://barakatravel.net/')->getSitemap()
            ->add(Url::create('/about-us')->setPriority(0.5))
            ->add(Url::create('/contact_us')->setPriority(0.8))
            ->add(Url::create('/eVisa')->setPriority(0.8))
            ->add(Url::create('/hotels')->setPriority(0.5))
            ->add(Url::create('/flights')->setPriority(0.5));

        foreach($getHotels as $key){
            $siteMapObject->add(Url::create('/hotels/'.$key->id.'/'.$key->name)->setPriority(0.8));
        }
        foreach($getFlights as $key){
            $siteMapObject->add(Url::create('/flights/'.$key->id.'/'.$key->flight_name)->setPriority(0.8));
        }
        foreach($getUmrahs as $key){
            $siteMapObject->add(Url::create('/umrah-package-details/'.$key->id.'/'.$key->name)->setPriority(0.8));
        }

        $siteMapObject->writeToFile('sitemap.xml');
        
    }
}

