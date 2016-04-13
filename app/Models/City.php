<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\City
 *
 * @property integer $ID
 * @property string $Name
 * @property string $CountryCode
 * @property string $District
 * @property integer $Population
 * @method static \Illuminate\Database\Query\Builder|\App\Models\City whereID($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\City whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\City whereCountryCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\City whereDistrict($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\City wherePopulation($value)
 * @mixin \Eloquent
 */
class City extends Model
{
    protected $table = "City";
    public $timestamps = false;
}
