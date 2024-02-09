@extends('layouts.app')

@section('dashboard')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="col-md-4 text-right">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">{{ __('Logout') }}</button>
            </form>
        </div>
    </div>
</div>
@endsection