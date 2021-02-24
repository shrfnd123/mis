<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\ConnectionInterface;
use DB;

class Tbl_Users extends Model
{
    protected $table = 'tbl_users';

    protected $fillable = [
        'user_id',
        'name',
        'username',
        'password', 
        'street_address',
        'city',
        'zip_code',
        'contact_num',
        'email',
        'user_type'
        
    ];

    public static function AddUser($data){

        $name = $data['fname']." ".$data['lname'];

        $street_address = $data['street']." ".$data['street1'];

        DB::table('tbl_users')
            ->insert([
                'name' => $name,
                'username' => $data['username'],
                'password' => $data['password'],
                'street_address' => $street_address,
                'city' => $data['city'],
                'zip_code' => $data['zipcode'],
                'contact_num' => $data['contact_num'],
                'email' => $data['email']
            ]);

    }

    public static function EditUser($data){

        DB::table('tbl_users')
            ->where('user_id',$data['user_id'])
            ->update([
                'name' => $data['name'],
                'username' => $data['username'],
                'street_address' => $data['street'],
                'city' => $data['city'],
                'zip_code' => $data['zipcode'],
                'contact_num' => $data['contact_num'],
                'email' => $data['email']
            ]);

    }

    public static function ChangePassword($password,$user_id){
        DB::table('tbl_users')
            ->where('user_id',$user_id)
            ->update([
                'password' => $password
            ]);
    }
}
