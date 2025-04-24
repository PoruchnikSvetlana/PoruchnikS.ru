<?php
include 'includes/db.php';
$result = pg_query($conn, "SELECT * FROM articles ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Статьи</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f8;
            color: #2c3e50;
        }

        .container {
            max-width: 960px;
            margin: 60px auto;
            padding: 20px;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        h1 {
            font-size: 2.2rem;
        }

        .btn {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 6px;
            font-size: 1rem;
            transition: background 0.3s ease;
        }

        .btn:hover {
            background-color: #218838;
        }

        .articles-list {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .article {
            background-color: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .article:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .article h2 {
            margin-bottom: 15px;
            font-size: 1.6rem;
            color: #343a40;
        }

        .article p {
            font-size: 1.05rem;
            color: #495057;
            margin-bottom: 15px;
            white-space: pre-line;
        }

        .article small {
            display: block;
            text-align: right;
            color: #868e96;
            font-size: 0.9rem;
        }

        .empty-message {
            padding: 40px;
            text-align: center;
            font-size: 1.2rem;
            color: #868e96;
            background: white;
            border-radius: 10px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            header {
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
            }

            .btn {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Все статьи</h1>
            <a href="/pages/add-article.php" class="btn">Добавить статью</a>
        </header>

        <?php if (pg_num_rows($result) > 0): ?>
            <div class="articles-list">
                <?php while ($row = pg_fetch_assoc($result)): ?>
                    <div class="article">
                        <h2><?= htmlspecialchars($row['title']) ?></h2>
                        <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>
                        <small>Опубликовано: <?= date('d.m.Y H:i', strtotime($row['created_at'])) ?></small>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="empty-message">Пока нет ни одной статьи.</div>
        <?php endif; ?>

        <?php pg_close($db_conn); ?>
    </div>
</body>
</html>
