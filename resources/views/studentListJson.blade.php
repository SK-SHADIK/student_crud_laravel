<a href="create-json-student">Create Student</a>
<div id="studentData"></div>
<div id="errorMessage" style="color: red;"></div>
<div id="successMessage" style="color: green;"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        function deleteStudent(studentId) {
            $.ajax({
                url: '/api/delete-students/' + studentId, 
                type: 'GET', 
                dataType: 'json',
                success: function (data) {
                    console.log('Student deleted successfully.');
                    window.location.href = '/show-json-student';
                    $('#successMessage').text('Student deleted successfully.');
                },
                error: function (error) {
                    console.error(error);
                    $('#errorMessage').text('An error occurred while deleting the student. Please try again later.');
                }
            });
        }

        $.ajax({
            url: '/api/view-students',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                if (data.length > 0) {
                    var studentData = '<table border="1"><tr><th>Student Id</th><th>Student Name</th><th>Student Email</th><th>Options</th></tr>';

                    $.each(data, function (index, student) {
                        studentData += '<tr>';
                        studentData += '<td>' + student.id + '</td>';
                        studentData += '<td>' + student.name + '</td>';
                        studentData += '<td>' + student.email + '</td>';
                        studentData += '<td><a href="/edit-json-student/' + student.id + '" class="btn">Edit</a></td>';
                        studentData += '<td><a href="#" class="btn delete-student" data-student-id="' + student.id + '">Delete</a></td>';
                        studentData += '</tr>';
                    });

                    studentData += '</table>';
                    $('#studentData').html(studentData);

                    $('.delete-student').click(function (e) {
                        e.preventDefault();
                        let studentId = $(this).data('student-id');
                            deleteStudent(studentId);
                    });
                } else {
                    $('#errorMessage').text('No students found.');
                }
            },
            error: function (error) {
                console.error(error);
                $('#errorMessage').text('An error occurred while fetching data. Please try again later.');
            }
        });
    });
</script>
