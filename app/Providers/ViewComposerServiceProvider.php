<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->composeBatchesView();
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

    private function composeBatchesView()
    {
        /* Second argument could be a class to create a dedicated object
        for this task 
        view()->composer('batches', 'App\Http\Composers\BatchesComposer@compose') */

        view()->composer('batches', function($view)
        {
            // Maybe provide the list of indexes for the drop down fields
//            $view->with('i7_index_list', \App\Index::all());
        });

    }

}
