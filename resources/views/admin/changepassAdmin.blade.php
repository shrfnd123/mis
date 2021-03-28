@include('admin\header')
@include('admin\navbar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Password</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Password</li>
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
                            <form action="{{ route('ChangePassA') }}" type="" method="POST">
                                @csrf
                                <h3 class="billing-heading mb-4">Change Password</h3>
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
                                            <input type="password" class="form-control" placeholder=""
                                                name="newpassconfirm">
                                        </div>
                                    </div>
                                </div>
                                <p><button class="btn btn-primary py-3 px-4">Change Password</button></p>

                                <?php if (isset($message)): ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <?= $message ?>
           </div>
           <?php endif; ?>
           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@include('admin\footer')
