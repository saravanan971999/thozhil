<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <style>
    .pagination {
      justify-content: center;
      margin-top: 20px;
    }

    .register{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
    margin-top: 3%;
    padding: 3%;
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 60%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #f8f9fa;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    float: right;
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #0062cc;
    color: #fff;
    font-weight: 600;
    width: 50%;
    cursor: pointer;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}

</style>


</head>

<body>

<!------ Include the above in your HEAD tag ---------->

<div class="container register">

                            <!--left side content  -->
                <div class="row">
                    <div class="col-md-3 register-left" >
                        <!-- <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/> -->
                        <h3 style="margin-top: 200px;">Welcome</h3>
                        <p>"When you beleive in yourself,anything is possible.Wishing you the best of luck on your exam!"</p>

                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Take Quiz</h3>



                                <!-- form -->
                                <div class="row register-form">
                                    <div class="col-md-12">
                                        <div class="container mt-5">
                                            <h1></h1>

                                            <div class="text-center mb-4">
                                                <h4>Test Timer:</h4>
                                                <div id="timer"></div>
                                            </div>




        <form action="{{url('submission/'.$app_id)}}" method="post" id="quizForm">
            @csrf
            <input type="hidden" name="quiz_id" value="{{ $quizQuestions->first()->quiz_id }}">
            <div class="form-group" id="questionContainer">
                @php
                    $r=1;
                @endphp
            <div class="form-group" id="questionContainer">
                @foreach($quizQuestions as $index => $question)
                <div class='form-group question-group' data-index="{{$index}}">
                    <h3>{{$r++ .") "}}{{ $question->question }}</h3>

                    <input type="radio" name="answers[{{ $question->question_id }}]" value="1">
                    {{ $question->option1 }}<br>

                    <input type="radio" name="answers[{{ $question->question_id }}]" value="2">
                    {{ $question->option2 }}<br>

                    <input type="radio" name="answers[{{ $question->question_id }}]" value="3">
                    {{ $question->option3 }}<br>

                    <input type="radio" name="answers[{{ $question->question_id }}]" value="4">
                    {{ $question->option4 }}<br>
                </div>
                @endforeach
            </div>

            <!-- Next and Previous buttons -->
            <div class="pagination">
                <button type="button" class="btn btn-primary" id="prevBtn">Previous</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn btn-primary" id="nextBtn">Next</button>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary" id="submitBtn">Submit Test</button>


        </form>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>



            <!-- script -->

            <script>
$(document).ready(function() {
  var currentQuestionIndex = 0;
  var totalQuestions = {{$quizQuestions->count()}};

  // Hide all questions except the first one
  $(".question-group").not("[data-index='0']").hide();

  // Hide the submit button initially
  $("#submitBtn").hide();

  // Disable "Previous" button on the first question
  $("#prevBtn").prop("disabled", true);

  // Event listener for next button
  $("#nextBtn").on("click", function () {
    if (currentQuestionIndex < totalQuestions - 1) {
      $(".question-group[data-index='" + currentQuestionIndex + "']").hide();
      currentQuestionIndex++;
      $(".question-group[data-index='" + currentQuestionIndex + "']").show();

      // Enable "Previous" button on moving to the next question
      $("#prevBtn").prop("disabled", false);
    } else {
      // If it's the last question, show the submit button and question status page
      $("#nextBtn").hide();
      $("#submitBtn").show();
      $(".question-status").show();
    }
  });

  // Event listener for previous button
  $("#prevBtn").on("click", function () {
    if (currentQuestionIndex > 0) {
      $(".question-group[data-index='" + currentQuestionIndex + "']").hide();
      currentQuestionIndex--;
      $(".question-group[data-index='" + currentQuestionIndex + "']").show();
    }

    // Hide "Submit" button and question status page on moving to the previous question
    if (currentQuestionIndex < totalQuestions - 1) {
      $("#submitBtn").hide();
      $("#nextBtn").show();
      $(".question-status").hide();
    }

    // Disable "Previous" button on the first question
    if (currentQuestionIndex === 0) {
      $("#prevBtn").prop("disabled", true);
    }
  });

  // Event listener for form submission
  $("#submitBtn").on("click", function () {
    // Additional logic for submitting the form
  });
});








                var testDuration = {{$quiz->test_duration}} ;
                 var timerExpired = false;

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
