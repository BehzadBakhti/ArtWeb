<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Post;
use App\Model\ProductCategory;
use MPCO\EnglishPersianNumber\Numbers;
use Morilog\Jalali\jalalian;

class AjaxFrontEndController extends FrontEndController
{


    public function ajaxBlog(){
        return view('frontEnd.blog');

    }




    public function ajaxShop($sortRule){
        $allProducts=Product::all();

        $perPage=18;
        $producChunks=$this-> productSort($allProducts, $sortRule)->paginate($perPage);

            // $producChunks=Product::orderBy($field, $direction)->get()->paginate($perPage);
            // $producChunks= Product::withCount('observations')->orderBy('observations_count', 'desc')->paginate($perPage); 
            $links=$producChunks->links();
            $links.="";
       // return   json_encode(['products'=>$this->makeGridHtml( $producChunks) , 'links'=>$links]);
        return ['productsGrid'=>$this->makeGridHtml( $producChunks) , 'productsRow'=>$this->makeRowHtml($producChunks), 'links'=>$links];
                                   
    }


    public function ajaxCategory($id, $sortRule){
        $perPage=18;
        $category=ProductCategory::find($id);

        $productsCollection=collect();
         $this->categoryProducts($category ,$productsCollection);
        
        
        $producChunks=$this-> productSort($productsCollection, $sortRule)->paginate($perPage);
       
        $links=$producChunks->links();
        $links.="";
     // return   json_encode(['products'=>$this->makeGridHtml( $producChunks) , 'links'=>$links]);
        return ['productsGrid'=>$this->makeGridHtml( $producChunks) ,'productsRow'=>$this->makeRowHtml($producChunks), 'links'=>$links];

    }
  

    public function ajaxReviews($id){

        $product=Product::find($id);

        $productReviews=$product->reviews->paginate(3);
        $productReviewsHTML= $this->makeReviewsHTML($productReviews);
        $links=$productReviews->links();
        $links.="";
        return ['productReviewsHTML'=> $productReviewsHTML, 'links'=>$links];
    }




    public function ajaxSearch(Request $request){ 
       
        $products=Product::search($request->phrase)->get();
        $posts=Post::search($request->phrase)->get();
        
           return view('frontEnd.searchResults')->with('phrase', $request->phrase)
                                                ->with('resultProducts', $products)
                                                ->with('resultPosts', $posts);
 
    }




    private function productSort($collection, $sortRule){

        switch ($sortRule) {
        case 'chip':
            $outCollection=$collection-> sortBy(function($product)
                    {
                        return $product->price;
                    });

                    break;
        case 'expensive':

            $outCollection=$collection-> sortByDesc(function($product)
                    {
                        return $product->price;
                    });

                    break;
        case 'new':

            $outCollection=$collection-> sortByDesc(function($product)
                    {
                        return $product->created_at;
                    });
                    break;

        case 'mostSeen':
          //  $outCollection= $collection->withCount('observations')->orderBy('observations_count', 'desc');

            $outCollection=  $collection->sortByDesc(function($product)
                    {
                        return $product->observations->count();
                    });
                break;

        case 'review':
                $outCollection=  $collection->sortByDesc(function($product)
                    {
                        return $product->reviews->avg('star');
                    });
                
                break;
        
        case 'bestSeller':
            $field='price';
            $direction="ASC";
            break;        

         }

         return $outCollection;

    }


    private function makeGridHtml($products){
        
        $html="";

        foreach($products->chunk(3) as $subChunk){
        
        $html.=  '<div class="row tab-content-row justify-content-end">';
        foreach($subChunk as $product){ 
            
            
        $html.=    ' <div class="col-md-4 col-sm-4">
                <div class="single-product rtl">
                    <div class="single-product-img">
                        <a href="'.route("shop.product", ["id"=>$product->id]).'">
                            <img class="primary-img" src="'.asset($product->images[0]->image_name).'" alt="product">
                            <img class="secondary-img" src="'.asset($product->images[1]->image_name).'" alt="product">
                        </a>
                    </div>
                    <div class="single-product-content">
                        <div class="product-content-head">
                            <h2 class="product-title"><a href="'.route('shop.product', ['id'=>$product->id]).'">'.$product->name.'</a></h2>
                            <p class="product-price">';
                                if($product->discount>0){
                                    $html.= '<span>'.Numbers::toPersianNumbers($product->price, true).'</span>'.Numbers::toPersianNumbers($product->price - $product->price*$product->discount/100, true).' تومان';
                                }else{
                                    $html.=  Numbers::toPersianNumbers($product->price, true).'تومان';
                                }
                                $html.=  '</p>
                        </div>
                        <div class="product-bottom-action">
                            <div class="product-action">
                                <div class="action-button">
                                        <div hidden>
                                            <input type="hidden" class="qty" value="1">	
                                        </div>

                                    <button  class="addItemToCart btn" type="button" product_id="'.$product->id.'" item="'.$product->name.'" price="'.$product->price.'"><i class="fa fa-shopping-cart"></i> <span>افزودن به سبد خرید</span></button>
                                </div>
                                <div class="action-view">
                                    <div class="productDetail" hidden>'. $product->detail.'</div> 
                                    <button type="button" class="quickViewBtn btn" product_id="'.$product->id.'" item="'.$product->name.'" price="'.$product->price.'" imgSrc="'.asset($product->images[0]->image_name).'" data-toggle="modal" data-target="#productModal"><i class="fa fa-search"></i>نمایش سریع</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- End Single Product Column -->';
        }
        $html.= '</div>';
        }
        return $html;
    }

