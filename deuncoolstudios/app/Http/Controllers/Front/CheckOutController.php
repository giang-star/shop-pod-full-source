<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\UserCart;
use App\Utilities\VNPay;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CheckOutController extends Controller
{
    //
    public function index(){
        if(auth()->user()){
            $carts = UserCart::where('user_id', auth()->user()->id)->get();
            // $total = array_sum(array_column($carts->user->toArray(), 'user_id'));
            $totals = UserCart::select('total')->where('user_id', auth()->user()->id)->get();
            $total = 0;
            foreach($totals as $item){
                $total += $item->total;
            }
            $subtotal = $total;
            return view('front/checkout/index', compact('carts','total','subtotal'));
        }
        $carts = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        return view('front.checkout.index', compact('carts', 'total', 'subtotal'));
    }
    public function addOrder(Request $request){
        $dataOrder = $request->all();
        $dataOrder['user_id'] = auth()->user()->id ?? 0;
        if(auth()->user()){
            $dataOrder['email'] = auth()->user()->email;
        }
        $order = Order::create($dataOrder);
        
        // Them chi tiet don hang
        if(auth()->user()){
            $carts = UserCart::where(['user_id'=>auth()->user()->id])->get();
        }
        else{
            $carts = Cart::content();
        }
        if($request->payment_type == 'pay_later'){ 
            if(auth()->user()){
                foreach($carts as $cart){
                    $data = [
                        'order_id'=>$order->id,
                        'product_id'=>$cart->product_id,
                        'qty'=>$cart->qty,
                        'amount'=>$cart->price,
                        'total'=>$cart->price * $cart->qty,
                        'size'=>$cart->size
                    ];
                    OrderDetail::create($data);
                }
            }
            else{
                foreach ($carts as $cart) {
                    $data = [
                        'order_id'=>$order->id,
                        'product_id'=>$cart->id,
                        'qty'=>$cart->qty,
                        'amount'=>$cart->price,
                        'total'=>$cart->price * $cart->qty,
                        'size' => $cart->options->size
                    ];  
                    OrderDetail::create($data);
                }
            }
            
            
            // gửi mail
            if(auth()->user()){
                $totals = UserCart::select('total')->where('user_id', auth()->user()->id)->get();
                $total = 0;
                foreach($totals as $item){
                    $total += $item->total;
                }
                $subtotal = $total;
            }
            else{
                $total = Cart::total();
                $subtotal = Cart::subtotal();
            }
            

            // up date lai so luong san pham
            
            //cap nhat du lieu cua product
            $orderDetails = OrderDetail::where('order_id', $order->id)->get();

            // dd($orderDetails);
            foreach($orderDetails as $orderDetail){
                $product = Product::where('id', $orderDetail->product_id)->firstOrFail();
                $product->qty = $product->qty- $orderDetail->qty;
                $product->save();
                $productDetail = ProductDetail::where(['product_id'=>$product->id])->where('size', $orderDetail->size)->first();
                if($productDetail){
                    $productDetail->qty = $productDetail->qty - $orderDetail->qty;
                    $productDetail->save();
                }
            }
            
            // Xoa gio hang
            $this->sendMail($order,$total, $subtotal);
            Cart::destroy();
            if(auth()->user()){
                UserCart::where('user_id', auth()->user()->id)->delete();
            }
            // Tra ve ket qua   
            return redirect('checkout/result')->with('notification', 'Đặt hàng thành công, vui lòng kiểm tra email để xem thông tin chi tiết đơn hàng');
        }
         if($request->payment_type == 'online_payment'){ 
            // gửi mail
            if(auth()->user()){
                foreach($carts as $cart){
                    $data = [
                        'order_id'=>$order->id,
                        'product_id'=>$cart->product_id,
                        'qty'=>$cart->qty,
                        'amount'=>$cart->price,
                        'total'=>$cart->price * $cart->qty,
                        'size'=>$cart->size
                    ];
                    OrderDetail::create($data);
                }
            }
            else{
                foreach ($carts as $cart) {
                    $data = [
                        'order_id'=>$order->id,
                        'product_id'=>$cart->id,
                        'qty'=>$cart->qty,
                        'amount'=>$cart->price,
                        'total'=>$cart->price * $cart->qty,
                        'size' => $cart->options->size
                    ];  
                    OrderDetail::create($data);
                }
            }
            if(auth()->user()){
                $totals = UserCart::select('total')->where('user_id', auth()->user()->id)->get();
                $total = 0;
                foreach($totals as $item){
                    $total += $item->total;
                }
                $subtotal = $total;
            }
            else{
                $total = Cart::total();
                $subtotal = Cart::subtotal();
            }

            // lay url thanh toan
            $data_url = VNPay::vnpay_create_payment([
                'vnp_TxnRef'=>$order->id, // id don hang
                'vnp_OrderInfo'=>'Mô tả về đơn hàng ở đây',
                'vnp_Amount'=>$total
            ]);
            
            //chuyen huong toi url
            return redirect()->to($data_url);
         }
         return 'Xin lỗi chúng tôi chưa phát triển hình thức thanh toán online!!';
    }
    private function sendMail($order,$total, $subtotal){
        $email_to = $order->email;

        Mail::send('front/checkout/email', compact('order', 'total', 'subtotal'), function($message) use($email_to){
            $message->from('89thenext@gmail.com', 'Deuncoolstudios');
            $message->to($email_to, $email_to);
            $message->subject('Order Notification');

        });
    }
    public function vnPayCheck(Request $request){
        $vnp_ResponseCode = $request->get('vnp_ResponseCode');
        $vnp_TxnRef = $request->get('vnp_TxnRef');
        $vnp_Amount = $request->get('vnp_Amount');

        if($vnp_ResponseCode != null){
            if($vnp_ResponseCode == 00){
                //send mail

                $order = Order::find($vnp_TxnRef);
                if(auth()->user()){
                    $totals = UserCart::select('total')->where('user_id', auth()->user()->id)->get();
                    $total = 0;
                    foreach($totals as $item){
                        $total += $item->total;
                    }
                    $subtotal = $total;
                }
                else{
                    $total = Cart::total();
                    $subtotal = Cart::subtotal();
                }
                $this->sendMail($order, $total, $subtotal);

                //xoa gio hang
                if(auth()->user()){
                    UserCart::where('user_id', auth()->user()->id)->delete();
                }
                Cart::destroy();

                // thong bao thanh cong

                return redirect('checkout/result')->with('notification', 'Đặt hàng thành công, vui lòng kiểm tra email để xem thông tin chi tiết đơn hàng');
            }
            else{
                //xoa don hang

                Order::find($vnp_TxnRef)->delete();

                return redirect('checkout/result')->with('notification', 'Đặt hàng không thành công, vui lòng liên hệ với cửa hàng để biết thông tin chi tiết');
            }
        }
    }
    public function result(){
        $notification = session('notification');
        if(auth()->user()){
            $carts = UserCart::where('user_id', auth()->user()->id)->get();
            // $total = array_sum(array_column($carts->user->toArray(), 'user_id'));
            $totals = UserCart::select('total')->where('user_id', auth()->user()->id)->get();
            $total = 0;
            foreach($totals as $item){
                $total += $item->total;
            }

            return view('front/checkout/result', compact('carts','total', 'notification'));

        }
        return view('front.checkout.result', compact('notification'));
    }
}
