 <x-app-layout>
    <x-slot name="header">
        <div class="flex">
          <h2 class="w-full font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Edit Product') }}
          </h2>
          <div class="min-w-max">
            <a href="{{route('add_varients', $product->id)}}" class="rounded-lg p-4 text-white bg-sky-600 hover:bg-sky-700">Back to Add</a>
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
                    <div class="flex flex-row">
                      <div class="w-1/2 mx-3">
                        <form method="POST" action="{{ route('products.update', $product->id )}}">
                        @method('PUT')
                        @csrf
                        <p class="mb-6">
                        <label class="block w-full">
                        <span class="block text-sm font-medium text-slate-700">Product Name</span>
                        <input type="text" id="name" name="name" value="{{ $product->product_name }}" class="peer w-full"/>
                        @error('name')
                          <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                          {{ $message }}
                        </p>
                        @enderror

                      </label>
                      </p>
                      
                      <button type="submit" class="p-4 bg-violet-500 hover:bg-violet-400 active:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300">
                        Update changes
                      </button>
                    </form>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
