<?php


namespace App\Http\Controllers;

use App\category;
use App\products;
use Illuminate\Http\Request;
use Redirect;
use App\User;
use App\roles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;


class AuthController extends Controller

{
 
  


    public function index()

    {
      if(  Auth::check()){


        return redirect()->intended('dashboard');

      }
        
      return view('auth.login');
           

    }  


    public function registration()

    {
      if(  Auth::check()){


        return redirect()->intended('dashboard');

      } return redirect()->intended('login');

    }

     

    public function postLogin(Request $request)

    {
 
request()->validate([

        'email' => 'required',

        'password' => 'required',

        ]);


        $credentials = implode($request->only( 'password'));
        // dd($request->only('email'));
        // exit;

        // if (Auth::attempt($credentials))
        if (Auth::attempt(['email' => $request->only('email'), 'password' => $credentials, 'is_Active' => 1])) {

         return redirect()->intended('dashboard');

        }
        $request->Session()->flash('msg','Oppes! You have entered invalid credentials! OR id is Inactive!! ');


        
        return redirect()->intended('login');
    }


    public function postRegistration(Request $request)

    {  

        request()->validate([

        'name' => 'required|string|max:255',

        'email' => 'required|email|max:255|unique:users',
        
        'role' =>'required',

        'password' => 'required|min:8|confirmed',

        ]);

      
        $data = $request->all();


        $check = $this->create($data);
        $request->Session()->flash('msg','User register Succescfully! Please login!!');

       

        return Redirect::to("login");

    }

     

    public function dashboard()

    {


      if(Auth::check()){
        $users = User::where('role_id','!=', "3");
        $list=$users->count();
        $test= User::Where('role_id',"1")->get();
        $admin=$test->count();
        $test1= User::Where('role_id',"2")->get();
        $sales=$test1->count();
        $test2= User::Where('is_Active',"1")->Where('role_id','!=', "3")->get();
        $active=$test2->count();
        $test3= User::Where('is_Active',"0")->get();
        $inactive=$test3->count();
        $category = category::all()->count();
        $products = products::all()->count();



                return view('dash',compact('list','admin','sales','active','inactive','category','products'));

      }

       return Redirect::to("login")->withSuccess('Opps! You do not have access');

    }


    public function create(array $data)

    {

      return User::create([

        'name' => $data['name'],

        'email' => $data['email'],

        'role_id'   => $data['role'],

        'password' => Hash::make($data['password'])

      ]);

    }

     

    public function logout() {

        Session::flush();

        Auth::logout();

        return Redirect('login');

    }



    

}