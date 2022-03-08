 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attribute List') }}
        </h2>
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
                    <table class="w-full border-r border-b border-collapse border border-slate-400 table-auto">
                      <thead>
                        <tr>
                          <th class="text-left border border-slate-300 px-2 py-1">Name</th>
                          <th class="text-left border border-slate-300 px-2 py-1 text-center">Details</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($attrib as $attr)
                        <tr>
                          <td class="border border-slate-300 px-2 py-1">{{ $attr->name}}</td>
                          <td class="border border-slate-300 text-center">
                             <a href="{{ route('add_attrb_val', $attr->id)}}" class="rounded-none p-2 text-white bg-sky-600 hover:bg-sky-700">Add/View</a>

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
