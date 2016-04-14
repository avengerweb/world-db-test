<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Provide county interface
 *
 * Class CountryController
 * @package App\Http\Controllers
 */
class CountryController extends Controller
{
    /**
     * Fields which can be use for sort
     *
     * @var array
     */
    private $sortable = [
        'cityCount',
        'languagesCount',
        'countryCount',
        'continent',
        'life',
        'population',
        'region',
    ];

    /**
     * Display a listing of the countries.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = \Cache::remember("countries", 10, function () {
            $table = [];
            $data = Country::with("cities")->with("languages")->get();

            $data = $data->groupBy("Region");

            // Foreach regions count statistic values
            $data->map(function (Collection $countries, $region) use (&$table) {
                $row['cityCount'] = 0;
                $row['languagesCount'] = 0;
                $row['countryCount'] = $countries->count();
                $row['continent'] = $countries->first()->Continent;
                $row['life'] = 0;
                $row['population'] = 0;
                $row['region'] = $region;

                $countries->each(function ($country) use (&$row) {
                    $row['cityCount'] += $country->cities->count();
                    $row['languagesCount'] += $country->languages->count();
                    $row['life'] += $country->LifeExpectancy;
                    $row['population'] += $country->Population;
                });

                // Calc avg life period
                $row['life'] = round( $row['life'] / $row['countryCount'], 2);

                $table[] = $row;

                return $countries;
            });

            return collect($table);
        });

        // Sorting if needed
        if ($request->get("field") && in_array($request->get("field"), $this->sortable)) {
            $data = $data->sortBy($request->get("field"));
            if ($request->get("type") == "desc")
                $data = $data->reverse();
        }

        return $data->values()->all();
    }
}
