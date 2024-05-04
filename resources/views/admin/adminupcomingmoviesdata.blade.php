<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.admincss')
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <style>
        /* Custom CSS to set table cell content to display in one line */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 20px;
            white-space: nowrap;
            /* Prevent text wrapping */
        }

        /* Optional: Add styles for table header */
        th {
            font-weight: bold;
            text-align: left;
        }
    </style>

</head>

<body>
    <x-app-layout>

        <div class="container-scroller">


            @include('admin.navbar')
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-8 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4 class="card-title"><b>Upcoming Movies</b></h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <a style="color:white; border-color:#9370DB; text-decoration:none;"
                                                href="{{ url('/adminupcomingmovies') }}"><x-jet-button class="ml-4"
                                                    style="margin-left:0px;">
                                                    {{ __('Add') }}
                                                </x-jet-button>
                                            </a>
                                            <a href="#" onclick="window.location.href='{{ route('download.upcommingmoviedata') }}'">
                                                <x-jet-button class="ml-4"><i class="fa fa-download mr-2"></i>Upcomming Movie Data</x-jet-button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <table style="margin-left: auto;margin-right: auto;">
                                    <tr>
                                        <th style="padding: 20px">#</th>
                                        <th style="padding: 20px">Name</th>
                                        <th style="padding: 20px">Release Date</th>
                                        <th style="padding: 20px;text-align: center;">Delete</th>
                                        <th style="padding: 20px;text-align: center;">Update</th>
                                    </tr>
                                    @foreach ($data as $index => $data)
                                        <tr>
                                            <td style="padding: 20px">{{ $index + 1 }}</td>
                                            <td style="padding: 20px">{{ $data->moviename }}</td>
                                            <td style="padding: 20px">{{ $data->releasedate }}</td>
                                            <td style="padding: 20px"><a
                                                    href="{{ url('/deleteupcomingmovie', $data->id) }}"
                                                    class = "button delete-confirm"><button data-toggle="modal"
                                                        style="background-color:#dc143c; border-color:blue; color:white ;width: 70px;height: 30px; border-radius: 35px">Delete<button></a>
                                            </td>
                                            <td style="padding: 20px"><a
                                                    href="{{ url('/updateupcomingmovie', $data->id) }}"><button
                                                        data-toggle="modal"
                                                        style="background-color:#9370DB; border-color:blue; color:white ;width: 70px;height: 30px; border-radius: 35px">Update<button></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    @include('admin.adminscript')
</body>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('.delete-confirm').on('click', function(event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure you want to delete this record?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
            dangerMode: true,
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });
</script>

</html>
