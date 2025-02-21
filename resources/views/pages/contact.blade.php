@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Contact Us') }}</div>

                <div class="card-body">
                    <h2>Contact Information</h2>
                    <p>If you have any questions, feel free to reach out to us.</p>
                    <ul>
                        <li><strong>Email:</strong> kabeCEO@selfinance.com</li>
                        <li><strong>Phone:</strong> (+34) 654 321 987</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
