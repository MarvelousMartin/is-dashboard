<!DOCTYPE html>
@include('partials.globals')
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
            @if($user->role !== \App\Enums\Role::ADMIN->value)
                <div class="block max-w rounded-lg shadow bg-gray-800 mb-4">
                    <div class="flex gap-x-4">
                        @if($user->step === \App\Enums\ClientStep::REGISTERED->value)
                            <div class="my-auto pl-4">
                                <button data-tooltip-target="tooltip" data-tooltip-placement="left" data-tooltip-style="light"><i class="fa-solid fa-circle-exclamation my-auto text-yellow-500"></i></button>
                                <div id="tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700" style="z-index: 999">
                                    User is {{\App\Enums\ClientStep::REGISTERED->value}}, needs to be <strong>Verified</strong>.
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        @endif
                        <div class="w-full p-5 border-l">
                            <div class="flex justify-between">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$user->name}}</h5>
                                <div class="flex">
                                    @if($user->step === \App\Enums\ClientStep::REGISTERED->value)
                                        <a href="{{url()->current()}}/verify?id={{$user->id}}"><button type="button" class="text-white bg-green-700 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"><i class="fa-solid fa-check"></i> Verify client</button></a>
                                    @else
                                        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"><i class="fa-solid fa-pen-to-square"></i> Edit</button>
                                        <button type="button" class="text-white bg-pink-600 hover:bg-pink-700 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"><i class="fa-solid fa-timeline"></i> Change step</button>
                                        @if($user->step === \App\Enums\ClientStep::DELIVERY->value)
                                            <button type="button" class="text-white bg-red-700 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2"><i class="fa-solid fa-boxes-packing"></i></button>
                                        @endif
                                        <button type="button" class="text-white bg-sky-700 hover:bg-sky-800 font-medium rounded-lg text-sm px-5 py-2.5 ml-5 mb-2"><i class="fa-solid fa-comment"></i></button>
                                    @endif
                                </div>
                            </div>
                            <div class="flex justify-between">
                                <div class="flex gap-x-4">
                                    <p class="font-normal text-white"><i class="fa-regular fa-envelope"></i> <a href="mailto:{{$user->email}}" class="hover:underline">{{$user->email}}</a></p>
                                    <p class="font-normal text-white"><i class="fa-solid fa-mobile-screen"></i> <a href="tel:{{$user->telephone}}" class="hover:underline">{{$user->telephone}}</a></p>
                                    <p class="font-normal text-white"><i class="fa-solid fa-map-location-dot"></i> {{$user->address}}</p>
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
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.3/flowbite.min.js"></script>
</body>
</html>
