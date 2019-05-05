@include('includes.front.header')
		<!-- Cart Area -->
		<div class="chart-area">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="cart-title text-center">
							<h2>سبد خرید</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<!-- Cart Item -->
						<div class="chart-item table-responsive fix rtl">
							<table class="col-md-12">
								
								<tbody>
                                    @for($i=0; $i< sizeof($imgAddress); $i++)
                                    @php ($discount=$cartContent[$imgAddress[$i][0]]->attributes->discount)
                                    @php ($price=$cartContent[$imgAddress[$i][0]]->price)
                                    @php ($qty=$cartContent[$imgAddress[$i][0]]->quantity)
									<tr>
                                        <td class="th-delate">
                                            <form action="{{route('cart.removeFromCart')}}" method="post">
                                            {{ csrf_field() }}
                                                <input type="hidden" name="idToRemove" value="{{$imgAddress[$i][0]}}">
                                                <input type="submit" value="X">
                                                
                                            </form>
                                    
                                         </td>
										<td class="th-product">
											<a href="{{route('shop.product',['id'=>$imgAddress[$i][0]])}}"><img src="{{asset($imgAddress[$i][1])}}" alt="cart"></a>
										</td>
										<td class="th-details">
											<h2><a href="#">{{$cartContent[$imgAddress[$i][0]]->name}}</a></h2>
										</td>
										
										<td class="th-price">
                                            <p class="product-price">
                                                @if($discount>0)	
                                                    <span>
                                                        {{Numbers::toPersianNumbers($price, true)}}	
                                                    </span>
                                                        {{Numbers::toPersianNumbers($price - $price*$discount/100, true)}} تومان

                                                @else
                                                        {{Numbers::toPersianNumbers($price, true)}}	تومان
                                                @endif
                                            </p>
                                                
                                        </td>
										<td class="th-qty">
											<input type="text" placeholder="1">
										</td>
										<td class="th-total"> 
                                            <p class="product-price">{{Numbers::toPersianNumbers($qty*($price - $price*$discount/100), true)}} تومان </p>

                                            </td>
									</tr>
                                    @endfor
								</tbody>
							</table>
						</div><!-- End Cart Item -->
						<div class="shoping-cart-button">
							<div class="cart-button-left">
								<button type="button" class="btn">Continue Shopping</button>
							</div>
							<div class="cart-button-right">
								<button type="button" class="btn">Update Shopping Cart</button>
								<button type="button" class="btn">Clear Shopping Cart</button>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- Cart Shoping Area -->
					<div class="cart-shopping-area fix">
						<div class="col-md-6 col-sm-12 floatright">
							<div class="chart-all fix">
								<h2>Discount Codes</h2>
								<p>Enter your coupon code if you have one.</p>
								<input type="text">
								<div class="shiping-cart-button">
									<button type="button" class="btn">Apply Coupon</button>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-sm-12 floatleft">
							<div class="shopping-summary chart-all fix">
								<div class="shopping-cost-area">
									<div class="shopping-cost">
										<div class="shopping-cost-right">
											<p>$2.010.00</p>
											<p><b>$2.010.00</b></p>
										</div>
										<div class="shopping-cost-left">
											<p class="floatright">Sub Total </p>
											<p><b>GRAND TOTAL</b> </p>
										</div>
									</div>
									<div class="shiping-cart-button">
										<button type="button" class="btn">Proceed to Checkout</button>
									</div>
									<a href="#">Checkout with Multiple Addresses</a>
								</div>
							</div>
						</div>
					</div><!-- End Cart Shoping Area -->
				</div>
			</div>
		</div><!-- End Cart Area -->

@include('includes.front.footer')