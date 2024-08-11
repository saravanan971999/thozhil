<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Quiz Details</title>
    @include('layouts.company_header')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .selection {
            text-align: center;
            margin-bottom: 20px;
        }

        .selection label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .selection select {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border-radius: 5px;
        }

        .selection input[type="text"] {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border-radius: 5px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .selection button {
            display: block;
            width: 100%;
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .selection button:hover {
            background-color: #45a049;
        }

        table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 12px 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
        text-transform: uppercase;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #e9e9e9;
    }

        .no-quiz {
            text-align: center;
            font-style: italic;
            color: #777;
        }

        .edit-delete-buttons {
            text-align: left;
            margin-bottom: 20px;
        }

        .edit-delete-buttons button {
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-bottom: 10px;
        }

        .edit-btnn {
            background-color: #5bc0de;
            border: none;
            color: white;
            /* margin-right: 10px; */
        }

        .delete-btn {
            background-color: #d9534f;
            border: none;
            color: white;
        }

        .edit-delete-buttons button:hover {
            filter: brightness(85%);
        }
    </style>
</head>
<body>
    @include('layouts.company_sidebar')
    @include('layouts.alert')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="container">
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <h1 class="mb-4 text-center">Test Details</h1>
                <button class="close-button" style="background-color:red;color:white; font-weight:bold;" onclick="goBack()">Back</button>
              </div>

            <div class="selection">

                    <label for="quizSelect">Select Test:</label>
                    <select name="quiz_title" id="select">
                        <option value="">Select</option>
                        @foreach ($quiz as $q)
                            <option value="{{$q->quiz_id}}">{{$q->title}}</option>
                        @endforeach
                    </select>

                    <br><br>


                    {{-- <button type="submit" name="submit">Search</button> --}}

            </div>
            <div>
                <table id="questionTable">
                    <thead>
                        <tr>
                            <th>SNO</th>
                            <th>Question</th>
                            <th>Option 1</th>
                            <th>Option 2</th>
                            <th>Option 3</th>
                            <th>Option 4</th>
                            <th>Correct Option</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>


                    </tbody>
                </table>
                <br><br>
                <div class="edit-delete-buttons row" id="edit_delete">


                </div>
            </div>
        </div>

    </div>
</div>
<script>
     document.addEventListener('DOMContentLoaded', function () {
        // Event listener for select change
        document.getElementById('select').addEventListener('click', function () {
            var quizId = this.value;
            if (quizId !== "") {
                // Fetch questions using Fetch API
                fetch(`/get_Questions/${quizId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Update table with fetched questions
                        // console.log(data);
                        if(data){
                            const editUrl = `{{ url('employer/edit_test/quiz?quiz_id=${quizId}') }}`;
                            const deleteUrl = `{{ url('employer/delete_test/quiz?quiz_id=${quizId}') }}`;
                            document.getElementById('edit_delete').innerHTML = `<a href='${editUrl}'><button class='edit-btnn'>Edit</button></a> &nbsp;&nbsp;<a href='' data-toggle="modal" data-target="#delete_asset"><button class='delete-btn'>Delete</button></a>
                            <div id="delete_asset" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h3 class="delete_class">Are you sure you want to delete this Test module?</h3>
                        <div class="m-t-20">
                            <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <a href="${deleteUrl}" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                            `;
                        }
                        else{
                            document.getElementById('edit_delete').innerHTML ="";
                        }
                        updateTable(data);
                    })
                    .catch(error => {
                        console.error('Error fetching questions:', error);
                    });
            } else {
                // Clear table if no module is selected
                document.getElementById('questionTable').querySelector('tbody').innerHTML = '';
            }
        });

        function updateTable(data) {
    // Clear existing table rows
    const tbody = document.getElementById('questionTable').querySelector('tbody');
    tbody.innerHTML = '';

    // Extract the array of questions from the 'test' property
    const questions = data.test;

    // Populate table with fetched questions
    questions.forEach(function (question, index) {
        var row = '<tr>' +
            `<td data-label="SNO">${index + 1}</td>` +
            `<td data-label="Question">${question.question}</td>` +
            `<td data-label="Option 1">${sanitizeHTML(question.option1)}</td>` +
            `<td data-label="Option 2">${sanitizeHTML(question.option2)}</td>` +
            `<td data-label="Option 3">${sanitizeHTML(question.option3)}</td>` +
            `<td data-label="Option 4">${sanitizeHTML(question.option4)}</td>` +
            `<td data-label="Correct Option">${sanitizeHTML(question.correct_option)}</td>` +
            `<td data-label="Action">
                <a href='{{url('employer/edit_test/question?question_id=${sanitizeHTML(question.question_id)}')}}'>Edit</a>
                <a href='' data-toggle="modal" data-target="#delete_question${index + 1}"><button class='delete-btn'>Delete</button></a>

                <div id="delete_question${index + 1}" class="modal fade delete-modal" role="dialog">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <h3 class="delete_class">Are you sure you want to delete this Question?</h3>
                        <div class="m-t-20">
                            <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
                            <a href='{{url('employer/delete_test/question?question_id=${sanitizeHTML(question.question_id)}')}}' class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                ` +
            '</tr>';

        // Append the row to the tbody
        tbody.insertAdjacentHTML('beforeend', row);
    });
}

function sanitizeHTML(html) {
    const doc = new DOMParser().parseFromString(html, 'text/html');
    const sanitized = doc.body.textContent || "";
    const div = document.createElement('div');
    div.innerHTML = sanitized;
    return div.textContent || div.innerText || "";
}





    });
</script>
<script>
    function goBack() {
      window.history.back();
    }
  </script>
  
@include('layouts.company_footer')
</body>

</html>
