<!DOCTYPE html>
<html>
<head>
    <title>Create Employee</title>
    <link href="{{asset('css/create.css')}}" rel="stylesheet">
</head>
<body>

<div>
<p>The id is: {{$data->id}}</p>
<p>The name is: {{$data->name}}</p>
    <p>The salary is: {{$data->salary}}</p>
    <p>The address is: {{$data->address}}</p>
    <a href="{{route('list-employee')}}">go back to listing</a>
</div>

</body>
</html>

