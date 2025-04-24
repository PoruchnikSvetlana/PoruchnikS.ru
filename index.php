<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.2s;
        }

        a:hover {
            color: #1d6fa5;
        }

        header, footer {
            background-color: #fff;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #eee;
        }

        footer {
            border-top: 1px solid #eee;
            font-size: 0.9rem;
            color: #888;
            margin-top: 50px;
        }

        main {
            max-width: 700px;
            margin: 60px auto;
            padding: 20px;
            text-align: center;
        }

        .welcome-box {
            background: #fff;
            padding: 40px 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
        }

        .welcome-box h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .welcome-box p {
            font-size: 1.1rem;
            margin-bottom: 30px;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            background-color: #28a745;
            color: white;
            border-radius: 6px;
            font-weight: 600;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #218838;
        }

        @media (max-width: 600px) {
            .welcome-box h1 {
                font-size: 2rem;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main>
        <div class="welcome-box">
            <h1>Добро пожаловать!</h1>
            <p>Вы можете начать с просмотра доступных статей.</p>
            <a href="/articles.php" class="btn">Перейти к статьям</a>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>

