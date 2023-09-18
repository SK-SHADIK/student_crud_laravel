<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>STUDENT DETAILS</title>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>STUDENT DETAILS</h2>
                        <a href="{{route('create.student')}}" class="btn">Add A Student</a>
                    </div>
                    <table border="01">
                        <tr>
                            <th>Student Id</th>
                            <th>Student Name</th>
                            <th>Student Email</th>
                            <th>Options</th>
                        </tr>
                        @foreach($students as $student)
                        <tr>
                            <td>{{$student['id']}}</td>
                            <td>{{$student['name']}}</td>
                            <td>{{$student['email']}}</td>
                            <td><a href="/edit-student/{{$student['id']}}" class="btn">Edit</a></td>
                            <td><a href="/delete-student/{{$student['id']}}" class="btn">Delete</a></td>
                        </tr>
                        @endforeach
                        
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</body>
</html>