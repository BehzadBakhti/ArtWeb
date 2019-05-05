@include('includes.front.header')

		<!-- Breadcurb Area -->
		<div class="breadcurb-area">
			<div class="container">
				<ul class="breadcrumb">
					{!! $categoryPathHtml!!}
				</ul>
			</div>
		</div><!-- End Breadcurb Area -->
		<!-- Single Product details Area -->
		<div class="single-product-details-area ">
			<!-- Single Product View Area -->
			<div class="product-view-area ">
				<div class="container-fluid">
					<div class="row">
                        <div class="col-md-7 col-sm-8 col-xs-12">
                                <!-- Single Product Content View -->
                                <div class="single-product-content-view">
                                    <div class="product-title-rating">
                                        <h3 class= " col-md-9">{{$product->name}}</h3>
                                        <div class=" col-md-3 ratings">
                                            
                                            <div class="rating-box">
                                                <ul>
                                                    @for($i=0 ;$i < $reviewStars; $i++)
                                                        <li><i class="gained fa fa-star"></i></li>
                                                    
                                                    @endfor
                                                    @for($i=0 ;$i < 5-$reviewStars; $i++)
                                                                                                
                                                    <li><i class="fa fa-star"></i></li>
                                                    @endfor

                                                </ul>
                                            </div>

                                            <p class="rating-links rtl">
                                                <a href="#">{{$reviewCount}} نظر</a>
                                            </p>
                                        </div>

                                    </div>
									 
									
									<div class="row">
										<div class="col-md-4 other-specs  rtl">
											<h4>دیگر ویژگی‌ها</h4>
											<ul>
												@foreach($product->specs as $spec)
													<li class="spec"> <span>{{$spec->key}}: &nbsp</span>{{$spec->value}}</li>
												@endforeach
											</ul>
										</div>
										<div class="col-md-8 rtl">
											<div class="short-description">
												<div class="std rtl">
													{!!$product->detail!!}   
												</div>
											</div>
											<div class="property-box">
													<span class="property">
														سازنده:
														<span>{{$product->material}}</span> 
													</span>

											</div>
											<div class="property-box">
													<span class="property">
														دسته بندی:
														<span>{{$product->product_category->name}}</span> 
													</span>
											</div>
											<div class="property-box">
													<span class="property">
														جنس:
														<span>{{$product->material}}</span> 
													</span>
											</div>
											<div class="property-box">
													<span class="property">
														ابعاد:
														<span>{{Numbers::toPersianNumbers($product->dimension)}}</span> 
													</span>
											</div>
											<div class="price-box">
												<span class="product-price">
													@if($product->stock>0)
																<p class="product-price">
																	@if($product->discount>0) 
																	<i class="fas fa-badge-percent"></i>	
                                                                        <span>
                                                                            {{Numbers::toPersianNumbers($product->price, true)}} 
                                                                        </span>
																			{{Numbers::toPersianNumbers($product->price - $product->price*$product->discount/100, true)}} تومان
																			<p class='sub-note'>با احتساب {{Numbers::toPersianNumbers($product->discount)}} درصد تخفیف</p>
																			
                                                                    @else
                                                                            {{Numbers::toPersianNumbers($product->price, true)}} تومان
                                                                    @endif
                                                                </p>
												
													@else
														<p class="availability out-of-stock"><span>اتمام موجودی</span></p>
													@endif
												</span>
											</div>
											
											<div class="add-to-box add-to-box2">
												<div class="actions-inner">
													<ul class="add-to-links">
														<li><a class="link-wishlist" title="Add to Wishlist" href="#"><i class="fa fa-star"></i>Add to Wishlist</a></li>
														<li><a class="link-compare" title="Add to Compare" href="#"><i class="fa fa-pie-chart"></i> Add to Compare</a></li>
														<li class="email-friend" title="Email to a Friend"><a href="#"><i class="fa fa-envelope"></i> Email a Friend</a></li>
													</ul>
												</div>
												
												
												<div class="add-to-cart">
													<div class="input-content">
														<label for="qty">Qty:</label>
														<input type="button" class="qty-decrease" onclick="var qty_el = document.getElementById('qty'); var qty = qty_el.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) qty_el.value--;return false;" value="-">
														<input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
														<input type="button" class="qty-increase" onclick="var qty_el = document.getElementById('qty'); var qty = qty_el.value; if( !isNaN( qty )) qty_el.value++;return false;" value="+">
													</div>
													<button id="single_productAddToCartBtn" class="addItemToCart btn" type="button" product_id="{{$product->id}}" item="{{$product->name}}" price="{{$product->price - $product->price*$product->discount/100}}" ><i class="fa fa-shopping-cart"></i> <span>افزودن به سبد خرید</span></button>
												</div>
											</div>
										</div>

									</div>
										
									

                                </div><!-- End Single Product Content View -->
                        </div>
						<div class="col-md-5 col-sm-12 col-xs-12">
							<!-- Single Product View -->
							<div class="single-procuct-view">
								<!-- Simple Lence Gallery Container -->
								<div class="simpleLens-gallery-container" id="p-view">
									<div class="simpleLens-container tab-content">

                                    @for( $i=0; $i < sizeof($product->images); $i++) 
                                        <div class="tab-pane 
                                            @if($i==0)
                                            {{'active'}}
                                            @endif
                                            " id="p-view-{{$i+1}}">
											<div class="simpleLens-big-image-container">
												<a class="simpleLens-lens-image" data-lens-image="{!!asset($product->images[$i]->image_name)!!}">
													<img src="{!!asset($product->images[$i]->image_name)!!}" class="simpleLens-big-image" alt="{{$product->name}}">
												</a>
											</div>
										</div>
                                    @endfor
									</div>
									<!-- Simple Lence Thumbnail -->
									<div class="simpleLens-thumbnails-container">
										<h2>More Views</h2>
										<div id="single-product" class="owl-carousel">
                                            @php ($idx=0)
                                            @foreach($product->images->chunk(4) as $subChunk)
                                            
											<ul class="nav nav-tabs" role="tablist">
                                            @foreach($subChunk as $image ) 
                                            @php ($idx++)
                                                        <li class="thumbnail  
                                                            @if($i==0 && $idx<4)
                                                            {{'active'}}
                                                            @endif"   
                                                                  ><a href="#p-view-{{$idx}}" role="tab" data-toggle="tab"><img src="{!!asset($image->image_name)!!}" alt="{{$product->name}}"></a></li>
                                    
                                                @endforeach
                                            </ul>
                                            @endforeach
										</div>
									</div><!-- End Simple Lence Thumbnail -->
								</div><!-- End Simple Lence Gallery Container -->
							</div><!-- End Single Product View -->
						</div>
					</div>
				</div>
			</div><!-- End Single Product View Area -->
			<!-- Single Description Tab -->
			<div class="single-product-description p-0">
				<div class="container-fluid ">
					<div class="row p-0">
						<div class="col-md-12 p-0">
							<div class="product-description-tab  ">
								<!-- tab bar -->
								<ul class="nav nav-tabs" role="tablist">
									
									
									<li><a href="#product-review" data-toggle="tab">نظرات مشتریان</a></li>
									
									<li class="active"><a href="#product-des" data-toggle="tab">توضیحات محصول</a></li>
								</ul>
								<!-- Tab Content -->
								<div class="tab-content">
									<div class="tab-pane active rtl" id="product-des">
										<p>{!!$product->description!!}</p>
									</div>
									<div class="tab-pane" id="product-review">
										<div>
											<div class="row" id="reviewsContent">
												@foreach($productReviews as $review)
													<div class="col-md-10 single-review rtl">
														<div class="product-rev-left">
															<div class="product-ratting  row">
																<div class="rating-box  ">
																	<ul>
																		@for($i=0 ;$i < $review->star; $i++)
																			<li><i class="gained fa fa-star"></i></li>
																		
																		@endfor
																		@for($i=0 ;$i < 5-$review->star; $i++)
																													
																		<li><i class="fa fa-star"></i></li>
																		@endfor

																	</ul>
																</div>
																<div class="review-title  ">
																	<div>{{$review->title}} </div>
																	<div class="mute">نوشته شده توسط {{$review->user->name}} در تاریخ {{Numbers::toPersianNumbers(jdate($review->created_at)->format(' %d %B %y'))}}</div>
																</div> 
																
															</div>
															<div class="product-rev-right">
																<p class="rtl">{{$review->review}}</p>
															</div>
														</div>
													</div>
												@endforeach
											</div>
											<div id="reviewPaginationLinks" class="pagination-links">
												<div>
													{{$productReviews->links()}}
												</div>
											</div> <!--  kjdnkjndkj -->
										</div>
										<div class="row">
											<div class=" col-md-8 porduct-rev-right-form col-md-offset-2 rtl">
												<div class="">
													<form action="{{route('shop.product.addReview', ['id'=>$product->id])}}" method="POST" class="form-horizontal product-form">
													{{ csrf_field() }}
														<div class="form-goroup">
															<label>عنوان نظر<sup>*</sup></label>
															<input type="text" class="form-control" name="review_title" required="required">
															
														</div>
														<div class="form-goroup">
															<label for="stars">سطح رضایت <sup>*</sup></label>
															<select name="stars" class="form-control"  required="required">
																<option value=""> انتخاب</option>
																<option value="1"> 1 کمترین رضایت</option>
																<option value="2"> 2</option>
																<option value="3"> 3</option>
																<option value="4"> 4</option>
																<option value="5"> 5 بیشترین رضایت</option>
															</select>
														</div>
														<div class="form-goroup">
															<label>متن نظر <sup>*</sup></label>
															<textarea class="form-control" rows="5" name= "review_body" required="required"></textarea>
														</div>
														<div class="form-goroup form-group-button">
															<button class="btn " type="submit">ثبت نظر</button>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- End Single Description Tab -->
         <!-- Related Product area area -->
			<div class="related-product-area">
				<div class="container">
					<div class="row">
						<!-- Brand Product Column -->
						<div class="col-md-12">
							<div class="brand-products c-carousel-button">
								<div class="row">
									<div class="col-md-12">
										<div class="products-head">
											<div class="products-head-title">
												<i class="fa fa-picture-o"></i>
												<h2>Related Products</h2>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<!-- Single Product Carousel-->
									<div id="single-product-related" class="owl-carousel">
										<!-- Start Single Product Column-->
										@foreach($sameCatProds as $sameProd)
										@if($sameProd->id==$product->id)
											@continue
										@endif
										<div class="col-md-3">
											<div class="single-product rtl">
												<div class="single-product-img">
													<a href="{{route('shop.product', ['id'=>$sameProd->id])}}">
														<img class="primary-img" src="{!!asset($sameProd->images[0]->image_name)!!}" alt="product">
													</a>
													
												</div>
												<div class="single-product-content another-content another-content-2">
													<div class="ratings">
														<div class="rating-box">
															@php ($reviewStars= ceil($sameProd->reviews->avg('star')))
															<ul>
																@for($i=0 ;$i < $reviewStars; $i++)
																	<li><i class="gained fa fa-star"></i></li>
																
																@endfor
																@for($i=0 ;$i < 5-$reviewStars; $i++)
																											
																<li><i class="fa fa-star"></i></li>
																@endfor

															</ul>
														</div>
													</div>
													<div class="product-content-head">
														<h2 class="product-title"><a href="{{route('shop.product', ['id'=>$sameProd->id])}}">{{$sameProd->name}}</a></h2>
															<p class="product-price">
																@if($sameProd->discount>0)	
																	<span>
																		{{Numbers::toPersianNumbers($sameProd->price, true)}}	
																	</span>
																		{{Numbers::toPersianNumbers($sameProd->price - $sameProd->price*$sameProd->discount/100, true)}} تومان

																@else
																		{{Numbers::toPersianNumbers($sameProd->price, true)}}	تومان
																@endif
															</p>
													</div>
												</div>
											</div>
										</div><!-- End Single Product Column -->
										@endforeach
									</div><!-- End Single Product Carousel -->
								</div>
							</div>
						</div><!-- End Brand Products Column -->
					</div>
				</div>
			</div><!-- End Related Product area -->
		</div><!-- End Single Product details Area -->
	
@include('includes.front.footer')