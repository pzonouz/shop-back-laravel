<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Order;
use App\Models\OrderRecord;
use App\Models\Product;
use App\Policies\CategoryPolicy;
use App\Policies\ImagePolicy;
use App\Policies\OrderPolicy;
use App\Policies\OrderRecordPolicy;
use App\Policies\ProductPolicy;
use Gate;
use Illuminate\Support\ServiceProvider;
use Storage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(Category::class, CategoryPolicy::class);
        Gate::policy(Product::class, ProductPolicy::class);
        Gate::policy(Image::class, ImagePolicy::class);
        Gate::policy(Order::class, OrderPolicy::class);
        Gate::policy(OrderRecord::class, OrderRecordPolicy::class);
    }
}
