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
        <form action="{{url('/updatemp',$data->id)}}" method="POST" enctype="multipart/form-data" >

        @csrf
            <div>
                <b><center>Multiplex</center></b>
            </div>

            <div class="mt-4">
                <x-jet-label for="name" value="{{ __('Multipex Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$data->name}}" required autofocus autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="address" value="{{ __('Address') }}" />
                <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" value="{{$data->address}}" required autofocus autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="contact" value="{{ __('Contact') }}" />
                <x-jet-input id="contact" class="block mt-1 w-full" type="text" name="contact" value="{{$data->contact}}" required autofocus autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="text" name="email" value="{{$data->email}}" required autofocus autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="totalscreen" value="{{ __('Total Screen') }}" />
                <x-jet-input id="totalscreen" class="block mt-1 w-full" type="text" name="totalscreen" value="{{$data->totalscreen}}" required autofocus autocomplete="off"/>
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