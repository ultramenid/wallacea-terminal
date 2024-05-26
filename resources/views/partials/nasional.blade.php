<!-- nasional -->
<div class="border-b border-t border-kuning py-2 flex justify-center gap-12 font-light ">
    <a class="{{ ($nasional == 'Internasional') ? 'font-bold' : null ; }}" href="{{ route('internasionalnews', [app()->getLocale()]) }}">Internasional</a>
    <a class="{{ ($nasional == 'Nasional') ? 'font-bold' : null ; }}" href="{{ route('nasionalnews', [app()->getLocale()]) }}" >Nasional</a>
</div>
