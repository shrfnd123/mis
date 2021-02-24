@include('admin\header')
@include('admin\navbar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Update Item</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Item</li>
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
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $result)
                                    <tr>
                                        <td>{{$result->product_name}}</td>
                                        <td>{{$result->category}}</td>
                                        <td>{{$result->description}}</td>
                                        <td>{{$result->price}}</td>
                                        <td>
                                            @if($result->status == 1)
                                                Active
                                            @endif
                                            @if($result->status == 0)
                                                Disabled
                                            @endif
                                        </td>
                                        <td>
                                            <button class="btn btn-info editItem" id="{{$result->item_id}}" data-toggle="modal" data-target="#EditItem">Edit</button>
                                            @if($result->status == 1)
                                            <button class="btn btn-danger editStatus" id="{{$result->item_id}}-0" >Disable</button>
                                            @endif
                                            @if($result->status == 0)
                                            <button class="btn btn-success editStatus" id="{{$result->item_id}}-1" >Enable</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal fade" id="EditItem">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Item</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" id="edit_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Product Name:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="product_name" name="product_name">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Category:</label>
                                        <div class="col-sm-10">
                                            <select id="category" class="form-control" name="category">
                                                <option></option>
                                                <option value="winter">Winter</option>
                                                <option value="temporary_spares">Temporary Spares</option>
                                                <option value="trailer">Trailer</option>
                                                <option value="atv_utv">Atv/Utv</option>
                                                <option value="lawn_garden">Lawn & Garden</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Description:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="description" name="description">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Price:</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="price" name="price">
                                            <input type="hidden" class="form-control" name="item_id" id="item_id">                                            
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="image" id="image" accept="image/*">
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveEditItem">Save</button>
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
