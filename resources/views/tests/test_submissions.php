<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_db"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare the answers data to be stored in the database
    $answers = $_POST['answers']; // Assuming answers are received as an array

    // Define variables to store the total score
    $total_score = 0;

    // Loop through each submitted answer and compare with correct answer
    foreach ($answers as $question_id => $chosen_answer) {
        // Sanitize the inputs before using them in the query (to prevent SQL injection)
        $question_id = mysqli_real_escape_string($conn, $question_id);
        $chosen_answer = mysqli_real_escape_string($conn, $chosen_answer);

        // Fetch the correct answer from the database
        $sql_fetch_correct_answer = "SELECT correct_option FROM questions WHERE question_id = '$question_id'";
        $result = $conn->query($sql_fetch_correct_answer);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $correct_answer = $row['correct_option'];

            // Compare chosen answer with correct answer and calculate score
            if ($chosen_answer === $correct_answer) {
                $total_score += 2; // Correct answer (+2 marks)
            } else {
                $total_score -= 1; // Wrong answer (-1 mark)
            }

            // Insert or update the chosen answer for the respective question ID
            $sql_insert_answer = "INSERT INTO test_submissions (question_id, chosen_answer) 
                                VALUES ('$question_id', '$chosen_answer')
                                ON DUPLICATE KEY UPDATE chosen_answer = '$chosen_answer'";

            if ($conn->query($sql_insert_answer) === TRUE) {
                echo "Answer for question ID $question_id stored successfully!<br>";
            } else {
                echo "Error: " . $sql_insert_answer . "<br>" . $conn->error;
            }
        } else {
            echo "Error: No such question ID found!";
        }
    }

    // Store the total score in the database
    $sql_insert_score = "INSERT INTO scores (  score) 
                        VALUES (  '$total_score')"; // Replace user_id and quiz_id accordingly

    if ($conn->query($sql_insert_score) === TRUE) {
        echo "Total score ($total_score) stored successfully!";
    } else {
        echo "Error: " . $sql_insert_score . "<br>" . $conn->error;
    }
} else {
    echo "Error: Quiz ID not provided!";
}

$conn->close();
?>
