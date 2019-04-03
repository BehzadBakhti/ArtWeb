		<!-- Footer area -->
		<div class="footer-area">
			<!-- Footer Top -->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<!-- Footer Left -->
							<div class="footer-left">
								<!-- Footer Logog -->
								<div class="footer-logo">
									<a href="index.html"><img src="img/logo/logo-footer.png" alt="logo"></a>
								</div>
								<div class="footer-static-content">
									<p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram.</p>
								</div>
								<div class="footer-payment">
									<h2>Payments</h2>
									<ul>
										<li><a href="#"><img src="img/logo/payment.png" alt="payment"></a></li>
									</ul>
								</div>
							</div><!-- End Footer Left -->
						</div>
						<div class="col-md-8 footer-right-col">
							<!-- Footer Right -->
							<div class="footer-right">
								<div class="footer-newsletter">
									<form action="#">
										<h2>Newsletter</h2>
										<input type="text" title="Sign up for our newsletter" required>
										<button type="submit">Subscribe</button>
									</form>
								</div>
								<div class="information-link">
									<div class="single-information-link">
										<h2>Informations</h2>
										<ul>
											<li><a href="#">Sitemap</a></li>
											<li><a href="#">Privacy Policy</a></li>
											<li><a href="#">Your Account</a></li>
											<li><a href="#">Advanced Search</a></li>
											<li><a href="#">Contact Us</a></li>
										</ul>
									</div>
									<div class="single-information-link">
										<h2>other static link</h2>
										<ul>
											<li><a href="#">Product Recall</a></li>
											<li><a href="#">Gift Vouchers</a></li>
											<li><a href="#">Returns and Exchanges</a></li>
											<li><a href="#">Shipping Options</a></li>
											<li><a href="#">Help & FAQs</a></li>
										</ul>
									</div>
									<div class="single-information-link">
										<h2> My account </h2>
										<ul>
											<li><a href="#">My orders</a></li>
											<li><a href="#">My credit slips</a></li>
											<li><a href="#">My addresses</a></li>
											<li><a href="#">My personal info</a></li>
										</ul>
									</div>
								</div>
							</div><!-- End Footer Left -->
						</div>
					</div>
				</div>
			</div><!-- End Footer Top -->
			<!-- Footer Bottom -->
			<div class="footer-bottom">
				<div class="container">
					<!-- Copyright -->
					<div class="copyright">
						<p>Copyright &copy; <a href="http://bootexperts.com/">BootExperts</a> All Rights Reserved.</p>
					</div>
				</div>
			</div><!-- End Footer Bottom -->
		</div><!-- End Footer area -->
		<!-- QUICKVIEW PRODUCT -->
		@include('includes.front.modals')
		
		
		
		
		
		<!-- jquery
		============================================ -->		
        <script src="{{asset('app/js/vendor/jquery-1.11.3.min.js')}}"></script>
		<!-- bootstrap JS
		============================================ -->		
        <script src="{{asset('app/js/bootstrap.min.js')}}"></script>
		<!-- nivo slider js
		============================================ --> 
		<script src="{{asset('app/js/jquery.nivo.slider.pack.js')}}"></script>
		<!-- Mean Menu js
		============================================ -->         
        <script src="{{asset('app/js/jquery.meanmenu.min.js')}}"></script>
		<!-- wow JS
		============================================ -->		
        <script src="{{asset('app/js/wow.min.js')}}"></script>
		<!-- price-slider JS
		============================================ -->		
        <script src="{{asset('app/js/jquery-price-slider.js')}}"></script>
		<!-- Simple Lence JS
		============================================ -->
		<script type="text/javascript" src="{{asset('app/js/jquery.simpleGallery.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('app/js/jquery.simpleLens.min.js')}}"></script>	
		<!-- owl.carousel JS
		============================================ -->		
        <script src="{{asset('app/js/owl.carousel.min.js')}}"></script>
		<!-- scrollUp JS
		============================================ -->		
        <script src="{{asset('app/js/jquery.scrollUp.min.js')}}"></script>
		<!-- jquery Collapse JS
		============================================ -->
        <script src="{{asset('app/js/jquery.collapse.js')}}"></script>
		<!-- plugins JS
		============================================ -->		
        <script src="{{asset('app/js/plugins.js')}}"></script>
		<!-- main JS
		============================================ -->		
		<script src="{{asset('app/js/main.js')}}"></script>

		<!-- My JS
		============================================ -->

			@include('includes.javascripts.cart_manage')
		<!-- <script src="{{asset('js/cart_manage.js')}}"></script> -->
    </body>
</html>
