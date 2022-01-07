<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .filed {
            margin-top: 1rem;
        }

        .container {
            margin: 2rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="filed"><strong>From: </strong> {{ $details['name'] }}</div>
        <div class="filed"><strong>Email: </strong> {{ $details['email'] }}</div>
        <div class="filed"><strong>Phone: </strong> {{ $details['phone'] }}</div>
        <div class="filed"><strong>Subject: </strong> {{ $details['subject'] }}</div>
        <div class="filed"><strong>Message: </strong><br> {{ $details['message'] }}</div>
    </div>
</body>

</html>