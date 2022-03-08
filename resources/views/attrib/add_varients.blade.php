<x-app-layout>
    <x-slot name="header">
    <div class="flex">
        <h2 class="w-full font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Varients') }}
        </h2>
        <div class="min-w-max">
          <a href="{{route('products.index')}}" class="rounded-lg p-4 text-white bg-sky-600 hover:bg-sky-700">Back</a>
        </div>
        </div>
        
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            @if(Session::get('message'))
                    <div class="p-3 bg-green-200 mb-6">
                        {{ Session::get('message')}}
                    </div>    
                    @endif
            <form method="POST" action="{{ route('store_attribute', request()->route('id') )}}">
                @csrf
                <p class="mb-6">
              <label class="block w-full">
                <span class="block text-sm font-medium text-slate-700">Select Attribute</span>
                <select class="peer w-full" name="attribute_id">
                  <option>Select attribute</option>
                  @foreach($attrib as $attb)
                  <option value="{{ $attb->id }}">{{ $attb->name }}</option>
                  @endforeach
                </select>
              </label>
              </p>
              <button type="submit" class="p-4 bg-violet-500 hover:bg-violet-400 active:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300">
                Save changes
              </button>
            </form>
              
          </div>
          @if(count($attrib_product) > 0)
          <div class="p-6 bg-white border-b border-gray-200">
            <form method="POST" action="{{ route('store_varients', request()->route('id'))}}">
                
                @csrf
                <p class="mb-6">
                <label class="block w-full">
                <span class="block text-sm font-medium text-slate-700">Quantity</span>
                <input type="number" id="quantity" name="quantity" class="peer w-full"/>
                @error('quantity')
                  <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                  {{ $message }}
                </p>
                @enderror

              </label>
              </p>
              <p class="mb-6">
              <label class="block w-full">
                <span class="block text-sm font-medium text-slate-700">Price</span>
                <input type="text" id="price" name="price" class="peer w-full"/>
                @error('price')
                  <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                  {{ $message }}
                </p>
                @enderror
              </label>
              </p>
              @foreach($attrib_product as $attr)
              <p class="mb-6">
              <label class="block w-full">
                <span class="block text-sm font-medium text-slate-700">{{$attr->attributes->name}}</span>
                <select name="attr_val[{{$attr->attributes->name}}]">
                  <option>Select {{ $attr->attributes->name }}</option>
                  @foreach($attr->attributes->values as $val)
                  <option>{{ $val->name }}</option>
                  @endforeach
                </select>
              </label>
              </p>
              @endforeach
              <button type="submit" class="p-4 bg-violet-500 hover:bg-violet-400 active:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300">
                Save changes
              </button>
            </form>
              
          </div>
          @endif

        </div>
      </div>
    </div>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $('.attbid').on('change', function(e){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var val = e.target.value;
        $.ajax({
            type: 'GET',
            dataType: "json",
            url : '/attribute_id/'+val,
            success:function(data){
            // $('table tbody').empty(); 
            // for (var i = 0; i < data.length; i++){
            //   }
            $('.attribute_val').empty();
            $.each(data, function(upload_form, attrib_val){
                
                $('.attribute_val').append('<option value="'+ attrib_val.id +'">'+ attrib_val.name +'</option>');
            });


            },
            timeout:10000
        });
            //success data
      })
    })
    </script>
</x-app-layout>

