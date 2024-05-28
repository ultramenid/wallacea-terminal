<div>
    <div class="flex flex-wrap justify-between mt-6">
        @foreach ($data as $item)
            <div class="flex flex-col sm:w-[49%] w-full  ">
                <a class="font-bold text-biru uppercase">{{ $item->category }}</a>
                <div>
                    <img src="{{ asset('storage/files/photos/'.$item->img) }}" alt="{{$item->title}}" class="h-[300px] w-full object-cover object-center">
                </div>
                <a class="font-light text-sm mt-4">
                    @php
                        $date = \Carbon\Carbon::parse($item->publishdate)->locale(App::getLocale());
                        $date->settings(['formatFunction' => 'translatedFormat']);
                        echo $date->format('d F Y');
                    @endphp
                </a>
                <a href="{{ route('detailriset', [app()->getLocale(), $item->id, $item->slug]) }}" class="font-bold">{{$item->title}}</a>
                <p class="mt-3 font-light text-sm">{{$item->description}}</p>

            </div>
        @endforeach
    </div>
    @if ($data)
        {{ $data->links('livewire.pagination') }}
    @endif
</div>

