@if (session()->has('message'))
    {{-- attributes allow you to add another class to it in the view --}}
    <div {{ $attributes->merge(['class' => 'text-center']) }}>

        {{ session('message') }}

    </div>
@endif
