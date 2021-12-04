@extends('admin.layouts.app')

@section('content')
    <!--Container Main start-->
    <div class="height-100 bg-light">
       <div class="row mb-5">
        <div class="col-lg-3 col-md-6 col-sm-6 my-2">
          <div class="card card-stats">
           <div class="card-body-1 d-inline-flex my-4 text-center">
                <span style="color: rgb(10, 124, 230)"><i class="fas fa-calendar-day fa-4x mx-3 "></i></span>
                <div class="mt-2">
                    <h6 class="card-title fw-bolder text-center">Today's Appointment</h6>
                <h3 class="card-text text-center">
                    7
                </h3>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 my-2">
          <div class="card card-stats">
            <div class="card-body-1 d-inline-flex my-4">
                <span style="color: rgb(255, 166, 0)"><i class="fas fa-address-book fa-4x mx-3"></i></span>
                <div class="mt-2">
                    <h6 class="card-title fw-bolder text-center">Appointments</h6>
                <h3 class="card-text text-center">
                    30
                </h3>
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 my-2">
          <div class="card card-stats">
            <div class="card-body-1 d-inline-flex my-4">
                <span style="color: rgb(102, 3, 69)"><i class="fas fa-prescription-bottle fa-4x mx-3"></i></span>
                <div class="mt-2">
                    <h6 class="card-title fw-bolder text-center">Prescriptions</h6>
                <h3 class="card-text text-center">
                    500
                </h3>
                </div>
            </div>
          </div>
        </div>
       <div class="col-lg-3 col-md-6 col-sm-6 my-2">
          <div class="card card-stats">
            <div class="card-body-1 d-inline-flex my-4">
                <span style="color: rgb(3, 112, 36)"><i class="fas fa-users fa-4x mx-3"></i></span>
                <div class="mt-2">
                    <h6 class="card-title fw-bolder text-center">Prescriptions</h6>
                <h3 class="card-text text-center">
                    5
                </h3>
                </div>
            </div>
          </div>
        </div>
      </div>

       <div class="row mt-5">
          <div class="col-lg-8 col-md-6 col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h3 class="card-title text-primary text-center">PAST 12 MONTHS INCOME</h3>
                      <div id="chart"></div>
                </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card">
                <div class="card-body ms-4">
                  <h3 class="card-title text-primary">NET INCOME</h3>
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <p>Fisical Year <i class="fas fa-info-circle"></i></p>
                    </div>
                    <div class="col-md-6">
                      <p>2021</p>
                    </div>
                    <div class="col-md-6">
                      <p>Income</p>
                    </div>
                    <div class="col-md-6">
                      <p>$2,3863,283.00</p>
                    </div>
                  </div>
                  
                </div>
              </div>
          </div>
        </div>
    </div>
    <script>
      
        var options = {
          series: [ {
          name: 'Income',
          data: [76, 85, 101, 98, 87, 105, 91]
        }],
          chart: {
          type: 'bar',
          height: 350
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: '25%',
            endingShape: 'rounded'
            
          },
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          show: true,
          width: 2,
          colors: ['transparent']
        },
        xaxis: {
          categories: ['July', 'August', 'September', 'October','November', 'December'],
          title: {
            text: 'Income Per Month',
            
          }
        },
  
        fill: {
          opacity: 1
        },
        tooltip: {
          y: {
            formatter: function (val) {
              return "$ " + val + " thousands"
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
      
      
    </script>
@endsection


  
