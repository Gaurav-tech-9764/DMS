<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use App\category;
use App\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
// Create the Users

    public function create(Request $request)
    {
       $validator= Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ]);
        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }
       else{

           
            $create= new user;
            $create->name=$request->name;
            $create->email=$request->email;
            $create->role_id=$request->role;
          
            $create->password=Hash::make($request->password);
            $create->save();
           
                return response()->json(['status'=>1, 'msg'=>'New User has been successfully Added']);
         
            }
                

    }
// _____/Create Users   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
 

 
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */

// Listing of the Users


public function show()
    {
        
        if(Auth::user()->role_id == 1||Auth::user()->role_id == 3)
        {

            $List = User::Where('role_id','!=', "3")->orderBy('id', 'DESC')->paginate(10);
       
        }
    else
    {

    $List = User::Where('role_id','!=', "3")->where('is_active',"1")->orderBy('id', 'DESC')->paginate(10);
    }
     
    $role= Role::Where('id','!=', "3")->get();
  

        return view('includes.Foruserlist',compact('List','role'))->with('n',1);
    
    
}
//____/lsiting Users
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
 
// get info for Edit information modal functions

public function getuser($id)
    {
      
        $getuser = User::Where('id', $id)->first();
      
      
       
        return response()->json($getuser);
    }
// Edit information modal functions end


// uploadimage  modal functions

public function uploadimage(Request $request, $id)
{
        
        $validator= Validator::make($request->all(), [
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:1000kb'
            
        ]);
            if(!$validator->passes())
            {
                return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
            }
          else
       {  
                    $upload=User::find($id);
                    if($request->hasfile('image')){
                    $file = $request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = $id.'.'.$extension;
                    $file->move('uploads/profilepicture/',$filename);
                    $upload->picture= $filename;
            }
        else
            {
                    return $request;
                    $upload->picture= '';
            }
            
            
                $upload->save();
                return response()->json(['status'=>1, 'msg'=>'Profile Image has been successfully Updated']);
        }
        
    
}
// upload imagel functions end
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     * 
     * 
     */
