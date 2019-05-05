@include('includes.front.header')



		<!-- Breadcurb Area -->
		<div class="breadcurb-area">
			<div class="container">
				<ul class="breadcrumb">
                                                                                             
					{!! $categoryPathHtml!!}
				</ul>
			</div>
		</div><!-- End Breadcurb Area -->
		<!-- Shop Product Area -->
		<div class="shop-product-area">
			<div class="container">
				<div class="row">
					
					<div class="col-md-9 col-sm-12 ">
						<!-- Shop Product Right -->
						<div class="shop-product-right">
							<div class="product-tab-area">
								<!-- Tab Bar -->
								<div class="tab-bar rtl">
									<div class="tab-bar-inner">
										<ul class="nav nav-tabs" role="tablist">
                                            <li><a href="#shop-list" data-toggle="tab"><i class="fa fa-th-list"></i></a></li>
											<li class="active"><a href="#shop-product" data-toggle="tab"><i class="fa fa-th-large"></i></a></li>
											
										</ul>
									</div>
									<div class="toolbar">
										<div class="sorter">
											<div class="sort-by">
												<label>مرتب سازی بر اساس</label>
												
													<button class="btn btn-default  sortBtn" value="chip">ارزان‌ترین</button>
													<button class="btn btn-default  sortBtn" value="expensive">گران‌ترین</button>
													<button class="btn btn-default sortBtn " value="review">محبوب‌ترین</button>
													<button class="btn btn-default sortBtn " value="review">پر بازدیدترین</button>
													<button class="btn btn-default active sortBtn" value="new">جدید‌ترین</button>
													<button class="btn btn-default  sortBtn" value="bestSeller">پرفروش‌ترین</button>
												
											</div>
										</div>
									</div>
								</div><!-- End Tab Bar -->
								<!-- Tab Content -->
								<div class="tab-content">
									<div class="tab-pane active" id="shop-product">
										
                                    @foreach($productChunks->chunk(3) as $subChunk)
                                        <div class="row tab-content-row justify-content-end"> 
                                            @foreach($subChunk as $product)
                                            <div class="col-md-4 col-sm-4">
												<div class="single-product rtl">
													<div class="single-product-img">
														<a href="{{route('shop.product', ['id'=>$product->id])}}">
															<img class="primary-img" src="{!!asset($product->images[0]->image_name)!!}" alt="product">
															<img class="secondary-img" src="{!!asset($product->images[1]->image_name)!!}" alt="product">
														</a>
													</div>
													<div class="single-product-content">
														<div class="product-content-head">
															<h2 class="product-title"><a href="{{route('shop.product', ['id'=>$product->id])}}">{{$product->name}}</a></h2>
															<p class="product-price">
                                                                    @if($product->discount>0)	
                                                                        <span>
                                                                            {{Numbers::toPersianNumbers($product->price, true)}}	
                                                                        </span>
                                                                            {{Numbers::toPersianNumbers($product->price - $product->price*$product->discount/100, true)}} تومان

                                                                    @else
                                                                            {{Numbers::toPersianNumbers($product->price, true)}}	تومان
                                                                    @endif
                                                            </p>
														</div>
														<div class="product-bottom-action">
															<div class="product-action">
																<div class="action-button">
                                                                        <div hidden>
																	    	<input type="hidden" class="qty" value="1">	
																		</div>

																	<button  class="addItemToCart btn" type="button" product_id="{{$product->id}}" item="{{$product->name}}" price="{{$product->price}}"><i class="fa fa-shopping-cart"></i> <span>افزودن به سبد خرید</span></button>
																</div>
																<div class="action-view">
                                                                    <div class="productDetail" hidden>{!! $product->detail!!}</div> 
																	<button type="button" class="quickViewBtn btn" product_id="{{$product->id}}" item="{{$product->name}}" price="{{$product->price}}" imgSrc="{!!asset($product->images[0]->image_name)!!}" data-toggle="modal" data-target="#productModal"><i class="fa fa-search"></i>نمایش سریع</button>
																</div>
															</div>
														</div>
													</div>
												</div>
                                            </div><!-- End Single Product Column -->
                                            @endforeach
                                        </div>
                                    @endforeach
                                    </div>
                                    
									<div class="tab-pane" id="shop-list">
                                        <!-- Single Shop -->
                                        
                                        @foreach($productChunks->chunk(3) as $subChunk)
                                        
                                            @foreach($subChunk as $product)
                                            <div class="single-shop single-product rtl">
											<div class="row">
												
												<div class="col-md-8 col-sm-8 ">
													<div class="single-shop-content">
														<div class="shop-content-head fix">
															<h1><a href="{{route('shop.product', ['id'=>$product->id])}}">{{$product->name}}</a></h1>
														</div>
														<div class="shop-content-bottom">
															<div class="product-details rtl">
																<p>{{$product->detail}}</p>
															</div>
															<div class="product-price">
																<p class="product-price">
                                                                    @if($product->discount>0)	
                                                                        <span>
                                                                            {{Numbers::toPersianNumbers($product->price, true)}}	
                                                                        </span>
                                                                            {{Numbers::toPersianNumbers($product->price - $product->price*$product->discount/100, true)}} تومان

                                                                    @else
                                                                            {{Numbers::toPersianNumbers($product->price, true)}}	تومان
                                                                    @endif
                                                                </p>
															</div>
														</div>
														<div class="product-bottom-action">
															<div class="product-action">
																<div class="action-button">
                                                                    <div hidden>
                                                                        <input type="hidden" class="qty" value="1">	
                                                                    </div>

																	<button  class="addItemToCart btn" type="button" product_id="{{$product->id}}" item="{{$product->name}}" price="{{$product->price}}"><i class="fa fa-shopping-cart"></i> <span>افزودن به سبد خرید</span></button>
																</div>
																<div class="action-view">
                                                                    <div class="productDetail" hidden>{!! $product->detail!!}</div> 
																	<button type="button" class="quickViewBtn btn" product_id="{{$product->id}}" item="{{$product->name}}" price="{{$product->price}}" imgSrc="{!!asset($product->images[0]->image_name)!!}" data-toggle="modal" data-target="#productModal"><i class="fa fa-search"></i>نمایش سریع</button>
																</div>
															</div>
														</div>
													</div>
                                                </div>
                                                <div class="col-md-4 col-sm-4">
													<div class="single-product-img">
                                                         <a href="{{route('shop.product', ['id'=>$product->id])}}">
															<img class="primary-img" src="{!!asset($product->images[0]->image_name)!!}" alt="product">
															<img class="secondary-img" src="{!!asset($product->images[1]->image_name)!!}" alt="product">
														</a>
													</div>
												</div>
											</div>
										</div><!-- End Single Shop -->
                                            @endforeach
                                        
                                         @endforeach

									</div>
                                </div><!-- End Tab Content -->
                                <div id="paginationLinks" class="">
								{{$productChunks->links()}}
								</div>
                                
								<!-- Tab Bar -->
							</div>
						</div><!-- End Shop Product Left -->
                    </div>
                    <div class="col-md-3 col-sm-12 rtl">
						<!-- Shop Product Left -->
						<div class="shop-product-left">
							<!-- Shop Layout Area -->
							<div class="shop-layout-area">
								<div class="layout-title">
									<h2>دسته بندی</h2>
								</div>
								<div class="layout-list">
									<ul>

										{!! $categoryTreeHtml !!}



									</ul>
								</div>
							</div><!-- End Shop Layout Area -->

							<!-- Shop Layout Area -->
							<div class="shop-layout-area">
								<div class="layout-title">
									<h2>برند</h2>
								</div>
								<div class="layout-list">
									<ul>
                                        <li><a href="#"><span>(15)</span>Cocktail <i class="far fa-plus-square">&nbsp</i></a></li>
										<li><a href="#"><span>(15)</span>Day <i class="far fa-plus-square">&nbsp</i></a></li>
										<li><a href="#"><span>(15)</span>Evening <i class="far fa-plus-square">&nbsp </i></a></li>

									</ul>
								</div>
							</div><!-- End Shop Layout Area -->
							<!-- Shop Layout Area -->
							<div class="shop-layout-area">
								<div class="layout-title">
									<h2>رنگ</h2>
								</div>
								<div class="layout-list">
									<ul>
                                        <li><a href="#"><span>(15)</span>blue <i class="far fa-plus-square">&nbsp</i></a></li>
										<li><a href="#"><span>(15)</span>red <i class="far fa-plus-square">&nbsp</i></a></li>
										<li><a href="#"><span>(15)</span>green <i class="far fa-plus-square">&nbsp </i></a></li>

									</ul>
								</div>
							</div><!-- End Shop Layout Area -->
							<!-- Shop Layout Area -->
							<div class="shop-layout-area">
								
								<div class="popular-tag">
									<h2>Popular Tags</h2>
									<div class="tag-list ">
										<ul>
											<li><a href="#">Clothing</a></li>
											<li><a href="#">accessories</a></li>
											<li><a href="#">fashion</a></li>
											<li><a href="#">footwear</a></li>
											<li><a href="#">good</a></li>
											<li><a href="#">kid</a></li>
											<li><a href="#">Men</a></li>
											<li><a href="#">Women</a></li>
										</ul>
									</div>
									<div class="tag-action">
										<ul>
											<li><a href="#">View all tags</a></li>
										</ul>
									</div>
								</div>
	
							</div><!-- End Shop Layout Area -->
						</div><!-- End Shop Product Left -->
					</div>
				</div>
			</div>
		</div><!-- End Shop Product Area -->




@include('includes.front.footer')