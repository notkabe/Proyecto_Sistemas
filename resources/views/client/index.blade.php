@extends('layouts.app')

@section('template_title')
    Client Profile
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Client Profile') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-success btn-sm float-right">
                                    {{ __('Edit Profile') }}
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-4 font-weight-bold">{{ __('User ID') }}:</div>
                            <div class="col-md-8">{{ $client->user_id }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 font-weight-bold">{{ __('Name') }}:</div>
                            <div class="col-md-8">{{ $client->name }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 font-weight-bold">{{ __('Email') }}:</div>
                            <div class="col-md-8">{{ $client->email }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 font-weight-bold">{{ __('Phone Number') }}:</div>
                            <div class="col-md-8">{{ $client->phone_number }}</div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-4 font-weight-bold">{{ __('Balance') }}:</div>
                            <div class="col-md-8">{{ $client->balance }}</div>
                        </div>

                        <!-- Información adicional de la dirección, si es necesario -->
                        @if($client->address_street || $client->city || $client->state || $client->postal_code || $client->country)
                        <div class="row mb-3">
                            <div class="col-md-4 font-weight-bold">{{ __('Address') }}:</div>
                            <div class="col-md-8">
                                {{ $client->address_street }}, {{ $client->city }}<br>
                                {{ $client->state }} {{ $client->postal_code }}<br>
                                {{ $client->country }}
                            </div>
                        </div>
                        @endif

                        <!-- Aquí puedes incluir más campos según sea necesario -->

                    </div>

                    <div class="card-footer">
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('Are you sure to delete this profile?') ? this.closest('form').submit() : false;">
                                {{ __('Delete Profile') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
