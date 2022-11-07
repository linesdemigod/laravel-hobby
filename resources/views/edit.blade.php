@extends('components.layout')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('show', $hobby->id) }}" method="Post">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="name" class="text-muted">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="john"
                                        id="name" value="{{ $hobby->name }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>

                                <div class="form-group mb-3">
                                    <label for="age" class="text-muted">Age</label>
                                    <input type="number" class="form-control" name="age" placeholder="age"
                                        id="age" value="{{ $hobby->age }}">
                                    @error('age')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="hobby" class="text-muted">hobby</label>
                                    <input type="hobby" class="form-control" name="hobby" placeholder="hobby"
                                        id="hobby" value="{{ $hobby->hobby }}">
                                    @error('hobby')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="submit"
                                        class="form-control btn btn-danger btn-block">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
