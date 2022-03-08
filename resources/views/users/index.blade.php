 <x-app-layout>
    <x-slot name="header">
        <div class="flex">
          <h2 class="w-full font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Users List') }}
          </h2>
          <div class="min-w-max">
            <a href="{{route('users.create')}}" class="rounded-lg p-4 text-white bg-sky-600 hover:bg-sky-700">Add User</a>
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
                    <table class="w-full border-r border-b border-collapse border border-slate-400 table-auto">
                      <thead>
                        <tr>
                          <th class="text-left border border-slate-300 px-2 py-1">Name</th>
                          <th class="border border-slate-300 px-2 py-1 text-left">Email</th>
                          <th class="border border-slate-300 px-2 py-1 text-center">Dob</th>
	                      <th class="border border-slate-300 px-2 py-1 text-center">City</th>
	                      <th class="border border-slate-300 px-2 py-1 text-center">Country</th>
	                      <th class="border border-slate-300 px-2 py-1 text-center">Status</th>
                          <th class="border border-slate-300 px-2 py-1 text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                          <td class="border border-slate-300 px-2 py-1">{{ $user->name}}</td>
                          <td class="border border-slate-300 px-2 py-1">{{ $user->email}}</td>
                          <td class="border border-slate-300 px-2 py-1 text-center">{{ $user->dob}}</td>
                          <td class="border border-slate-300 px-2 py-1 text-center">{{ $user->city}}</td>
                          <td class="border border-slate-300 px-2 py-1 text-center">{{ $user->country}}</td>
                          <td class="border border-slate-300 px-2 py-1 text-center">
                            <form action="{{route('user-enable-disable', $user->id)}}" method="POST" class="inline-block"> @csrf
                                <button type="submit">{{$user->status == 1 ? 'Enable' : 'Disable'}}</button>
                            </form>
                          </td>
                          <td class="border border-slate-300">
                            <div class="flex">
                          	<a href="{{ route('users.edit', $user->id)}}" class="rounded-none p-2 text-white bg-sky-600 hover:bg-sky-700">Edit</a>
                          	
                          	{!! Form::open([
					            'method' => 'DELETE',
					            'route' => ['users.destroy', $user->id]
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
