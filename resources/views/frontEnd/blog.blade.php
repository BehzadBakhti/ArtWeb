@include('includes.front.header')

        <div class="breadcurb-area">
			<div class="container">
				<ul class="breadcrumb">

				</ul>
			</div>
		</div><!-- End Breadcurb Area -->
		<!-- Blog Post Area -->
		<div class="main-blog-page blog-post-area shop-product-area">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-9 floatright">
						<!-- Blog Post Item Area -->
						<div class="blog-post-item-area">
							<div class="blog-post-inner-item">
                                @foreach($recentPosts as $post)
								<!-- Blog Post Single Item -->
								<div class="blog-post-single-item rtl">
									<div class="single-item-img col-md-4">
										<a href="{{route('blog.post', ['slug'=>$post->slug])}}">
											<img alt="product" src="{{$post->featured}}" alt="{{$post->title}}">
										</a>
									</div>
									<div class="single-item-content col-md-8">
										<h2><a href="{{route('blog.post', ['slug'=>$post->slug])}}">{{$post->title}}</a></h2>
										<h3>{{Numbers::toPersianNumbers(jdate($post->updated_at)->format(' %d %B %y'))}}</h3>
										<p>{{str_limit($post->body, 200)}}</p>
										<div class="blog-action floatright">
											<a href="{{route('blog.post', ['slug'=>$post->slug])}}">ادامه مطلب...</a>
											
										</div>
									</div>
                                </div><!-- End Blog Post Single Item -->
                                @endforeach

							</div>
							<div class="blog-pagination">
								<ul class="pagination">
									{{$recentPosts->links()}}
								</ul>
							</div>
						</div><!-- End Blog Post Item Area -->
					</div>
					<div class="col-md-3 floatleft">
						<!-- Blog-cart Left -->
						<div class="blog-cart-left shop-product-left">
							
							
							<!-- Shop Layout Area -->
							<div class="shop-layout-area">
								<div class="layout-title">
									<h2>پر بحث ترین</h2>
								</div>
								<!-- Recent Posts -->
								<div class="recent-posts">
									<ul>
                                        @foreach($mostCommented as $post)
										<li>
										
											<div class="post-wrapper rtl">
												<div class="post-thumb">
													<a href="{{route('blog.post', ['slug'=>$post->slug])}}"><img src="{{$post->featured}}" alt="{{$post->name}}"></a>
												</div>
												<div class="post-info">
													<h3 class="post-title recent-post-s"><a href="{{route('blog.post', ['slug'=>$post->slug])}}">{{$post->title}}</a></h3>
													<div class="post-date recent-post-s">{{$post->updated_at}}</div>
												</div>
											</div>
										</li>
                                        @endforeach
									</ul>
								</div><!-- Recent Posts -->
							</div><!-- End Shop Layout Area -->
                            
                            
                            <!-- Shop Layout Area -->
							<div class="shop-layout-area">
								<div class="layout-title">
									<h2>پر بازدید ترین</h2>
								</div>
								<!-- Recent Posts -->
								<div class="recent-posts">
									<ul>
                                        @foreach($mostRead as $post)
										<li>
										<!-- {{$post->read_count}} -->
											<div class="post-wrapper rtl">
												<div class="post-thumb">
													<a href="{{route('blog.post', ['slug'=>$post->slug])}}"><img src="{{$post->featured}}" alt="{{$post->name}}"></a>
												</div>
												<div class="post-info">
													<h3 class="post-title recent-post-s"><a href="{{route('blog.post', ['slug'=>$post->slug])}}">{{$post->title}}</a></h3>
													<div class="post-date recent-post-s">{{$post->updated_at}}</div>
												</div>
											</div>
										</li>
                                        @endforeach
									</ul>
								</div><!-- Recent Posts -->
							</div><!-- End Shop Layout Area -->
							
							<!-- Shop Layout Area -->
							<div class="shop-layout-area">
								<div class="layout-title">
									<h2>Popular Tags</h2>
								</div>
								<div class="popular-tag">
									<div class="tag-list">
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
							<!-- Shop Layout Area -->
							<div class="shop-layout-area">
								<div class="layout-title">
									<h2>BLOG ARCHIVES</h2>
								</div>
								<div class="layout-list">
									<ul>
										<li><a href="#"><i class="fa fa-plus-square-o"></i>August 2015 <span>(15)</span></a></li>
										<li><a href="#"><i class="fa fa-plus-square-o"></i>September 2015 <span>(10)</span></a></li>
										<li><a href="#"><i class="fa fa-plus-square-o"></i>October 2015 <span>(7)</span></a></li>
										<li><a href="#"><i class="fa fa-plus-square-o"></i>November 2015 <span>(15)</span></a></li>
										<li><a href="#"><i class="fa fa-plus-square-o"></i>December 2015 <span>(12)</span></a></li>
										<li><a href="#"><i class="fa fa-plus-square-o"></i>January 2016 <span>(4)</span></a></li>
									</ul>
								</div>
							</div><!-- End Shop Layout Area -->
						</div><!-- End Blog Cart Left -->
					</div>
					
				</div>
			</div>
		</div><!-- End Blog Post Area -->



@include('includes.front.footer')