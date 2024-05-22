<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.3/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>
    <script src="jquery.min.js"></script>
    <style>
        *{
            font-family: Arial, Helvetica, sans-serif;
        }
        
        table{
            border-collapse: collapse;
            width: 100%;
        }

        th, tr{
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <h1>Employee List</h1>
    <br>
    <table id="productTable">
        <thead>
            <tr>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Gender</th>
                <th>Date Of Birth</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Job Title</th>
                <th>Prn</th>
                <th>QR Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)    
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->lastname }}</td>
                    <td>{{ $employee->firstname }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->dateOfBirth }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->phone }}</td>
                    <td>{{ $employee->jobTitle }}</td>
                    <td>{{ $employee->prn }}</td>
                    <td><img src="data:image/png;base64,{{ base64_encode(QrCode::size(80)->generate($employee->prn)) }}" alt="QR Code"></div></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
