<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {

//    $data = \Cache::remember("countries", 10, function() {
        $data = \App\Models\Country::with("cities")
//    select(DB::raw("*, (SELECT count(*) FROM City WHERE City.CountryCode = Country.Code) as city_count"))
//        ->with("cities")->orderBy("city_count")->
            ->get();

        $data = $data->groupBy("Region");

        $data = $data->map(function(\Illuminate\Support\Collection $countries) {
            $countries['cityCount'] = 0;
            $countries['countryCount'] = $countries->count();
            $countries['continent'] = $countries->first()['Continent'];
            $countries['life'] = $countries->avg("LifeExpectancy");

            $countries->each(function($country) use (&$countries) {
                if (!is_object($country))
                    return;

                $countries['cityCount'] += $country->cities->count();
            });

            return $countries;
        });

//        return $data;
//    });


//    $data = $data->sortBy("cityCount");
//    $data = $data->sortBy("continent");

    return view('welcome')->withData($data);
});
