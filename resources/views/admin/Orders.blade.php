@include('admin\header')
@include('admin\navbar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
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
                            <table id="stocktable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Customer Name</th>  
                                        <th>Shipping Address</th>
                                        <th>Contact Number</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $result)
                                @if($result->order_status != 2)
                                <?php 
                                if($result->sale == 1){
                                    $price = $result->price * $result->discount;
                                }
                                else{
                                    $price = $result->price;
                                }
                                ?>
                                    <tr>
                                        <td>{{$result->name}}</td>
                                        <td>{{$result->street_address}} {{$result->city}}</td>
                                        <td>{{$result->contact_num}}</td>
                                        <td>{{$result->product_name}}</td>
                                        <td>{{$result->order_quantity}}</td>
                                        <td>{{($price * $result->order_quantity)}}</td>
                                        @if($result->order_status == 0)
                                        <td><button class="btn btn-primary acceptorder" id="{{$result->order_id}}" >Accept Order</button>
                                        <button class="btn btn-danger orderdecline" id="{{$result->order_id}}-{{$result->order_quantity}}-{{$result->item_id}}" >Decline Order</button>
                                        </td>
                                        @endif
                                        @if($result->order_status == 1)
                                        <td><button class="btn btn-success completeorder" id="{{$result->order_id}}-{{($price * $result->order_quantity)}}">Complete Order</button></td>
                                        @endif
                                    </tr>
                                @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('admin\footer')
