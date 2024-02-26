<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Bookstore</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
        }

        h1, h2 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
        }

        label, input, button {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .book {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 4px;
        }

        .book img {
            max-width: 100px;
            float: left;
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Online Bookstore</h1>

        <!-- Home Page Content -->
        <?php if (!isset($_GET['page'])) : ?>
            <h2>Featured Books</h2>
            <div class="book">
                <img src="book1.jpg" alt="Book 1">
                <h3>Book Title 1</h3>
                <p>Description of Book 1</p>
                <p>Price: $20.00</p>
            </div>
            <div class="book">
                <img src="book2.jpg" alt="Book 2">
                <h3>Book Title 2</h3>
                <p>Description of Book 2</p>
                <p>Price: $25.00</p>
            </div>
            <p><a href="?page=login">Login</a> or <a href="?page=register">Register</a> to view more books.</p>

        <!-- Login Page -->
        <?php elseif ($_GET['page'] === 'login') : ?>
            <h2>Login</h2>
            <form method="POST" action="?page=login">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <button type="submit" name="login">Login</button>
            </form>

            <?php
            // Handle Login
            if (isset($_POST['login'])) {
                // Handle login logic here
                echo "<p>Login logic will go here.</p>";
            }
            ?>

        <!-- Registration Page -->
        <?php elseif ($_GET['page'] === 'register') : ?>
            <h2>Register</h2>
            <form method="POST" action="?page=register">
                <label for="new_username">Username:</label>
                <input type="text" id="new_username" name="new_username" required>
                <label for="new_password">Password:</label>
                <input type="password" id="new_password" name="new_password" required>
                <button type="submit" name="register">Register</button>
            </form>

            <?php
            // Handle Registration
            if (isset($_POST['register'])) {
                // Handle registration logic here
                echo "<p>Registration logic will go here.</p>";
            }
            ?>

        <!-- Catalogue Page -->
        <?php elseif ($_GET['page'] === 'catalogue') : ?>
            <h2>Catalogue</h2>
            <?php
            // Database Connection
            $servername = "localhost";
            $username = "root";
            $password = "Purva2308$$";
            $dbname = "bookstore";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve Books from Database
            $sql = "SELECT * FROM books";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='book'>";
                    echo "<img src='" . $row['image'] . "' alt='" . $row['title'] . "'>";
                    echo "<h3>" . $row['title'] . "</h3>";
                    echo "<p>" . $row['description'] . "</p>";
                    echo "<p>Price: $" . $row['price'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "No books available.";
            }

            $conn->close();
            ?>

        <?php endif; ?>
    </div>
</body>
</html>
