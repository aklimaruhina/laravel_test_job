<x-app-layout>
    <x-slot name="header">
    <div class="flex">
        <h2 class="w-full font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Users') }}
        </h2>
        <div class="min-w-max">
          <a href="{{route('users.index')}}" class="rounded-lg p-4 text-white bg-sky-600 hover:bg-sky-700">Back</a>
        </div>
        </div>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <form method="POST" action="{{route('users.update', $user->id)}}">
                @method('PUT')
                @csrf
                <p class="mb-6">
                <label class="block w-full">
                <span class="block text-sm font-medium text-slate-700">Name</span>
                <input type="text" id="name" name="name" value="{{ $user->name }}" class="peer w-full"/>
                @error('name')
                  <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                  {{ $message }}
                </p>
                @enderror

              </label>
              </p>
              <p class="mb-6">
              <label class="block w-full">
                <span class="block text-sm font-medium text-slate-700">DOB</span>
                <input type="date" id="dob" name="dob" value="{{ $user->dob }}" class="peer w-full"/>
                @error('dob')
                  <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                  {{ $message }}
                </p>
                @enderror

              </label>
              </p>
              <p class="mb-6">
              <label class="block w-full">
                <span class="block text-sm font-medium text-slate-700">Country</span>
                <input type="text" id="country" name="country" value="{{ $user->country }}" class="peer w-full"/>
                @error('country')
                  <p class="mt-2 invisible peer-invalid:visible text-pink-600 text-sm">
                  {{ $message }}
                </p>
                @enderror

              </label>
              </p>
              <p class="mb-6">
              <label class="block w-full">
                <span class="block text-sm font-medium text-slate-700">City</span>
                <input type="text" id="city" name="city" value="{{ $user->city }}" class="peer w-full"/>
                @error('city')
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
        </div>
      </div>
    </div>
</x-app-layout>