    private function makeRowHtml($products){
         $html="";
        foreach($products->chunk(3) as $subChunk){
                                        
             foreach($subChunk as $product){
        $html.= '<div class="single-shop single-product rtl">
                    <div class="row">
                        
                        <div class="col-md-8 col-sm-8 ">
                            <div class="single-shop-content">
                                <div class="shop-content-head fix">
                                    <h1><a href="'.route("shop.product", ["id"=>$product->id]).'">'.$product->name.'</a></h1>
                                </div>
                                <div class="shop-content-bottom">
                                    <div class="product-details rtl">
                                        <p>'.$product->detail.'</p>
                                    </div>
                                    <div class="product-price">
                                        <p class="product-price">';
                                            if($product->discount>0){
                                                $html.= '<span>'.Numbers::toPersianNumbers($product->price, true).'</span>'.Numbers::toPersianNumbers($product->price - $product->price*$product->discount/100, true).' تومان';
                                            }else{
                                                $html.=  Numbers::toPersianNumbers($product->price, true).'تومان';
                                            }
                                            $html.=  '</p>
                                    </div>
                                </div>
                                <div class="product-bottom-action">
                                    <div class="product-action">
                                        <div class="action-button">
                                            <div hidden>
                                                <input type="hidden" class="qty" value="1">	
                                            </div>

                                            <button  class="addItemToCart btn" type="button" product_id="'.$product->id.'" item="'.$product->name.'" price="'.$product->price.'"><i class="fa fa-shopping-cart"></i> <span>افزودن به سبد خرید</span></button>
                                        </div>
                                        <div class="action-view">
                                            <div class="productDetail" hidden>'.$product->detail.'</div> 
                                            <button type="button" class="quickViewBtn btn" product_id="'.$product->id.'" item="'.$product->name.'" price="'.$product->price.'" imgSrc="'.asset($product->images[0]->image_name).'" data-toggle="modal" data-target="#productModal"><i class="fa fa-search"></i>نمایش سریع</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="single-product-img">
                                <a href="'.route("shop.product", ["id"=>$product->id]).'">
                                    <img class="primary-img" src="'.asset($product->images[0]->image_name).'" alt="product">
                                    <img class="secondary-img" src="'.asset($product->images[1]->image_name).'" alt="product">
                                </a>
                            </div>
                        </div>
                    </div>
                </div><!-- End Single Shop -->';
            }

        }
        return $html;
    }


    


private function makeReviewsHTML($productReviews){
    $html='';
    foreach($productReviews as $review){
        $html.='<div class="col-md-10 single-review rtl">
                    <div class="product-rev-left">
                        <div class="product-ratting row">
                            <div class="rating-box">
                                <ul>';
                                    for($i=0 ;$i < $review->star; $i++){
                            $html.=   '<li><i class="gained fa fa-star"></i></li>';
                                    
                                    }
                                    for($i=0 ;$i < 5-$review->star; $i++){
                                                                                
                            $html.=   '<li><i class=" fa fa-star"></i></li>';
                                    
                                    }

                    $html.=    '</ul>
                            </div>
                            <div class="review-title  ">
                                <div>'.$review->title.'</div>
                                <div class="mute">نوشته شده توسط '.$review->user->name.' در تاریخ '.Numbers::toPersianNumbers(jdate($review->created_at)->format(' %d %B %y')).'</div>
                            </div> 
                        </div>
                        <div class="product-rev-right">
                            <p class="rtl">'.$review->review.'</p>
                        </div>
                        
                    </div>
                </div>';

    }
    return $html;
}
    //End of fille
}
