@include('customer\header')
@include('customer\navbar')


<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 ftco-animate">
                <form action="{{ route('Register') }}" method="post" class="billing-form">
                    @csrf
                    <h3 class="mb-4 billing-heading">Register</h3>
                    <div class="row align-items-end">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" placeholder="" name="fname">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" placeholder="" name="lname">
                            </div>
                        </div>
                        <div class="w-100"></div>

                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="streetaddress">Street Address</label>
                                <input type="text" class="form-control" placeholder="House number and street name"
                                    name="street">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control"
                                    placeholder="Appartment, suite, unit etc: (optional)" name="street1">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="towncity">Town / City</label>
                                <input type="text" class="form-control" placeholder="" name="city">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postcodezip">Postcode / ZIP *</label>
                                <input type="text" class="form-control" placeholder="" name="zipcode">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" placeholder="" name="contact_num">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailaddress">Email Address</label>
                                <input type="text" class="form-control" placeholder="" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailaddress">Username</label>
                                <input type="text" class="form-control" placeholder="" name="username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailaddress">Password</label>
                                <input type="password" class="form-control" placeholder="" name="password">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="emailaddress">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="" name="confirmpass">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div>

                            <p><button type="submit" class="btn btn-primary py-3 px-4" width="50%;">Register</button>
                            </p>

                        </div>
                        <?php if (isset($message)): ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <?= $message ?>
   </div>
   <?php endif; ?>
 </div>
 </form><!-- END -->



 
          </div> <!-- .col-md-8 -->
        </div>
      </div>
    </section> <!-- .section -->

@include('customer\footer')
