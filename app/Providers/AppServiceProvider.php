<?php

namespace App\Providers;

use App\Marketplace\Utility\CoinConverter;
use Illuminate\Log\Logger;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;
use Monolog\Handler\SlackHandler;
use Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
        view () -> composer ( '*', function ( $view ) {
//            $EUR_price = 0.98;
//            $req_url = 'https://api.exchangerate-api.com/v4/latest/USD';
//            $response_json = file_get_contents($req_url);
//            if(false !== $response_json) {
//                try {
//                    $response_object = json_decode($response_json);
//                    $base_price = 1; // Your price in USD
//                    $EUR_price = round(($base_price * $response_object->rates->EUR), 2);
//                }
//                catch(Exception $e) {
//                    $EUR_price =  0.88;
//                }
//            }
            $rate = CoinConverter::conversion('USD','EUR','1');
            $view -> with(['usd_eur' => $rate]);
        });
    }
}
