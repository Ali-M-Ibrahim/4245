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

            <form action='{{route('employee.destroy',['employee'=>$obj->id])}}' method="post">
                @method('delete')
                @csrf
                <input type="submit" value="delete">
            </form>
            <a href="{{route('employee.show',['employee'=>$obj->id])}}"> View </a>
            <a href="{{route('employee.edit',['employee'=>$obj->id])}}"> Edit </a>

        </td>
    </tr>
    @endforeach

</table>

</body>
</html>

