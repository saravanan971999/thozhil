<?php
// Database configuration
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

// (Previous database connection code remains the same)

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quizTitle = $_POST["quizTitle"];
    $testDuration = $_POST["testDuration"];
    $questions = $_POST["questions"];
    $options = $_POST["options"];
    $correctAnswers = $_POST["correct_answers"];
    // Insert quiz title and duration into the quizzes table
    $sql = "INSERT INTO quizzes (title, test_duration) VALUES ('$quizTitle', '$testDuration')";
    if ($conn->query($sql) === TRUE) {
        $lastInsertedQuizId = $conn->insert_id; // Get the last inserted quiz ID

        // Prepare an INSERT statement for questions
        $stmt = $conn->prepare("INSERT INTO questions (quiz_id, question, option1, option2, option3, correct_option) VALUES (?, ?, ?, ?, ?, ?)");

        // Bind parameters to the statement
        $stmt->bind_param("isssss", $lastInsertedQuizId, $question, $option1, $option2, $option3, $correctOption);

        // Insert each set of question data
        for ($i = 0; $i < count($questions); $i++) {
            $question = $questions[$i];
            $option1 = $options[$i][0];
            $option2 = $options[$i][1];
            $option3 = $options[$i][2];
            $correctOption = $correctAnswers[$i];

            // Execute the statement for each set of data
            if (!$stmt->execute()) {
                echo "Error: " . $stmt->error;
            }
        }

        echo "Quiz added successfully!";
        $stmt->close();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>
