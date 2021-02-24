@include('customer\header')
@include('customer\navbar')
<?php $subtotal = 0;
$deliveryfee = 200;
?>

<section class="ftco-section ftco-cart">
			<div class="container">
				<div class="row">
    			<div class="col-md-12 ftco-animate">
    				<div class="cart-list">
	    				<table class="table">
						    <thead class="thead-primary">
						      <tr class="text-center">
						        <th>&nbsp;</th>
						        <th>&nbsp;</th>
						        <th>Product</th>
						        <th>Price</th>
						        <th>Quantity</th>
						        <th>Total</th>
						      </tr>
						    </thead>
						    <tbody>
							@if(!empty(session('order')))
                            @for($x=0; $x < count(session('order')); $x++)
						      <tr class="text-center">
						        <td class="product-remove"><a id="{{$data[$x]['item_id']}}" class="removecart"><span class="ion-ios-close"></span></a></td>
						        
						        <td class="image-prod"><div class="img" style="background-image:url(item_image/{{$data[$x]['image']}}"></div></td>
						        
						        <td class="product-name">
						        	<h3>{{$data[$x]['item_name']}}</h3>
						        	<p>{{$data[$x]['description']}}</p>
						        </td>
						        
						        <td class="price">₱ {{number_format($data[$x]['item_price'])}}</td>
						        
						        <td class="quantity">
						        	<div class="input-group mb-3">
					             	<input type="text" name="quantity" id="{{$data[$x]['item_id']}}-{{$data[$x]['stock']}}" class="quantity form-control input-number qtyitm" value="{{$data[$x]['quantity']}}" min="1" max="100">
									
					          	</div>
					          </td>
                            
						        <td class="total">₱ {{( number_format($data[$x]['quantity'] * $data[$x]['item_price'] )) }}</td>
						      </tr><!-- END TR-->
                              @endfor 
							  @endif
						     
						  </table>
					  </div>
    			</div>
    		</div>
    		<div class="row justify-content-start">
    			<div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
    				<div class="cart-total mb-3">
    					<h3>Cart Totals</h3>
						<p class="d-flex">
    						<span>Shipping Address</span>
								@if(session('logged') == true)
    						<span>{{$address->street_address}} {{$address->city}}</span>
								@endif
    					</p>
						<p class="d-flex">
    						<span>Contact Number</span>
								@if(session('logged') == true)
    						<span>{{$address->contact_num}}</span>
								@endif
    					</p>
						<br>
    					<p class="d-flex">
						
    						<span>Subtotal</span>
    						<span>₱
							<?php 
							if(!empty(session('order'))){
								for($x=0; $x < count(session('order')); $x++){
									$subtotal = ($data[$x]['quantity'] * $data[$x]['item_price']) + $subtotal;
								}
								echo number_format($subtotal);
							}
                            
                            ?>
                            </span>
    					</p>
    					<p class="d-flex">
    						<span>Delivery</span>
    						<span>₱<?php echo $deliveryfee; ?></span>
    					</p>
						
    					<hr>
    					<p class="d-flex total-price">
    						<span>Total</span>
    						<span>₱<?php echo number_format($deliveryfee + $subtotal); ?></span>
    					</p>
    				</div>
    				<p class="text-center"><a id="checkout" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
    			</div>
    		</div>
			</div>
		</section>


@include('customer\footer')
