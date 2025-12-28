<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin | Newsletter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            margin: 60;
            padding: 0;
        }
        .container {
            margin-left: 220px; /* sidebar space */
            padding: 20px;
        }
        .heading {
            margin-bottom: 15px;
            margin-top: 70px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            font-size: 14px;
        }
        table th {
            background: #7a0000;
            color: #fff;
            text-align: left;
        }
        table tr:nth-child(even) {
            background: #f9f9f9;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #777;
        }
    </style>
</head>
<body>


@include('sidebar.admin')
@include('header.admin')


<div class="container">
    <h2 class="heading">📩 Enquiry / Newsletter Data</h2>


    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>State</th>
                <th>Enquiry</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($enquiries as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->first_name }} {{ $row->last_name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>{{ $row->state }}</td>
                    <td>{{ $row->enquiry }}</td>
                    <td>{{ $row->created_at ? $row->created_at->format('d-m-Y') : '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="no-data">
                        No enquiry data found
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


</body>
</html>
