<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\Models\Tbl_Users;
use App\Models\Item_Tbl;
use App\Models\Order_Tbl;
use App\Models\Sales_Tbl;

class CustomerController extends Controller
{
    public function __construct(){

        session('order');

        if(!empty(session('order'))){
            session(['cnt' => count(session('order'))]);
        }
        else{
            session(['cnt' => 0]);
        }

    }

    public function index(){

        return view('customer\index');
    }

    public function winter(){

        $data = DB::table('item_tbl')
                ->select('*')
                ->where('category','winter')
                ->where('status',1)
                ->get();

        return view('customer\category',compact('data'));
        
    }
    public function temporaryspares(){

        $data = DB::table('item_tbl')
                ->select('*')
                ->where('category','temporary_spares')
                ->where('status',1)
                ->get();

        return view('customer\category',compact('data'));
        
    }
    public function trailer(){

        $data = DB::table('item_tbl')
                ->select('*')
                ->where('category','trailer')
                ->where('status',1)
                ->get();

        return view('customer\category',compact('data'));
        
    }
    public function atvutv(){

        $data = DB::table('item_tbl')
                ->select('*')
                ->where('category','atv_utv')
                ->where('status',1)
                ->get();

        return view('customer\category',compact('data'));
        
    }
    public function lawngarden(){

        $data = DB::table('item_tbl')
                ->select('*')
                ->where('category','lawn_garden')
                ->where('status',1)
                ->get();

        return view('customer\category',compact('data'));
        
    }

    public function ItemPreview($item_id){

        $data = DB::table('item_tbl')
                ->select('*')
                ->where('item_id',$item_id)
                ->first();

        return view('customer\itempreview',compact('data'));
    }

    public function AddToCart(Request $request){

        $data = DB::table('item_tbl')
                ->select('*')
                ->where('item_id',$request->item_id)
                ->first();

        if($data->quantity < $request->quantity){
            return "wag tanga";
        }
        else{
            if(!empty(session('order'))){
        
            $flag1 = 0;
            $count = count(session('order'));
            $flag = 0;
            
            for($x=0; $x < $count; $x++){
                        
                if(session('order')[$x]['item_id'] == $request->item_id){
            
                    if($flag1 == 0){
                        $products = session()->pull('order', []);
                    }

                    $products[$x]['quantity'] = $products[$x]['quantity'] + $request->quantity;
                    $flag = 1;
                }
                $flag1 = 1;
                        
            }
            if($flag == 0){
                if($data->sale == 1){
                    $price = $data->price * $data->discount;
                }
                else{
                    $price = $data->price;
                }
                $request->session()->push('order',[
                            'item_id' => $request->item_id,
                            'item_name' => $data->product_name,
                            'description' => $data->description,
                            'item_price' => $price,
                            'stock' => $data->quantity,
                            'image' => $data->image,
                            'quantity' => $request->quantity
                        ]);
            }
            else{
                $products = array_values($products);
                session()->put('order',$products);
            }
                     
            
                }
                else{
                    if($data->sale == 1){
                        $price = $data->price * $data->discount;
                    }
                    else{
                        $price = $data->price;
                    }
                    $request->session()->push('order',[
                            'item_id' => $request->item_id,
                            'item_name' => $data->product_name,
                            'description' => $data->description,
                            'stock' => $data->quantity,
                            'item_price' => $price,
                            'image' => $data->image,
                            'quantity' => $request->quantity
                        ]);
                }

            return "hindi tanga";

        }



    }

    public function test(){

        
        // dd($monthlysales);
    }

    public function CartPreview(){

        $data = session('order');
        $address = DB::table('tbl_users')
                    ->select('*')
                    ->where('user_id',session('user_id'))
                    ->first();
       

        return view('customer\cart',compact('data','address'));
    }

