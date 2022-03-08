 <x-app-layout>
    <x-slot name="header">
        <div class="flex">
          <h2 class="w-full font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Edit Product') }}
          </h2>
          <div class="min-w-max">
            <a href="{{route('add_varients', $varients->product_id)}}" class="rounded-lg p-4 text-white bg-sky-600 hover:bg-sky-700">Back to Add</a>
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
                      <div class="w-1/2">
                          <div class="p-6 bg-white border-b border-gray-200">
                            <form method="POST" action="{{ route('update_varient', $varients->id)}}">
                                @csrf
                                <p class="mb-6">
                                <label class="block w-full">
                                <span class="block text-sm font-medium text-slate-700">Quantity</span>
                                <input type="number" id="quantity" name="quantity" value="{{ $varients->stock}}" class="peer w-full"/>
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
                                <input type="text" id="price" name="price" value="{{ $varients->price }}" class="peer w-full"/>
                                @error('price')
                                  <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                                  {{ $message }}
                                </p>
                                @enderror
                              </label>
                              </p>
                              @php $data = json_decode($varients->details, true); @endphp
                              @foreach($attrib_product as $attr)
                              <p class="mb-6">
                              <label class="block w-full">
                                <span class="block text-sm font-medium text-slate-700">{{$attr->attributes->name}}</span>
                                <select name="attr_val[{{$attr->attributes->name}}]">
                                  <option>Select {{ $attr->attributes->name }}</option>
                                  @foreach($attr->attributes->values as $val)

                                  <option {{ (($data[$attr->attributes->name] == $val->name) ? 'selected' : '')}}>{{ $val->name }}</option>
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
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
