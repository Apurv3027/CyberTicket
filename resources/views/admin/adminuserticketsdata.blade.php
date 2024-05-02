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
                    <div class="col-lg-9 col-md-9 col-sm-9 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"><b>Movies Tickets</b></h4>
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
                                        <th style="padding: 20px;">User Name</th>
                                        <th style="padding: 20px;">Show Name</th>
                                        <th style="padding: 20px;">Seats</th>
                                        <th style="padding: 20px;">Booking Date</th>
                                        <th style="padding: 20px;">Amount</th>
                                        <th style="padding: 20px;">Transaction</th>
                                    </tr>
                                    @if (!empty($userTickets))
                                        @foreach ($userTickets as $key => $value)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $value['user_name'] }}</td>
                                                <td>{{ $value['movie_name'] }}</td>
                                                <td>{{ $value['totalseats'] }}</td>
                                                <td>{{ $value['bookingdate'] }}</td>
                                                <td>Rs. {{ $value['totalpay'] }}</td>
                                                <td>{{ $value['Completed'] }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7" class="text-center">No matching records found</td>
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

</html>
