<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.admincss')
    <link rel="stylesheet" href="assets/css/fontawesome.css">

</head>

<body>

    <x-app-layout>
        <div class="container-scroller">
            @include('admin.navbar')

            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Users</h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="text-primary font-weight-bold mb-0">{{ $data->total_user }}</h2>
                                    <i class="fa fa-users fa fa-lg text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Current Movies</h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="text-primary font-weight-bold mb-0">{{ $data->total_current_movie }}</h2>
                                    <i class="fa fa-film fa fa-lg text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Upcomming Movies</h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="text-primary font-weight-bold mb-0">{{ $data->total_upcomming_movie }}
                                    </h2>
                                    <i class="fa fa-film fa fa-lg text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Multiplex</h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="text-primary font-weight-bold mb-0">{{ $data->total_multiplex }}</h2>
                                    <i class="fa fa-home fa fa-lg text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Screen</h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="text-primary font-weight-bold mb-0">{{ $data->total_screen }}</h2>
                                    <i class="fa fa-desktop fa fa-lg text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Total Movie Shows</h4>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h2 class="text-primary font-weight-bold mb-0">{{ $data->total_movie_show }}</h2>
                                    <i class="fa fa-ticket fa fa-lg text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="ticketChart" width="400" height="200"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>


    @include('admin.adminscript')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Assume $ticketData contains movie name and ticket count data from the database
        const movieNames = @json($data->movieNames);
        const ticketCounts = @json($data->ticketCounts);

        // Create a new chart instance
        var ctx = document.getElementById('ticketChart').getContext('3d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: movieNames,
                datasets: [{
                    label: 'Ticket Count',
                    data: ticketCounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Ticket Count'
                        }
                    },
                    x: {
                        title: {
                            display: true,
                            text: 'Movie Name'
                        }
                    }
                }
            }
        });
    </script>
</body>

</html>
