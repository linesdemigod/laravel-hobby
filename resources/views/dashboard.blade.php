@extends('components.layout')

@section('title')
    {{ 'Dashboard' }}
@endsection

@section('content')

    @include('partials._search')

    <section class="py-5">
        <div class="container">
            <div class="row">

                <div class="col-md-6 mx-auto">
                    <x-flash-message class="alert alert-success" />

                    @unless(count($hobby) == 0)
                        @foreach ($hobby as $hob)
                            <x-hobby-card :hob="$hob" />
                        @endforeach
                    @else
                        <p>No hobby</p>
                    @endunless

                    {{ $hobby->links() }}

                </div>
            </div>
        </div>
    </section>
@endsection
