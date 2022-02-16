<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Branch;
use App\Models\Conference;
use App\Models\Informations;
use App\Models\Investment;
use App\Models\Membership;
use Illuminate\Pagination\Paginator;
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
        Paginator::useBootstrap();

        view()->composer('org.layouts.layout', function ($view) {
            $view->with('branches', Branch::all());
            $view->with('abouts', About::all());
            $view->with('memberships', Membership::all());
            $view->with('investments', Investment::all());
            $view->with('info', Informations::all());
            $view->with('conf', Conference::all());
        });
        view()->composer('admin.layouts.layout', function ($view) {
            $view->with('urls', [
                'news', 'news/212/edit', 'partners', 'tenders', 'news_cci',
                'parcipants_events', 'fo_offers', 'conferences', 'branches', 'abouts', 'memberships', 'investments'
            ]);
        });
    }
}
