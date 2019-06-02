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
					<div class="col-md-9 floatright">
						<!-- Cart Item -->
						<div class="chart-item table-responsive fix rtl">
							<table class=" table-hover ">
								
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
                                                <input  class="btn btn-danger" type="submit" value="X">
                                                
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
											<p>{{Numbers::toPersianNumbers($qty)}}</p>
										</td>
										<td class="th-total"> 
                                            <p class="product-price">{{Numbers::toPersianNumbers($qty*($price - $price*$discount/100), true)}} تومان </p>

                                            </td>
									</tr>
									@endfor
									@if(sizeof($imgAddress)< 1)
											<td class="th-total"> 
										سبد خرید خالی است

                                            </td>

									@endif
								</tbody>
							</table>
						</div><!-- End Cart Item -->

							<!-- Addresses -->
						<div id="addressArea" class='Addresses  floatright'>
						@if(auth()->check())
						<div class="address-title">آدرس های شما</div>
														
								@foreach( auth()->user()->addresses as $address)
								<div class=" address   text-align-right  ">
									<div class="col-sm-2 floatright border ">

											<button type="button" id="address_{{$address->id}}" class="btn addressSelectBtn" >انتخاب آدرس</button>
											<button type="button" id="address_{{$address->id}}" class="btn addressEditBtn" >ویرایش آدرس</button>

									</div>
									<div class="col-sm-10">
										<div class="address-item ">
											<label class="">:استان</label>	{{ $address->province}}
										</div>
										
										<div class="address-item ">
											<label class="">:شهر</label>
											{{ $address->city}}
										</div>
										
										<div class="address-item ">
											<label class="">:آدرس پستی</label>	{{ $address->sub_address}} 
										</div>
										<div class="address-item ">
											<label class="">:کد پستی</label>	ثبت کد پستی در دیتا بیس 
										</div>
									</div>
								</div>
								@endforeach
								<div id="addNewAddressForm" hidden class=" address   text-align-right ">
									<form class="form-horizontal" method="post" action="{{route('address.addAddress')}}">
									{{ csrf_field() }}
											<div class="form-group col-md-12">
												<label class="col-md-2" for="province">:استان</label>
												<input type="text" name="province" class="form-control col-md-10">
												
											</div>
											<div class="form-group col-md-12">
												<label class="col-md-2" for="city">:شهر</label>
												<input type="text" name="city" class="form-control col-md-10">
											</div>
											<div  class="form-group col-md-12">
												<label class="col-md-2" for="sub_address">:آدرس پستی</label>
												<input type="text" name="sub_address" class="form-control col-md-10">
											</div>
											<div class="form-group col-md-12">
												<label class="col-md-2" for="postal_code">:کد پستی</label>
												<input type="text" name="postal_code" class="form-control col-md-10">
											</div>
											<div class="form-group floatleft">
											<button type="submit" class="btn btn-success"> ذخیره آدرس</button>
											</div>
									</form>
								</div>
							<button type="button" id="newAddressBtn" class="btn btn-danger" style="clear:both;margin:5px 20px; width:90%; float:left" >افزودن آدرس جدید ؟؟؟</button>
							@else
								<p>برای ادامه فرایند خرید به حساب کاربری خود وارد شوید</p>

							@endif
						</div>
					</div>
					<div class="col-md-3  floatleft  ">
					
						<div class="shopping-summary chart-all border">
							<div class="shopping-cost-area ">
								<form action="{{route('order.payment')}}" method='post'>
								{{ csrf_field() }}
									<div class="shopping-cost  col-md-12 ">
										<div class="shopping-cost-left floatleft  text-align-left">
											<p>{{$total}}</p>
											<p>{{$totalDiscount}}</p>
											<p><b >{{$total-$totalDiscount}}</b></p>
											<input type="hidden" value="{{$total-$totalDiscount}}" name='payable'>
											<input type="hidden" value="address_1" id="finalAddress" name="address_id">
										</div>
										<div class="shopping-cost-right floatright  text-align-right">
											<p class="">مجموع کل </p>
											<p class="">مجموع تخفیفات </p>
											<p><b>قابل پرداخت</b> </p>
										</div>
									</div>
									<div class="shiping-cart-button">
										<button type="submit" class="btn">ادامه فرآیند خرید</button>
									</div>
								</form>

							</div>
						</div>

						
						<div class="cart-shopping-area  fix">
							<div class="   text-align-right">
								<div class=" chart-all fix">
									<h2>کد تخفیف</h2>
									<p>کد تخفیف خود را وارد کنید</p>
									<input type="text">
									<div class="shiping-cart-button">
										<button type="button" class="btn">اعمال کد تخفیف</button>
									</div>
								</div>
							</div>
						</div><!-- End Cart Shoping Area -->

					</div>
					
				</div>
				<div class="row">
					<!-- Cart Shoping Area -->
					
				</div>
			</div>
		</div><!-- End Cart Area -->

@include('includes.front.footer')
@include('includes.javascripts.order_manage')