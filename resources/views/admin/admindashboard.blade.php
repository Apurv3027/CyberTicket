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
                    <div class="grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="col-sm-6">
                                        <h4 class="card-title"><b>Movie Analytics</b></h4>
                                    </div>
                                    <canvas id="movieViewsChart" width="400" height="200"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="col-sm-6">
                                        <h4 class="card-title"><b>Movie Type</b></h4>
                                    </div>
                                    <canvas id="movieCountChart" width="150" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="container">
                                    <div class="col-sm-10">
                                        <h4 class="card-title"><b>Multiplex and Screen</b></h4>
                                    </div>
                                    <canvas id="multiplexAndScreenCountChart" width="150" height="150"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>


    @include('admin.adminscript')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const movieLabels = @json($ticketPurchases->pluck('movie_name'));
        const movieViewsData = @json($ticketPurchases->pluck('total_tickets'));

        var ctx = document.getElementById('movieViewsChart').getContext('2d');
        // Create a linear gradient for the background
        var gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(9, 9, 121, 1)');
        gradient.addColorStop(0.5, 'rgba(0, 212, 255, 1)');
        gradient.addColorStop(1, 'rgba(9, 9, 121, 1)');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: movieLabels,
                datasets: [{
                    label: 'Tickets',
                    data: movieViewsData,
                    backgroundColor: gradient,
                    borderColor: gradient,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Tickets'
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
    <script>
        const latestMovieCount = {{ $latestMovieCount }};
        const upcomingMovieCount = {{ $upcomingMovieCount }};

        var ctx = document.getElementById('movieCountChart').getContext('2d');
        // Create a linear gradient for the background
        var gradientLatestMovie = ctx.createLinearGradient(0, 0, 0, 400);
        gradientLatestMovie.addColorStop(0, 'rgba(131, 58, 180, 1)');
        gradientLatestMovie.addColorStop(0.5, 'rgba(253, 29, 29, 1)');
        gradientLatestMovie.addColorStop(1, 'rgba(252, 176, 69, 1)');

        var gradientUpcommingMovie = ctx.createLinearGradient(0, 0, 0, 400);
        gradientUpcommingMovie.addColorStop(0, 'rgba(238, 174, 202, 1)');
        gradientUpcommingMovie.addColorStop(1, 'rgba(148, 187, 233, 1)');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Live Movies', 'Upcoming Movies'],
                datasets: [{
                    label: 'Movie Type',
                    data: [latestMovieCount, upcomingMovieCount],
                    backgroundColor: [
                        gradientLatestMovie,
                        gradientUpcommingMovie,
                    ],
                    borderColor: [
                        gradientLatestMovie,
                        gradientUpcommingMovie,
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                pluins: {
                    title: {
                        display: true,
                        text: 'Movie Count',
                        font: {
                            size: 16
                        }
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }
        });
    </script>
    <script>
        const multiplexNames = @json($multiplexNames);
        const multiplexScreenCounts = @json($multiplexScreenCounts);

        var ctx = document.getElementById('multiplexAndScreenCountChart').getContext('2d');

        var gradient = ctx.createLinearGradient(0, 0, 0, 400);
        gradient.addColorStop(0, 'rgba(9, 9, 121, 1)');
        gradient.addColorStop(1, 'rgba(9, 9, 121, 1)');

        var gradient2 = ctx.createLinearGradient(0, 0, 0, 400);
        gradient2.addColorStop(0, 'rgba(131, 58, 180, 1)');
        gradient2.addColorStop(1, 'rgba(252, 176, 69, 1)');

        var gradient3 = ctx.createLinearGradient(0, 0, 0, 400);
        gradient3.addColorStop(0, 'rgba(238, 174, 202, 1)');
        gradient3.addColorStop(1, 'rgba(148, 187, 233, 1)');

        var gradient4 = ctx.createLinearGradient(0, 0, 0, 400);
        gradient4.addColorStop(0, 'rgba(34, 193, 195, 1)');
        gradient4.addColorStop(1, 'rgba(253, 187, 45, 1)');

        var gradient5 = ctx.createLinearGradient(0, 0, 0, 400);
        gradient5.addColorStop(0, 'rgba(63, 94, 251, 1)');
        gradient5.addColorStop(1, 'rgba(252, 70, 107, 1)');

        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: multiplexNames,
                datasets: [{
                    label: 'Screen',
                    data: multiplexScreenCounts,
                    backgroundColor: [
                        gradient,
                        gradient2,
                        gradient3,
                        gradient4,
                        gradient5,
                    ],
                    borderColor: [
                        gradient,
                        gradient2,
                        gradient3,
                        gradient4,
                        gradient5,
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    title: {
                        display: false,
                        text: 'Multiplex and Screen Count',
                        font: {
                            size: 16
                        }
                    },
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    </script>
</body>

</html>
