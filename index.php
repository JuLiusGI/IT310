<?php
include "db_connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT);

    $stmt = $conn->prepare("INSERT INTO users (username, email, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        $user_id = $stmt->insert_id;
        $stmt->close();

        $stmt = $conn->prepare("INSERT INTO audit_trail (user_id, action) VALUES (?, ?)");
        $action = "User registered: " . $username;
        $stmt->bind_param("is", $user_id, $action);
        $stmt->execute();
        $stmt->close();

        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>

<form method="post" action="">
    Username: <input type="text" name="username" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit">
</form>
