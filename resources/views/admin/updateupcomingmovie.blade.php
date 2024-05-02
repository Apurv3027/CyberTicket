<x-app-layout>

</x-app-layout>

<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public" >
    @include("admin.admincss")

    
  </head>
  <body>
    <div class="container-scroller">


        @include("admin.navbar")
        
        <div style="width:100%">
        <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-4" style="position: relative; padding-bottom: 30px; " >

        <form action="{{url('/updateup',$data->id)}}" method="POST" enctype="multipart/form-data" >

        @csrf
            <div>
                <b><center>Upcoming Movies</center></b>
            </div>

            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Movie Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$data->moviename}}" required autofocus autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="description" value="{{ __('Description') }}" />
                <x-jet-input id="description" class="block mt-1 w-full" type="text" name="description" value="{{$data->description}}" required autofocus autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="releasedate" value="{{ __('Release Date') }}" />
                <x-jet-input id="releasedate" class="block mt-1 w-full" type="date" name="releasedate" value="{{$data->releasedate}}" required autofocus autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="genre" value="{{ __('Genre') }}" />
                <x-jet-input id="genre" class="block mt-1 w-full" type="text" name="genre" value="{{$data->genre}}" required autofocus autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="type" value="{{ __('Type') }}" />
                <x-jet-input id="type" class="block mt-1 w-full" type="text" name="type" value="{{$data->type}}" required autofocus autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="trailerlink" value="{{ __('Trailer Link') }}" />
                <x-jet-input id="trailerlink" class="block mt-1 w-full" type="text" name="trailerlink" value="{{$data->trailerlink}}" required autofocus autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="slug" value="{{ __('Slug') }}" />
                <x-jet-input id="slug" class="block mt-1 w-full" type="text" name="slug" value="{{$data->slug}}" required autofocus autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="cast" value="{{ __('Cast') }}" />
                <x-jet-input id="cast" class="block mt-1 w-full" type="text" name="cast" value="{{$data->cast}}" required autofocus autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="image" value="{{ __('Old Image') }}" />
                <img height="200" width="200" src="/moviesimage/{{$data->image}}"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="image" value="{{ __('New Image') }}" />
                <x-jet-input id="image" class="block mt-1 w-full" type="file" name="image" value="{{$data->image}}" required autofocus autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="lang" value="{{ __('Languages') }}" />
                <x-jet-input id="lang" class="block mt-1 w-full" type="text" name="lang" value="{{$data->lang}}" required autofocus autocomplete="off"/>
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
    @include("admin.adminscript")
  </body>
</html>