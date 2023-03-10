<aside id="default-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800 flex flex-col justify-between">
        <ul class="space-y-2">
            <li>
                <a href="/admin" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white">
                    <img src="{{asset('images/is_logo.png')}}" class="h-8" alt="">
                </a>
            </li>
            <li>
                <a href="/admin/timeline" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fa-solid fa-timeline"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Timeline</span>
                </a>
            </li>
            <li>
                <a href="/admin/calendar" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fa-solid fa-calendar"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Calendar</span>
                </a>
            </li>
            <li>
                <a href="/admin/users" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fa-solid fa-users"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
                    <span class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium rounded-full bg-pink-600 text-white">{{\Illuminate\Support\Facades\DB::table('users')->where('role', 'not like', 'admin')->count()}}</span>
                </a>
            </li>
            <li>
                <a href="/admin/register" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fa-regular fa-handshake"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">New Client</span>
                </a>
            </li>
        </ul>
        <ul class="space-y-2">
            <li>
                <a href="/admin/archive" class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fa-solid fa-box-archive"></i>
                    <span class="flex-1 ml-3 whitespace-nowrap">Archive</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
