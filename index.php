<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoundWave - Free Music for Everyone</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #001f3f; /* Dark blue background */
            color: white;
        }
        header {
            display: flex;
            justify-content: space-between;
            padding: 20px 40px;
            background-color: #0057b7; /* Bright blue */
        }
        header img {
            width: 120px;
        }
        header nav a {
            color: white;
            margin-left: 20px;
            text-decoration: none;
            font-weight: bold;
        }
        .hero {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            background: linear-gradient(135deg, #001f3f 0%, #007bff 100%); /* Gradient blue background */
            text-align: center;
            padding: 20px;
        }
        .hero h1 {
            font-size: 4rem;
            margin-bottom: 20px;
        }
        .hero p {
            font-size: 1.5rem;
            margin-bottom: 40px;
        }
        .hero button {
            padding: 15px 30px;
            background-color: #0099ff; /* Lighter blue */
            border: none;
            border-radius: 30px;
            color: white;
            font-size: 1rem;
            cursor: pointer;
        }
        footer {
            background-color: #001f3f; /* Match body background */
            padding: 20px 40px;
            text-align: center;
        }
        footer p {
            margin: 0;
            color: #0099ff; /* Lighter blue */
        }
    </style>
</head>
<body>
    <header>
        <img src="your-logo.png" alt="SoundWave Logo">
        <nav>
        </nav>
    </header>

    <section class="hero">
        <div>
            <h1>Free Music for Everyone</h1>
            <p>Stream millions of songs without any sign-up or login required.</p>
            <button onclick="window.location.href='music.php'">LISTEN NOW</button>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 SoundWave Inc.</p>
    </footer>
</body>
</html>
