@extends('components.layout')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto bg-light">
                    <div class="p-3">
                        <h3 class="text-center mb-0">{{ $hobby->user->name }}</h3>
                        <p class="text-center mb-0">Hobby: <span class="text-muted">{{ $hobby->hobby }}</span></p>
                        <p class="text-center">Age: <span class="text-muted">{{ $hobby->age }}</span></p>
                        <p class="text-muted text-center">{{ $hobby->created_at->diffForHumans() }}</p>

                        <div class="d-flex justify-content-center">
                            @can('edit', $hobby)
                                <a href="{{ route('show', $hobby->id . '/edit') }}"
                                    class="text-decoration-none  btn btn-primary me-3">Edit</a>
                            @endcan

                            {{-- delete -- Hide button --}}
                            @can('delete', $hobby)
                                <form action="{{ route('destroy', $hobby->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class=" btn btn-danger border border-0" value="Delete">
                                </form>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
