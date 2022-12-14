@extends('components.layout')

@section('content')
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center py-2">Login</h3>
                            <x-flash-message class="alert alert-success" />
                            <form action="{{ route('login') }}" method="Post">
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
                                    <label for="password" class="text-muted">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        id="password">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                    <label class="form-check-label" for="remember">Remember me</label>
                                    <a href="{{ route('forgotpassword') }}" class="ps-3 text-decoration-none">Forgot
                                        password</a>
                                </div>

                                <div class="form-group mb-3">
                                    <button type="submit" name="submit"
                                        class="form-control btn btn-danger btn-block">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
