<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Employees Info</h1>
    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Position</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td> {{$employee->id}} </td>
                        <td> {{$employee->name}} </td>
                        <td> {{$employee->age}} </td>
                        <td> {{$employee->position}} </td>
                        <td> {{$employee->salary}} </td>
                        <td>
                            <a href="{{route('employee.edit', ['employee' => $employee])}}">Edit</a>
                        </td>
                        <td>
                            <form action="{{route('employee.destroy', ['employee' => $employee])}}" method="post">
                                @csrf
                                @method('delete')
                                <input type="submit" value="Delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            <a href="{{route('employee.create')}}">Create New Employee</a>
        </div>
    </div>
</body>
</html>