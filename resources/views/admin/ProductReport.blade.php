@include('admin\header')
@include('admin\navbar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Product Report</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Product Report</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <h3> Most popular </h3>
                                    <br>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Price</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pplr as $popular)
                                        <tr>
                                            <td>{{ $popular->product_name }}</td>
                                            <td>{{ $popular->category }}</td>
                                            <td>{{ $popular->description }}</td>
                                            <td>{{ $popular->price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <h3> Least popular </h3>
                                    <br>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ntpplr as $notpopular)
                                        <tr>
                                            <td>{{ $notpopular->product_name }}</td>
                                            <td>{{ $notpopular->category }}</td>
                                            <td>{{ $notpopular->description }}</td>
                                            <td>{{ $notpopular->price }}</td>
                                            <td align="center">
                                                <button class="btn btn-primary discountbutton"
                                                    id="{{ $notpopular->item_id }}" data-toggle="modal"
                                                    data-target="#SetDiscount">Set Discount</button>
                                                @if ($notpopular->sale == 1)
                                                    <button class="btn btn-danger removediscount"
                                                        id="{{ $notpopular->item_id }}">Remove Discount</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal fade" id="SetDiscount">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Set Discount</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-xs-3" style="margin-left:50px;">
                                            <input type="radio" name="discount" value="0.9"> 10%
                                        </div>
                                        <div class="col-xs-3" style="margin-left:10px;">
                                            <input type="radio" name="discount" value="0.8"> 20%
                                        </div>
                                        <div class="col-xs-3" style="margin-left:10px;">
                                            <input type="radio" name="discount" value="0.5"> 50%
                                            <input type="hidden" id="item_id">
                                        </div>

                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveDiscountItem">Save</button>
                                </div>

                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('admin\footer')
