<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public const PAYMENT_METHOD_FLUTTERWAVE = 1;
    public const PAYMENT_METHOD_PAYSTACK = 2;

    public const ORDER_STATUS_INITIATED = 1;
    public const ORDER_STATUS_PENDING = 2;
    public const ORDER_STATUS_COMPLETED = 3;
    public const ORDER_STATUS_DECLINED = 4;

    public const PAYMENT_STATUS_PROCESSING = 1;
    public const PAYMENT_STATUS_SUCCESSFUL = 2;
    public const PAYMENT_STATUS_FAILED = 3;

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * retrieve payment methods 
     *
     * @return array
     */
    public static function getPaymentMethods() : array{
        return [
            'Flutterwave'   => self::PAYMENT_METHOD_FLUTTERWAVE,
            'Paystack'      => self::PAYMENT_METHOD_PAYSTACK,
        ];
    }


    /**
     * Retrive order Status
     *
     * @return array
     */
    public static function getOrderStatuses() : array{
        return [
            'Initiated'     => self::ORDER_STATUS_INITIATED,
            'Pending'       => self::ORDER_STATUS_PENDING,
            'Completed'     => self::ORDER_STATUS_COMPLETED,
            'Declined'      => self::ORDER_STATUS_DECLINED,
        ];
    }

    
    /**
     * retreive all payment statuses
     *
     * @return array
     */
    public static function getPaymentStatuses() : array{
        return[
            'Processing'    => self::PAYMENT_STATUS_PROCESSING,
            'Successful'    => self::PAYMENT_STATUS_SUCCESSFUL,
            'Failed'        => self::PAYMENT_STATUS_FAILED,
        ];
    }
}
