<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('layouts.company_header')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        button {
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            th, td {
                font-size: 12px;
            }

            button {
                font-size: 14px;
            }
        }
        @media only screen and (max-width: 767.98px){
            .h1{
   
        margin-top:20px;
       }

        }
      
    </style>
</head>
<body>
    @include('layouts.company_sidebar')
    @include('layouts.alert')

<div class="page-wrapper">
    <div class="content container-fluid">
       <div style="display: flex; justify-content: space-between; align-items: center;">
            <h1 class=" h1 mb-4 text-center">Export Questions</h1>
            <button class="close-button"style="background-color:red;color:white; font-weight:bold;" onclick="goBack()">Back</button>
          </div>
        <select name="" id="select">
            <option value="">Select module</option>
            @foreach ($test as $t)
                <option value="{{$t->quiz_id}}">{{$t->title}}</option>
            @endforeach
        </select>
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
                </tr>
            </thead>
            <tbody>


            </tbody>
        </table><br>

        <button onclick="exportToExcel()">Export to Excel</button>
    </div>
</div>
    <script>
        function exportToExcel() {
            const table = document.querySelector('table');
            const rows = Array.from(table.querySelectorAll('tr'));

            const csvContent = rows.map(row => {
                const columns = Array.from(row.children);
                return columns.map(column => column.textContent).join(',');
            }).join('\n');

            const blob = new Blob([csvContent], { type: 'text/csv' });
            const link = document.createElement('a');
            link.href = window.URL.createObjectURL(blob);
            link.download = 'questionnaire.csv';
            link.click();
        }



        document.addEventListener('DOMContentLoaded', function () {
        // Event listener for select change
        document.getElementById('select').addEventListener('change', function () {
            var quizId = this.value;
            if (quizId !== "") {
                // Fetch questions using Fetch API
                fetch(`/get_Questions/${quizId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Update table with fetched questions
                        console.log(data);
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
