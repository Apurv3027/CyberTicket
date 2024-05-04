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
                    <div class="col-lg-7 col-md-7 col-sm-7 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4 class="card-title"><b>User Details</b></h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <a href="#" onclick="window.location.href='{{ route('download.userdata') }}'">
                                                <x-jet-button class="ml-4"><i class="fa fa-download mr-2"></i>User Data</x-jet-button>
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
                                        <th style="padding: 20px;">#</th>
                                        <th style="padding: 20px;">Name</th>
                                        <th style="padding: 20px">Email</th>
                                        <th style="padding: 20px">Phone</th>
                                        <th style="padding: 20px">City</th>
                                        <th style="padding: 20px;text-align: center;">Delete</th>
                                    </tr>

                                    @forelse($data as $index => $data)
                                        <tr>
                                            <td style="padding: 20px">{{ $index }}</td>
                                            <td style="padding: 20px">{{ $data->name }}</td>
                                            <td style="padding: 20px">{{ $data->email }}</td>
                                            <td style="padding: 20px">{{ $data->phone }}</td>
                                            <td style="padding: 20px">{{ $data->city }}</td>
                                            @if ($data->role == '0')
                                                <td style="padding: 20px"><a href="{{ url('/deleteuser', $data->id) }}"
                                                        class = "button delete-confirm"><button data-toggle="modal"
                                                            style="background-color:#dc143c; border-color:blue; color:white ;width: 70px;height: 30px; border-radius: 35px">Delete<button></a>
                                                </td>
                                            @else
                                                <td style="padding: 20px">Not Allowed</td>
                                            @endif
                                        </tr>
                                    @empty
                                        <td style="padding: 20px">
                                            <p class="text-center" style="padding-lef:0px">
                                                <b style="font-size:25px">No Results Found.</b>
                                            </p>
                                        </td>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

    @include('admin.adminscript')

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            const url = $(this).attr('href');
            swal({
                title: 'Are you sure you want to delete this record?',
                text: 'This record and it`s details will be permanently deleted!',
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
</body>

</html>
