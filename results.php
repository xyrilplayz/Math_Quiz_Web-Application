<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
    <style>
        #color {
            background: black;
            max-width: 80px;
        }
    </style>
<body>
<div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Quiz Results</h1>
    <p>Name: <?php echo $_SESSION['name']; ?></p>
    <p>Total Number of Questions: <?php echo $_SESSION['questions']; ?></p>
    <p>Your Correct Answer/s: <?php echo $_SESSION['correct']; ?></p>
    <p>Your Wrong Answer/s: <?php echo $_SESSION['wrong']; ?></p>
</div>
<div id="color">
    <a href="index.php">Try Again</a>
</div>
</body>
</html>

<?php
session_destroy();
?>