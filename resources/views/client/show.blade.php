@extends('layouts.app')

@section('template_title')
    {{ $client->name ?? __('Show') . " " . __('Client') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Client</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('clients.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">
                        
                                <div class="form-group mb-2 mb20">
                                    <strong>User Id:</strong>
                                    {{ $client->user_id }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Name:</strong>
                                    {{ $client->name }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Email:</strong>
                                    {{ $client->email }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Phone Number:</strong>
                                    {{ $client->phone_number }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Balance:</strong>
                                    {{ $client->balance }}
                                </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
