<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Expenses</title>
</head>
<body>
    <h1>Expenses</h1>

    <ul>
        @foreach ($expenses as $expense)
            <li>{{ $expense }}</li>
        @endforeach
    </ul>
</body>
</html>
