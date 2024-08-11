<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Take Quiz</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
             body {
            background: url('./test2.svg') center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            height: 100%;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 5% auto;
            position: relative;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        input[type="radio"] {
            margin-right: 8px;
        }

        .btn-primary {
            background-color: #4CAF50;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 20px;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        .text-center {
            text-align: center;
        }

        #timer {
            font-size: 24px;
            font-weight: bold;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        #prevBtn,
        #nextBtn {
            margin: 0 10px;
        }

    @media (max-width: 576px) {
      .container {
        padding: 10px;
      }
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <h1>Take Quiz</h1>

  <div class="text-center mb-4">
    <h4>Test Timer:</h4>
    <div id="timer"></div>
  </div>

  <form id="quizForm" action="test_submissions.php" method="post">
  
    <div class="form-group" id="questionContainer">
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
          $quiz_id = $_POST['quiz_id'];

          // Fetch quiz details including questions, options, and test duration
          $sql_quiz_info = "SELECT q.test_duration AS time_limit, qu.question_id, qu.question, qu.option1, qu.option2, qu.option3, qu.option4
                            FROM quizzes q
                            INNER JOIN questions qu ON q.quiz_id = qu.quiz_id
                            WHERE q.quiz_id = '$quiz_id'";

          $result_quiz_info = $conn->query($sql_quiz_info);

          // Fetch test duration for the specific quiz
          if ($result_quiz_info) {
              $quiz_questions = $result_quiz_info->fetch_all(MYSQLI_ASSOC);
              $test_duration = $quiz_questions[0]['time_limit']; // Assuming all questions have the same time limit
              echo "<div class='form-group'>";
              echo "<h3>" . $quiz_questions[0]['question'] . "</h3>";

              // Assuming your options are stored in separate columns (option1, option2, option3)
              echo '<input type="radio" name="answers[' . $quiz_questions[0]['question_id'] . ']" value="1">';
              echo $quiz_questions[0]['option1'] . '<br>';

              echo '<input type="radio" name="answers[' . $quiz_questions[0]['question_id'] . ']" value="2">';
              echo $quiz_questions[0]['option2'] . '<br>';

              echo '<input type="radio" name="answers[' . $quiz_questions[0]['question_id'] . ']" value="3">';
              echo $quiz_questions[0]['option3'] . '<br>';

              echo '<input type="radio" name="answers[' . $quiz_questions[0]['question_id'] . ']" value="4">';
              echo $quiz_questions[0]['option4'] . '<br>';

              echo "</div>";
          } else {
              echo "Error in fetching quiz details: " . $conn->error;
          }
      }
      ?>
    </div>

        <!-- Navigation buttons -->
        <div class="text-center mt-3">
                <button type="button" id="prevBtn" class="btn btn-success">Previous</button>
                <button type="button" id="nextBtn" class="btn btn-success">Next</button>
            </div>

            <!-- Submit button -->
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary">Submit Test</button>
            </div>
  </form>
</div>

<script>
  var testDuration = <?php echo $test_duration; ?>;
  var timerExpired = false;
  var currentQuestionIndex = 0;
  var questions = <?php echo json_encode($quiz_questions); ?>;

  function startTimer(duration, display) {
    var timer = duration * 60;
    var minutes, seconds;

    var intervalId = setInterval(function () {
      minutes = parseInt(timer / 60, 10);
      seconds = parseInt(timer % 60, 10);

      minutes = minutes < 10 ? "0" + minutes : minutes;
      seconds = seconds < 10 ? "0" + seconds : seconds;

      display.textContent = minutes + ":" + seconds;

      if (--timer < 0) {
        clearInterval(intervalId);
        timerExpired = true;
        autoSubmitTest(); // Automatically submit the test when the timer ends
      }
    }, 1000);
  }

  function autoSubmitTest() {
    if (!timerExpired) {
      var form = document.getElementById('quizForm');
      form.addEventListener('submit', function (event) {
        var unchecked = document.querySelectorAll('input[type="radio"]:not(:checked)');
        for (var i = 0; i < unchecked.length; i++) {
          if (unchecked[i].name.startsWith('answers')) {
            var questionId = unchecked[i].name.match(/\[(.*?)\]/)[1];
            var hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = unchecked[i].name;
            hiddenInput.value = '0'; // Set the value to 0 for unattempted questions
            form.appendChild(hiddenInput);
          }
        }
      });
      form.submit();
    }
  }

  function showQuestion(index) {
    var questionContainer = document.getElementById('questionContainer');
    var question = questions[index];
    if (question) {
      questionContainer.innerHTML = "<div class='form-group'>" +
                                    "<h3>" + question['question'] + "</h3>" +
                                    '<input type="radio" name="answers[' + question['question_id'] + ']" value="1">' + question['option1'] + '<br>' +
                                    '<input type="radio" name="answers[' + question['question_id'] + ']" value="2">' + question['option2'] + '<br>' +
                                    '<input type="radio" name="answers[' + question['question_id'] + ']" value="3">' + question['option3'] + '<br>' +
                                    '<input type="radio" name="answers[' + question['question_id'] + ']" value="4">' + question['option4'] + '<br>' +
                                    "</div>";
    }
  }

  function navigateQuestions(direction) {
    currentQuestionIndex += direction;
    if (currentQuestionIndex < 0) {
      currentQuestionIndex = 0;
    } else if (currentQuestionIndex >= questions.length) {
      currentQuestionIndex = questions.length - 1;
    }
    showQuestion(currentQuestionIndex);
  }

  document.getElementById('prevBtn').addEventListener('click', function () {
    navigateQuestions(-1);
  });

  document.getElementById('nextBtn').addEventListener('click', function () {
    navigateQuestions(1);
  });

  window.onload = function () {
    var display = document.querySelector('#timer');
    startTimer(testDuration, display);

    // Detect visibility change
    document.addEventListener('visibilitychange', function () {
      if (document.visibilityState === 'hidden') {
        autoSubmitTest(); // Automatically submit the test when tab becomes hidden
      }
    });
  };
</script>

</body>
</html>
