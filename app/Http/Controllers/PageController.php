<?php

namespace App\Http\Controllers;
use App\Slide;
use App\Products;
use App\ProductsType;
use App\Cart;
use Session;
use App\Customer;
use App\BillDetail;
use App\Bill;
use App\User;
use Hash;
use Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex()
    {
    	$Slide =Slide::all();
    	$new_products=Products::where('new',1)->paginate(4);
    	$sanpham_khuyenmai=Products::where('promotion_price','<>',0)->paginate(8);
    	return view ('layout.trangchu',compact('Slide','new_products','sanpham_khuyenmai'));
    }
      public function getLoaisp($type)
     {
         $sp_theoloai=Products::where('id_type',$type)->get();
     $sp_khac=Products::where('id_type','<>',$type)->paginate(9);
        $loai=ProductsType::all();
     $loai_sp=ProductsType::where('id',$type)->first();
    return view ('layout.loaisanpham',compact('sp_theoloai','sp_khac','loai','loai_sp'));
    }
    public function getChiTietsp(Request $req)
    {
        $sanpham=Products::where('id',$req->id)->first();
        $sp_tuongtu=Products::where('id_type',$sanpham->id_type)->paginate(3);
    	return view ('layout.chitietsanpham',compact('sanpham','sp_tuongtu'));
    }
    public function getGioithieu()
    {
    	return view ('layout.gioithieu');
    }
     public function getLienhe()
    {
    	return view ('layout.lienhe');
    }
    public function getAddtoCart(Request $req,$id)
    {
        $product = Products::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);
        $req->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if(count($cart->items)>0){
            Session::put('cart',$cart);
        }
        else{
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getCheckout(){
        return view('layout.dathang');
    }

    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        $customer = new Customer;
        $customer->name = $req->name;
        $customer->gender = $req->gender;
        $customer->email = $req->email;
        $customer->address = $req->address;
        $customer->phone_number = $req->phone;
        $customer->note = $req->notes;
        $customer->save();

        $bill = new Bill;
        $bill->id_customer = $customer->id;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice;
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->save();

        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
           $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = ($value['price']/$value['qty']);
            $bill_detail->save();
        }
       Session::forget('cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');

    }
    public function getLogin(){
        return view('layout.dangnhap');
    }
    public function getSignup(){
        return view('layout.dangki');
    }
    public function postSignin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Không đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự'
            ]);
        $user = new User();
        $user->full_name = $req->fullname;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }
    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $credentials = array('email'=>$req->email,'password'=>$req->password);
            if(Auth::attempt($credentials)){

            return redirect()->back()->with(['flag'=>'success','message'=>'Đăng nhập thành công']);
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            }
        }
    public function postLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }
    public function getTimkiem(Request $req){
        $product =Products::where('name','like', '%'.$req->key.'%')->orWhere('unit_price',$req->key)->get();
        return view ('layout.timkiem',compact('product'));
    }
    public function getGiohang()
    {
        return view('layout.giohang');
    }
    public function getLoi()
    {
        return view('errors.404');
    }
} 

