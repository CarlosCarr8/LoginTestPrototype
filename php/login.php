<?php

session_start();

require_once "db.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: ../index.html");
    exit;
}

$username = trim($_POST["username"] ?? "");
$password = $_POST["password"] ?? "";

if ($username === "" || $password === "") {
    header("Location: ../index.html?error=empty");
    exit;
}

$sql = "SELECT * FROM users WHERE username = :username LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ":username" => $username
]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user && password_verify($password, $user["password_hash"])) {
    session_regenerate_id(true);

    $_SESSION["user_id"] = $user["id"];
    $_SESSION["username"] = $user["username"];

    header("Location: ../dashboard.php");
    exit;
} else {
    header("Location: ../index.html?error=invalid");
    exit;
}