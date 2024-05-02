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
                    <div class="col-lg-11 col-md-11 col-sm-11 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-sm-6">
                                    <h4 class="card-title"><b>User Contact</b></h4>
                                </div>
                                <table border="3px" style="margin-left: 0;">
                                    <tr>
                                        <th style="padding: 20px">#</th>
                                        <th style="padding: 20px">User Name</th>
                                        <th style="padding: 20px">User Email</th>
                                        <th style="padding: 20px">Subject</th>
                                        <th style="padding: 20px">Message</th>
                                    </tr>
                                    @if (!empty($userContact))
                                        @foreach ($userContact as $key => $value)
                                            <tr>
                                                <th style="padding: 20px">{{ $key + 1 }}</th>
                                                <td style="padding: 20px">{{ $value['fullname'] }}</td>
                                                <td style="padding: 20px">{{ $value['email'] }}</td>
                                                <td style="padding: 20px">{{ $value['subject'] }}</td>
                                                <td style="padding: 20px">{{ $value['message'] }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="10" class="text-center">No matching records found</td>
                                        </tr>
                                    @endif

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
