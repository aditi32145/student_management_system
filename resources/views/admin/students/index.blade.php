@extends('layouts.admin')

@section('content')

<style>
    .container {
       margin-top: 20px;
       margin-left:15em;
        padding: 10px;
    }


    .card {
        background: #fff;
        padding: 20px;
        border-radius: 4px;
        box-shadow: 0 0 8px rgba(0,0,0,0.05);
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
        text-align: left;
    }


    table th {
        background: #7a0000;
        color: #fff;
    }


    table tr:nth-child(even) {
        background: #f9f9f9;
    }


    .btn {
        background: #7a0000;
        color: #fff;
        padding: 6px 14px;
        border: none;
        cursor: pointer;
        border-radius: 3px;
    }


    .success {
        color: green;
        margin-top: 10px;
    }


    .no-data {
        text-align: center;
        color: #777;
        padding: 15px;
    }
</style>

<div class="container">

    <h2 class="heading">👨‍🎓 Students</h2>


    {{-- CSV Import --}}
    <div class="card">
        <h4>Import Students (CSV)</h4>


        <form action="{{ route('admin.students.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="csv_file" required>
            <button class="btn">Import</button>
        </form>


        <small>
            <b>Required:</b> Roll No, Name, Degree (bca/bba), Phone, Start Date<br>
            <b>End Date:</b> Auto calculated (Start Date + 4 years)
        </small>


        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
    </div>


    {{-- Students Table --}}
    <div class="card">
        <h4>Students List</h4>


        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Roll No</th>
                    <th>Name</th>
                    <th>Degree</th>
                    <th>Phone</th>
                    <th>DOB</th>
                    <th>Email</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->roll_no }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ strtoupper($student->degree) }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->dob }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->start_date }}</td>
                        <td>{{ $student->end_date }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="no-data">
                            No students found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>


</div>


@endsection
