@extends('layouts.app')

@section('pageTitle', 'Transactions')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">@yield('pageTitle')</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <a href="/transactions/create">
                            <button class="btn btn-success"><i class="fa fa-plus"></i> Add</button>
                        </a>
                    </div>

                    <transactions {{ isset($account_id) ? ':account-id="'.$account_id.'"' : '' }}></transactions>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modals')
    @include('modals.accept-deleting')
@endsection