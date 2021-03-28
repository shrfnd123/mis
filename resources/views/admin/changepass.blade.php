@include('admin\header')
@include('admin\navbar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Password</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update Password</li>
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
                                        <th>Password</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $result)
                                        <tr>
                                            <td>{{ $result->username }}</td>
                                            <td>{{ $result->name }}</td>
                                            <td>{{ $result->password }}</td>
                                            <td>

                                                <a onclick="edit_user(this)" href="javascript:;" class="btn btn-info"
                                                    aria-hidden="true">Update</a>
                                                {{-- <a class="btn btn-info " id="{{ $result->user_id }}"
                                                    href="{{ route('ChangingP') }}">Update</a> --}}
                                            </td>
                                        </tr>
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
