@extends('layouts.app')

@section('dashboard')
<div class="">
    <nav class=" navbar bg-dark border-bottom border-body" data-bs-theme="dark" style="height: 100px">
        <div class="container-fluid">
            <a class="navbar-brand font-monospace font-weight-bolder text-white">Product Management</a>
            <form class="d-flex" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-primary">{{ __('Logout') }}</button>
            </form>
        </div>
    </nav>
</div>

@endsection