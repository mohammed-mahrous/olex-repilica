<?php

namespace App\Providers;

use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Role;
use App\Models\Tag;
use App\Models\User;
use Facade\FlareClient\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('layouts.store-nav', function ($view) {

            $categories = Category::all();

            $view->with('categories', $categories);
        });
        view()->composer('layouts.store-filters', function ($view) {

            $resetUrl = request()->url();
            $Advertisements = Advertisement::all();
            $Tags = Tag::all();
            $min_price = Advertisement::min('price');
            $max_price = Advertisement::max('price');

            $view->with(['Advertisements' => $Advertisements, 'Tags' => $Tags, 'min_price' => $min_price, 'max_price' => $max_price, 'resetUrl' => $resetUrl]);
        });
        view()->composer('layouts.dashboard.filters.advertisements-filters', function ($view) {

            $resetUrl = request()->url();
            $users = User::where('role_id', '!=', '2')->pluck('name', 'id');
            $tags = Tag::pluck('name', 'id');
            $categories = Category::pluck('name', 'id');
            $view->with(['resetUrl' => $resetUrl, 'users' => $users, 'categories' => $categories, 'tags' => $tags]);
        });
        view()->composer('layouts.dashboard.filters.categories-filters', function ($view) {

            $resetUrl = request()->url();
            $users = User::pluck('name', 'id');

            $view->with(['resetUrl' => $resetUrl, 'users' => $users]);
        });
        view()->composer('layouts.dashboard.filters.users-filters', function ($view) {

            $types = Role::pluck('type', 'id');
            $resetUrl = request()->url();

            $view->with(['resetUrl' => $resetUrl, 'types' => $types]);
        });
        view()->composer('layouts.store', function ($view) {

            $categories = Category::all();
            $view->with(['categories' => $categories]);
        });
    }
}