<!DOCTYPE html>
<html>
<body style="font-family: Arial">

    <h2>Hello {{ $name }},</h2>

    <p>
        🎉 Welcome to our institution!  
        Your account has been successfully created as a <b>{{ ucfirst($role) }}</b>.
    </p>

    <p><b>Login Credentials:</b></p>
    <ul>
        <li>Email: {{ $email }}</li>
        <li>Password: {{ $password }}</li>
    </ul>

    <p>
        Please login and change your password after first login.
    </p>

    <p>
        Thank you,<br>
        <b>Admin Team</b>
    </p>

</body>
</html>

