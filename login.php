<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="form.css">
</head>
<body>
    <main>
        <section class="container">
            <h1>Login Admin</h1>
            <form action="proses_login.php" method="post" id="formLogin">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>
                <div class="form-group">
                    <label for="pw">Password</label>
                    <input type="password" name="pw" id="pw">
                </div>
                <button type="submit" name="login">Login</button>
                
            </form>
        </section>
    </main>
</body>
</html>