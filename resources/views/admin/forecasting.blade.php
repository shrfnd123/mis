@include('admin\header')
@include('admin\navbar')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Analytics</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Analytics</li>
            </ol>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-2">
            <select class="form-control" id="year">
              @for($x = 0; $x < count($years); $x++)

              <option value="{{$years[$x]}}"> {{$years[$x]}} </option>

              @endfor

            </select>
          </div>
          <div class="col-md-4">
            <button class="btn btn-primary sbmtyear" >Submit</button>
          </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content" id="forecastingresult">
      
    </section>
    <!-- /.content -->
  </div>


  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

@include('admin\footer')
