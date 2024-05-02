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
                                        <h4 class="card-title"><b>Multiplex</b></h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <a style="color:white; margin-top:10px; border-color:#9370DB; text-decoration:none;"
                                                href="{{ url('/adminmultiplexdata') }}"><x-jet-button class="ml-4"
                                                    style="margin-left:0px;">
                                                    {{ __('View') }}
                                                </x-jet-button></a>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ url('/uploadmultiplex') }}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf

                                    <div class="mt-4">
                                        <x-jet-label for="name" value="{{ __('Multipex Name') }}" />
                                        <x-jet-input id="name" class="block mt-1 w-full" type="text"
                                            name="name" :value="old('name')" required autofocus autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="address" value="{{ __('Address') }}" />
                                        <x-jet-input id="address" class="block mt-1 w-full" type="text"
                                            name="address" :value="old('address')" required autofocus autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="contact" value="{{ __('Contact') }}" />
                                        <x-jet-input id="contact" class="block mt-1 w-full" type="text"
                                            name="contact" :value="old('contact')" required autofocus autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="email" value="{{ __('Email') }}" />
                                        <x-jet-input id="email" class="block mt-1 w-full" type="text"
                                            name="email" :value="old('email')" required autofocus autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="totalscreen" value="{{ __('Total Screen') }}" />
                                        <x-jet-input id="totalscreen" class="block mt-1 w-full" type="text"
                                            name="totalscreen" :value="old('totalscreen')" required autofocus
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

</html>
