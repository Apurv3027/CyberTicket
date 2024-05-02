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
                    <div class="col-lg-11 col-md-11 col-sm-11 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <h4 class="card-title"><b>Movie Shows</b></h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <a style="color:white; margin-top:10px; border-color:#9370DB; text-decoration:none;"
                                                href="{{ url('/adminmovieshowdata') }}"><x-jet-button class="ml-4"
                                                    style="margin-left:0px;">
                                                    {{ __('View') }}
                                                </x-jet-button></a>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ url('/uploadmovieshow') }}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf

                                    <div class="mt-4">
                                        <x-jet-label for="movieid" value="{{ __('Movie Name') }}" />
                                        <select name="movieid" id="movieid"
                                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                            class="form-control" required autofocus autocomplete="off">
                                            <option value=""></option>
                                            @foreach ($datamo as $data)
                                                <option value="{{ $data->id }}">{{ $data->moviename }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="multiplexid" value="{{ __('Multiplex Name') }}" />
                                        <select name="multiplexid" id="multiplexid"
                                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                            class="form-control" required autofocus autocomplete="off">
                                            <option value=""></option>
                                            @foreach ($datam as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="screenid" value="{{ __('Screen Name') }}" />
                                        <select name="screenid" id="screenid"
                                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                            class="form-control" required autofocus autocomplete="off">
                                            <option value=""></option>
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="showdate" value="{{ __('Show Date') }}" />
                                        <x-jet-input id="showdate" class="block mt-1 w-full" type="date"
                                            name="showdate" :value="old('showdate')" required autofocus autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="showtime" value="{{ __('Show Time') }}" />
                                        <x-jet-input id="showtime" class="block mt-1 w-full" type="time"
                                            name="showtime" :value="old('showtime')" required autofocus autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="showtype" value="{{ __('Show Type') }}" />
                                        <select name="showtype"
                                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                            class="form-control" required autofocus autocomplete="off">
                                            <option value="2D">2D</option>
                                            <option value="3D">3D</option>
                                            <option value="4DX">4DX</option>
                                        </select>
                                    </div>


                                    <div class="mt-4">
                                        <x-jet-label for="showlang" value="{{ __('Show Language') }}" />
                                        <x-jet-input id="showlang" class="block mt-1 w-full" type="text"
                                            name="showlang" :value="old('showlang')" required autofocus autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="normalprice" value="{{ __('Normal Price') }}" />
                                        <x-jet-input id="normalprice" class="block mt-1 w-full" type="text"
                                            name="normalprice" :value="old('normalprice')" required autofocus
                                            autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="executiveprice" value="{{ __('Executive Price') }}" />
                                        <x-jet-input id="executiveprice" class="block mt-1 w-full" type="text"
                                            name="executiveprice" :value="old('executiveprice')" required autofocus
                                            autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="premiumprice" value="{{ __('Premium Price') }}" />
                                        <x-jet-input id="premiumprice" class="block mt-1 w-full" type="text"
                                            name="premiumprice" :value="old('premiumprice')" required autofocus
                                            autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="totalseats" value="{{ __('Total Seats') }}" />
                                        <x-jet-input id="totalseats" class="block mt-1 w-full" type="text"
                                            name="totalseats" :value="old('totalseats')" required autofocus
                                            autocomplete="off" />
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <x-jet-button class="ml-4">
                                            {{ __('Save') }}
                                        </x-jet-button>
                                    </div>


                                    <div padding-bottom="10px">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
    @include('admin.adminscript')
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    jQuery(document).ready(function() {
        jQuery('#multiplexid').change(function() {
            let multiplexid = jQuery(this).val();
            jQuery.ajax({
                url: '/getmultiplex',
                type: 'post',
                data: 'multiplexid=' + multiplexid + '&_token={{ csrf_token() }}',
                success: function(result) {
                    jQuery('#screenid').html(result)
                }
            });
        });
    });
</script>

</html>
