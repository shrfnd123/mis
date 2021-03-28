@include('customer\header')
@include('customer\navbar')

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Popular Items</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($pplr as $popular)
                <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
                    <div class="product d-flex flex-column">
                        <a href="#" class="img-prod"><img class="img-fluid" src="item_image/{{ $popular->image }}"
                                alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3">

                            <h3><a href="#">{{ $popular->product_name }}</a></h3>
                            <div class="pricing">
                                <p class="price"><span>₱{{ $popular->price }}</span></p>
                            </div>
                            <p class="bottom-area d-flex px-3">
                                <a href="{{ route('ItemPreview', $popular->item_id) }}"
                                    class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
                                            class="ion-ios-add ml-1"></i></span></a>

                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <h2 class="mb-4">Sale</h2>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($ntpplr as $notpopular)
                <div class="col-sm-12 col-md-6 col-lg-3 ftco-animate d-flex">
                    <div class="product d-flex flex-column">
                        <a href="#" class="img-prod"><img class="img-fluid" src="item_image/{{ $notpopular->image }}"
                                alt="Colorlib Template">
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3">

                            <h3><a href="#">{{ $notpopular->product_name }}</a></h3>
                            <div class="pricing">
                                <p class="price"><span><strike>₱{{ $notpopular->price }}</strike>
                                        ₱{{ floor($notpopular->price * $notpopular->discount) }}</span></p>
                            </div>
                            <p class="bottom-area d-flex px-3">
                                <a href="{{ route('ItemPreview', $notpopular->item_id) }}"
                                    class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
                                            class="ion-ios-add ml-1"></i></span></a>

                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



@include('customer\footer')
