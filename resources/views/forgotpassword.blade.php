@extends('components.layout')

@section('content')
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center py-2">Reset Password</h3>
                            <form action="{{ route('forgotpassword') }}" method="Post">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="email" class="text-muted">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="john@example.com"
                                        id="email" value="{{ old('email') }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <button type="submit" name="submit"
                                        class="form-control btn btn-danger btn-block">Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
