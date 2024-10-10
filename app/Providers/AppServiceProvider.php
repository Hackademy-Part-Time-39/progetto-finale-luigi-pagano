<?php

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       if(Schema::hastable('categories')){
        $categories = Category::all();
        View::share(('categories =>$categories'));
       }
    }
}
