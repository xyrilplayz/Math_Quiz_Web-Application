<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $answer = $_POST['answer'];
    $correct_answer = $_SESSION['correct_answer'];


    if ($answer == $correct_answer) {
        $_SESSION['correct']++;
    } else {
        $_SESSION['wrong']++;
    }

    $_SESSION['current_question']++;

    if ($_SESSION['current_question'] > $_SESSION['questions']) {
        header("Location: results.php");
        exit();
    } else {
        header("Location: quiz.php");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>