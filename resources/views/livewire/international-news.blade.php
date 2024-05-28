<div class="sm:w-9/12 w-full flex flex-col gap-6">
    @foreach ($data as $item)
        <div class="flex sm:flex-row flex-col items-start gap-6 w-full">
            <div class="">
                <img src="{{ asset('storage/files/photos/'.$item->img) }}" alt="{{$item->title}}" class="sm:h-48 h-60 sm:w-[35rem] w-full object-cover object-center">
            </div>
            <div class="w-full">
                <p class="font-light text-sm ">
                    @php
                        $date = \Carbon\Carbon::parse($item->publishdate)->locale(App::getLocale());
                        $date->settings(['formatFunction' => 'translatedFormat']);
                        echo $date->format('d F Y');
                    @endphp</h1>
                    @if (!$item->slug)
                    - {{$item->source}}
                    @endif
                </p>
                @if ($item->slug)
                    <a  href="{{ route('detailnews', [app()->getLocale(), $item->id, $item->slug]) }}" class="font-bold">{{ $item->title }}</a>
                @else
                    <a  shref="{{$item->url}}" target="_blank" class="font-bold">{{ $item->title }}</a>
                @endif
                <p class="mt-3 font-light text-sm">{{ $item->description }}</p>
            </div>

        </div>
    @endforeach
    @if ($data)
    {{ $data->links('livewire.pagination') }}
    @endif
</div>
