<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Post;
use App\Model\Event;
use App\Model\ProductCategory;
use Morilog\Jalali\jalalian;
use Cart;
use MPCO\EnglishPersianNumber\Numbers;



class FrontEndController extends Controller
{

    public function cart(){
        $categoryTree=ProductCategory::where('parent_id',0)->get();
        $cartContent=Cart::getContent();
        $imgAddress=Array();
        foreach ($cartContent as $key => $value) {
            $name=Product::find($key)->images[0]->image_name;
           array_push($imgAddress,[$key,$name]);
        }
        //dd($$cartContent[$imgAddress[$i][0]]->attributes->discount);
        return view('frontEnd.cart')->with('categoryTree', $categoryTree)
                                     ->with('cartContent', $cartContent)
                                     ->with('imgAddress', $imgAddress);;
    }

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

        $categoryTree=ProductCategory::where('parent_id',0)->get();
        $cartContent=Cart::getContent();
        $recentPosts=Post::orderBy('updated_at', "DESC")->get()->paginate(6);
        $mostRead=Post::orderBy('read_count', "DESC")->get()->take(5);
        $mostCommented=Post:: all()->sortByDesc(function($post)
        {
            return $post->comments()->where('qualified', true)->count();
        })->take(5);
        return view('frontEnd.blog')->with('categoryTree', $categoryTree)
                                    ->with('recentPosts', $recentPosts)
                                    ->with('mostRead', $mostRead)
                                    ->with('mostCommented', $mostCommented)
                                    ->with('cartContent', $cartContent);

    }

    public function singlePost($slug){
        $categoryTree=ProductCategory::where('parent_id',0)->get();
        $cartContent=Cart::getContent();
        $thisPost=Post::where('slug',$slug)->first();
       // dd($thisPost->user);
        $comments=$thisPost->comments()->where('qualified', true)->get();
        $recentPosts=Post::orderBy('updated_at', "DESC")->get()->take(5);
        $mostRead=Post::orderBy('read_count', "DESC")->get()->take(5);

        return view('frontEnd.singlePost')->with('categoryTree', $categoryTree)
                                            ->with('recentPosts', $recentPosts)
                                            ->with('mostRead', $mostRead)
                                            ->with('thisPost', $thisPost)
                                            ->with('comments', $comments)
                                            ->with('cartContent', $cartContent);
        
    }


    public function shop(){
        $perPage=18;
        $categoryTree=ProductCategory::where('parent_id',0)->get();
        $producChunks=Product::paginate($perPage);
        $categoryTreeHtml=$this->categoryTreeGen($categoryTree);
        $categoryPathHtml=$this->categoryPath(0);
      // dd($producChunks->links());
        $cartContent=Cart::getContent();
        return view('frontEnd.shop')->with('categoryTree', $categoryTree)
                                    ->with('productChunks', $producChunks)
                                    ->with('categoryTreeHtml', $categoryTreeHtml)
                                    ->with('categoryPathHtml', $categoryPathHtml)
                                    ->with('cartContent', $cartContent);

    }


    /*
        $category to input is of type collection
        */
    private function categoryTreeGen($categories ){
        $html='';
        //dd($categories->childeren());
        foreach ($categories as  $category) {
        //dd(collect($category)); 
           $prodList=collect();
           $this->categoryProducts($category ,$prodList);
            $html.=  '<li class="treeChild" ><a href='.route('shop.category', ['id'=>$category->id]).'> <span>'.$prodList->count().'</span>'.$category->name.' <i class="treeItemHandle far fa-plus-square">&nbsp</i> </a>
                       <ul class="nested">'. $this->categoryTreeGen($category->childeren()->get()). ' </ul>
                      </li>';
        }
        return $html;
    }

    /*
 $category to input is of type ProductCategory Model Instance !!!!!!!!!
*/
    protected function categoryProducts($category,  &$productsCollection){
       
        $products=$category->products()->get();
         //dd($productsCollection);
        foreach ($products as $product) {
            $productsCollection->push($product);
            //dump($productsCollection);
        }
        
         foreach ($category->childeren()->get() as $child) {
             
             $this->categoryProducts($child,  $productsCollection);
 
         }
     }


    public function category($id){
        $perPage=18;
        $categoryTree=ProductCategory::where('parent_id',0)->get();
        $cartContent=Cart::getContent();
        $category=ProductCategory::find($id);
        $catCollection=ProductCategory::where('id',$id)->get();
      //  dd($category);
        $productsCollection=collect();//$category->first()->products()->get();
        $this->categoryProducts($category ,$productsCollection);
        $producChunks=$productsCollection->paginate($perPage);

        $categoryTreeHtml=$this->categoryTreeGen($catCollection);
        $categoryPathHtml=$this->categoryPath($id);
       
        return view('frontEnd.shop')->with('categoryTree', $categoryTree)
                                    ->with('productChunks', $producChunks)
                                    ->with('categoryTreeHtml', $categoryTreeHtml)
                                    ->with('categoryPathHtml', $categoryPathHtml)
                                    ->with('cartContent', $cartContent);

    }
  

    

    private function categoryPath($categoryId){

        if($categoryId==0){
            return '<li><a href="'.route('shop').'">فروشگاه</a></li>';
        }

        $category=ProductCategory::find($categoryId);
       // dd($category->parent()->get());

        $html="<li><a href=".route('shop.category', ['id'=>$category->id])."> $category->name</a></li>";
        while ($category->parent_id > 0) {
            $category=$category->parent()->get()->first();
            $html=$html."<li><a href=".route('shop.category', ['id'=>$category->id])."> $category->name</a></li>";
            
        }
        $html=$html."<li><a href=".route('shop').">فروشگاه</a></li>";
        return $html;
    }



    public function singleProduct($id){
        $categoryTree=ProductCategory::where('parent_id',0)->get();
        $product=Product::find($id);
       // dd(jdate($product->created_at)->format(' %d %B %y'));
        $reviewCount=$product->reviews()->where('qualified', true)->count();
        $reviewStars=ceil($product->reviews()->where('qualified', true)->avg('star'));

        $sameCatProds=collect();//$category->first()->products()->get();
        $category=$product->product_category;
        
        $this->categoryProducts($category ,$sameCatProds);
        $categoryPathHtml='<li>'.$product->name.'</li>'.$this->categoryPath($product->product_category_id);
        $productReviews=$product->reviews()->where('qualified', true)->paginate(6);
        return view('frontEnd.singleProduct')->with('categoryTree', $categoryTree)
                                             ->with('product', $product)
                                             ->with('sameCatProds', $sameCatProds)
                                             ->with('categoryPathHtml', $categoryPathHtml)
                                             ->with('productReviews', $productReviews)
                                             ->with('reviewCount', $reviewCount)
                                             ->with('reviewStars', $reviewStars);
        
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
