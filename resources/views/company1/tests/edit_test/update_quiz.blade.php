<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $quiz_id = $_POST['quiz_id'];
    $quiz_title = $_POST['quiz_title'];
    $test_duration = $_POST['test_duration'];
    $questions = $_POST['question'];
    $options1 = $_POST['option1'];
    $options2 = $_POST['option2'];
    $options3 = $_POST['option3'];
    $options4 = $_POST['option4'];
    $correct_options = $_POST['correct_option'];

    // Update quiz details
    $update_quiz_sql = "UPDATE quizzes SET title='$quiz_title', test_duration='$test_duration' WHERE quiz_id='$quiz_id'";
    if ($conn->query($update_quiz_sql) === TRUE) {
        // Loop through and update each question's details
        foreach ($questions as $index => $question) {
            $update_question_sql = "UPDATE questions SET 
                question='" . $conn->real_escape_string($question) . "', 
                option1='" . $conn->real_escape_string($options1[$index]) . "', 
                option2='" . $conn->real_escape_string($options2[$index]) . "', 
                option3='" . $conn->real_escape_string($options3[$index]) . "', 
                option4='" . $conn->real_escape_string($options4[$index]) . "', 
                correct_option='" . $correct_options[$index] . "' 
                WHERE quiz_id='$quiz_id' AND question_id='$index'";
            
            $conn->query($update_question_sql);
        }
        echo "Quiz updated successfully!";
    } else {
        echo "Error updating quiz: " . $conn->error;
    }
}

$conn->close();
?>
