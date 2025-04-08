@props(['message','icon','type','fgColour','bgColour','fgText','bgText'])


@if ($message)
    <section class="-mx-2 flex items-center {{ $bgText }} overflow-hidden">
        <div class="p-6 py-2 {{ $bgColour }} text-center">
            <i class="{{ $icon }} text-5xl min-w-24 {{ $fgColour }}"></i>
        </div>
        <div class="px-6 {{ $fgText }}">
            <h3 class="tracking-wider">{{$type}}</h3>
            <p class="text-xl">{{ $message }}</p>
        </div>
    </section>
@endif

{{--@props([--}}
{{--    'data' => session()->all()--}}
{{--])--}}



{{--@props([--}}
{{--    'data' => [--}}
{{--        'message' => session()->get('message'),--}}
{{--        'icon' => session()->get('icon', 'fa-info-circle'),--}}
{{--        'type' => session()->get('type', 'Info'),--}}
{{--        'fgColour' => session()->get('fgColour'),--}}
{{--        'bgColour' => session()->get('bgColour'),--}}
{{--        'fgText' => session()->get('fgText'),--}}
{{--        'bgText' => session()->get('bgText'),--}}
{{--    ]--}}
{{--])--}}

{{--@if (!empty($data['message']))--}}
{{--    {{ dd(['message' => $message, 'icon' => $icon, 'type' => $type, 'fgColour' => $fgColour, 'bgColour' => $bgColour, 'fgText' => $fgText, 'bgText' => $bgText]) }}--}}
{{--    <section class="-mx-2 flex items-center {{ $data['bgText'] ?? '' }} overflow-hidden">--}}
{{--        <div class="p-6 py-2 {{ $data['bgColour'] ?? '' }} text-center">--}}
{{--            <i class="{{ $data['icon'] ?? 'fa-info-circle' }} text-5xl min-w-24 {{ $data['fgColour'] ?? '' }}"></i>--}}
{{--        </div>--}}
{{--        <div class="px-6 {{ $data['fgText'] ?? '' }}">--}}
{{--            <h3 class="tracking-wider">{{ $data['type'] ?? 'Info' }}</h3>--}}
{{--            <p class="text-xl">{{ $data['message'] }}</p>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--@endif--}}