    public function RemoveItem(Request $request){

        $products=session()->pull('order', []);
        
        for($x=0; $x < count($products); $x++){
            if($products[$x]['item_id'] == $request->item_id){
                unset($products[$x]);
            }
            
        }
        $products = array_values($products);
        session()->put('order',$products);
    }

    public function LoginCustomer(){
        return view('customer\login');
    }

    public function Customer(){

        return view('home');
    }

    public function Register(Request $request){

        if($request['password'] != $request['confirmpass']){
            $data['message'] = "Password and confirm password did not match!";
            return view('customer\signup',  ['message'=> $data['message']]);
        }
        else{
            Tbl_Users::AddUser($request->all());
            $data['message'] = "Successfully registered";
            return view('customer\login',  ['message'=> $data['message']]);
        }
    }

    public function UserVerification(Request $request){

        $username = $request['username'];
        $password = $request['password'];

        $tbl_users = Tbl_Users::select('*')
                        ->where('username',$username)
                        ->where('password',$password)
                        ->first();

        if($tbl_users == false || $tbl_users->username != $username || $tbl_users->password != $password ){
            $data['message'] = "Invalid username or password";
            return view('customer\login',  ['message'=> $data['message']]);
        }
        else{
            
                $request->session()->put('user_id', $tbl_users->user_id); 
                $request->session()->put('name', $tbl_users->name);
                $request->session()->put('username', $tbl_users->username);    
                $request->session()->put('logged', true);
            
                return $this->index();
               
            }
        }
        
        public function EditProfile(){

            $data = DB::table('tbl_users')
                    ->select('*')
                    ->where('user_id',session('user_id'))
                    ->first();
            
            return view('customer\editprofile',compact('data'));
        }

        public function EditAccount(Request $request){

            Tbl_Users::EditUser($request->all());

            return redirect()->route('index');
        }

        public function logout(Request $request){

            $request->session()->flush();
            Auth::logout();

            return $this->index();
        
        }

        public function ChangePasswordView(){

            return view('customer\changepassword');
        }
    
        public function ChangePassword(Request $request){

            $data = DB::table('tbl_users')
                    ->select('*')
                    ->where('user_id',session('user_id'))
                    ->get();
            
            
            foreach($data as $result){
                if($request['password'] != $result->password){
                    $data['message'] = "Incorrect password";
                    return view('customer\changepassword',  ['message'=> $data['message']]);
                }
                elseif($request['newpass'] != $request['newpassconfirm']){
                    $data['message'] = "New password and confirm password did not match";
                    return view('customer\changepassword',  ['message'=> $data['message']]);
                }
                else{
                    Tbl_Users::ChangePassword($request['newpass'],session('user_id'));
                    $data['message'] = "Password Successfully Changed!";
                    return view('customer\changepassword',  ['message'=> $data['message']]);
                }
            }
            
        }

        public function EditItem(Request $request){

            

            $data = DB::table('item_tbl')
                    ->select('*')
                    ->where('item_id',$request->item_id)
                    ->first();

            if($data->quantity < $request->quantity){
                return "tanga ka";
            }
            else{
                $products=session()->pull('order', []);
                for($x=0; $x < count($products); $x++){
                    if($products[$x]['item_id'] == $request->item_id){
                        $products[$x]['quantity'] = $request->quantity;
                    }  
                }
                session()->put('order',$products);

                return "hindi tanga";
            }
        
            
            
        }

        public function CheckOut(){
            
            $item_ids = array();
            $quantities = array();
            $total = 0;
            
            for($x=0; $x < count(session('order')); $x++){
                
                Order_Tbl::CheckOut(session('order')[$x]['item_id'],session('order')[$x]['quantity'],session('user_id'));
                Item_Tbl::ReduceStock(session('order')[$x]['item_id'],session('order')[$x]['quantity']);
            }

           session()->forget('order');

           return redirect()->route('index');
        }

        public function Recommender(){

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


            return view('customer\recommendation',compact('pplr','ntpplr'));
        }
        
    
}


