<!-- nasional -->
<div class="border-b border-t border-kuning py-2 flex justify-center gap-12 font-light ">
    @if ($category)
        @foreach ($categories as $item)
            <a class="{{ ($category == $item->category) ? 'font-bold' : null ; }}" href="{{ route('categoryriset', [app()->getLocale(), $item->category]) }}">{{$item->category}}</a>
        @endforeach
    @else
        <a href="{{ route('categoryriset', [app()->getLocale(), 'Artikel Ilmiah']) }}">Artikel Ilmiah</a>
        <a href="{{ route('categoryriset', [app()->getLocale(), 'Jurnal Penelitian']) }}">Jurnal Penelitian</a>
    @endif

</div>
