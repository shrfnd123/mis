@include('customer\header')
@include('customer\navbar')


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-6 ftco-animate">
            <div class="cart-detail bg-light p-3 p-md-4">
			<form action="{{route('ChangePassword')}}" method="POST">
			@csrf
	          	<h3 class="billing-heading mb-4">Login</h3>
					<div class="form-group">
						<div class="col-md-12">
                            <div class="form-group">
	                	        <label for="firstname">Password</label>
	                            <input type="password" class="form-control" placeholder="" name="password">
	                        </div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
                            <div class="form-group">
	                	        <label for="firstname">New Password</label>
	                            <input type="password" class="form-control" placeholder="" name="newpass">
	                        </div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-12">
                            <div class="form-group">
	                	        <label for="firstname">Confirm New Password</label>
	                            <input type="password" class="form-control" placeholder="" name="newpassconfirm">
	                        </div>
						</div>
					</div>
					<p><button class="btn btn-primary py-3 px-4">Change Password</button></p>
                    
                    <?php if (isset($message)): ?>
			        <div class="alert alert-success alert-dismissible" role="alert">
			            <?= $message ?>
			        </div>
			    <?php endif ?>
			</form>
			</div>
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

@include('customer\footer')