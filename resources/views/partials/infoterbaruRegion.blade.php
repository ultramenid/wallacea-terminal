<!-- info terbaru? -->
<div class="bg-biru-wallacea py-1 text-center sm:border-none border-b border-gray-50 sticky top-0 z-50">
    <div class="max-w-6xl mx-auto justify-end flex sm:px-0 px-4">
        <div class="text-gray-300  py-1 bg-landy text-sm rounded-b flex space-x-4">
            <a href="{{ route(Route::currentRouteName(), ['en',$region ]) }}" class=" @if(App::getLocale() == 'en') text-kuning-wallacea @endif  ">English</a>
            <a href="{{ route(Route::currentRouteName(), ['id',$region]) }}" class="@if(App::getLocale() == 'id') text-kuning-wallacea @endif">Indonesia</a>
        </div>
    </div>

</div>
