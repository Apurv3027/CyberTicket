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
                                        <h4 class="card-title"><b>Screen</b></h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <a style="color:white; border-color:#9370DB; text-decoration:none;"
                                                href="{{ url('/adminscreen') }}"><x-jet-button class="ml-4"
                                                    style="margin-left:0px;">
                                                    {{ __('Add') }}
                                                </x-jet-button></a>
                                            <a href="#"
                                                onclick="window.location.href='{{ route('download.screendata') }}'">
                                                <x-jet-button class="ml-4"><i class="fa fa-download mr-2"></i>Screen
                                                    Data</x-jet-button>
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div class="d-flex justify-content-between align-items-center">
                                    <form action="{{ url('/searchuser') }}" method="get" style="padding-top: 30px;">
                                        @csrf
                                        <x-jet-input type="text" name="searchuser" placeholder="Search"
                                            style="height:42px; vertical-align:top;" />
                                        <button type="submit" class="btn"
                                            style="background-color:#9370DB; width:41px; vertical-align:top; height:42px; margin-top:0px; padding: 8px 12px;"><i
                                                class="fa fa-search"></i></button>
                                    </form>
                                </div>
                                <table border="3px" style="margin-left: 0;">
                                    <tr>
                                        <th style="padding: 20px">Multiplex Name</th>
                                        <th style="padding: 20px">Screen No.</th>
                                        <th style="padding: 20px">Screen Name</th>
                                        <th style="padding: 20px;text-align: center;">Delete</th>
                                        <th style="padding: 20px;text-align: center;">Update</th>
                                    </tr>

                                    @foreach ($datas as $datas)
                                        <tr>
                                            <td style="padding: 20px">{{ $datas->getMultiplex->name }}</td>
                                            <td style="padding: 20px">{{ $datas->screenno }}</td>
                                            <td style="padding: 20px">{{ $datas->screenname }}</td>
                                            <td style="padding: 20px"><a href="{{ url('/deletescreen', $datas->id) }}"
                                                    class = "button delete-confirm"><button data-toggle="modal"
                                                        style="background-color:#dc143c; border-color:blue; color:white ;width: 70px;height: 30px; border-radius: 35px">Delete<button></a>
                                            </td>
                                            <td style="padding: 20px"><a
                                                    href="{{ url('/updatescreen', $datas->id) }}"><button
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
