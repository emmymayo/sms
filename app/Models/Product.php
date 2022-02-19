<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Price Type Constants : 
     * 
     */
    public const PRICE_FIXED = 1;
    public const PRICE_VARIABLE = 2;

    /**
     * Produc Type Constants
     */
    public const PRODUCT_FEES = 1;
    public const PRODUCT_STATIONERIES = 2;
    public const PRODUCT_OTHERS = 3 ;


    public function orders(){
        return $this->hasMany(Order::class);
    }


    /**
     * retreive acceptable price types
     *
     * @return array
     */
    public static function getPriceTypes() : array{
        return [
            'Fixed Price' => self::PRICE_FIXED,
            'Variable Price' => self::PRICE_VARIABLE
        ];
    }

    /**
     * Retrieve types of products
     *
     * @return array
     */
    public static function getProductTypes() : array{
        return [
            'Fees' => self::PRODUCT_FEES,
            'Stationeries' => self::PRODUCT_STATIONERIES,
            'Others' => self::PRODUCT_OTHERS,
        ];
    }
}
