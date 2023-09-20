<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE STUDENT</title>
</head>
<style>
    h1{
        font-size: 30px;
        text-align: center;
        margin-bottom:50px;
    }
    form{
        text-align: center;
    }
    .error{
        color:red;
    }
</style>

<body>
<div class="container">
<div id="successMessage" class="success"></div>
<div id="errorMessage" class="error"></div>

        <div class="content">
            <div class="content-3">
                <h1>CREATE A NEW STUDENT</h1>
                     
                <form action="" method="POST">
                  {{@csrf_field()}}
                  <label>STUDENT NAME</label><br>
                  <input type="text" name="name" id="name"><br>

                  <label>STUDENT EMAIL</label><br>
                  <input type="text" name="email" id="email"><br>
                 
                  <button>ADD</button>
                </form>  
            </div>
        </div>
</div>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        function deleteStudent(studentId) {
        }

        $.ajax({
            url: '/api/view-students',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
            },
            error: function (error) {
            }
        });

        $('form').submit(function (e) {
            e.preventDefault();
            
            var formData = {
                name: $('#name').val(),
                email: $('#email').val()
            };

            $.ajax({
                url: '/api/store-students',
                type: 'POST',
                dataType: 'json',
                data: formData,
                success: function (data) {
                    console.log('Student stored successfully.');
                    $('#successMessage').text('Student stored successfully.');
                    window.location.href = '/show-json-student';
                },
                error: function (error) {
                    console.error(error);
                    $('#errorMessage').text('An error occurred while storing the student. Please try again later.');
                }
            });
        });
    });
</script>
