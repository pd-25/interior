@include('admin.include.header')

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Welcome to dashbaord</h4>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h4>Get request from Area</h4>
                </div>
                <div class="col-12 mb-3">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="col-12">
                    <h4>Most Services Requested</h4>
                </div>
                <div class="col-12">
                    <canvas id="myChartII"></canvas>
                </div>
            </div>
        </div>
    </div>
</div> 

<script>
    const ctx = document.getElementById('myChart');
    const ctxII = document.getElementById('myChartII');
  
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: {!! json_encode($data['finalCitys']) !!},
        datasets: [{
          label: 'Area wise leads',
          data: {!! json_encode($data['TotalCounts']) !!},
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });

    new Chart(ctxII, {
      type: 'bar',
      data: {
        // ['Architecture', 'HVAC', 'Design', 'Electrical', 'Contractor', 'Civil & Structural', 'Painting','Plumbing', 'Furniture & Pictures']
        //labels: {!! json_encode($data['serviceName']) !!},
        datasets: [{
          label: 'Service wise leads',
          data: {!! json_encode($data['serviceCount']) !!},
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(201, 203, 207, 0.2)'
            ],
            borderColor: [
            'rgb(255, 99, 132)',
            'rgb(255, 159, 64)',
            'rgb(255, 205, 86)',
            'rgb(75, 192, 192)',
            'rgb(54, 162, 235)',
            'rgb(153, 102, 255)',
            'rgb(201, 203, 207)'
            ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
</script>


@include('admin.include.footer-bar')

@include('admin.include.footer')
