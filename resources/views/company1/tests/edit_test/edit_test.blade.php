<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Test</title>
    @include('layouts.company_header')
    <style>
        input[type="number"]::-webkit-inner-spin-button{
        display: none;
    }
        /* General styling */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            /* Updated heading styles */
            font-size: 28px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 5px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: calc(100% - 24px);
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        select {
            cursor: pointer;
        }

        button[type="submit"] {
            padding: 12px 24px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 15px;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Styling specific to form elements */
        .quiz-details {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        .form-group textarea {
            resize: vertical;
        }

        .form-group input,
        .form-group select {
            width: 100%;
        }
    </style>
</head>
<body>
    @include('layouts.company_sidebar')
    @include('layouts.alert')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="container">
            <h1>Edit Test</h1>
            {{-- @if(request()->has('quiz_id'))
                {{ request()->input('quiz_id') }}
            @elseif(request()->has('question_id'))
                {{ request()->input('question_id') }}
            @endif --}}

            <div class="quiz-details">
                @if (request()->has('quiz_id'))
                <form onsubmit="return validateForm()" action="{{url('update_test')}}" method="post">
                    @csrf
                        <label>Title:</label>
                        <input type='text' name='quiz_title' id='quizTitle' value='{{$quiz->title}}'><br><br>

                        <label>Percentage:</label>
                            <input type='number' name='percentage' id='percentage' value="{{$quiz->percentage}}"><br><br>

                        <label>Test Duration:</label>
                            <input type='number' name='test_duration' id='testDuration' value="{{$quiz->test_duration}}"><br><br>
                        <input type="hidden" name="quiz_id" value="{{$quiz->quiz_id}}">
                        @foreach ($ques as $q)




                        <label>Question:</label>
                        <textarea name='question[]' id='question[]' rows='4'>{{$q->question}}</textarea><br><br>

                        <label>Option 1:</label>
                        <input type='text' name='option1[]' id='option1[]' value="{{$q->option1}}"><br><br>

                        <label>Option 2:</label>
                        <input type='text' name='option2[]' id='option2[]' value="{{$q->option2}}"><br><br>

                        <label>Option 3:</label>
                        <input type='text' name='option3[]' id='option3[]' value="{{$q->option3}}"><br><br>

                        <label>Option 4:</label>
                        <input type='text' name='option4[]' id='option4[]' value="{{$q->option4}}"><br><br>

                        <label>Correct Option:</label>
                        <select name='correct_option[]' id='correct_option[]'>
                        <option value='1' {{ $q->correct_option == 1 ? 'selected' : '' }}>1</option>
                        <option value='2' {{ $q->correct_option == 2 ? 'selected' : '' }}>2</option>
                        <option value='3' {{ $q->correct_option == 3 ? 'selected' : '' }}>3</option>
                        <option value='4' {{ $q->correct_option == 4 ? 'selected' : '' }}>4</option>
                        </select><br><hr>




                        @endforeach
                        <div id="questionSets">
                            <!-- JavaScript will dynamically add question sets here -->
                        </div>
                        <button type='submit'>Update Test</button>
                        <button type="button" class="btn btn-success mb-3" onclick="addQuestionSet()">Add Question Set</button>
                    </form>
                @elseif (request()->has('question_id'))

                    <form action="{{url('update_question_id')}}" method="post">
                        @csrf
                        <input type="hidden" name="question_id" value="{{ request()->input('question_id') }}">
                            <label>Question:</label>
                            <textarea name='question' id='question[]' rows='4'>{{$question->question}}</textarea><br><br>

                            <label>Option 1:</label>
                            <input type='text' name='option1' id='option1[]' value="{{$question->option1}}"><br><br>

                            <label>Option 2:</label>
                            <input type='text' name='option2' id='option2[]' value="{{$question->option2}}"><br><br>

                            <label>Option 3:</label>
                            <input type='text' name='option3' id='option3[]' value="{{$question->option3}}"><br><br>

                            <label>Option 4:</label>
                            <input type='text' name='option4' id='option4[]' value="{{$question->option4}}"><br><br>

                            <label>Correct Option:</label>
                            <select name='correct_option' id='correct_option[]'>
                            <option value='1' {{ $question->correct_option == 1 ? 'selected' : '' }}>1</option>
                            <option value='2' {{ $question->correct_option == 2 ? 'selected' : '' }}>2</option>
                            <option value='3' {{ $question->correct_option == 3 ? 'selected' : '' }}>3</option>
                            <option value='4' {{ $question->correct_option == 4 ? 'selected' : '' }}>4</option>
                            </select><br><hr>

                            <button type='submit'>Update Test</button>
                    </form>
                @else
                    No records found
                @endif
            </div>
        </div>
    </div>
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
          let isValid = true;
          const uniqueQuestions = [];

          const quizTitle = document.getElementById('quizTitle').value.trim();
          const testDuration = document.getElementById('testDuration').value.trim();
          const percentage = document.getElementById('percentage').value.trim();
          const questionFields = document.getElementsByName('question[]');
          const option1Fields = document.getElementsByName('option1[]');
          const option2Fields = document.getElementsByName('option2[]');
          const option3Fields = document.getElementsByName('option3[]');
          const option4Fields = document.getElementsByName('option4[]');
          const correctOptionFields = document.getElementsByName('correct_option[]');

          // Validate quiz title
          if (quizTitle === '') {
            alert('Please enter a quiz title.');
            return false;
          }

          // Validate test duration
          if (testDuration === '' || isNaN(testDuration) || testDuration <= 0 || testDuration.charAt(0) === '0') {
            alert('Please enter a valid test duration that does not start with zero.');
            return false;
          }

          // Validate percentage
          if (percentage === '' || isNaN(percentage) || percentage <= 0 || percentage.charAt(0) === '0' || percentage > 100) {
            alert('Please enter a valid percentage that does not start with zero.');
            return false;
          }

          // Validate questions and options
          for (let i = 0; i < questionFields.length; i++) {
            const question = questionFields[i].value.trim();
            const option1 = option1Fields[i].value.trim();
            const option2 = option2Fields[i].value.trim();
            const option3 = option3Fields[i].value.trim();
            const option4 = option4Fields[i].value.trim();
            const correctOption = correctOptionFields[i].value;

            if (question === '' || option1 === '' || option2 === '' || option3 === '' || option4 === '' || isNaN(correctOption) || correctOption < 1 || correctOption > 4) {
              alert('Please fill in all fields for each question and select a correct option.');
              return false;
            }

            // Check for repetition of the same question
            if (uniqueQuestions.includes(question)) {
              alert('Please avoid entering the same question multiple times.');
              return false;
            } else {
              uniqueQuestions.push(question); // Add unique question to the array
            }
          }

          return isValid;
        }
    </script>
@include('layouts.company_footer')
</body>

</html>
