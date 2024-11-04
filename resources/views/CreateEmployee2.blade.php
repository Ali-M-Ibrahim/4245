<!DOCTYPE html>
<html>
<head>
    <title>Create Employee</title>
    <link href="{{asset('css/create.css')}}" rel="stylesheet">
</head>
<body>

<div>
    <form method="post" action="{{Route('employee.store')}}">
        @csrf
        <label for="fname">Name</label>
        <input value="{{old('name')}}" type="text" id="fname" name="name" placeholder="Your name..." >
        @error('name')
        <p>{{$message}}</p>
        @enderror

        <label for="salary">Salary</label>
        <input type="text" value="{{old('salary')}}" id="salary" name="salary" placeholder="Your salary" >
        @error('salary')
        <p>{{$message}}</p>
        @enderror

        <label for="telephone">Telephone</label>
        <input type="text" value="{{old('telephone')}}" id="telephone" name="telephone" placeholder="Your telephone number" >
        @error('telephone')
        <p>{{$message}}</p>
        @enderror

        <label for="address">Address</label>
        <input type="text" value="{{old('address')}}" id="address" name="address" placeholder="Your address" >

        @error('address')
        <p>{{$message}}</p>
        @enderror

        <input type="submit" value="Submit">



    </form>

</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</body>
</html>

