<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Country
 *
 * @property string $Code
 * @property string $Name
 * @property string $Continent
 * @property string $Region
 * @property float $SurfaceArea
 * @property integer $IndepYear
 * @property integer $Population
 * @property float $LifeExpectancy
 * @property float $GNP
 * @property float $GNPOld
 * @property string $LocalName
 * @property string $GovernmentForm
 * @property string $HeadOfState
 * @property integer $Capital
 * @property string $Code2
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereContinent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereRegion($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereSurfaceArea($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereIndepYear($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country wherePopulation($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereLifeExpectancy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereGNP($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereGNPOld($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereLocalName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereGovernmentForm($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereHeadOfState($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereCapital($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereCode2($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\City[] $cities
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CountryLanguage[] $languages
 */
class Country extends Model
{
    protected $table = "Country";
    protected $primaryKey = "Code";

    public $timestamps = false;
    public $incrementing = false;

    /**
     *  Getting cities for current country
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cities() {
        return $this->hasMany(City::class, "CountryCode");
    }

    /**
     * Getting languages for current country
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function languages() {
        return $this->hasMany(CountryLanguage::class, "CountryCode");
    }
}
