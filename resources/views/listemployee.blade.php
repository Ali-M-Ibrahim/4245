<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>HTML Table</h2>
<a href="{{Route('create-employee')}}" >Add Employee</a>
<table>
    <tr>
        <th>Name</th>
        <th>Salary</th>
        <th>Address</th>
        <th>Telephone</th>
        <th>Actions</th>
    </tr>
    @foreach($data as $obj)
    <tr>
        <td>{{$obj->name}}</td>
        <td>{{$obj->salary}}</td>
        <td>{{$obj->address}}</td>
        <td>{{$obj->telephone}}</td>
        <td>

            <form action='{{route('delete-employee',['id'=>$obj->id])}}' method="post">
                @method('delete')
                @csrf
                <input type="submit" value="delete">
            </form>

            <a href="{{route('delete-employee2',['id'=>$obj->id])}}"> Delete </a>
            <a href="{{route('view-employee',['id'=>$obj->id])}}"> View </a>
            <a href="{{route('edit-employee',['id'=>$obj->id])}}"> Edit </a>

        </td>
    </tr>
    @endforeach

</table>

</body>
</html>

