<!DOCTYPE html>
<html>
<head>
    <title>Create Employee</title>
    <link href="{{asset('css/create.css')}}" rel="stylesheet">
</head>
<body>

<div>
    <form method="post" action="{{Route('employee.update',['employee'=>$data->id])}}">
        @method('put')
        @csrf
        <label for="fname">Name</label>
        <input type="text" value="{{$data->name}}" id="fname" name="name" placeholder="Your name...">

        <label for="salary">Salary</label>
        <input type="text" value="{{$data->salary}}" id="salary" name="salary" placeholder="Your salary">

        <label for="telephone">Telephone</label>
        <input type="text" value="{{$data->telephone}}"  id="telephone" name="telephone" placeholder="Your telephone number">

        <label for="address">Address</label>
        <input type="text"  value="{{$data->address}}"  id="address" name="address" placeholder="Your address">

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>

