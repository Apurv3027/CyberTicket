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
        <form action="{{url('/updatesc',$data->id)}}" method="POST" enctype="multipart/form-data" >

        @csrf
            <div>
                <b><center>Screen</center></b>
            </div>

            <div class="mt-4">
                <x-jet-label for="screenno" value="{{ __('Screen No.') }}" />
                <x-jet-input id="screenno" class="block mt-1 w-full" type="text" name="screenno" value="{{$data->screenno}}" required autofocus autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="screenname" value="{{ __('Screen Name') }}" />
                <x-jet-input id="screenname" class="block mt-1 w-full" type="text" name="screenname" value="{{$data->screenname}}" required autofocus autocomplete="off"/>
            </div>

            <div class="mt-4">
                <x-jet-label for="multiplexid" value="{{ __('Multiplex Name') }}" />           
                <select name="multiplexid"  class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full" class="form-control" required autofocus autocomplete="off" >
                    @foreach($datam as $data)
                        <option value="{{ $data->id}}">{{ $data->name }}</option>
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
    @include("admin.adminscript")
  </body>
</html>