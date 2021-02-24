@include('customer\header')
@include('customer\navbar')

<section class="ftco-section">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="{{asset('item_image/'.$data->image)}}" class="image-popup prod-img-bg"><img src="{{asset('item_image/'.$data->image)}}" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3>{{$data->product_name}}</h3>
    				@if(session('logged') == true && $data->sale == 1)
					<p class="price"><span><strike>₱{{number_format($data->price)}}</strike> ₱{{floor($data->price * $data->discount)}}</span></p>
					@else
    				<p class="price"><span>₱ {{number_format($data->price)}}</span></p>
					@endif
    				<p>{{$data->description}}</p>
    				
						<div class="row mt-4">
						
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
	             	<span class="input-group-btn mr-2">
	                	<button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
	                   <i class="ion-ios-remove"></i>
	                	</button>
	            		</span>
                    <input type="hidden" id="item_id" value="{{$data->item_id}}">
                    <input type="hidden" id="item_qty" value="{{$data->quantity}}">
	             	<input type="text" id="quantity" name="quantity" class="quantity form-control input-number" value="1" min="1" max="100">
	             	<span class="input-group-btn ml-2">
	                	<button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
	                     <i class="ion-ios-add"></i>
	                 </button>
	             	</span>
	          	</div>
	          	<div class="w-100"></div>
	          	<div class="col-md-12">
	          		<p style="color: #000;">{{$data->quantity}} piece available</p>
	          	</div>
          	</div>
          	<p>
			  @if(session('logged') == true)
			  <a class="btn btn-black py-3 px-5 mr-2 " id="cartPreview">Add to Cart</a></p>
			  @else
			  <a href="{{route('LoginCustomer')}}" class="btn btn-black py-3 px-5 mr-2 ">Login</a></p>
			  @endif
    			</div>
    		</div>

    	</div>
    </section>

@include('customer\footer')