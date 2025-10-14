<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMAGANG - Register</title>
    <link rel="stylesheet" href="register.css">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@600&family=Work+Sans:wght@500;600&family=Sen&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <!-- Left Side -->
        <div class="left-side">
            <h1 class="logo">SIMAGANG</h1>
            <p class="tagline">Lorem Ipsum<br>Dolor Sit amet!</p>
        </div>

        <!-- Right Side (Form) -->
        <div class="right-side">
            <div class="form-card">
                <h2>Create Account</h2>
                <form action="register_process.php" method="POST">
                    <input type="text" name="fullname" placeholder="Full Name" required>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <select name="role" required>
                        <option value="" disabled selected>Role</option>
                        <option value="admin">Admin</option>
                        <option value="mentor">Mentor</option>
                        <option value="peserta">Peserta</option>
                    </select>
                    <button type="submit">SIGN UP</button>
                </form>
                <p class="signin-text">Already Have an Account? <a href="login.php">Sign In</a></p>
            </div>
        </div>
    </div>
</body>
</html>
