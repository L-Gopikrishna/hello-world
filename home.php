<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['id'])) { ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>HOME LOGGED IN</title>
            <link rel="stylesheet" href="style.css" type="text/css">
        </head>
        <body>
            <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
            <p><a href="logout.php">Log Out</a></p>
        </body>
    </html>
<?php
}
?>
