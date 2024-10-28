
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

<table>
    <tr>
        <th>name</th>
        <th>dob</th>
        <th>address</th>
        <th>balance</th>
    </tr>
    @foreach($data as $c)

        <tr>
            <td>{{ $c->name }}</td>
            <td>{{$c->dob}}</td>
            <td>{{$c->address}}</td>
            <td>{{$c->balance}}</td>
        </tr>

    @endforeach


</table>

</body>
</html>

