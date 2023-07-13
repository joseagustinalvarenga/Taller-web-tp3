<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comentarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .comment-container {
            border: 1px solid #ccc;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f9f9f9;
        }

        .comment-header {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .comment-header .username {
            font-weight: bold;
            margin-right: 10px;
        }

        .comment-header .date {
            color: #777;
        }

        .comment-content {
            margin-bottom: 10px;
        }

        .comment-actions {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .comment-actions .likes {
            margin-right: 10px;
        }

        .comment-actions .replies {
            margin-right: 10px;
        }

        .comment-actions .spoiler {
            color: red;
            font-weight: bold;
            margin-right: 10px;
        }

        .comment-actions .review {
            color: green;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Comentarios</h1>
    <?php foreach ($comments as $comment) : ?>
        <div class="comment-container">
            <div class="comment-header">
                <span class="username"><?php echo $comment->user->username; ?></span>
                <span class="date"><?php echo $comment->created_at; ?></span>
            </div>
            <div class="comment-content">
                <?php echo $comment->comment; ?>
            </div>
            <div class="comment-actions">
                <?php if ($comment->spoiler) : ?>
                    <span class="spoiler">Contiene Spoilers</span>
                <?php endif; ?>
                <?php if ($comment->review) : ?>
                    <span class="review">Review</span>
                <?php endif; ?>
                <span class="likes">Likes: <?php echo $comment->likes; ?></span>
                <span class="replies">Replies: <?php echo $comment->replies; ?></span>
            </div>
        </div>
    <?php endforeach; ?>
</body>
</html>
