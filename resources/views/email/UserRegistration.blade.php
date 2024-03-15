<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Regsitration</title>
</head>
<body>
    <span>Dear, {{ $user->name }}</span>
    <br>
    <span>Your Account Have Registered Successfully,</span>
    <br>
    <span>Here is Your One Time Password: {{ $password }}</span>
</body>
</html>