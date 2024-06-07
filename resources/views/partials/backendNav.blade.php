<div class="border-b border-gray-300 bg-gray-100 dark:bg-newgray-900 bg-opacity-90 dark:border-opacity-20  z-10 ">
    <div class="max-w-6xl mx-auto px-6 "  x-data="{ pages: false }">
        <nav class="-mb-px flex space-x-4 text-sm leading-5 overflow-x-auto scrollbar-hide text-gray-500">
            <div class="hover:bg-gray-200 dark:hover:bg-newgray-700 py-3 px-2 rounded @if($nav == 'dashboard' )border-b-2  dark:border-gray-300 border-newgray-900 @endif ">
                <a href="{{url('/cms/dashboard')}}" class=" px-0.5  @if($nav == 'dashboard' )   text-newgray-900 dark:text-gray-300 @endif   hover:text-newgray-900 dark:hover:text-gray-300 cursor-pointer" >Dashboard</a>
            </div>

            <div class="hover:bg-gray-200 dark:hover:bg-newgray-700 py-3 px-2 rounded @if($nav == 'news' )border-b-2  dark:border-gray-300 border-newgray-900 @endif ">
                <a href="{{url('/cms/listnews')}}" class=" px-0.5  @if($nav == 'news' )   text-newgray-900 dark:text-gray-300 @endif   hover:text-newgray-900 dark:hover:text-gray-300 cursor-pointer" >News</a>
            </div>
            @if(session('role_id') == 0)
            <div class="hover:bg-gray-200 dark:hover:bg-newgray-700 py-3 px-2 rounded @if($nav == 'riset' )border-b-2  dark:border-gray-300 border-newgray-900 @endif ">
                <a href="{{url('/cms/listrisets')}}" class=" px-0.5  @if($nav == 'riset' )   text-newgray-900 dark:text-gray-300 @endif   hover:text-newgray-900 dark:hover:text-gray-300 cursor-pointer" >Riset</a>
            </div>
            @endif
            <div class="hover:bg-gray-200 dark:hover:bg-newgray-700 py-3 px-2 rounded @if($nav == 'aksi' )border-b-2  dark:border-gray-300 border-newgray-900 @endif ">
                <a href="{{url('/cms/listaksi')}}" class=" px-0.5  @if($nav == 'aksi' )   text-newgray-900 dark:text-gray-300 @endif   hover:text-newgray-900 dark:hover:text-gray-300 cursor-pointer" >Aksi</a>
            </div>



        </nav>
    </div>
</div>
