

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('admin/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('admin/plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('admin/plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('admin/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('admin/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- DataTables -->
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('admin/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('admin/plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('admin/plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('admin/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>

<script>
  $(function () {
    $("#stocktable").DataTable();
  });

  $('.addstock').click(function(e){

    var item_id = $(this).attr("id");

    $("#savestock").click(function(e){
      var stock = $('#stock').val();
      if(stock <= 0){
        alert("Invalid amount");
      }
      else{
        $.ajax({
          url: "{{route('AddStock')}}",
          type: 'GET',
          data: {
            item_id: item_id,
            stock: stock
          },
          dataType: 'HTML',
          success: function(response){
            alert("Stock for this item successfully updated!");
            location.reload();
          }
        })
      }
    })

  });

  $('.editStatus').click(function(e){

    var confirmation = confirm("Are you sure you want to change the status of this item?");

    if(confirmation == true){
      var data = $(this).attr("id");
      data = data.split("-");
      var item_id = data[0];
      var status = data[1];

      $.ajax({
        url: "{{route('ChangeItemStatus')}}",
        type: 'GET',
        data: {
          item_id: item_id,
          status: status
        },
        dataType: 'HTML',
        success: function(response){
          alert("Status successfully updated");
          location.reload();
        }
      })
    }
    
  });

  $('.editItem').click(function(e){
    e.preventDefault();
    var item_id = $(this).attr("id");
        
    $.ajax({
      url: '{{route("getItembyID")}}',
      type: 'GET',
      data: { item_id:item_id },
      dataType: 'JSON',
      success: function(response){
        document.getElementById("product_name").value = response.product_name;
        document.getElementById("description").value = response.description;
        document.getElementById("category").value = response.category;
        document.getElementById("price").value = response.price;
        document.getElementById("item_id").value = item_id;
          
      }
    })

    
});

$('#saveEditItem').click(function(e){

var confirmation = confirm("Are you sure you want to save these changes?");

if(confirmation == true){

  var form = $('form')[0]; // You need to use standard javascript object here
  var formData = new FormData(form);

  var price = $('#price').val();
  var image = $('#image').val();
  
  if(price <= 0){
    alert("Invalid price");
  }
  else if(image == ""){
    alert("Please upload an image");
  }
  else{
    $.ajax({
      url: '{{route("EditItemAdmin")}}',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      dataType: 'HTML',
      success: function(response){
          alert("Item successfully updated!")
          location.reload();
      }
    })
  }
}
});

$('.acceptorder').click(function(e){

  var confirmation = confirm("Are you sure you want to accept this order?");

  if(confirmation == true){
    var order_id = $(this).attr("id");

    $.ajax({
      url: '{{route("AcceptOrder")}}',
      type: 'GET',
      data: {
        order_id: order_id
      },
      dataType: 'HTML',
      success: function(response){
        alert("Successfully executed");
        location.reload();
      }
    })
  }
})

$('.completeorder').click(function(e){

  var confirmation = confirm("Are you sure you want to complete this transaction?");

  if(confirmation == true){
    var data = $(this).attr("id"); 
    data = data.split("-");
    var order_id = data[0];
    var amount = data[1];

    $.ajax({
      url: '{{route("CompleteOrder")}}',
      type: 'GET',
      data: {
        order_id: order_id,
        amount: amount
      },
      dataType: 'HTML',
      success: function(response){
        alert("Transaction complete!");
        location.reload();
      }
    })
  }
  
});

$('.sbmtyear').click(function(e){

  var year = $('#year').val();

  $.ajax({
    url: '{{route("SalesForecasting")}}',
    type: 'GET',
    data: {
      year: year
    },
    dataType: 'HTML',
    success: function(response){
      $('#forecastingresult').html(response); 
    }
  })
})

$(".orderdecline").click(function(e){
      e.preventDefault();

      var data = $(this).attr("id");
      data = data.split("-");
      var order_id = data[0];
      var qty = data[1];
      var item_id = data[2];

      $.ajax({
        url: '{{route("DeclineOrder")}}',
        type: 'GET',
        data: {
          order_id: order_id,
          qty: qty,
          item_id: item_id
        },
        dataType: 'HTML',
        success: function(response){
          alert("successfully declined");
          location.reload();
        }
      })
    });

    $('.discountbutton').click(function(e){
      var data = $(this).attr("id");

      document.getElementById("item_id").value = data;
    });

    $('#saveDiscountItem').click(function(e){
      e.preventDefault();

      var item_id = $('#item_id').val();
      var discount = $("input[name='discount']:checked").val();

      if(!discount){
        alert("please select a discount value");
      }
      else{
        var confirmation = confirm("Are you sure you want to execute this action?");

        if(confirmation == true){

          $.ajax({
            url: '{{route("SetDiscount")}}',
            type: 'GET',
            data: {
              item_id: item_id,
              discount: discount
            },
            dataType: 'HTML',
            success: function(response){
              alert("Successfully Executed");
              location.reload();
            }
          })
        }
      }
    });

    $('.removediscount').click(function(e){

      var confirmation = confirm("Are you sure you wan to execute this action?");

      if(confirmation == true){

        var item_id = $(this).attr("id");

        $.ajax({
          url: '{{route("RemoveDiscount")}}',
          type: 'GET',
          data: {
            item_id: item_id
          },
          dataType: 'HTML',
          success: function(response){
            alert("Successfully Executed");
            location.reload();
          }
        })
      }
    })

</script>
</body>
</html>