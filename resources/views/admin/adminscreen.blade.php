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
                                        <h4 class="card-title"><b>Screen</b></h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <a style="color:white; margin-top:10px; border-color:#9370DB; text-decoration:none;"
                                                href="{{ url('/adminscreendata') }}"><x-jet-button class="ml-4"
                                                    style="margin-left:0px;">
                                                    {{ __('View') }}
                                                </x-jet-button></a>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ url('/uploadscreen') }}" method="POST" enctype="multipart/form-data">

                                    @csrf

                                    <div class="mt-4">
                                        <x-jet-label for="screenno" value="{{ __('Screen No.') }}" />
                                        <x-jet-input id="screenno" class="block mt-1 w-full" type="text"
                                            name="screenno" :value="old('screenno')" required autofocus autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="screenname" value="{{ __('Screen Name') }}" />
                                        <x-jet-input id="screenname" class="block mt-1 w-full" type="text"
                                            name="screenname" :value="old('screenname')" required autofocus autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="multiplexid" value="{{ __('Multiplex Name') }}" />
                                        <select name="multiplexid"
                                            class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"
                                            class="form-control" required autofocus autocomplete="off">
                                            @foreach ($datam as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                            @endforeach
                                        </select>
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

</html>
