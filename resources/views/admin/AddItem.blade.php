@include('admin\header')
@include('admin\navbar')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Item</h1>
          </div>
          
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Item</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <?php if (isset($message)): ?>
			<div class="alert alert-success alert-dismissible" role="alert">
			    <?= $message ?>
			</div>
		<?php endif ?>
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
             
              <form role="form" method="post" action="{{route('AddItem')}}" enctype="multipart/form-data">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Category</label>
                    <select id="exampleSelect" class="form-control" name="category">
                        <option></option>
                        <option value="winter">Winter</option>
                        <option value="temporary_spares">Temporary Spares</option>
                        <option value="trailer">Trailer</option>
                        <option value="atv_utv">Atv/Utv</option>
                        <option value="lawn_garden">Lawn & Garden</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <input name="description" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Price</label>
                    <input name="price" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Product Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="form-control" id="exampleInputFile" name="image" accept="image/*">
                        
                      </div>
                     
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                
              </form>
            </div>
          
            <!-- /.card -->

        
            <!-- /.card -->

          </div>
          
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@include('admin\footer')