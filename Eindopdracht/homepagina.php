<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
        }

        .header {
            background-color: #4caf50;
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 35px;
        }

        .container {
            max-width: 960px;
            margin: auto;
            padding: 20px;
        }

        .card {
            background-color: white;
            padding: 20px;
            margin: 20px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            margin: 0;
        }

        .card p {
            margin: 10px 0;
        }

        .button {
            display: inline-block;
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="header">
        Car Rental Website
    </div>

    <div class="container">
        <div class="card">
            <h2>Book a Car</h2>
            <p>Select from a variety of vehicles to suit your needs and preferences.</p>
            <a href="store.php" class="button">Browse Vehicles</a>
        </div>

        <div class="card">
            <h2>Sign Up for Membership</h2>
            <p>Sign up for our loyalty program and enjoy exclusive benefits, such as priority booking and car upgrade.</p>
            <a href="login.php" class="button">Login</a>
            <a href="aanmelden.php" class="button">Join Now</a>
        </div>
    </div>
</body>
</html>