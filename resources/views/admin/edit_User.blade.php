@include('admin\header')
@include('admin\navbar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update User</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update User</li>
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
                                        <th>Username</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $result)
                                        <tr>
                                            <td>{{ $result->username }}</td>
                                            <td>{{ $result->name }}</td>
                                            <td>{{ $result->street_address }} {{ $result->city }}
                                                {{ $result->zip_code }}</td>
                                            <td>{{ $result->contact_num }}</td>
                                            <td>{{ $result->email }}</td>
                                            <td>
                                                <button class="btn btn-info editUser" id="{{ $result->user_id }}"
                                                    data-toggle="modal" data-target="#EditUser">Update</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal fade" id="EditUser">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Update Info</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" id="edit_form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Username:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="username" name="username">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Name:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="name" name="name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Street Address:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="street_address"
                                                    name="street_address">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">City:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="city" name="city">
                                                {{-- <input type="hidden" class="form-control" name="item_id" id="item_id"> --}}
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Zip Code:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="zip_code" name="zip_code">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Number:</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="contact_num"
                                                    name="contact_num">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label">Email: </label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="email" name="email">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveEditUser">Save</button>
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
