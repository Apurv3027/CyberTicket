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
                                        <h4 class="card-title"><b>Upcoming Movies</b></h4>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="d-flex justify-content-end align-items-center">
                                            <a style="color:white; margin-top:10px; border-color:#9370DB; text-decoration:none;"
                                                href="{{ url('/adminupcomingmoviesdata') }}"><x-jet-button
                                                    class="ml-4" style="margin-left:0px;">
                                                    {{ __('View') }}
                                                </x-jet-button></a>
                                        </div>
                                    </div>
                                </div>
                                <form action="{{ url('/uploadupcomingmovies') }}" method="POST"
                                    enctype="multipart/form-data">

                                    @csrf

                                    <div class="mt-4">
                                        <x-jet-label for="name" value="{{ __('Movie Name') }}" />
                                        <x-jet-input id="name" class="block mt-1 w-full" type="text"
                                            name="name" :value="old('name')" required autofocus autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="description" value="{{ __('Description') }}" />
                                        <x-jet-input id="description" class="block mt-1 w-full" type="text"
                                            name="description" :value="old('description')" required autofocus
                                            autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="releasedate" value="{{ __('Release Date') }}" />
                                        <x-jet-input id="releasedate" class="block mt-1 w-full" type="date"
                                            name="releasedate" :value="old('releasedate')" required autofocus
                                            autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="genre" value="{{ __('Genre') }}" />
                                        <x-jet-input id="genre" class="block mt-1 w-full" type="text"
                                            name="genre" :value="old('genre')" required autofocus autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="type" value="{{ __('Type') }}" />
                                        <x-jet-input id="type" class="block mt-1 w-full" type="text"
                                            name="type" :value="old('type')" required autofocus autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="trailerlink" value="{{ __('Trailer Link') }}" />
                                        <x-jet-input id="trailerlink" class="block mt-1 w-full" type="text"
                                            name="trailerlink" :value="old('trailerlink')" required autofocus
                                            autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="slug" value="{{ __('Slug') }}" />
                                        <x-jet-input id="slug" class="block mt-1 w-full" type="text"
                                            name="slug" :value="old('slug')" required autofocus autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="cast" value="{{ __('Cast') }}" />
                                        <x-jet-input id="cast" class="block mt-1 w-full" type="text"
                                            name="cast" :value="old('cast')" required autofocus autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="image" value="{{ __('Image') }}" />
                                        <x-jet-input id="image" class="block mt-1 w-full" type="file"
                                            name="image" :value="old('image')" required autofocus autocomplete="off" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="lang" value="{{ __('Languages') }}" />
                                        <x-jet-input id="lang" class="block mt-1 w-full" type="text"
                                            name="lang" :value="old('lang')" required autofocus autocomplete="off" />
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
