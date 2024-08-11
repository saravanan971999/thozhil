
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Take Quiz</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
body {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;

  margin: 0;
}

.container {
  background-color: rgba(255, 255, 255, 0.8); /* Adjust the alpha value for transparency */
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  padding: 30px;
  border-radius: 10px;
  box-sizing: border-box;
  width: 80%; /* Adjust the width as needed */
}

.banner {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  width:100%;
  background-image: linear-gradient(rgba(0,0,0,0.75), rgba(0,0,0,0.50)), url(./test2.svg);
  background-size: cover;
  background-position: center;
  margin: 0;
}



    .container {
      background-color: rgba(255, 255, 255, 0.9);
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      padding: 30px;
      border-radius: 10px;
      box-sizing: border-box;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
      color: #007bff;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      color: #495057;
    }

    select {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ced4da;
      border-radius: 8px;
      box-sizing: border-box;
    }

    button[type="submit"] {
      padding: 12px;
      border: none;
      border-radius: 8px;
      background-color: #007bff;
      color: #fff;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>


<div class="banner">
<div class="container p-5">
  <h1>Click Start to begin a Test</h1>

    <div class="form-group">
      <label for="quizSelect">Quiz:</label>
      <input type="text" name="" id="" value="{{$quiz->title}}" readonly>

    </div>

    <a href="{{url('test_start/'.$quiz->quiz_id . '/'.$app_id)}}" type="submit" class="btn btn-primary btn-block">Start Test</a>

</div>


</div>



</body>
</html>
