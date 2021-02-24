@include('customer\header')
@include('customer\navbar')


 <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-10 ftco-animate">
						<form action="{{route('EditAccount')}}" method="post" class="billing-form">
                        @csrf
							<h3 class="mb-4 billing-heading">Personal Information</h3>
	          	<div class="row align-items-end">
	          		<div class="col-md-12">
	                <div class="form-group">
	                	<label for="firstname">Name</label>
	                  <input type="text" class="form-control" placeholder="" name="name" value="{{$data->name}}">
	                </div>
	              </div>
	             
                <div class="w-100"></div>
		            
		            <div class="w-100"></div>
		            <div class="col-md-12">
		            	<div class="form-group">
	                	<label for="streetaddress">Street Address</label>
	                  <input type="text" class="form-control" placeholder="House number and street name" name="street" value="{{$data->street_address}}">
	                </div>
		            </div>
		            
		            <div class="w-100"></div>
		            <div class="col-md-6">
		            	<div class="form-group">
	                	<label for="towncity">Town / City</label>
	                  <input type="text" class="form-control" placeholder="" name="city" value="{{$data->city}}">
	                </div>
		            </div>
		            <div class="col-md-6">
		            	<div class="form-group">
		            		<label for="postcodezip">Postcode / ZIP *</label>
	                  <input type="text" class="form-control" placeholder="" name="zipcode" value="{{$data->zip_code}}">
	                </div>
		            </div>
		            <div class="w-100"></div>
		            <div class="col-md-6">
	                <div class="form-group">
	                	<label for="phone">Phone</label>
	                  <input type="text" class="form-control" placeholder="" name="contact_num" value="{{$data->contact_num}}">
	                </div>
	              </div>
	              <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Email Address</label>
	                  <input type="text" class="form-control" placeholder="" name="email" value="{{$data->email}}">
	                </div>
                </div>
                <div class="col-md-6">
	                <div class="form-group">
	                	<label for="emailaddress">Username</label>
	                  <input type="text" class="form-control" placeholder="" name="username" value="{{$data->username}}">
										<input type="hidden" class="form-control" placeholder="" name="user_id" value="{{$data->user_id}}">
	                </div>
                </div>
                <div class="w-100"></div>
                <div>
                	
                        <p><button type="submit" class="btn btn-primary py-3 px-4 edtprof" width="50%;">Edit Profile</button></p>			
					
                </div>
                <?php if (isset($message)): ?>
			        <div class="alert alert-success alert-dismissible" role="alert">
			            <?= $message ?>
			        </div>
			    <?php endif ?>
	            </div>
	          </form><!-- END -->



	          
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

@include('customer\footer')