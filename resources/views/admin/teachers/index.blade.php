@extends('layouts.admin')

@section('content')

<style>
    .container {
        margin-top: 20px;
        padding: 10px;
        margin-left:15em;
    }

    .card {
        background: #fff;
        padding: 20px;
        border-radius: 4px;
        box-shadow: 0 0 8px rgba(0,0,0,0.05);
        margin-bottom: -20px;
    }

    h2.heading {
        margin-bottom: -15px;
        margin-top: 50px;
        color: #333;
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

    <h2 class="heading">👨‍🏫 Teachers</h2>

    {{-- CSV Import --}}
    <div class="card">
        <h4>Import Teachers (CSV)</h4>

        <form action="{{ route('admin.teachers.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="csv_file" required>
            <button class="btn">Import</button>
        </form>

        @if(session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif
    </div>

    {{-- Filter Form --}}
<div class="card" style="margin-top:10px">


    <h4>Filter</h4>


    <form method="GET" action="{{ route('admin.teachers.index') }}" style="display:flex;gap:10px;flex-wrap:wrap">


        {{-- search name/email --}}
        <input type="text" name="search"
               value="{{ request('search') }}"
               placeholder="Search name or email"
               style="padding:6px;width:180px">


        {{-- role dropdown --}}
        <select name="role" style="padding:6px;width:160px">
            <option value="">All Roles</option>
            <option value="PART_TIME" {{ request('role')=='PART_TIME'?'selected':'' }}>PART_TIME</option>
            <option value="FULL_TIME" {{ request('role')=='FULL_TIME'?'selected':'' }}>FULL_TIME</option>
            <option value="HOD" {{ request('role')=='HOD'?'selected':'' }}>HOD</option>
        </select>


        {{-- start dob --}}
        <input type="date" name="start_date"
               value="{{ request('start_date') }}"
               style="padding:6px">


        {{-- end dob --}}
        <input type="date" name="end_date"
               value="{{ request('end_date') }}"
               style="padding:6px">


        <button class="btn">Apply</button>


        {{-- reset --}}
        <a href="{{ route('admin.teachers.index') }}" class="btn" style="text-decoration:none;padding-top:8px">
            Reset
        </a>
    </form>
</div>

    {{-- Teachers Table --}}
    <div class="card">
        <h4>Teachers List</h4>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Subject</th>
                    <th>Email</th>
                    <th>DOB</th>
                </tr>
            </thead>
            <tbody>
                @forelse($teachers as $t)
                    <tr>
                        <td>{{ $t->id }}</td>
                        <td>{{ $t->name }}</td>
                        <td>{{ strtoupper($t->role) }}</td>
                        <td>{{ $t->subject }}</td>
                        <td>{{ $t->email }}</td>
                        <td>{{ $t->dob }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="no-data">
                            No teachers found
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

 {{-- Export button --}}
<div style="margin-top:15px">

    <form method="GET" action="{{ route('admin.teachers.export') }}">

        {{-- keep filters while exporting --}}
        <input type="hidden" name="search" value="{{ request('search') }}">
        <input type="hidden" name="role" value="{{ request('role') }}">
        <input type="hidden" name="start_date" value="{{ request('start_date') }}">
        <input type="hidden" name="end_date" value="{{ request('end_date') }}">


        <button class="btn">Export CSV</button>
    </form>


</div>

</div>


@endsection
