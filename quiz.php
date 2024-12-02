<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Quiz - Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Question</h1>
    <form action="process.php" method="POST">
        <?php foreach ($choices as $choice): ?>
            <input type="radio" name="answer" value="<?php echo $choice; ?>" required>
            <?php echo $choice; ?><br>
        <?php endforeach; ?>
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>