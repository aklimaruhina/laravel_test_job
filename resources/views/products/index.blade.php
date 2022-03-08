 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Product List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-3 bg-white border-b border-gray-200">
                  <h2 class="font-semibold text-xl text-gray-800 text-center">
                    {{ __('Create New Product') }}
                </h2>
                  <form method="POST" action="{{ route('products.store')}}">
                        
                        @csrf
                        <p class="mb-6">
                        <label class="block w-full">
                        <span class="block text-sm font-medium text-slate-700">Product Name</span>
                        <input type="text" id="name" name="name" class="peer w-full"/>
                        @error('name')
                          <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                          {{ $message }}
                        </p>
                        @enderror

                      </label>
                      </p>
                      
                      <button type="submit" class="p-4 bg-violet-500 hover:bg-violet-400 active:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300">
                        Add Product
                      </button>
                    </form>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(Session::get('message'))
                    <div class="p-3 bg-green-200 mb-6">
                        {{ Session::get('message')}}
                    </div>    
                    @endif
                    <table class="w-full border-r border-b border-collapse border border-slate-400 table-auto">
                      <thead>
                        <tr>
                          <th class="text-left border border-slate-300 px-2 py-1">Product Name</th>
                          <th class="border border-slate-300 px-2 py-1 text-center">Varient</th>
	                      <th class="border border-slate-300 px-2 py-1 text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $pd)
                        <tr>
                          <td class="border border-slate-300 px-2 py-1">{{ $pd->product_name}}</td>
                          <td class="border border-slate-300 px-2 py-1 text-center"><a href="{{ route('add_varients', $pd->id)}}" class="rounded-none p-2 text-white bg-sky-600 hover:bg-sky-700">Add varient</a>
                            <a href="{{ route('show_product', $pd->id)}}" class="rounded-none p-2 text-white bg-sky-600 hover:bg-sky-700">Show varient</a>
                          </td>
                          <td class="border border-slate-300">
                          	<div class="flex">
                            <a href="{{ route('products.edit', $pd->id)}}" class="rounded-none p-2 text-white bg-sky-600 hover:bg-sky-700 mx-2">Edit</a>
                          	
                          	{!! Form::open([
					            'method' => 'DELETE',
					            'route' => ['products.destroy', $pd->id]
					        ]) !!}
					            {!! Form::submit('Delete?', ['class' => 'rounded-none p-2  text-white bg-red-600 hover:bg-red-700']) !!}
					        {!! Form::close() !!}
                </div>
                          </td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
