<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\ConnectionInterface;
use DB;
date_default_timezone_set("Asia/Manila");

class Sales_Tbl extends Model
{
    protected $table = 'sales_tbl';

    protected $fillable = [
        'sales_id',
        'order_id',
        'amount_id',
        'date'
    ];

    public static function InsertSales($order_id,$amount){

        DB::table('sales_tbl')
            ->insert([
                'order_id' => $order_id,
                'amount' => $amount
            ]);
    }
}
