
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
    <form action="quizzes_insert.php" method="post" id="quizForm">
      <!-- Your form content -->
      <!-- ... -->
      <div class="form-group">
        <label for="quizTitle">Quiz Title</label>
        <input type="text" class="form-control" id="quizTitle" name="quizTitle" oninput="if(this.value.length > 50) { this.value = this.value.slice(0, 50); } this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/^\s+/g, '').replace(/\s{2,}/g, ' ');" maxlength="50">
      </div>



      <div class="form-group">
        <label for="testDuration">Test Duration (minutes)</label>
        <input type="number" class="form-control" id="testDuration" name="testDuration" oninput="if(this.value.length > 3) { this.value = this.value.slice(0, 3); }" maxlength="3">

      </div>

      <hr>

      <h2 class="mb-3">Questions</h2>

      <div id="questionSets">
        <!-- JavaScript will dynamically add question sets here -->
      </div>


      <button type="button" class="btn btn-success mb-3" onclick="addQuestionSet()">Add Question Set</button>

      <button type="submit" class="btn btn-primary btn-block">Add Test</button>
    </form>
  </div>


  <script>
  let questionSetsCount = 0;
  const addedQuestions = new Set();

  function addQuestionSet() {
    const questionSetsDiv = document.getElementById('questionSets');
    const questionSet = document.createElement('div');
    questionSet.classList.add('form-group');

    const index = questionSetsCount;

    const optionsCount = 4;
    let optionsHTML = '';
    for (let i = 0; i < optionsCount; i++) {
      optionsHTML += `
        <label for="option${index}_${i + 1}">Option ${i + 1}</label>
        <input type="text" class="form-control" id="options_${index}_${i + 1}" name="options[${index}][]">
      `;
    }

    questionSet.innerHTML = `
      <label for="question_${index}">Question ${index + 1}</label>
      <textarea class="form-control" id="question_${index}" name="questions[]" rows="4" maxlength="250" oninput="
          if (this.value.length > 250) {
              this.value = this.value.slice(4, 250);
          }
      "></textarea>

      <div class="option-inputs">${optionsHTML}</div>
      <label for="correct_${index}">Correct Answer:</label>
      <select class="form-control" id="correct_${index}" name="correct_answers[]">
        <option value="">Select the Correct Option</option>
        ${optionsCount === 4 ? `
          <option value="1">Option 1</option>
          <option value="2">Option 2</option>
          <option value="3">Option 3</option>
          <option value="4">Option 4</option>` : ''}
      </select>
    `;

    const questionTextarea = questionSet.querySelector(`#question_${index}`);
    questionTextarea.addEventListener('change', function () {
      const enteredQuestion = questionTextarea.value.trim();
      if (addedQuestions.has(enteredQuestion)) {
        alert('This question is already added.');
        questionTextarea.value = '';
      } else {
        addedQuestions.add(enteredQuestion);
      }
    });

    questionSetsDiv.appendChild(questionSet);
    questionSetsCount++;
  }

function validateForm() {
  const quizTitle = document.getElementById('quizTitle').value.trim();
  const testDuration = document.getElementById('testDuration').value.trim();
  let validForm = true;

  const alertMessages = document.querySelectorAll('.alert-message');
  alertMessages.forEach(alert => alert.remove());

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
    displayAlert('testDuration', 'Please enter a valid test duration should not start with Zero.');
    validForm = false;
  }

  const questionSets = document.querySelectorAll('[id^=questionSets] > div');
  questionSets.forEach((questionSet, index) => {
    const question = document.getElementById(`question_${index}`).value.trim();
    const optionInputs = questionSet.querySelectorAll(`input[name="options[${index}][]"]`);
    const correctAnswer = document.getElementById(`correct_${index}`).value.trim();

    if (question === '') {
      displayAlert(`question_${index}`, `Please enter question ${index + 1}.`);
      validForm = false;
    }

    let optionsValid = false;
    optionInputs.forEach((optionInput, i) => {
      if (optionInput.value.trim() !== '') {
        optionsValid = true;
        if (optionInput.value.trim().length > 100) {
          displayAlert(`options_${index}_${i + 1}`, `Option ${i + 1} for question ${index + 1} exceeds 100 characters.`);
          validForm = false;
        }
      } else {
        displayAlert(`options_${index}_${i + 1}`, `Please provide Option ${i + 1} for question ${index + 1}.`);
        validForm = false;
      }
    });

    if (correctAnswer === '') {
      displayAlert(`correct_${index}`, `Please select the correct answer for question ${index + 1}.`);
      validForm = false;
    }
  });

  return validForm;
}

function displayAlert(fieldId, message) {
  const field = document.getElementById(fieldId);
  const alertMessage = document.createElement('div');
  alertMessage.textContent = message;
  alertMessage.classList.add('alert-message');
  field.parentNode.insertBefore(alertMessage, field.nextSibling);
}

document.getElementById('quizForm').addEventListener('submit', function(event) {
  if (!validateForm()) {
    event.preventDefault();
  }
});
  </script>




</body>
</html>
