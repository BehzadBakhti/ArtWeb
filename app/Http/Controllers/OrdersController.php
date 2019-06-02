<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Order;
use App\Model\Product;
use Cart;
use Session;

class OrdersController extends Controller
{



	public function getOrders($status){
		//dd(auth()->user()->id);
		   // $products=auth()->user()->products()->whereHas('orders', function($q){
		   // 			$q->where('status' , 'new');
		   // 		})->get();
		   
		   if(auth()->user()->user_role=='admin'){
			$orders=Order::where('orders.status',$status)->get()->paginate(20);
			
										return view('admin.shop.orders.admin_index')->with('orders', $orders);

		   }else{
			
			$orderedProducts=auth()->user()->products()
									   ->join('order_product', 'products.id','order_product.product_id')
									   ->join('orders', 'order_product.order_id', 'orders.id')
									   ->where('orders.status',$status)
									   ->groupBy('order_product.product_id')
									   ->selectRaw('SUM(order_product.quantity) as qty, products.*')
									   ->get();
										return view('admin.shop.orders.index')->with('orderedProducts', $orderedProducts);
		   }
	  // dd($orderedProducts);

	}
	   
	public function edit($id){
	$orderData=Order::find($id);
	//dd($orderData->products);
	return view('admin.shop.orders.single')->with('orderData',$orderData);
	}




	public function createOrder(Request $request){
	
	$cartContent=Cart::getContent();
	// Cart::clear();
//	dd($cartContent);
	$order=	Order::create([
		'user_id'=>auth()->user()->id,
		'address_id'=>explode("_",$request->address_id)[1],
		'total'=>(int)$request->payable,
		]);
		Session::put('thisOrderId', $order->id);
		$error='';
		foreach ($cartContent as $key => $value) {
		
			$product=Product::find($key);
				if($value['quantity']>$product->stock){
					$error='not_enugh';
				}
				$order->products()->attach($product, ['quantity'=>$value['quantity']]);
	
			}
			if($error=='not_enugh'){
				Session::flash('error', 'تعداد درخواستی یک یا چند کالا بیش از موجودی می باشد');
				$order->error=$error;
				$order->save();
				return $error;

			}else{
				Session::put('thisOrderId', $order->id);
				return $this->handle();

			}

	
		// check if money recived
	//return redirect()->route('order.recheck');	// reduce from stock

		
	}



	public function handle(){

		$url = 'http://bitpay.ir/payment-test/gateway-send';//'http://bitpay.ir/payment/gateway-send'; 
		$api = 'adxcv-zzadq-polkjsad-opp13opoz-1sdf455aadzmck1244567';//'Your-API';
		$amount = 1000;
		$redirect = route('order.recheck');//route('order.recheck');
		$name = 'behzad';
		$email = 'a@a.a';
		$description = 'testing';
		$factorId = 1;
		
		$result = $this->send_BitpayRequest($url, $api, $amount, $redirect, $factorId, $name, $email, $description); 
		
		if($result > 0 && is_numeric($result))
		{
			$go ="http://bitpay.ir/payment-test/gateway-$result" ;// "http://bitpay.ir/payment/gateway-$result"; 

			return redirect()->to($go);
		} else{
			Order::find(Session::get('thisOrderId'))->update(['error'=>$result]);
		}
		
	}

	public function reCheck(Request $request){
		$url = 'http://bitpay.ir/payment-test/gateway-result-second'; 
		$api = 'adxcv-zzadq-polkjsad-opp13opoz-1sdf455aadzmck1244567';
		//dump($_POST);
		$trans_id = $_POST['trans_id']; 
		$id_get = $_POST['id_get'];
		$result = $this->get_BitpayRequest($url,$api,$trans_id,$id_get); 
		//dump(Session::get('thisOrderId'));
		if($result == 1)
		{
			
			$cartContent=Cart::getContent();
			foreach ($cartContent as $key => $value) {
			
				$product=Product::find($key);
				$product->stock-=$value['quantity'];
				$product->save();
				}
			return; //a view 
		}
		else
		{
			Order::find(Session::get('thisOrderId'))->update(['error'=>$result]);
		}

	}



    function send_BitpayRequest($url,$api,$amount,$redirect,$factorId,$name,$email,$description){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS,"api=$api&amount=$amount&redirect=$redirect&factorId=$factorId&name=$name&email=$email&description=$description");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		$res = curl_exec($ch);
		$err = curl_error($ch);
		curl_close($ch);
	//dump($err );
        return $res;
    }



    function get_BitpayRequest($url,$api,$trans_id,$id_get){
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_POSTFIELDS,"api=$api&id_get=$id_get&trans_id=$trans_id");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        $res = curl_exec($ch);
        curl_close($ch);
        return $res;
    }
}
