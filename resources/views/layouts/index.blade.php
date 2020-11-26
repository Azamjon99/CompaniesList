<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>
    

    @if(count($errors)>0)
    <ul>
    @foreach($errors->all() as $error)
    
    
    
    <li class="alert alert-danger">{{$error}}</li>
    @endforeach
    
    </ul>
       @endif
    
    @yield('main')
</body>
</html>