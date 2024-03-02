{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Mail</title>
</head>
<body>
    <h1>Contact Mail</h1>
    <p>Hello, {{ $name }}!</p>
    <p>Email, {{ $email }}!</p>
    <p>Subject, {{ $subject }}!</p>
    <p>Your message:</p>
    <p>{{ $message }}</p>
    <p>Thank you!</p>
</body>
</html> --}}

<h1>Contact email from {{$name}}</h1>
<p>Email: {{$email}}</p>
<p>Suject: {{$subject}}</p>
<p>Message: {{$text}}</p>