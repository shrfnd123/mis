<?php 

$months = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");

$monthJS = json_encode($months);

$sales = json_encode($salesArr);

?>

<div class="container-fluid">
        <div class="row">
          <div class="col-md-10">
            <div class="card card-info" style="margin-left:150px;">
              <div class="card-header">
                <h3 class="card-title">Forecasting</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="Forecasting" style="height:250px; min-height:250px"></canvas>
                </div>
              </div>
            </div>     
          </div>
        </div>
        <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="stocktable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th></th>  
                                        <th>Jan</th>
                                        <th>Feb</th>
                                        <th>Mar</th>
                                        <th>Apr</th>
                                        <th>May</th>
                                        <th>Jun</th>
                                        <th>Jul</th>
                                        <th>Aug</th>
                                        <th>Sep</th>
                                        <th>Oct</th>
                                        <th>Nov</th>
                                        <th>Dec</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sales</td>
                                        @for($x = 0; $x < count($decmonths); $x++)
                                        <td>{{$salesmonth[$decmonths[$x]]}}</td>
                                        @endfor
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


</div>

<script>

$(function () {

var forecasting = $('#Forecasting').get(0).getContext('2d');
var months = <?php echo $monthJS; ?>;
var sales = <?php echo $sales; ?>;
console.log(sales);
var forecastingline = new Chart(forecasting, {
    type: 'line',
    data: {
        labels: months,
        datasets: [{
            label: 'Number of sales',
            data: sales,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
})

//---------------------
//- STACKED BAR CHART -
//---------------------





})

</script>