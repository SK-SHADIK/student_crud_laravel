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
        <div class="content">
            <div class="content-3">
                <h1>CREATE A NEW STUDENT</h1>
                     
                <form action="{{route('store.student')}}" method="POST">
                  {{@csrf_field()}}
                  <label>STUDENT NAME</label><br>
                  <input type="text" name="name" id="name"><br>
                  @error('name')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>STUDENT EMAIL</label><br>
                  <input type="text" name="email" id="email"><br>
                  @error('email')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                 
                  <button>ADD</button>
                </form>  
            </div>
        </div>
</div>
</body>
</html>