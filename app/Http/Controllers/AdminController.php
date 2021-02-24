<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Item_Tbl;
use App\Models\Order_Tbl;
use App\Models\Sales_Tbl;
use Auth;
use Redirect;
date_default_timezone_set("Asia/Manila");

class AdminController extends Controller
{

    public function login(){

        return view('admin\login');
    }
    
    public function AdminLogout(){

        session()->flush();
        Auth::logout();

        return redirect()->intended('administrator');
    }

    public function AdminVerification(Request $request){

        $username = $request['username'];
        $password = $request['password'];

        $tbl_users = DB::table('tbl_users')
                        ->select('*')
                        ->where('username',$username)
                        ->where('password',$password)
                        ->where('user_type',0)
                        ->first();

        if($tbl_users == false || $tbl_users->username != $username || $tbl_users->password != $password){
            $data['message'] = "Invalid username or password";
            return view('admin\login',  ['message'=> $data['message']]);
        }
        else{
            $request->session()->put('user_id', $tbl_users->user_id); 
            $request->session()->put('name', $tbl_users->name);
            $request->session()->put('username', $tbl_users->username);    
            $request->session()->put('logged', true);
            return redirect()->route('adminDashboard');
        }
    }

    public function adminDashboard(){

        return view('admin\dashboard');
    }

    public function AddItemView(){
        
        return view('admin\AddItem');
    }

    public function AddItem(Request $request){

        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $image->move('item_image', $image_name);

        $data = ([
            'product_name' => $request['name'],
            'category' => $request['category'],
            'description' => $request['description'],
            'price' => $request['price'],
            'image' => $image_name
        ]);

        Item_Tbl::AddItem($data);

        $data['message'] = "Product successfully added";
        return view('admin\AddItem',  ['message'=> $data['message']]);
        
    }

    public function AddStockView(){

        $data = DB::table('item_tbl')
                ->select('*')
                ->get();

        return view('admin\AddStock',compact('data'));

    }

    public function AddStock(Request $request){

        Item_Tbl::AddStock($request->item_id,$request->stock);
    }

    public function UpdateItemView(){

        $data = DB::table('item_tbl')
                ->select('*')
                ->get();

        return view('admin\UpdateItem',compact('data'));
    }

    public function ChangeItemStatus(Request $request){

        Item_Tbl::ChangeItemStatus($request->item_id,$request->status);
    }

    public function getItembyID(Request $response){

        $result = DB::table('item_tbl')
                    ->select('*')
                    ->where('item_id',$response->item_id)
                    ->first();
                  
        return response()->json($result);
    }

    public function EditItemAdmin(Request $request){

        
        $image = $request->file('image');
        $image_name = $image->getClientOriginalName();
        $image->move('item_image', $image_name);

        $data = ([
            'product_name' => $request['product_name'],
            'category' => $request['category'],
            'description' => $request['description'],
            'price' => $request['price'],
            'image' => $image_name,
            'item_id' => $request['item_id']
        ]);
        
        Item_Tbl::EditItem($data);
    }

    public function ViewOrders(){
        $data = DB::table('order_tbl')
                ->join('tbl_users','tbl_users.user_id','=','order_tbl.user_id')
                ->join('item_tbl','item_tbl.item_id','=','order_tbl.item_id')
                ->select('item_tbl.product_name','item_tbl.price','item_tbl.sale','item_tbl.discount','order_tbl.*','tbl_users.*')
                ->get();

        return view('admin\Orders',compact('data'));
    }

    public function AcceptOrder(Request $request){

        Order_Tbl::AcceptOrder($request->order_id);
    }

    public function CompleteOrder(Request $request){
        
        Order_Tbl::CompleteOrder($request->order_id);
        Sales_Tbl::InsertSales($request->order_id,$request->amount);
        
    }

    public function Sales(){

        $data = DB::table('sales_tbl')
                ->join('order_tbl','sales_tbl.order_id','=','order_tbl.order_id')
                ->join('item_tbl','order_tbl.item_id','=','item_tbl.item_id')
                ->select('sales_tbl.*','item_tbl.product_name')
                ->get();

        return view('admin\Sales',compact('data'));
    }

