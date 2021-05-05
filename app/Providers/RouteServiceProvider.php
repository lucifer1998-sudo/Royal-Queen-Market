<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Product;
use App\Vendor;
use App\User;
use Illuminate\Support\Facades\Crypt;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();

        // Route::bind('product', function($value, $route)
        // {
        //     #$hashids = new Hashids\Hashids('MySecretSalt');
        //     return Crypt::decryptString($value);
        // });


        // Route::bind('shipping', function($value, $route)
        // {
        //     #$hashids = new Hashids\Hashids('MySecretSalt');
        //     return Crypt::decryptString($value);
        // });

        // Route::bind('options', function($value, $route)
        // {
        //     #$hashids = new Hashids\Hashids('MySecretSalt');
        //     return Crypt::decryptString($value);
        // });

        // Route::bind('product/edit', function($value, $route)
        // {
        //     #$hashids = new Hashids\Hashids('MySecretSalt');
        //     return Crypt::decryptString($value);
        // });

        // Route::bind('vendor', function($value, $route)
        // {
        //     #$hashids = new Hashids\Hashids('MySecretSalt');
        //     return Crypt::decryptString($value);
        // });

        // Route::bind('user', function($value, $route)
        // {
        //     #$hashids = new Hashids\Hashids('MySecretSalt');
        //     return Crypt::decryptString($value);
        // });

        // Route::bind('category', function($value, $route)
        // {
        //     #$hashids = new Hashids\Hashids('MySecretSalt');
        //     return Crypt::decryptString($value);
        // });


        // Route::bind('address', function ($value, $route) {
        //     return $this->getModel(\App\Address::class, $value);
        // });

        // Route::bind('admin', function ($value, $route) {
        //     return $this->getModel(\App\Admin::class, $value);
        // });

        // Route::bind('ban', function ($value, $route) {
        //     return $this->getModel(\App\Ban::class, $value);
        // });

        // Route::bind('category', function ($value, $route) {
        //     return $this->getModel(\App\Category::class, $value);
        // });

        // Route::bind('conversation', function ($value, $route) {
        //     return $this->getModel(\App\Conversation::class, $value);
        // });

        // Route::bind('dispute', function ($value, $route) {
        //     return $this->getModel(\App\Dispute::class, $value);
        // });

        // Route::bind('feedback', function ($value, $route) {
        //     return $this->getModel(\App\Feedback::class, $value);
        // });

        // Route::bind('image', function ($value, $route) {
        //     return $this->getModel(\App\Image::class, $value);
        // });

        // Route::bind('disputemessage', function ($value, $route) {
        //     return $this->getModel(\App\DisputeMessage::class, $value);
        // });

        // Route::bind('log', function ($value, $route) {
        //     return $this->getModel(\App\Log::class, $value);
        // });

        // Route::bind('message', function ($value, $route) {
        //     return $this->getModel(\App\Message::class, $value);
        // });

        // Route::bind('notification', function ($value, $route) {
        //     return $this->getModel(\App\Notification::class, $value);
        // });

        // Route::bind('offer', function ($value, $route) {
        //     return $this->getModel(\App\Offer::class, $value);
        // });

        // Route::bind('permission', function ($value, $route) {
        //     return $this->getModel(\App\Permission::class, $value);
        // });

        // Route::bind('pgpkey', function ($value, $route) {
        //     return $this->getModel(\App\PGPKey::class, $value);
        // });

        // Route::bind('physicalproduct', function ($value, $route) {
        //     return $this->getModel(\App\PhysicalProduct::class, $value);
        // });

        // Route::bind('product', function ($value, $route) {
        //     return $this->getModel(\App\Product::class, $value);
        // });

        // Route::bind('purchase', function ($value, $route) {
        //     return $this->getModel(\App\Purchase::class, $value);
        // });

        // Route::bind('shipping', function ($value, $route) {
        //     return $this->getModel(\App\Shipping::class, $value);
        // });

        // Route::bind('ticket', function ($value, $route) {
        //     return $this->getModel(\App\Ticket::class, $value);
        // });

        // Route::bind('ticketreply', function ($value, $route) {
        //     return $this->getModel(\App\TicketReply::class, $value);
        // });

        // Route::bind('user', function ($value, $route) {
        //     return $this->getModel(\App\User::class, $value);
        // });

        // Route::bind('vendor', function ($value, $route) {
        //     return $this->getModel(\App\Vendor::class, $value);
        // });

        // Route::bind('vendor', function ($value, $route) {
        //     return $this->getModel(\App\VendorPurchase::class, $value);
        // });

        // Route::bind('permission', function ($value, $route) {
        //     return $this->getModel(\App\Permission::class, $value);
        // });
    }

    private function getModel($model, $routeKey)
    {
        $id = \Hashids::connection($model)->decode($routeKey)[0] ?? null;
        $modelInstance = resolve($model);

        return  $modelInstance->findOrFail($id);
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
