<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Post;
use App\Model\Event;
use App\Model\ProductCategory;
use Cart;



class FrontEndController extends Controller
{

    

    public function index(){

        $categoryTree=ProductCategory::where('parent_id',0)->get();
        $cartContent=Cart::getContent();
        $postChunks=Post::all()->chunk(4);
        $events=Event::all();
        $secondaryEvents=Event::where('is_main','<>' ,  1)->get();
       //dd($secondaryEvents);
        $promotedProducts=Product::all();
        $newProducts=$promotedProducts;
        $bestSeller=$promotedProducts;
         //dd($promotedProducts);
        return view('frontEnd.index')->with('categoryTree', $categoryTree)
                                     ->with('cartContent', $cartContent)
                                     ->with('events', $events)
                                     ->with('secondaryEvents',$secondaryEvents )
                                     ->with('postChunks', $postChunks)
                                     ->with(['bestSeller'=>$bestSeller, 'newProducts'=>$newProducts, 'promotedProducts'=> $promotedProducts]);
        
    }



    public function blog(){
        return view('frontEnd.blog');

    }




    public function shop(){
        $categoryTree=ProductCategory::where('parent_id',0)->get();
        $producChunks=Product::paginate(12);
        $categoryTreeHtml=$this->categoryTreeGen($categoryTree);
        $categoryPathHtml=$this->categoryPath(0);
      //  dd($categoryTreeHtml);
        $cartContent=Cart::getContent();
        return view('frontEnd.shop')->with('categoryTree', $categoryTree)
                                    ->with('productChunks', $producChunks)
                                    ->with('categoryTreeHtml', $categoryTreeHtml)
                                    ->with('categoryPathHtml', $categoryPathHtml)
                                    ->with('cartContent', $cartContent);

        
        
    }

    private function categoryTreeGen($categories){
        $html='';
        //dd($categories->childeren());
        foreach ($categories as  $category) {
           // dd($category->childeren()->get()); 
            $html.=  '<li class="treeChild" ><a href='.route('shop.category', ['id'=>$category->id]).'> <span>(15)</span>'.$category->name.' <i class="treeItemHandle far fa-plus-square">&nbsp</i> </a>
                       <ul class="nested">'. $this->categoryTreeGen($category->childeren()->get()). ' </ul>
                      </li>';
        }
        return $html;
    }

    public function category($id){
        
        $categoryTree=ProductCategory::where('parent_id',0)->get();
        $category=ProductCategory::where('id',$id)->get();
        
        $productsCollection=collect();//$category->first()->products()->get();
        $this->categoryProducts($category ,$productsCollection);
        $producChunks=$productsCollection->paginate(12);

        $categoryTreeHtml=$this->categoryTreeGen($category);
        $categoryPathHtml=$this->categoryPath($id);
       
        $cartContent=Cart::getContent();
        return view('frontEnd.shop')->with('categoryTree', $categoryTree)
                                    ->with('productChunks', $producChunks)
                                    ->with('categoryTreeHtml', $categoryTreeHtml)
                                    ->with('categoryPathHtml', $categoryPathHtml)
                                    ->with('cartContent', $cartContent);

    }
  

    private function categoryProducts($category,  &$productsCollection){
       
       
        foreach ($category as $child) {
            
            foreach ($child->products()->get() as $product) {
                # code...
                   $productsCollection->push($product);
            }
        
            $this->categoryProducts($child->childeren()->get(),  $productsCollection);

        }
    }

    private function categoryPath($categoryId){

        if($categoryId==0){
            return '<li><a href="#">خانه</a></li>';
        }

        $category=ProductCategory::find($categoryId);

        $html="<li><a href=".route('shop.category', ['id'=>$category->id])."> $category->name</a></li>";
        while ($category->parent_id > 0) {
            $category=ProductCategory::find($category->parent_id);
            $html=$html."<li><a href=".route('shop.category', ['id'=>$category->id])."> $category->name</a></li>";
            
        }
        $html=$html."<li><a href=".route('shop').">خانه</a></li>";
        return $html;
    }




    

    public function singlePost($slug){
        return view('frontEnd.singlePost');
        
    }



    public function singleProduct($id){
        return view('frontEnd.singleProduct');
        
    }






    public function search(Request $request){ 
        $categoryTree=ProductCategory::where('parent_id',0)->get();
        $cartContent=Cart::getContent();
        $products=Product::search($request->phrase)->get();
        $posts=Post::search($request->phrase)->get();
        
           return view('frontEnd.searchResults')->with('phrase', $request->phrase)
                                                ->with('resultProducts', $products)
                                                ->with('resultPosts', $posts)
                                                ->with('categoryTree', $categoryTree)
                                                ->with('cartContent', $cartContent);

        
    }









    public function aboutUs(){
        return view('frontEnd.aboutUs');
        
    }

    public function contactUs(){
        $categoryTree=ProductCategory::where('parent_id',0)->get();
        $cartContent=Cart::getContent();
        return view('frontEnd.contactUs')->with('categoryTree', $categoryTree)
                                     ->with('cartContent', $cartContent);
        
        
    }

    public function terms(){
        $categoryTree=ProductCategory::where('parent_id',0)->get();
        $cartContent=Cart::getContent();
        return view('frontEnd.terms')->with('categoryTree', $categoryTree)
                                     ->with('cartContent', $cartContent);
        
    }

}
