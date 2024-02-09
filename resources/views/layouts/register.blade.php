@extends('layouts.app')
@section('content-register')
<div class="container">
    <h1 class="text-center font-weight-bold mt-5 mb-4">Product Management</h1>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header font-weight-bold ">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- username  -->
                        <div class="d-flex justify-content-center">
                            <div class="mb-2">
                                <input placeholder="Username" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- email  -->
                        <div class="d-flex justify-content-center">
                            <div class="mb-2">
                                <input placeholder="Email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- password -->
                        <div class="d-flex justify-content-center">
                            <div class="mb-2">
                                <input placeholder="Password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- confirm password -->
                        <div class="d-flex justify-content-center">
                            <div class="mb-2">
                                <input placeholder="Confirm Password" id="confirm_password" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <!-- contact  -->
                        <div class="d-flex justify-content-center">
                            <div class="mb-2">
                                <input placeholder="Contact" id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact">
                                @error('contact')
                                <span class=" invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <!-- roles  -->
                        <div class="d-flex justify-content-center">
                            <div class="mb-2">
                                <input placeholder="Roles" id="contact" type="text" class="form-control" name="contact" value="Team Member" readonly>
                            </div>
                        </div>

                        <!-- register button -->
                        <div class="form-group d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
                        </div>
                </div>
                </form>
                <!-- login button -->
                <p class="text-center">Already have an account?</p>
                <div class="d-flex justify-content-center mb-3">
                    <form method="GET" action="{{ route('login') }}">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
{{-- register end--}}
@endsection