    public function Forecasting(){

        $data = DB::table('sales_tbl')
                ->select('*')
                ->get();
        
        $years = array();

        foreach($data as $result){
            array_push($years,date("Y",strtotime($result->date)));
        }

        $years = array_unique($years);
        $years = array_values($years);

        

        return view('admin\Forecasting',compact('years'));
    }

    public function SalesForecasting(Request $request){

        $data = DB::table('sales_tbl') //kinuha muna lahat ng data sa sales_tbl
                ->select('*')
                ->get();
        
        $months = array();

        foreach($data as $result){
            if(date("Y",strtotime($result->date)) == $request->year){ //
                array_push($months,date("F",strtotime($result->date)));
            }
            
        }
        
        $months = array_unique($months); //inalis namin ung duplicate na month

        $months = array_values($months); //pang ayos
        $monthcount = count($months);
        
        $decmonths = array("January","February","March","April","May","June","July","August","September","October","November","December");
        $monthlysales = [
            "January" => 0,
            "February" => 0,
            "March" => 0,
            "April" => 0,
            "May" => 0,
            "June" => 0,
            "July" => 0,
            "August" => 0,
            "September" => 0,
            "October" => 0,
            "November" => 0,
            "December" => 0,

        ];
        $salesArr = array();

        for($x = 0; $x < count($months); $x++){
            $sales = 0;
            foreach($data as $rslt){
                if(date("F",strtotime($rslt->date)) == $months[$x] && date("Y",strtotime($rslt->date)) == $request->year){
                    $sales = $rslt->amount + $sales;
                }
            
            }

            $monthlysales[$months[$x]] = $sales;

        }



        $salesmonth = $monthlysales;

    
            $count = 0;
            $temp = 0;
        for($y = 0; $y < 12; $y++){
            
            if($monthlysales[$decmonths[$y]] == 0){
                $forecast = floor($temp / $count); //moving average
                $monthlysales[$decmonths[$y]] = $forecast;
                array_push($salesArr,$monthlysales[$decmonths[$y]]);
                $count++;
                $temp = $temp + $forecast;
            }
            else{
                $temp = $temp + $monthlysales[$decmonths[$y]];
                array_push($salesArr,$monthlysales[$decmonths[$y]]);
                $count = $count + 1;
            }
            
        }



        return view('admin\salesforecasting',compact('salesArr','salesmonth','decmonths'));

    }

    public function DeclineOrder(Request $request){

        Order_Tbl::DeleteOrder($request->order_id);
        Item_Tbl::AddStock($request->item_id,$request->qty);
    }

    public function ProductReport(){

        $item_ids = array();

        $data = DB::table('sales_tbl')
                    ->join('order_tbl','sales_tbl.order_id','=','order_tbl.order_id')
                    ->join('item_tbl','item_tbl.item_id','=','order_tbl.item_id')
                    ->select('order_tbl.item_id')
                    ->get();
        
        foreach($data as $result){
            array_push($item_ids,$result->item_id);
        }
                    
        
        $leastpopular = array_count_values($item_ids);
        $mostpopular = array_count_values($item_ids);
        asort($leastpopular);
        arsort($mostpopular);

        $popular = array_slice(array_keys($mostpopular), 0, 3, true);
        $notpopular = array_slice(array_keys($leastpopular), 0, 3, true);

        $pplr = DB::table('item_tbl')
                ->select('*')
                ->whereIn('item_id',$popular)
                ->get();
        $ntpplr = DB::table('item_tbl')
                ->select('*')
                ->whereIn('item_id',$notpopular)
                ->get();

        return view('admin\ProductReport',compact('pplr','ntpplr'));
       
    }

    public function SetDiscount(Request $request){

        Item_Tbl::SetDiscount($request->item_id, $request->discount);
    }

    public function RemoveDiscount(Request $request){

        Item_Tbl::RemoveDiscount($request->item_id);
    }
}
