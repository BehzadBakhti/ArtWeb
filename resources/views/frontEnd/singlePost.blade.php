@include('includes.front.header')
<!-- Breadcurb Area -->
		<div class="breadcurb-area">
			<div class="container">
				<ul class="breadcrumb">

				</ul>
			</div>
		</div><!-- End Breadcurb Area -->
		<!-- Blog Post Area -->
		<div class="main-blog-page single-blog blog-post-area shop-product-area">
			<div class="container-fluid">
				<div class="row">
					
					<div class="col-md-9 floatright" >
						<!-- single-blog start -->
						<article class="blog-post-wrapper rtl">
							<div class="post-thumbnail  ">
								<img src="{{$thisPost->featured}}" alt="{{$thisPost->title}}" />
							</div>
							<div class="post-information">
								<h2>{{$thisPost->title}}</h2>
								<div class="entry-meta rtl">
									<span class="author-meta"><i class="fa fa-user"></i> <a href="#">{{$thisPost->user->name}}</a></span>
									<span><i class="far fa-clock"></i> {{Numbers::toPersianNumbers(jdate($thisPost->updated_at)->format(' %d %B %y'))}}</span>								
									<span><i class="far fa-comments"></i> <a href="#commentsSection">{{Numbers::toPersianNumbers($comments->count())}} نظر</a></span>
								</div>
								<div class="entry-content">
									<p>{{$thisPost->body}}</p>
								</div>
								<div class="social-sharing">
									<h3>Share this post</h3>
									<div class="sharing-icon">
										<a href="#" data-toggle="tooltip" title="Facebook"><i class="fab fa-facebook"></i></a>
										<a href="#" data-toggle="tooltip" title="Twitter"><i class="fab fa-twitter"></i></a>
										<a href="#" data-toggle="tooltip" title="Pinterest"><i class="fab fa-pinterest"></i></a>
										<a href="#" data-toggle="tooltip" title="Google-plus"><i class="fab fa-google-plus"></i></a>
										<a href="#" data-toggle="tooltip" title="Linkedin"><i class="fab fa-linkedin"></i></a>
									</div>
								</div>
								<!-- <div class="author-info">
									<div class="author-avatar"><img src="img/blog/b18.jpg" alt="admin"></div>
									<div class="author-description">
										<h2>About the Author: <a href="#">admin</a></h2>
									</div>
								</div> -->
							</div>
						</article>
						<div class="clear"></div>
						<div class="single-post-comments rtl" id="commentsSection">
							<div class="comments-area">
								<div class="comments-heading">
									<h3>{{Numbers::toPersianNumbers($comments->count())}} نظر</h3>
								</div>
								<div class="comments-list">
									<ul>
                                        @foreach($comments as $comment)
										<li>
											<div class="comments-details">
												<div class="comments-content-wrap">
													<span>
														
														{{$comment->user_name}}
														<span class="post-time">{{Numbers::toPersianNumbers(jdate($comment->created_at)->format(' %d %B %y'))}}</span>
														
													</span>
													<p>{{$comment->body}}</p>
												</div>
											</div>
                                        </li>									
                                        @endforeach
									</ul>
								</div>
							</div>
							@include('includes.error')
							<div class="comment-respond rtl">
								<h3 class="comment-reply-title">نظر خود را با ما در میان بگذارید</h3>
								<span class="email-notes">ایمیل شما نمایش داده نمی‌شود</span>
								<form action="{{route('blog.post.addComment', ['id'=>$thisPost->id])}}" Method="POST">
								{{ csrf_field() }}
									<div class="row">
										<div class="col-md-4 floatright">
											<p>نام *</p>
											<input type="text" name="user_name" required/>
										</div>
										<div class="col-md-4 col-md-offset-4">
											<p>آدرس ایمیل *</p>
											<input type="email" name="user_email" required/>
										</div>
										<div class="col-md-12 comment-form-comment">
											<p>متن نظر</p>
											<textarea id="message" name="comment_body" required ></textarea>
											<input type="submit" value="ارسال نظر " />
										</div>
									</div>
								</form>
							</div>						
						</div><!-- single-blog end -->
                    </div>
                    <div class="col-md-3 floatleft">
						<!-- Blog-cart Left -->
						<div class="blog-cart-left shop-product-left">
							
							
							<!-- Shop Layout Area -->
							<div class="shop-layout-area">
								<div class="layout-title">
									<h2>تازه ترین مطالب</h2>
								</div>
								<!-- Recent Posts -->
								<div class="recent-posts">
									<ul>
                                        @foreach($recentPosts as $post)
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