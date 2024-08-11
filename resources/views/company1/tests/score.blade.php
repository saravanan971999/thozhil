<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Test Results</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      width: 80%;
      margin: 20px auto;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
    }

    table, th, td {
      border: 1px solid #ccc;
    }

    th, td {
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }

    .score {
      text-align: center;
      font-size: 24px;
      margin-top: 30px;
    }

    .score span {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      border-radius: 4px;
    }

    .success {
      color: #4CAF50;
      font-weight: bold;
    }

    .error {
      color: #f44336;
      font-weight: bold;
    }
  </style>
</head>
<body>

<div class="container">
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
    // Retrieve submitted answers from the database
    $quiz_id = $_POST['quiz_id'];

    // Fetch quiz details including questions and correct options
    $sql_quiz_info = "SELECT qu.question_id, qu.correct_option, ts.chosen_answer
                      FROM questions qu
                      INNER JOIN test_submissions ts ON qu.question_id = ts.question_id
                      WHERE qu.quiz_id = '$quiz_id'";

    $result_quiz_info = $conn->query($sql_quiz_info);

    // Initialize variables for score calculation
    $total_questions = 0;
    $correct_answers = 0;

    // Display the results in a table
    echo "<h2>Test Results</h2>";
    echo "<table border='1'>";
    echo "<tr><th>Question ID</th><th>Chosen Answer</th><th>Correct Option</th></tr>";

    while ($row = $result_quiz_info->fetch_assoc()) {
        $question_id = $row['question_id'];
        $correct_option = $row['correct_option'];
        $chosen_answer = $row['chosen_answer'];

        echo "<tr>";
        echo "<td>$question_id</td>";
        echo "<td>$chosen_answer</td>";
        echo "<td>$correct_option</td>";
        echo "</tr>";

        // Calculate the score
        $total_questions++;
        if ($chosen_answer === $correct_option) {
            $correct_answers += 2; // Correct answer gets 2 marks
        } else {
            $correct_answers--; // Incorrect answer gets -1 mark
        }
    }
    echo "</table>";

    // Calculate the final score
    $score = max(0, $correct_answers); // Avoid negative scores
    echo "<h3>Final Score: $score</h3>";

    // Store the result in the database
    // Modify this section to insert the score into your scores table
    $sql_insert_score = "INSERT INTO scores (quiz_id, score) VALUES ('$quiz_id',  '$score')";
    if ($conn->query($sql_insert_score) === TRUE) {
        echo "Score stored in the database.";
    } else {
        echo "Error storing score: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
</div>

</body>
</html>