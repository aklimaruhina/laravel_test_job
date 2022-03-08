<x-app-layout>
    <x-slot name="header">
    <div class="flex">
        <h2 class="w-full font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Attribute Value') }}
        </h2>
        <div class="min-w-max">
          <a href="{{route('attributes.index')}}" class="rounded-lg p-4 text-white bg-sky-600 hover:bg-sky-700">Back</a>
        </div>
        </div>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">

            <form method="POST" action="{{ route('store_attrb_val', request()->route('id')) }}">
                
                @csrf
                <p class="mb-6">
                <label class="block w-full">
                <span class="block text-sm font-medium text-slate-700">Name</span>
                <input type="text" id="name" name="name" class="peer w-full"/>
                @error('name')
                  <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                  {{ $message }}
                </p>
                @enderror

              </label>
              </p>
              
              <button type="submit" class="p-4 bg-violet-500 hover:bg-violet-400 active:bg-violet-600 focus:outline-none focus:ring focus:ring-violet-300">
                Save changes
              </button>
            </form>
              
          </div>
          <div class="p-6 bg-white border-b border-gray-200">
            <table class="w-full border-r border-b border-collapse border border-slate-400 table-auto">
                      <thead>
                        <tr>
                          <th class="text-left border border-slate-300 px-2 py-1">Name</th>
                          <th class="text-left border border-slate-300 px-2 py-1">Parent</th>
                          <th class="border border-slate-300 px-2 py-1 text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($attrib as $attr)
                        <tr>
                          <td class="border border-slate-300 px-2 py-1">{{ $attr->name}}</td>
                          <td class="border border-slate-300 px-2 py-1">{{ $attr->parents->name}}</td>
                        </tr>
                        @endforeach
                          
                      </tbody>
                    </table>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
