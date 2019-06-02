<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Model\Order;

class DashboardController extends Controller
{
    public function index(){
        switch (auth()->user()->user_role) {
            case 'admin':
            return $this->adminDashboard();
                break;
            case 'author':
            return  $this->authorDashboard();
                break;
            case 'vendor':
            return  $this->vendorDashboard();
                break;

        }
       
        
    }


    
    public function blog()
    {
        return view('admin.blog.blog');
    }

    
    public function shop()
    {
        return view('admin.shop.shop');
    }

    public function users()
    {
        $users=User::all();
        return view('admin.users.index')->with('users',$users);
    }



    private function adminDashboard(){
        return view('admin.dashboards.admin'); 
    }
    private function authorDashboard(){
        return view('admin.dashboards.author'); 
    }
    private function vendorDashboard(){
        $vendorData=auth()->user()->vendor;
        $productsCount=auth()->user()->products()->count();    
        $sales=Order::where('orders.status','shipped')
                                ->join('order_product', 'order_product.order_id', 'orders.id')                          
                                ->sum('order_product.quantity');
        $ordersCount=Order::where('orders.status','new')
                                ->join('order_product', 'order_product.order_id', 'orders.id')                          
                                ->sum('order_product.quantity');                                
                                                        
        return view('admin.dashboards.vendor')->with('vendorData', $vendorData)
                                                ->with('productsCount', $productsCount)
                                                ->with('sales', $sales); 
    }


    /// End Of file
}
