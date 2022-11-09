@extends('components.layout')

@section('content')
    <section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="text-center py-2">Reset password</h3>
                            <form action="{{ route('resetpassword.post') }}" method="Post">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label for="email" class="text-muted">Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="john@example.com"
                                        id="email" value="{{ old('email') }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <div class="form-group mb-3">
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <label for="password" class="text-muted">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password"
                                        id="password">
                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password_confirmation" class="text-muted">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Confirm Password" id="password_confirmation">
                                    @error('password_confirmation')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" name="submit"
                                        class="form-control btn btn-custom-warning btn-block">Change password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
