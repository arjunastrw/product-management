@extends('layouts.app')

@section('title', 'Product Management')

@section('home')
<div class="container">
    <h1 class="text-center mt-5 mb-4">Product Management</h1>
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Silahkan Pilih Di Bawah Ini:') }}</div>

                <div class="d-flex justify-content-center">
                    <div class="mt-3 mr-3">
                        <form method="GET" action="{{ route('login') }}">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="mt-3 ml-3">
                        <form method="GET" action="{{ route('register') }}">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endsection