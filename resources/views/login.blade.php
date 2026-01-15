 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - YCH</title>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", sans-serif;
        }


        :root {
            --maroon: #800000;
            --maroon-dark: #5a0000;
            --text: #333;
            --light-bg: #f8f6f2;
            --border: #ddd;
        }


        body {
            background: var(--light-bg);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 2px;
        }


        .auth-container {
            width: 100%;
            max-width: 1100px;
            display: flex;
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 5px 25px rgba(0,0,0,0.15);
        }


        /* LEFT IMAGE PANEL */
        .left-panel {
            width: 50%;
            background-image: url("https://images.unsplash.com/photo-1523240795612-9a054b0db644");
            background-size: cover;
            background-position: center;
            position: relative;
        }


        .overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.45);
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 50px;
            color: white;
        }


        .overlay h1 {
            font-size: 40px;
            font-weight: 700;
            margin-bottom: 10px;
        }


        .overlay p {
            font-size: 18px;
            margin-bottom: 20px;
            opacity: .9;
        }


        /* RIGHT PANEL */
        .right-panel {
            width: 50%;
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }


        .form-header {
            text-align: center;
            margin-bottom: 35px;
        }


        .form-header h2 {
            font-size: 32px;
            color: var(--maroon);
        }


        .form-header p {
            font-size: 15px;
            color: #555;
        }


        .auth-form {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }


        .form-group {
            margin-bottom: 18px;
        }


        .form-label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: var(--text);
        }


        .form-control {
            width: 100%;
            padding: 14px;
            border: 2px solid var(--border);
            border-radius: 10px;
            font-size: 15px;
        }


        .form-control:focus {
            border-color: var(--maroon);
            outline: none;
        }


        .checkbox-group {
            display: flex;
            align-items: center;
            margin: 15px 0;
        }


        .checkbox-group input {
            margin-right: 10px;
            width: 17px;
            height: 17px;
            accent-color: var(--maroon);
        }


        .btn {
            width: 100%;
            padding: 15px;
            border: none;
            background: var(--maroon);
            color: #fff;
            font-size: 17px;
            border-radius: 10px;
            cursor: pointer;
            transition: .3s;
            margin-top: 10px;
        }


        .btn:hover {
            background: var(--maroon-dark);
        }


        .register-link {
            text-align: center;
            margin-top: 25px;
            color: #555;
        }


        .register-link a {
            color: var(--maroon);
            font-weight: 600;
            text-decoration: none;
        }


        @media(max-width: 900px) {
            .auth-container {
                flex-direction: column;
                max-width: 600px;
            }


            .left-panel {
                width: 100%;
                height: 250px;
            }


            .right-panel {
                width: 100%;
                padding: 40px 30px;
            }
        }
    </style>
</head>


<body>
    <div class="auth-container">


        <!-- LEFT IMAGE PANEL -->
        <div class="left-panel">
            <div class="overlay">
                <h1>Welcome Back</h1>
                <p>Sign in to continue your learning journey with YCH.</p>
            </div>
        </div>


        <!-- RIGHT LOGIN FORM -->
        <div class="right-panel">
            <form class="auth-form" method="POST" action="{{ route('login.check') }}">
    @csrf

    <div class="form-header">
        <h2>LOGIN</h2>
        <p>Enter your login details below</p>
    </div>

    <div class="form-group">
        <label class="form-label">Username or Email</label>
        <input type="text" name="email" class="form-control" placeholder="Enter your username or email" />
    </div>

    <div class="form-group">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter your password" />
    </div>

    <div class="checkbox-group">
        <input type="checkbox" id="remember">
        <label for="remember">Remember me</label>
    </div>

    <button class="btn" type="submit">Login</button>
@if(session('error'))
    <p style="color:red; text-align:center; margin-top:10px;">
        {{ session('error') }}
    </p>
@endif
   
</form>

        </div>
    </div>


</body>
</html>