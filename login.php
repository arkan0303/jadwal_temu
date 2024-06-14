<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="login">
            <form class="form">
                <div class="img">
                    <img src="images/book.jpg" alt="">
                </div>
                <label for="chk" aria-hidden="true">Log in</label>
                <input class="input" type="text" name="username" placeholder="Username" required="">
                <input class="input" type="password" name="password" placeholder="Password" required="">
                <button>Log in</button>
            </form>
        </div>

        <div class="register">
            <form class="form">
                <label for="chk" aria-hidden="true">Register</label>
                <input class="input" type="text" name="txt" placeholder="Username" required="">
                <input class="input" type="email" name="email" placeholder="Email" required="">
                <input class="input" type="password" name="pswd" placeholder="Password" required="">
                <button>Register</button>
            </form>
        </div>
    </div>
</body>

</html>