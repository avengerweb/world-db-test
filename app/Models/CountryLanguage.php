<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CountryLanguage
 *
 * @property string $CountryCode
 * @property string $Language
 * @property string $IsOfficial
 * @property float $Percentage
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CountryLanguage whereCountryCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CountryLanguage whereLanguage($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CountryLanguage whereIsOfficial($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CountryLanguage wherePercentage($value)
 * @mixin \Eloquent
 */
class CountryLanguage extends Model
{
    protected $table = "CountryLanguage";
    public $timestamps = false;

    public $primaryKey = [
        "CountryCode",
        "Language"
    ];

    public $incrementing = false;

    //TODO:: customize find (Not support compose keys)
}
