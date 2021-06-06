@props(['errors'])

@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'bg-red-200 p-3 rounded-md', 'style' => '']) }}>
        <ul class="mx-1 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
