<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\ConnectionInterface;
use DB;

class Item_Tbl extends Model
{
    protected $table = 'item_tbl';

    protected $fillable = [
        'item_id',
        'product_name',
        'category',
        'description', 
        'price',
        'quantity',
        'status',
        'sale',
        'discount',
        'image'
        
    ];

    public static function AddItem($data){

        DB::table('item_tbl')
            ->insert([
                'product_name' => $data['product_name'],
                'category' => $data['category'],
                'description' => $data['description'],
                'price' => $data['price'],
                'image' => $data['image']
            ]);
        
    }

    public static function ReduceStock($item_id,$quantity){
        
            DB::table('item_tbl')
                ->where('item_id',$item_id)
                ->decrement('quantity',$quantity);

    }

    public static function AddStock($item_id,$stock){

        DB::table('item_tbl')
            ->where('item_id',$item_id)
            ->increment('quantity',$stock);
    }

    public static function ChangeItemStatus($item_id,$status){

        DB::table('item_tbl')
            ->where('item_id',$item_id)
            ->update([
                'status' => $status
            ]);
    }

    public static function EditItem($data){

        DB::table('item_tbl')
            ->where('item_id',$data['item_id'])
            ->update([
                'product_name' => $data['product_name'],
                'category' => $data['category'],
                'description' => $data['description'],
                'price' => $data['price'],
                'image' => $data['image']
            ]);
    }

    public static function SetDiscount($item_id, $discount){

        DB::table('item_tbl')
            ->where('item_id',$item_id)
            ->update([
                'sale' => 1,
                'discount' => $discount
            ]);
    }

    public static function RemoveDiscount($item_id){

        DB::table('item_tbl')
            ->where('item_id',$item_id)
            ->update([
                'sale' => 0
            ]);

        $statement = "UPDATE item_tbl SET discount = NULL WHERE item_id = ".$item_id;

        DB::statement($statement);
    }
}