public function update(Request $request, $id){
            
        $validator= Validator::make($request->all(), [
            'Editname' => 'required|string|max:255',
            'Editemail' => 'required|string|email|max:255',
            'Editrole' => 'required',
            'if(Auth::user()->role_id == 1||Auth::user()->role_id == 3){
                "EditStatus"=> "required"
            }',
            
            'EditNumber' => 'required',
            'EditDesignation' => 'required|string',
            'Editpassword' => 'required|string|min:8|confirmed'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }
         else{

         
            $update=User::find($id);
            $update->name=$request->Editname;
            $update->email=$request->Editemail;
            $update->role_id=$request->Editrole;
            if(Auth::user()->role_id == 1||Auth::user()->role_id == 3){
                if($request->EditStatus==1){
                    $update->is_Active=1;
                }
                else{
                    $update->is_Active=0;
                }
                
            }
            $update->number=$request->EditNumber;
            $update->designation=$request->EditDesignation;
            $update->password=Hash::make($request->Editpassword);
            $update->save();
            return response()->json(['status'=>1, 'msg'=>'User Details has been successfully Updated']);
            }
     
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
// Make user InActive or DELete
public function destroy($id, Request $request){
                
    User::where('id', $id)->update(['is_Active' => "0"]);

        return response()->json(['success'=>"Record Has been Deleted!!"]);
    }

// Make user InActive or DELete

//For User profile page

 public function userprofile()
    {
     return view('includes.userprofile');
 }
 //____For User Profile Page




///Functions for sales User
////For category page

public function category()
{
    $Category = category::orderBy('id', 'DESC')->get();
    return view('Sales_User.Category',compact('Category'))->with('n',1);
}

///Adding Categroy


public function Addcategory(Request $request)

{
    $validator= Validator::make($request->all(), [
        'Category_name' => 'required|string|max:255',
        'Category_Description' => 'required|string||max:255'
       
    ]);

    if(!$validator->passes()){
        return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
    }

    else{
         $create= new category;
        $create->Category_Name=$request->Category_name;
        $create->Category_description=$request->Category_Description;
        $create->save();
       
            return response()->json(['status'=>1, 'msg'=>'New category Has Been Created!!!']);
     
        }
           
}


// Edit Category start

public function Editcategory($id){

    $getcategory = category::Where('id', $id)->first();
    return response()->json($getcategory);

}


public function UpdateCategory(Request $request, $id){

    $validator= Validator::make($request->all(), [
        'EditCategory_name' => 'required|string|max:255',
        'EditCategory_Description' => 'required|string||max:255'
    ]);

    if(!$validator->passes()){
        return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
    }
     else{

     
        $updatecategory=category::find($id);
        $updatecategory->Category_Name=$request->EditCategory_name;
        $updatecategory->Category_description=$request->EditCategory_Description;
       
        $updatecategory->save();
        return response()->json(['status'=>1, 'msg'=>'Category Has Been successfully Updated']);
        }



}

//Delete Category with Related Products


public function DeleteCategory(Request $request, $id){
   

 products::select('products.*','category.*' )->Join('category', 'products.category_id', '=', 'category.id')->Where('products.category_id',$id)->delete();
 
 category::where('id', $id)
    ->delete();

 return response()->json(['success'=>"Category Has been Deleted!!"]);
   
}

//Function for product for sales user
///For products Page


public function products()
{

 
    $Category = category::all();
    $products= products::select('products.*','category.Category_Name')->leftJoin('category', 'products.category_id', '=', 'category.id')->orderBy('id', 'DESC')
    ->paginate(10);
    // dd($products);
    return view('Sales_User.products',compact('products','Category'))->with('n',1);
}

////Adding the product


public function Addproducts(Request $request)
{

 
 $validator= Validator::make($request->all(), [
    'Product_name' => 'required|string|max:255',
    'Product_Description' => 'required|string||max:255',
    'Product_category' => 'required',
    'Product_Price' => 'required|string||max:255',
    'product_image' => 'mimes:jpeg,jpg,png,gif|required|max:1000kb'
   
]);

if(!$validator->passes()){
    return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
}

else{
   
    $create= new products;
   $create->Product_Name=$request->Product_name;
   $create->Product_description=$request->Product_Description;
   $create->Category_id=$request->Product_category;
   $create->product_price=$request->Product_Price;

   if($request->hasfile('product_image')){
    $file = $request->file('product_image');
    $extension = $file->getClientOriginalExtension();
    $filename = $request->Product_name.'.'.$extension;
    $file->move('uploads/Productimage/',$filename);
    $create->product_image= $filename;
}
else{
    return $request;
  
    $create->product_image= '';
}

   
   $create->save();
  
       return response()->json(['status'=>1, 'msg'=>'New product Has Been Created!!!']);

   }



}

public function Editproducts($id){

    $getproducts = products::select('products.*','category.id')->leftJoin('category', 'products.category_id', '=', 'category.id')
    ->Where('products.id', $id)->first();

    return response()->json($getproducts);

}
// For upadating the products

public function Updateproducts(Request $request, $id)
{

 
 $validator= Validator::make($request->all(), [
    'EditProduct_name' => 'required|string|max:255',
    'EditProduct_Description' => 'required|string||max:255',
    'EditProduct_category' => 'required',
    'EditProduct_Price' => 'required|string||max:255',
    'Editproduct_image' => 'mimes:jpeg,jpg,png,gif|required|max:1000kb'
   
]);

if(!$validator->passes()){
    return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
}

else{
   
    $updateproducts=products::find($id);
   $updateproducts->Product_Name=$request->EditProduct_name;
   $updateproducts->Product_description=$request->EditProduct_Description;
   $updateproducts->Category_id=$request->EditProduct_category;
   $updateproducts->product_price=$request->EditProduct_Price;

   if($request->hasfile('Editproduct_image')){
    $file = $request->file('Editproduct_image');
    $extension = $file->getClientOriginalExtension();
    $filename = $request->Product_name.'.'.$extension;
    $file->move('uploads/Productimage/',$filename);
    $updateproducts->product_image= $filename;
}
else{
    return $request;
  
    $updateproducts->product_image= '';
}

   
   $updateproducts->save();
  
       return response()->json(['status'=>1, 'msg'=>'Product has been updated sucessfully!!']);

   }



}

////For Delete The Product

public function Deleteproducts($id, Request $request)
{
     products::where('id', $id)
                ->delete();

                // return redirect()->route('userlist'); 
                return response()->json(['success'=>"Product Has been Deleted!!"]);
}




}
