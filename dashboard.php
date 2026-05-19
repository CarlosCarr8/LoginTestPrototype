<?php

session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: index.html");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="login-box">
        <h1>Welcome</h1>

        <p>You are logged in as:</p>

        <h2>
            <?php echo htmlspecialchars($_SESSION["username"]); ?>
        </h2>

        <a class="logout-btn" href="logout.php">Logout</a>
    </div>

</body>
</html>