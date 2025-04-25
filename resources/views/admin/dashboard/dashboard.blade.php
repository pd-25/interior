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
                    <h4>Monthly Services Requested</h4>
                </div>
                <div class="col-12">
                    <canvas id="myChartII"></canvas>
                </div>
                <div class="col-12">
                    <h4>Monthly partners onboarded</h4>
                </div>
                <div class="col-12">
                    <canvas id="ChartIII"></canvas>
                </div>
                <div class="col-12">
                  <h4>Get request from Area</h4>
              </div>
              <div class="col-12 mb-3">
                  <canvas id="myChart"></canvas>
              </div>
            </div>
        </div>
    </div>
</div>

<script>
    const ctx = document.getElementById('myChart');
    const ctxII = document.getElementById('myChartII');
    const ctxIII = document.getElementById('ChartIII');
    const currentYear = new Date().getFullYear();

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


    new Chart(document.getElementById('myChartII'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($data['serviceRequestMonths']) !!},
            datasets: {!! json_encode($data['serviceRequestCounts']) !!}
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Monthly Service Requests' + ' (' + currentYear + ')'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Requests'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Month'
                    }
                }
            }
        }
    });
    new Chart(ctxIII, {
        type: 'bar',
        data: {
            labels: {!! json_encode($data['finalTotalMonth']) !!},
            datasets: [{
                label: 'Month wise Partners Onboarded',
                data: {!! json_encode($data['TotaluserCounts']) !!},
                borderWidth: 2,
                backgroundColor: 'rgba(54, 162, 235, 0.5)',
                borderColor: 'rgba(54, 162, 235, 1)'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Monthly Partner Onboardings' + ' (' + currentYear + ')'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false
                }
            },
            interaction: {
                mode: 'nearest',
                axis: 'x',
                intersect: false
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Total Partners'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Month'
                    }
                }
            }
        }
    });
</script>


@include('admin.include.footer-bar')

@include('admin.include.footer')
