<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Type;
use App\Protype;
use App\Admin;
use App\Account;
use App\Person;
use Auth;
use App\Cart;

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
        //
        view()->composer('customer.shared.header',function($view){
            //get all types
            $type = Type::all();
            $protype = new Protype();
            $count_cart = new Cart();
            $view->with(['type' => $type , 'protype' => $protype, 'count_cart' => $count_cart]);
        });
        view()->composer('customer.small-cart',function($view){
            //get all types
            $count_cart = new Cart();
            $view->with(['count_cart' => $count_cart]);
        });
        view()->composer('admin.shared.sidebar',function($view){
            //get type customer
            if(Auth::guard('account_admin')->check()) {
                $account_id = Auth::guard('account_admin')->user()->id;
                $person = Person::where('account_id','=',$account_id)->first();
                $admin = Admin::where('person_id','=',$person->id)->first();
                $view->with(['admin' => $admin]);
            }       
        });
    }
}
