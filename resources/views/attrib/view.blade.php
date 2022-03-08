 <x-app-layout>
    <x-slot name="header">
        <div class="flex">
          <h2 class="w-full font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Variations') }}
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
                    <h4 class="font-semibold text-xl py-2 text-center">{{ $product->product_name }} details</h4>
                    @if(Session::get('message'))
                    <div class="p-3 bg-green-200 mb-6">
                        {{ Session::get('message')}}
                    </div>    
                    @endif
                    @if(count($product->varients) > 0)
                    <table class="w-full border-r border-b border-collapse border border-slate-400 table-auto">
                      <thead>
                        <tr>
                          @foreach($attrib_product as $title)
                          <th class="text-left border border-slate-300 px-2 py-1">{{ $title->attributes->name }}</th>
                          @endforeach
                          <th class="text-left border border-slate-300 px-2 py-1 text-center">Price</th>
                          <th class="text-center border border-slate-300 px-2 py-1 text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        @foreach($product->varients as $varient)
                        <tr>
                        @php
                        $data = json_decode($varient->details);
                        
                        @endphp
                        @foreach($data as $k => $v)
                        <td class="border border-slate-300 px-2 py-1">{{ucfirst($v)}}</td>
                        @endforeach
                        <td class="border border-slate-300 px-2 py-1 text-center">{{ $varient->price}}</td>
                        <td class="border border-slate-300 px-2 py-1 text-center"><a href="{{ route('edit_varient', $varient->id)}}" class="rounded-none p-2 text-white bg-sky-600 hover:bg-sky-700">Edit</a></td>
                        </tr>
                        @endforeach

                        
                      </tbody>
                    </table>
                    @else
                    <p>No Variations available</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
