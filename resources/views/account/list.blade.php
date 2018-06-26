@extends('layouts.app')

@section('pageTitle', 'Accounts')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@yield('pageTitle')</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <a href="/accounts/create">
                            <button class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
                        </a>
                    </div>

                    <accounts></accounts>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modals')
    @include('modals.accept-deleting')
@endsection