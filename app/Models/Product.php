<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    /**
     * Price Type Constants : 
     * 
     */
    public const PRICE_FIXED = 1;
    public const PRICE_VARIABLE = 2;

    /**
     * Product Type Constants
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
            self::PRICE_FIXED => 'Fixed Price',
            self::PRICE_VARIABLE => 'Variable Price'
        ];
    }

    /**
     * Retrieve types of products
     *
     * @return array
     */
    public static function getProductTypes() : array{
        return [
            self::PRODUCT_FEES => 'Fees',
            self::PRODUCT_STATIONERIES => 'Stationeries',
            self::PRODUCT_OTHERS => 'Others',
        ];
    }
}
