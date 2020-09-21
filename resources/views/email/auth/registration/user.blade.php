@extends('email.layout')

@section('content')
    <div class="content">
        <div class="content-header content-header--blue">
            Welcome to Base!
        </div>
        <div class="content-body">
            <p>Hi {{ $user->name }},</p>
            <p>Thank you for registering with us. We are happy to have you.</p>

            <div class="text-center">
                <a href="{{ url('/') }}" target="_blank" class="btn btn-default">
                    Login to your account
                </a>
            </div>

            <div class="hr-line"></div>

            <p>We are committed to offering not just a Convenience but a Choice Driven by Technology.</p>
        </div>
    </div>
@endsection
