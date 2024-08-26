<x-app-layout>
    <form action="/{{$user->username}}/update" method="POST" enctype="multipart/form-data" >
    @csrf
    @method("PATCH")
    <div class="space-y-12 my-2">
        {{-- Start Top --}}
        <div class="pb-12 card p-10">
            <h2 class="text-base font-semibold leading-7 text-gray-900">{{__('Profile')}}</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">{{__('This information will be displayed publicly so be careful what you share.')}}</p>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="col-span-full md:flex flex-row gap-x-2">
                <div class="my-2 flex gap-x-3 ">
                    <img src="{{$user->image_profile($user->image)}}" alt="{{$user->username}}" class="h-36 w-36 rounded-full text-gray-300 mx-auto" >
                </div>
                <div class="flex-1 flex items-center">
                    <input class="w-full border border-gray-200 bg-gray-50 block focus:outline-none rounded-xl" type="file" name="image" id="image" >
                </div>
            </div>
            <div class="sm:col-span-4">
                <label for="username" class="block text-sm font-medium leading-6 text-gray-900">{{__('Username')}}</label>
                <div class="mt-2">
                <div class="flex rounded-md shadow-sm sm:max-w-md">
                    <input type="text" name="username" id="username" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6" value="{{$user->username}}">
                    {{-- block flex-1  bg-transparent py-1.5 pl-1focus:ring-0 sm:text-sm --}}
                </div>
                </div>
                @error('username')
                <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                @enderror
            </div>
            <div class="col-span-full">
                <label for="bio" class="block text-sm font-medium leading-6 text-gray-900">{{__('bio')}}</label>
                <div class="mt-2">
                <textarea id="bio" name="bio" rows="3" class="block resize-none  focus:border-lime-600 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-700 sm:text-sm sm:leading-6">{{$user->bio}}</textarea>
                </div>
                <p class="mt-3 text-sm leading-6 text-gray-600">{{__('Write a few sentences about yourself.')}}</p>
                    @error('bio')
                <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                @enderror
            </div>
            </div>
            <div class="relative mt-4 col-span-full">
                <div class="">
                <p class="mt-3 text-sm  mb-2">{{__("Lang")}}</p>
                <input class="h-4 w-4 rounded border-gray-300 text-lime-600 focus:ring-lime-600" type="radio" id="ar" name="lang" value="ar" {{$user->lang == "ar" ? 'checked' : ''}}>
                <label for="ar" class="mx-2 font-medium text-gray-900">{{__('ar')}}</label><br>
                <input class="h-4 w-4 rounded border-gray-300 text-lime-600 focus:ring-lime-600" type="radio" id="en" name="lang" value="en" {{$user->lang == "en" ? 'checked' : ''}}>
                <label for="en" class="mx-2 font-medium text-gray-900">{{__('en')}}</label>
                </div>
            </div>
            <div class="relative flex items-center justify-between gap-x-3 col-span-full mt-4">
                <div class="flex h-6 items-center">
                <label for="privavte" class="mx-2 font-medium text-gray-900">{{__('Privat Account')}}</label>
                <input id="privavte_account" name="privavte_account" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-lime-600 focus:ring-lime-600" {{$user->privavte_account ? 'checked' : ''}}>                </div>
                <div class="text-end">
                <x-primary-button class="mt-4">{{__("Save")}}</x-primary-button>
                </div>
            </div>
        </div>
        {{-- End Top --}}
        {{-- Start Bottom --}}
        <div class="pb-12 card p-10">
            <h2 class="text-base font-semibold leading-7 text-gray-900">{{__('Personal Information')}}</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">{{__('Use a permanent address where you can receive mail.')}}</p>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="col-span-full">
                    <label for="name" class="block text-sm font-medium leading-6 text-gray-900">{{__('Username')}}</label>
                    <div class="mt-2 flex rounded-md shadow-sm sm:max-w-md">
                    <input type="text" name="name" id="name" value="{{$user->name}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('name')
                    <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-span-full">
                    <label for="email" class="block text-sm font-medium leading-6 text-gray-900">{{__('Email adders')}}</label>
                    <div class="mt-2 flex rounded-md shadow-sm sm:max-w-md">
                    <input type="email" name="email" id="email" value="{{$user->email}}" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('email')
                    <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-span-full">
                    <label for="password" class="block text-sm font-medium leading-6 text-gray-900">{{__('Password')}}</label>
                    <div class="mt-2 flex rounded-md shadow-sm sm:max-w-md">
                    <input type="password" name="password" id="password" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                    </div>
                    @error('password')
                    <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
                <div class="col-span-full">
                    <label for="password_confirmation" class="block text-sm font-medium leading-6 text-gray-900">{{__('Password Confirmation')}}</label>
                    <div class="mt-2 flex rounded-md shadow-sm sm:max-w-md">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-lime-600 sm:text-sm sm:leading-6">
                    </div>
                        @error('password_confirmation')
                    <div class="mt-2 text-sm text-red-600">{{$message}}</div>
                    @enderror
                </div>
            </div>
            <div class="text-end">
            <x-primary-button class="mt-4">{{__("Save")}}</x-primary-button>
            </div>
        </div>
        {{-- End Bottom --}}
    </div>
    </form>
</x-app-layout>
