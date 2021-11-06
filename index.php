<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>SIGN IN</title>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <form action="signin.php" method="post">
            <h1>SIGN IN</h1>
            <?php if(isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
                <?php
            } 
            ?>
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter Username" required><br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required><br>
            <input type="submit" value="Submit">
            <p>Haven't signed up yet?<a href="signup.html">SIGN UP</a></p>
        </form>
    </body>
</html>