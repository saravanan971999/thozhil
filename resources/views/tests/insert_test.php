<?php
// Database connection details
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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle quiz title and test duration
    $quizTitle = $_POST['quizTitle'];
    $testDuration = $_POST['testDuration'];

    // Check and handle file upload
    if ($_FILES['file']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['file']['tmp_name'])) {
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileDestination = 'uploads/' . $fileName; // Destination directory

        if (move_uploaded_file($fileTmpName, $fileDestination)) {
            // File moved successfully, proceed to insert quiz and file name into quizzes table
            $sqlQuiz = "INSERT INTO quizzes (title, test_duration, file_name) VALUES ('$quizTitle', '$testDuration', '$fileName')";

            if ($conn->query($sqlQuiz) !== TRUE) {
                echo "Error: " . $sqlQuiz . "<br>" . $conn->error;
            } else {
                // Get the last inserted ID, assuming it's auto-incremented
                $quizId = $conn->insert_id;

                // Continue if the quiz was inserted successfully
                if (($handle = fopen($fileDestination, "r")) !== false) {
                    $headerSkipped = false; // Flag to skip the first row (header row)
                    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                        if (!$headerSkipped) {
                            // Skip the first row (header row)
                            $headerSkipped = true;
                            continue;
                        }

                        // Assuming the CSV has columns in the order: Questions, Option1, Option2, Option3, Option4, Correct Option
                        $question = $data[0];
                        $option1 = $data[1];
                        $option2 = $data[2];
                        $option3 = $data[3];
                        $option4 = $data[4];
                        $correctOption = $data[5];

                        // Insert data into the database with associated quiz_id
                        $sql = "INSERT INTO questions (quiz_id, question, option1, option2, option3, option4, correct_option)
                                VALUES ('$quizId', '$question', '$option1', '$option2', '$option3', '$option4', '$correctOption')";

                        if ($conn->query($sql) !== TRUE) {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                    fclose($handle);
                    echo "Test imported successfully!";
                } else {
                    echo "Error reading the CSV file";
                }
            }
        } else {
            echo "Error moving file to destination.";
        }
    } else {
        echo "File upload error.";
    }
}

$conn->close();
?>
