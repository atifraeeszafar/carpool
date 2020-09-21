@extends('email.layout')

@section('content')
    <div class="content">
        <div class="content-header content-header--blue">
            Welcome to SMS
        </div>
        <div class="content-body">
            <p>Hi {{ $user->name }},</p>
            <p>You Can Login With this link.</p>

            <div class="text-center">

                <a href="{{ 'http://localhost/sms/public/create/password/' . $token . '/' .$user->email }}"
                   target="_blank" class="btn btn-default">
                    Login With New Password
                </a>
            </div>

            <p>You can ignore the email if you didn't make this request. Contact us for further help.</p>
        </div>
    </div>
@endsection
