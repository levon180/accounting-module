@extends('layouts.app')

@section('pageTitle', 'Transactions')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">@yield('pageTitle') - Create</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (empty($accounts))
                        <div class="alert alert-warning" role="alert">
                            You don't have accounts yet. Go to <a href="/accounts/create">create account</a>
                        </div>
                    @endif

                    <div class="mb-3">
                        <a href="/transactions">
                            <button class="btn btn-success">Back</button>
                        </a>
                    </div>

                    <form action="/transactions" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="account_id">Choose Account</label>
                            {!! Form::select('account_id', [null => 'Please Select'] + $accounts, old('account_id'), ['id' => 'account_id', 'class' => 'form-control ' . ($errors->has('account_id') ? ' is-invalid' : '')]) !!}

                            @if ($errors->has('account_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('account_id') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}">{{ old('description') }}</textarea>

                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">$</div>
                                        </div>
                                        <input type="text" name="amount" id="amount" class="form-control{{ $errors->has('amount') ? ' is-invalid' : '' }}" value="{{ old('amount') }}">

                                        @if ($errors->has('amount'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('amount') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select name="type" id="type" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}">
                                        <option value="">Please Select</option>
                                        <option value="credit" {{ old('type') == 'credit' ? 'selected="selected"' : '' }}>Credit</option>
                                        <option value="debit" {{ old('type') == 'debit' ? 'selected="selected"' : '' }}>Debit</option>
                                    </select>

                                    @if ($errors->has('type'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('type') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="created_date">Amount</label>
                                    <input type="date" name="created_date" id="created_date" class="form-control{{ $errors->has('created_date') ? ' is-invalid' : '' }}" value="{{ old('created_date') }}">

                                    @if ($errors->has('created_date'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('created_date') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary float-right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
