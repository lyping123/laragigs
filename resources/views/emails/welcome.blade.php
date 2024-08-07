<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
    <h1>Welcome to Our Application, {{ $user->name }}!</h1>
    <p>Your otp number is {{ $user->otp }}</p>

    <h1></h1>

    <a href="{{ route('verify.email.page',$user->id) }}">Click here to verify your email</a>

</body>
</html>