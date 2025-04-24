<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = pg_escape_string($_POST['title']);
    $content = pg_escape_string($_POST['content']);
    
    $result = pg_query_params(
        $conn, // предполагаем, что в test_db.php переменная — $conn
        "INSERT INTO articles (title, content) VALUES ($1, $2)",
        [$title, $content]
    );
    
    if ($result) {
        header("Location: ../articles.php");
        exit;
    } else {
        $error = "Ошибка: " . pg_last_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавить статью</title>
    <style>
        :root {
            --primary: #2c3e50;
            --accent: #3498db;
            --success: #2ecc71;
            --danger: #e74c3c;
            --gray: #ecf0f1;
            --dark-gray: #bdc3c7;
        }

        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            margin: 0;
            padding: 0;
            background: var(--gray);
            color: var(--primary);
        }

        .container {
            max-width: 600px;
            margin: 60px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid var(--dark-gray);
            border-radius: 6px;
            font-size: 15px;
        }

        input[type="text"]:focus,
        textarea:focus {
            border-color: var(--accent);
            outline: none;
        }

        textarea {
            resize: vertical;
            min-height: 150px;
        }

        .submit-btn {
            width: 100%;
            background: var(--success);
            color: white;
            border: none;
            padding: 12px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .submit-btn:hover {
            background: #27ae60;
        }

        .btn-back {
            display: inline-block;
            margin-top: 15px;
            background: var(--accent);
            color: white;
            padding: 10px 18px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            transition: background 0.3s;
        }

        .btn-back:hover {
            background: #2980b9;
        }

        .error {
            background: #fdecea;
            color: var(--danger);
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 6px;
        }

        @media (max-width: 640px) {
            .container {
                margin: 30px 15px;
                padding: 20px;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Добавить новую статью</h1>

        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="content">Содержимое</label>
                <textarea id="content" name="content" required></textarea>
            </div>

            <input type="submit" value="Сохранить статью" class="submit-btn">
        </form>

        <a href="../articles.php" class="btn-back">← Назад к статьям</a>
    </div>
</body>
</html>
