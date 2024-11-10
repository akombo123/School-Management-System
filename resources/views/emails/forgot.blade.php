@component('mail::message')
Hello {{ $user->name }}

<p>We Understand It happens</p>

@component('mail::button' , ['url' => url('reset/' .$user->remember_token)])

Reset Your Password
    
@endcomponent

<p>Incase You have any issues recovering your password, please  contact us</p>

Thanks ,<br>
{{ config('app.name') }}

    
@endcomponent