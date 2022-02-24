{{-- template from https://laravel.com/docs/8.x/blade --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laravel 8 CRUD Application</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
   <div class="container">
       <br>
       @yield('content')
   </div> 
</body>
</html>