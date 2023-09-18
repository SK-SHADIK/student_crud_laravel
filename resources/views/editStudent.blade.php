<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE STUDENT</title>
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
                <h1>UPDATE STUDENT</h1>
                <form action="{{route('edit.store.student')}}" method="POST">
                   {{@csrf_field()}}
                  <label>STUDENT ID</label><br>
                  <input readonly type="text" name="id" id="id" value="{{$data->id}}"><br>
                  <label>STUDENT NAME</label><br>
                  <input type="text" name="name" id="name" value="{{$data->name}}"><br>
                  @error('name')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <label>STUDENT EMAIL</label><br>
                  <input type="text" name="email" id="email" value="{{$data->email}}"><br>
                  @error('email')
                        <span class="error">{{$message}}</span><br>
                  @enderror
                  <button>UPDATE</button>
                </form>
        
                    
            </div>
        </div>
</div>
</body>
</html>