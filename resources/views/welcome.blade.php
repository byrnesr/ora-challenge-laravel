<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>

    </head>
    <body>
        <h1>Registered Users</h1>
        <ul>
            @foreach($users->all() as $user)
                <li>{{ $user->name }}</li>
            @endforeach
        </ul>
    </body>
</html>
