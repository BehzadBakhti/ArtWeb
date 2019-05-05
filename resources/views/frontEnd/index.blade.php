@include('includes.front.header')
        
		<!-- Main Slider Area -->
		<div class="main-slider-area home-4-main-slaider-area entire-home-main-slider">
			<div class="container-fluid">
				<div class="row">
					<div class="row">
						<!-- Main Slider -->
						<div class="main-slider">
							<div class="slider">
								<div id="mainSlider" class="nivoSlider slider-image">

									@for( $i=0; $i < sizeof($events); $i++)
									<img src="{{$events[$i]->featured_image}}" alt="main slider" title="#htmlcaption{{$i+1}}"/>
									
									@endfor
								</div>
								<!-- Slider Caption One -->


									@for( $i=0; $i < sizeof($events); $i++)
										<div id="htmlcaption{{$i+1}}" class="nivo-html-caption slider-caption-{{$i+1}}">
											<div class="slider-progress"></div>	
																		
												<div class="slide-text">
													<div class="middle-text">
														<a href='{{route("shop.category" , ["id" => $events[$i]->category_id])}}'>	
															<div class="cap-dec">
																<h1 class="cap-dec wow fadeIn " data-wow-duration="1.1s" data-wow-delay="0s">{{$events[$i]->event_title}}</h1>
																<p class="cap-dec wow fadeIn " data-wow-duration="1.1s" data-wow-delay="0.2s"> {{$events[$i]->detail}}</p>
															</div>	
														</a>	
													</div>	
												</div>
											
										</div>
									@endfor
								
							
							</div>
						</div><!-- End Main Slider -->
					</div>
					
					<div class="col-md-12">
						<!-- Main Slider Banner Bottom-->
						<div class="main-slider-bottom-banner">
							<div class="row">
								@foreach($secondaryEvents as $event)

									<a href='{{route("shop.category" , ["id" => $event->category_id])}}' class = "column col-xs-4" id = "caption">
										<span class = "text "><h1>{{$event->event_title}}</h1></span>
										<img alt="{{$event->event_title}}" src = "{{$event->featured_image}}">
									</a>
								
								@endforeach
							</div>
						</div><!-- End Main Slider Banner Bottom-->
					</div>
				</div>
			</div>
		</div><!-- End Main Slider Area -->		
		<!-- Product area -->
		<hr/>
		<!-- Brand Product area -->
		<div class="index-products-section">
			<div class="brand-products-area">
				<div class="container">
					<div class="row">
						<!-- Product Column -->
						<div class="col-md-12 ">
							<div class="brand-products brand-product-shoes c-carousel-button">
								<div class="row">
									<div class="col-md-12">
										<div class="products-head">
											<div class="products-head-title">
												<h2>پر فروش ترین ها</h2>
												<i class="fas fa-shopping-cart"></i>
												
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<!-- Single Product Carousel-->
									<div id="product-brand-seller" class="owl-carousel">
										<!-- Start Single Product Column -->
										@foreach($bestSeller as $product)
												<div class="col-md-6">
													<div class="single-product">
														<div class="single-product-img">
															<a href="{{route('shop.product', ['id'=>$product->id])}}">
																	<img class="primary-img" src="{!!asset($product->images[0]->image_name)!!}" alt="product">
																	<img class="secondary-img" src="{!!asset($product->images[1]->image_name)!!}" alt="product">
															</a>
														</div>
														<div class="single-product-content">
															<div class="product-content-head">
																<h2 class="product-title"><a href="#">{{$product->name}}</a></h2>
																<p class="product-price">
																	@if($product->discount>0)	
																		<span>
																			{{$product->price}}	
																		</span>
																			{{$product->price - $product->price*$product->discount/100}}

																	@else
																			{{$product->price}}	
																	@endif
																
																</p>
															</div>
															<div class="product-bottom-action">
																<div class="product-action">
																	<div class="action-button">	
																			<div hidden>
																			<input type="hidden" class="qty" value="1">	
																			</div>	
																																
																			<button  class="addItemToCart btn" type="button" product_id="{{$product->id}}" item="{{$product->name}}" price="{{$product->price}}"><i class="fas fa-shopping-cart"></i> <span>افزودن به سبد خرید</span></button>
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

									</div><!-- End Single Product Carousel -->
								</div>
							</div>
						</div><!-- End Brand Products Column -->
					</div>
				</div>
			</div><!-- End Brand Product area -->

			<div class="brand-products-area" >
				<div class="container">
					<div class="row" >
						<div class="col-md-12 ">
							<div class="brand-products brand-product-shoes c-carousel-button">
								<div class="row" >
									<div class="col-md-12">
										<div class="products-head">
											<div class="products-head-title">
												<i class="far fa-thumbs-up"></i>
												<h2>محبوب ترین ها</h2>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<!-- Single Product Carousel-->
									<div id="product-brand-fav" class="owl-carousel">
										<!-- Start Single Product Column -->
										@foreach($bestSeller as $product)
										<div class="col-md-6">
													<div class="single-product">
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
																			{{$product->price}}	
																		</span>
																			{{$product->price - $product->price*$product->discount/100}}

																	@else
																			{{$product->price}}	
																	@endif
																
																</p>
															</div>
															<div class="product-bottom-action">
																<div class="product-action">
																		<div class="action-button">	
																			<div hidden>
																			<input type="hidden" class="qty" value="1">	
																			</div>	
																																
																		<button  class="addItemToCart btn" type="button" product_id="{{$product->id}}" item="{{$product->name}}" price="{{$product->price}}"><i class="fas fa-shopping-cart"></i> <span>افزودن به سبد خرید</span></button>
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

									</div><!-- End Single Product Carousel -->
								</div>
							</div>
						</div><!-- End Brand Products Column -->

					</div>
				</div>
			</div><!-- End Brand Product area -->

			<div class="brand-products-area">
				<div class="container">
					<div class="row">
						<div class="col-md-12 ">
							<div class="brand-products brand-product-shoes c-carousel-button">
								<div class="row">
									<div class="col-md-12">
										<div class="products-head">
											<div class="products-head-title">
												<i class="fa fa-fire"></i>
												<h2>جدید ترین ها</h2>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<!-- Single Product Carousel-->
									<div id="product-brand-new" class="owl-carousel">
										<!-- Start Single Product Column -->
										@foreach($bestSeller as $product)
										<div class="col-md-6">
													<div class="single-product">
														<div class="single-product-img">
															<a href="{{route('shop.product', ['id'=>$product->id])}}">
																	<img class="primary-img" src="{!!asset($product->images[0]->image_name)!!}" alt="product">
																	<img class="secondary-img" src="{!!asset($product->images[1]->image_name)!!}" alt="product">
															</a>
														</div>
														<div class="single-product-content">
															<div class="product-content-head">
																<h2 class="product-title"><a href="#">{{$product->name}}</a></h2>
																<p class="product-price">
																	@if($product->discount>0)	
																		<span>
																			{{$product->price}}	
																		</span>
																			{{$product->price - $product->price*$product->discount/100}}

																	@else
																			{{$product->price}}	
																	@endif
																
																</p>
															</div>
															<div class="product-bottom-action">
																<div class="product-action">
																		<div class="action-button">	
																			<div hidden>
																			<input type="hidden" class="qty" value="1">	
																			</div>	
																																
																		<button  class="addItemToCart btn" type="button" product_id="{{$product->id}}" item="{{$product->name}}" price="{{$product->price}}"><i class="fas fa-shopping-cart"></i> <span>افزودن به سبد خرید</span></button>
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

									</div><!-- End Single Product Carousel -->
								</div>
							</div>
						</div><!-- End Brand Products Column -->

					</div>
				</div>
			</div><!-- End Brand Product area -->
		</div>
			<!-- Blog Post area -->
		<div class="index-products-section">
			<div class="blog-post-area brand-products c-carousel-button home-4-blog-post-area">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="blog-post">
								<div class="row">
									<div class="col-md-12">
										<div class="products-head">
											<div class="products-head-title">
												<i class="fa fa-edit"></i>
												<h2>آخرین مطالب وبلاگ</h2>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<!-- Blog Post Carousel -->
						<div id="blog-posts" class="owl-carousel">
							@foreach($postChunks as $subChunk)
								<div class="col-md-12">
									<!-- Blog Post Item area -->
									<div class="blog-post-item-area">
										<div class="row">	
											@foreach($subChunk->chunk(2) as $chunk)
												<!-- Blog Post Inner Item Column -->
												<div class="col-md-6">
													<!-- Blog Post Inner Item -->
													<div class="blog-post-inner-item">
														<!-- Fetured Product Single Item -->
														@foreach($chunk as $post)
															<div class="blog-post-single-item ">
																<a class="col-md-5 floatright" href="{{route('blog.post', ['slug'=>$post->slug])}}">
																	<div class="single-item-img">	
																		<img   src="{{$post->featured}}" alt="{{$post->title}}">
																	</div>
																</a>
																<div class="single-item-content col-md-7 rtl floatleft text-align-right">
																	<h2><a href="{{route('blog.post', ['slug'=>$post->slug])}}">{{$post->title}}</a></h2>
																	<p>{{str_limit($post->body, 100)}}</p>
																</div>
															</div><!-- End Blog Post Single Item -->
														@endforeach
													</div><!-- End Blog Post Inner Item -->
												</div><!-- End Fetured Product Inner Item Column -->
											@endforeach
										</div>
									</div><!-- End Blog Post Item area -->
								</div>
							@endforeach
						</div><!-- End Blog Post Carousel -->
					</div>
				</div>
			</div><!-- End Blog Post area -->
		</div>
		<!-- Brand Logo area -->
		<!-- <div class="brand-logo-area">
			<div class="container">
				<div class="brand-logo">
					<div class="brand-logo-title">
						<h2>Logo brands</h2>
					</div>
					<div id="brands-logo" class="owl-carousel">
						<div class="single-brand-logo">
							<a href="#">
								<img src="img/brand-logo/blogo1.png" alt="logo">
							</a>
						</div>
						<div class="single-brand-logo">
							<a href="#">
								<img src="img/brand-logo/blogo5.png" alt="logo">
							</a>
						</div>
						<div class="single-brand-logo">
							<a href="#">
								<img src="img/brand-logo/blogo2.png" alt="logo">
							</a>
						</div>
						<div class="single-brand-logo">
							<a href="#">
								<img src="img/brand-logo/blogo3.png" alt="logo">
							</a>
						</div>
						<div class="single-brand-logo">
							<a href="#">
								<img src="img/brand-logo/blogo4.png" alt="logo">
							</a>
						</div>
						<div class="single-brand-logo">
							<a href="#">
								<img src="img/brand-logo/blogo1.png" alt="logo">
							</a>
						</div>
						<div class="single-brand-logo">
							<a href="#">
								<img src="img/brand-logo/blogo5.png" alt="logo">
							</a>
						</div>
						<div class="single-brand-logo">
							<a href="#">
								<img src="img/brand-logo/blogo3.png" alt="logo">
							</a>
						</div>
						<div class="single-brand-logo">
							<a href="#">
								<img src="img/brand-logo/blogo4.png" alt="logo">
							</a>
						</div>
						<div class="single-brand-logo">
							<a href="#">
								<img src="img/brand-logo/blogo2.png" alt="logo">
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>End Brand Logo area -->
@include('includes.front.footer')