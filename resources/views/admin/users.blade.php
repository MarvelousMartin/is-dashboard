<!DOCTYPE html>
<html lang="en">

@include('partials.head')

<body>

<button data-drawer-target="default-sidebar" data-drawer-toggle="default-sidebar" aria-controls="default-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
</button>

@include('admin.partials.sidebar')

<div class="p-4 sm:ml-64">
    <div class="p-4">
        @foreach($users as $user)
            <div class="block max-w mb-4 p-6 rounded-lg shadow bg-gray-800">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$user->name}}</h5>
                <div class="flex justify-between">
                    <div class="flex gap-x-4">
                        <p class="font-normal text-white"><i class="fa-regular fa-envelope"></i> <a href="mailto:{{$user->email}}" class="hover:underline">{{$user->email}}</a></p>
                        <p class="font-normal text-white"><i class="fa-solid fa-mobile-screen"></i> <a href="tel:{{$user->telephone}}" class="hover:underline">{{$user->telephone}}</a></p>
                        <p class="font-normal text-white"><i class="fa-regular fa-address-book"></i> {{$user->address}}, {{$user->country}}</p>
                    </div>
                    <div class="flex gap-x-4 justify-end">
                        @if(empty($user->role))
                            <p class="font-bold text-white"><i class="fa-solid fa-certificate"></i>
                            <form method="post" action="/!/update-user-role">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <select id="roles" name="role">
                                    @foreach(\App\Enums\Role::cases() as $case)
                                        <option value="{{$case->value}}">{{$case->value}}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                            </form>
                            </p>
                        @else
                            <p class="font-bold text-white"><i class="fa-solid fa-certificate"></i> {{$user->role}}</p>
                        @endif
                        <p class="font-bold text-white"><i class="fa-solid fa-timeline"></i> {{$user->step}}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>
</html>
