<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\ConnectionInterface;
use DB;

class Order_Tbl extends Model
{
    protected $table = 'order_tbl';

    protected $fillable = [
        'order_id',
        'user_id',
        'item_id',
        'order_quantity',
        'total', 
        'status'
        
    ];

    public static function CheckOut($item_id,$quantity,$user_id){

        DB::table('order_tbl')
            ->insert([
                'user_id' => $user_id,
                'item_id' => $item_id,
                'order_quantity' => $quantity,
            ]);
    }

    public static function AcceptOrder($order_id){

        DB::table('order_tbl')
            ->where('order_id',$order_id)
            ->update([
                'order_status' => 1
            ]);
    }

    public static function CompleteOrder($order_id){

        DB::table('order_tbl')
            ->where('order_id',$order_id)
            ->update([
                'order_status' => 2
            ]);
    }

    public static function DeleteOrder($order_id){

        DB::table('order_tbl')
            ->where('order_id',$order_id)
            ->delete();
    }

}
