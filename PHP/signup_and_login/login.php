<?php
$is_valid = true;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mysqli = require __DIR__ . "/database.php";
    $sql = sprintf("SELECT * FROM user WHERE email = '%s'", $_POST["email"]);

    $result = $mysqli->query($sql);

    $user = $result->fetch_assoc();

    // var_dump($user);
    if ($user) {
        if (password_verify($_POST["password"], $user["password_hash"])) {
            // die("Login successful");

            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("Location: index.php");
            exit;
        }
    }
    $is_valid = false;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
</head>

<body>
    <h1>Log in</h1>
    <?php if (!$is_valid): ?>
        <em>Invalid Login</em>
    <?php endif; ?>
    <form method="post" novalidate>
        <p>
            <label for="email">Email</label> <input type="email" name="email" id="email" value="<?= $_POST["email"] ?? "" ?>">
        </p>
        <p>
            <label for="pass">Password</label><input type="password" name="password" id="pass">
        </p>

        <input type="submit" name="submit" value="Login">
    </form>
</body>

</html>