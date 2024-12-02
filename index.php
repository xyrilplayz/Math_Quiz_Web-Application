<!DOCTYPE html>
<html lang="en">
<div class="container-fluid p-5 bg-primary text-white text-center">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Math Quiz Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-fluid p-5 bg-primary text-white text-center">
    <h1>Welcome to my Math Quiz Application</h1>
    <div class="container col-sm-2">
    <form action="quiz.php" method="POST">
        <label for="name">Enter your name:</label>
        <input type="text" name="name" required><br><br>

        <label for="level">Select Level:</label>
        <select name="level" required>
            <option value="1-10">Level 1 (1-10)</option>
            <option value="11-100">Level 2 (11-100)</option>
            <option value="custom">Custom</option>
        </select><br><br>

        <label for="questions">Number of Questions:</label>
        <input type="number" name="questions" value="10" min="1" max="20" required><br><br>

        <button type="submit">Start Quiz</button>
    </form>
    </div>
</body>
<script>
    const levelSelector = document.querySelector('select[name="level"]');
    const customLevel = document.getElementById('custom-level');

    levelSelector.addEventListener('change', function() {
            customLevel.style.display = this.value === 'custom' ? 'block' : 'none';
        });
</script>
</html>