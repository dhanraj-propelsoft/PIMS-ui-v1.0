<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\PersonDetails;
class ComposerServiceProvider extends ServiceProvider
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
    // public function boot()
    // {
    //     view()->composer('layouts.dashboard.header', function ($view) {
    //         $bearerToken = Session::get('token');
    //         $response = Http::withHeaders([
    //             'Content-Type' => 'application/json',
    //             'Authorization' => 'Bearer ' . $bearerToken
    //         ])->post(config('api_base') . 'get_user_data/');
    //         $data = $response->json();
    //         if (!isset($data['message'])) {
    //             Session::put('uid', $data['uid']);
    //             $headerData['uid']=$data['uid'];
    //             $headerData = PersonDetails::with('email', 'mobile', 'person', 'user', 'person_address_profile')->where("uid", $data['uid'])->first();
    //         } else {
    //             if ($data['message'] == 'Unauthenticated.') {
    //                 Session::put('uid', "");   
    //                 return false;
    //             }
    //         }
    //         // $headerData = "test";
    //         $view->with('headerData', $headerData);
    //     });
    // }
}
