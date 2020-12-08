<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NavigationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            $pages=[
            ['slug'=>'home','title'=>'Home','sublinks'=>[],'icon'=>'icon-home'],
            ['slug'=>'agents','title'=>'Agents','sublinks'=>[],'icon'=>'icon-user'],
            ['slug'=>'estimates','title'=>'Estimates','sublinks'=>[],'icon'=>'fa fa-calculator'],
            ['slug'=>'reports','title'=>'Reports','sublinks'=>[['linktitle'=>'Reports By Date','link_slug'=>'/reportsdate'],['linktitle'=>'Reports By Agent','link_slug'=>'/reportsagent']],'icon'=>'fa fa-file']];
            return $view->with('pages',$pages);
        });
    }
    //           // ['slug'=>'/reports','title'=>'Reports','sublinks'=>[['linktitle'=>'Reports By Date','link_slug'=>'/reportsdate'],['linktitle'=>'Reports By Agent','link_slug'=>'/reportsagent']];

}
