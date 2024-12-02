<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['level'] = $_POST['level'];
    $_SESSION['operation'] = $_POST['operation'];
    $_SESSION['questions'] = $_POST['questions'];
    $_SESSION['custom_min'] = $_POST['custom_min'] ?? 1;
    $_SESSION['custom_max'] = $_POST['custom_max'] ?? 100;
    $_SESSION['current_question'] = 1;
    $_SESSION['correct'] = 0;
    $_SESSION['wrong'] = 0;
} else if (!isset($_SESSION['name'])) {
    header("Location: index.php");
    exit();
}

$min = 1;
$max = 10;

if ($_SESSION['level'] === '11-100') {
    $min = 11;
    $max = 100;
} elseif ($_SESSION['level'] === 'custom') {
    $min = $_SESSION['custom_min'];
    $max = $_SESSION['custom_max'];
}

$num1 = rand($min, $max);
$num2 = rand($min, $max);
$correct_answer = 0;
$operation = $_SESSION['operation'];
$symbol = '';

switch ($operation) {
    case 'add':
        $correct_answer = $num1 + $num2;
        $symbol = '+';
        break;
    case 'sub':
        $correct_answer = $num1 - $num2;
        $symbol = '-';
        break;
    case 'mul':
        $correct_answer = $num1 * $num2;
        $symbol = '*';
        break;
    case 'div':
        $num1 = $num1 * $num2; 
        $correct_answer = $num1 / $num2;
        $symbol = '/';
        break;
}

$_SESSION['correct_answer'] = $correct_answer;


$choices = [$correct_answer];
while (count($choices) < 4) {
    $choice = rand($correct_answer - 10, $correct_answer + 10);
    if (!in_array($choice, $choices) && $choice >= 0) {
        $choices[] = $choice;
    }
}
shuffle($choices);

?>


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
    <p><?php echo "$num1 $symbol $num2 = ?"; ?></p>
        <?php foreach ($choices as $choice): ?>
            <input type="radio" name="answer" value="<?php echo $choice; ?>" required>
            <?php echo $choice; ?><br>
        <?php endforeach; ?>
        <button type="submit">Submit</button>
    </form>
</div>
</body>
</html>