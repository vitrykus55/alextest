<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Name" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit">Login</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $conn = new mysqli('127.0.0.1', 'root', 'root', 'data');

            if ($conn->connect_error) {
                echo '<div class="mistake">Something went wrong</div>';
                exit();
            }

            $name = $conn->real_escape_string($_POST['name']);
            $password = $_POST['password'];
            $email = $conn->real_escape_string($_POST['email']);

            $stmt = $conn->prepare("SELECT * FROM the_data WHERE name=? AND email=?");
            $stmt->bind_param("ss", $name, $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $user = $result->fetch_assoc();
                if (password_verify($password, $user['password'])) {
                    header("Location: connection.php");
                    exit();
                } else {
                    echo "<div class='mistake'>Login failed. Please check your credentials.</div>";
                }
            } else {
                echo "<div class='mistake'>Login failed. Please check your credentials.</div>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
