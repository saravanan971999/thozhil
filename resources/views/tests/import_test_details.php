<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Add Quiz</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
      font-family: 'Arial', sans-serif;
    }

    .background-image {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;

    }

    .container {
      background-color: rgba(255, 255, 255, 1.5);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 1);
      margin-top: 50px;
      max-width: 800px;
      margin-left: auto;
      margin-right: auto;
      transition: background-color 0.3s;
    }

    .container:hover {
      background-color: rgba(255, 255, 255, 1);
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
    }

    .option-inputs input {
      margin-bottom: 10px;
    }

    .option-inputs input:last-child {
      margin-bottom: 0;
    }

    .option-inputs label {
      display: block;
      margin-bottom: 5px;
    }

    .btn-success {
      background-color: #28a745;
      border-color: #28a745;
    }

    .btn-success:hover {
      background-color: #218838;
      border-color: #218838;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }

    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }

    h1, h2 {
      color: #007bff;
    }

    textarea {
      resize: none;
    }

    select {
      width: 100%;
    }
    .alert-message {
      color: #dc3545;
      font-size: 0.8em;
      margin-top: 5px;
    }
  </style>
</head>

<body>

  <div class="background-image">
    <img src="./test2.svg" alt="Background Image">
  </div>

  <div class="container">
    <h1 class="mb-4 text-center">Add Test</h1>
    <form action="insert_test.php" method="post" id="quizForm" enctype="multipart/form-data">

      <div class="form-group">
        <label for="quizTitle">Quiz Title</label>
        <input type="text" class="form-control" id="quizTitle" name="quizTitle" oninput="if(this.value.length > 50) { this.value = this.value.slice(0, 50); } this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/^\s+/g, '').replace(/\s{2,}/g, ' ');" maxlength="50">
        <small id="quizTitleError" class="alert-message" style="display: none;"></small>
      </div>

      <div class="form-group">
        <label for="testDuration">Test Duration (minutes)</label>
        <input type="number" class="form-control" id="testDuration" name="testDuration" oninput="if(this.value.length > 3) { this.value = this.value.slice(0, 3); }" maxlength="3">
        <small id="testDurationError" class="alert-message" style="display: none;"></small>
      </div>

      <div class="form-group">
        <label for="testFile">Test File</label>
        <input type="file" name="file" id="file" accept=".csv">
        <small id="fileError" class="alert-message" style="display: none;"></small>
      </div>

      <button type="submit" class="btn btn-primary btn-block">Add Test</button>
    </form>
  </div>



  <script>
    function validateForm(event) {
      event.preventDefault();

      const quizTitle = document.getElementById('quizTitle').value.trim();
      const testDuration = document.getElementById('testDuration').value.trim();
      const fileInput = document.getElementById('file');
      const file = fileInput.files[0];

      let validForm = true;

      const alertMessages = document.querySelectorAll('.alert-message');
      alertMessages.forEach(alert => alert.style.display = 'none');

      if (quizTitle === '') {
        displayAlert('quizTitle', 'Please enter a quiz title.');
        validForm = false;
      }

      if (
        testDuration === '' ||
        isNaN(testDuration) ||
        testDuration <= 0 ||
        testDuration.charAt(0) === '0'
      ) {
        displayAlert('testDuration', 'Please enter a valid test duration that does not start with Zero.');
        validForm = false;
      }

      if (!file) {
        displayFileError('Please upload a CSV file.');
        validForm = false;
      } else {
        const fileType = file.type;
        const allowedTypes = ['text/csv'];

        const maxSize = 2 * 1024 * 1024; // 2MB
        const minRows = 30;
        const maxRows = 200;

        if (!allowedTypes.includes(fileType)) {
          displayFileError('Please upload a CSV file.');
          validForm = false;
        }  else if (file.size > maxSize) {
    displayFileError('File size exceeds the limit of 2MB.');
    validForm = false;
        }else {
          const reader = new FileReader();
          reader.onload = function (e) {
            const contents = e.target.result;
            const lines = contents.split('\n');

            if (lines.length - 1 < minRows || lines.length - 1 > maxRows) {
              displayFileError(`CSV file should have between ${minRows} to ${maxRows} question sets.`);
              validForm = false;
            } else {
              const headerColumns = lines[0].split(',').map(column => column.trim());

              const expectedColumns = ['Questions', 'Option1', 'Option2', 'Option3', 'Option4', 'Correct Option'];

              const areColumnsMatching = expectedColumns.every(column => headerColumns.includes(column));

              if (!areColumnsMatching) {
                displayFileError(`The first row should have columns: ${expectedColumns.join(', ')}.`);
                validForm = false;
              } else {


                const questions = lines.slice(1).map(line => line.split(',')[0]);
                const uniqueQuestions = new Set(questions);
                if (uniqueQuestions.size !== questions.length) {
                  displayFileError('Repeated questions found in the CSV. Each question should be unique.');
                  validForm = false;
                }
              }
            }

            if (validForm) {
              document.getElementById('quizForm').submit();
            }
          };

          reader.readAsText(file);
        }
      }

      return validForm;
    }

    function displayAlert(fieldId, message) {
      const fieldError = document.getElementById(fieldId + 'Error');
      fieldError.textContent = message;
      fieldError.style.display = 'block';
    }

    function displayFileError(message) {
      const fileError = document.getElementById('fileError');
      fileError.textContent = message;
      fileError.style.display = 'block';
    }

    document.getElementById('quizForm').addEventListener('submit', function (event) {
      validateForm(event);
    });

    document.getElementById('file').addEventListener('click', function () {
  alert(`Ensure your file satisfies the following conditions before uploading:\n
  1. Upload a CSV file with columns: Questions, Option1, Option2, Option3, Option4, Correct Option in the first row.\n
  2. The file should have between 30 to 200 question sets.\n
  3. There should not be any repeated questions; each question must be unique.\n
  4. There should not be any missing rows or missing fields in your file.\n
  5. The file size should not exceed 2MB.\n
  6. There should not be any extra columns beyond the specified ones.`);
});

  </script>

</body>
</html>
