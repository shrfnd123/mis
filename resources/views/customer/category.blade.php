@include('customer\header')
@include('customer\navbar')

<section class="ftco-section bg-light">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-8 col-lg-10 order-md-last">
    				<div class="row">
                    @foreach($data as $result)
		    			<div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
		    				<div class="product d-flex flex-column">
		    					<a href="#" class="img-prod"><img class="img-fluid" src="item_image/{{$result->image}}" alt="Colorlib Template">
		    						<div class="overlay"></div>
		    					</a>
		    					<div class="text py-3 pb-4 px-3">
		    						<div class="d-flex">
		    							
			    					</div>
		    						<h3><a href="#">{{$result->product_name}}</a></h3>
		    						<div class="pricing">
			    						<p class="price"><span>₱{{$result->price}}</span></p>
			    					</div>
			    					<p class="bottom-area d-flex px-3">
		    							<a href="{{route('ItemPreview',$result->item_id)}}" class="add-to-cart text-center py-2 mr-1 itemproduct"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
		    							
		    						</p>
		    					</div>
		    				</div>
		    			</div>
              @endforeach
		    		
		    		</div>
		    		<div class="row mt-5">
		          <div class="col text-center">
		            <div class="block-27">
		              <ul>
		                <li><a href="#">&lt;</a></li>
		                <li class="active"><span>1</span></li>
		                <li><a href="#">2</a></li>
		                <li><a href="#">3</a></li>
		                <li><a href="#">4</a></li>
		                <li><a href="#">5</a></li>
		                <li><a href="#">&gt;</a></li>
		              </ul>
		            </div>
		          </div>
		        </div>
		    	</div>

		    	<div class="col-md-4 col-lg-2">
		    		<div class="sidebar">
							<div class="sidebar-box-2">
								
								<div class="fancy-collapse-panel">
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  
                  </div>
               </div>
							</div>
							
						</div>
    			</div>
    		</div>
    	</div>
    </section>

@include('customer\footer')