<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Home-Four || Minoan</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<!-- favicon
		============================================ -->		
        <link rel="shortcut icon" type="image/x-icon" href="img/logo/favicon.ico">
		
		<!-- Google Fonts
		============================================ -->		
       <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	   <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	   
		<!-- Bootstrap CSS
		============================================ -->		
        <link rel="stylesheet" href="{{asset('app/css/bootstrap.min.css')}}">
		<!-- Font Awesome CSS
		============================================ -->
        <link rel="stylesheet" href="{{asset('app/css/font-awesome.min.css')}}">
		<!-- Mean Menu CSS
		============================================ -->      
        <link rel="stylesheet" href="{{asset('app/css/meanmenu.min.css')}}">
		<!-- owl.carousel CSS
		============================================ -->
        <link rel="stylesheet" href="{{asset('app/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('app/css/owl.theme.css')}}">
        <link rel="stylesheet" href="{{asset('app/css/owl.transitions.css')}}">
		<!-- nivo-slider css
		============================================ --> 
		<link rel="stylesheet" href="{{asset('app/css/nivo-slider.css')}}">
		<!-- Price slider css
		============================================ --> 
		<link rel="stylesheet" href="{{asset('app/css/jquery-ui-slider.css')}}">
		<!-- Simple Lence css
		============================================ --> 
		<link rel="stylesheet" type="text/css" href="{{asset('app/css/jquery.simpleLens.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('app/css/jquery.simpleGallery.css')}}">
		<!-- animate CSS
		============================================ -->
        <link rel="stylesheet" href="{{asset('app/css/animate.css')}}">
		<!-- normalize CSS
		============================================ -->
        <link rel="stylesheet" href="{{asset('app/css/normalize.css')}}">
		<!-- main CSS
		============================================ -->
        <link rel="stylesheet" href="{{asset('app/css/main.css')}}">
		<!-- style CSS
		============================================ -->
        <link rel="stylesheet" href="{{asset('app/style.css')}}">
		<!-- responsive CSS
		============================================ -->
        <link rel="stylesheet" href="{{asset('app/css/responsive.css')}}">
		<!-- modernizr JS
		============================================ -->		
		<script src="{{asset('app/js/vendor/modernizr-2.8.3.min.js')}}"></script>
		
		
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
		
		<!-- Header Area -->
        <div class="header-area home-4-header-area">
			<!-- Header top bar -->
			<div class="header-top-bar">
				<div class="container">
					<div class="header-top-inner">
						<div class="row">
							<div class="col-md-8 col-sm-12">
								<div class="header-top-left">
									<div class="phone">
										<label>Call us:</label> (+98) 021-77147083
									</div>
									<div class="e-mail">
										<label>Email:</label> admin@bootexperts.com
									</div>
									<!-- Header Link Area -->
									<div class="header-link-area">
										<div class="header-link">
											<p class="hidden-xs">Language: </p>
											<ul>
												<li><a href="#">English <span class="caret"></span></a>
													<ul>
														<li><a href="#">فارسی</a></li>
														<li><a href="#">English 2</a></li>

													</ul>
												</li>
											</ul>
										</div>
										<div class="header-link">
											<ul>
												<li><a href="#">Account <span class="caret"></span></a>
													<ul>
														<li><a href="my-account.html">My Account</a></li>
														<li><a href="wishlist.html">My Wishlist</a></li>
														<li><a href="cart.html">My Cart</a></li>
														<li><a href="checkout.html">Checkout</a></li>
														<li><a href="blog.html">Blog</a></li>
														<li><a href="my-account.html">login</a></li>
													</ul>
												</li>
											</ul>
										</div>
									</div><!-- End Header Link Area -->
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="header-top-right">
									<!-- Header Social Icon -->
									<div class="header-social-icon">
										<ul>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-youtube"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- End Header Top bar -->
			<!-- Header bottom -->
			<div class="header-bottom another-home-header-bottom">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-12">
							<div class="heder-bottom-left">
								<!-- Header logo -->
								<div class="header-logo">
									<a href="index.html"><img src="img/logo/logo-2.png" alt="logo"></a>
								</div>
							</div>
						</div>
						<div class="col-md-9 col-sm-12">
							<div class="header-bottom-right">
								<div class="row">
									<div class="col-md-12">
										<div class="header-search-cart-area">
											<!-- Header Cart Area-->
											<div class="header-cart-area">
												<div class="header-cart">
													<ul>
														<li>
															<a href="{{route('cart.index')}}">
																<i class="fa fa-shopping-cart"></i>
																<span class="my-cart">سبد خرید</span>
																<div id="cartIcon">
																	<span class="badge">{{sizeof($cartContent)}}</span>
																</div>
															</a>
															<ul>
																
																<li>
																	
																	@foreach($cartContent as $item)
																		<div class="cart-list">
																			<div class="cart-list-item">
																				<div class="cart-list-img">
																					<a href="{{route('shop.product', ['id'=>$item->id])}}"><img src="uploads\products\a.jpg" width="50px" alt="cart" /></a>
																				</div>
																				<div class="cart-content">
																					<a href="{{route('shop.product', ['id'=>$item->id])}}">{{$item->name}}</a>
																					<p>{{$item->quantity}} x <span>{{$item->price}}</span></p>
																				</div>
																				<div class="cart-button">
																					<a href="#" id="{{$item->id}}" class="removeItemFromCart" data-toggle="modal" data-target="#removeFromCartModal"><i class="fa fa-times"></i></a>
																				</div>
																			</div>
																		</div>
																	@endforeach
																	<div class="cart-subtotal">
																		<p>Subtotal: <span>$1,131.00</span></p>
																	</div>
																	<div class="cart-action">
																		<button type="button" class="btn"><span>checkout</span> <i class="fa fa-long-arrow-right"></i></button>
																	</div>

																</li>
															</ul>
														</li>
													</ul>
												</div>
											</div><!-- End Header Cart Area-->
											<!-- Header Search -->
											<div class="header-search">
												<form action="#">
													<input type="text" placeholder="SEARCH...">
													<button type="button" class="btn"><i class="fa fa-search"></i></button>
												</form>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<!-- Main Menu Area -->
										<div class="main-menu-area another-home-mainmenu-area home-4-main-menu-area">
											<!-- Main Menu -->
											<div class="main-menu hidden-sm hidden-xs">
												<nav>
													<ul class="main-ul">
														<li class="sub-menu-li"><a href="{{route('index')}}" class="active">خانه</i></a></li>
														<li><a href="{{route('shop')}}"> فروشگاه<i class="fa fa-chevron-down"></i></a>
															<ul class="mega-menu-ul">
																<li>
																	<!-- Mega Menu -->
																	<div class="mega-menu">

																		@foreach($categoryTree as $mainCat)
																			<div class="single-mega-menu">
																				<h2><a href="{{route('shop.category', ['id'=>$mainCat->id])}}">{{$mainCat->name}}</a></h2>
																				@foreach($mainCat->childeren as $cat)
																				<a href="{{route('shop.category', ['id'=>$cat->id])}}"><i class="fa fa-chevron-circle-right"></i> <span>{{$cat->name}}</span></a>
																				@endforeach
																				
																			</div>
																			
																		@endforeach
																	</div>
																</li>
															</ul>
														</li>
														<li class="small-megamenu-li"><a href="{{route('blog')}}">وبلاگ</a></li>
														<li><a href="{{route('about_us')}}">درباره ما</a></li>
														<li><a href="{{route('contact_us')}}">تماس با ما</a></li>
														
													</ul>
												</nav>
											</div><!-- End Main Menu -->
											<!-- Start Mobile Menu -->
											<div class="mobile-menu hidden-md hidden-lg">
												<nav>
													<ul>
														<li class=""><a href="{{route('index')}}">خانه</a></li>
														<li><a href="{{route('shop')}}">فروشگاه</a>
															<ul class="">																	
																		@foreach($categoryTree as $mainCat)
																			
																			<li><a href="{{route('shop.category', ['id'=>$mainCat->id])}}">{{$mainCat->name}}</a>
																				<ul>
																				@foreach($mainCat->childeren as $cat)
																				<li><a href="{{route('shop.category', ['id'=>$cat->id])}}">{{$cat->name}}</a></li>
																				@endforeach
																				
																				</ul>
																			</li>
																		@endforeach
																	
																</li>
																
															</ul>
														</li>
														<li class=""><a href="{{route('blog')}}">وبلاگ</a>														</li>
														<li><a href="{{route('about_us')}}">درباره ما</a>
														</li>
														<li><a href="{{route('contact_us')}}">تماس با ما</a>
														</li>
													
													</ul>
												</nav>
											</div><!-- End Mobile Menu -->
										</div><!-- End Main Menu Area -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div><!-- End Header bottom -->
		</div><!-- End Header Area -->
	
		