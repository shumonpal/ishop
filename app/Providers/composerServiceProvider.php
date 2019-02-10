<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class composerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            '*',  
            'App\Http\ViewComposers\Frontend\ProductComposer'
        );

        View::composer(
            ['index', 'frontend.header.header', 'frontend.products.products', 'admin.product.forms.form', 'admin.product.forms.formUpdate',],  
            'App\Http\ViewComposers\Frontend\CategoryComposer'
        );

        View::composer(
            ['index', 'frontend.header.header', 'frontend.products.products', 'admin.product.forms.form', 'admin.product.forms.formUpdate',],  
            'App\Http\ViewComposers\Frontend\ProductsBrandComposer'
        );

        View::composer(
            ['frontend.product-details.review'],  
            'App\Http\ViewComposers\Frontend\ReviewsComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
