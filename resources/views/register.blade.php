 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - YCH</title>


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
            --border: #ddd;
            --text: #333;
        }


        body {
            background: #f8f6f2;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
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


        /* LEFT PANEL WITH IMAGE */
        .left-panel {
            width: 50%;
            background-image: url("https://images.unsplash.com/photo-1523240795612-9a054b0db644");
            background-size: cover;
            background-position: center;
        }


        /* RIGHT PANEL */
        .right-panel {
            width: 50%;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-left: 50px;
            padding-right: 50px;
        }


        .form-header {
            text-align: center;
            margin-bottom: 25px;
        }


        .form-header h2 {
            font-size: 32px;
            color: var(--maroon);
        }


        .form-group {
            margin-bottom: 14px;
        }


        .form-label {
            display: block;
            font-weight: 600;
            margin-bottom: 4px;
            color: var(--text);
        }


        .form-control {
            width: 100%;
            padding: 10px;
            border: 2px solid var(--border);
            border-radius: 10px;
            font-size: 15px;
        }


        .form-control:focus {
            border-color: var(--maroon);
            outline: none;
        }


        .radio-group {
            margin: 12px 0;
            display: flex;
            gap: 25px;
            font-size: 15px;
        }


        .otp-group {
            display: flex;
            gap: 8px;
        }


        .otp-btn {
            padding: 12px 20px;
            border-radius: 10px;
            background: var(--maroon);
            color: white;
            border: none;
            cursor: pointer;
            white-space: nowrap;
        }


        .btn-submit {
            width: 100%;
            padding: 15px;
            background: var(--maroon);
            border: none;
            border-radius: 10px;
            color: white;
            font-size: 17px;
            margin-top: 10px;
            cursor: pointer;
        }


        .teacher-id {
            display: none;
        }


         .register-link {
            text-align: center;
            margin-top: 15px;
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
            }
        }
    </style>
</head>


<body>


<div class="auth-container">


    <!-- LEFT SIDE IMAGE -->
    <div class="left-panel"></div>


    <!-- RIGHT SIDE FORM -->
    <div class="right-panel">


        <div class="form-header">
            <h2>Register</h2>
            <p>Create your YCH account</p>
        </div>


        <form>


            <div class="form-group">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" placeholder="Enter your name">
            </div>


            <!-- EMAIL + OTP BUTTON -->
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <div class="otp-group">
                    <input type="email" class="form-control" placeholder="Enter email">
                    <button type="button" class="otp-btn">Send OTP</button>
                </div>
            </div>


            <div class="form-group">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" placeholder="Choose a username">
            </div>


            <div class="form-group">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" placeholder="Enter password">
            </div>


            <!-- STUDENT / TEACHER RADIO -->
            <div class="radio-group">
                <label><input type="radio" name="role" value="student" checked> Student</label>
                <label><input type="radio" name="role" value="teacher"> Teacher</label>
            </div>


            <!-- TEACHER ID FIELD -->
            <div class="form-group teacher-id" id="teacherField">
                <label class="form-label">Teacher ID</label>
                <input type="text" class="form-control" placeholder="Enter teacher ID">
            </div>


            <button type="submit" class="btn-submit">Create Account</button>


        </form>
<div class="register-link"> Already have an account? <a href="{{ route('login') }}">Login here</a> </div>
    </div>
</div>


<script>
    // Show / hide teacher ID field
    document.querySelectorAll("input[name='role']").forEach(radio => {
        radio.addEventListener("change", () => {
            document.getElementById("teacherField").style.display =
                radio.value === "teacher" ? "block" : "none";
        });
    });
</script>


</body>
</html>
