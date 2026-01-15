@extends('layouts.admin')

@section('content')
<style>
    .container {
        margin-top: 50px;
    }
    .heading {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }
    .add-btn {
        background: #7a0000;
        color: #fff;
        padding: 8px 14px;
        text-decoration: none;
        border-radius: 4px;
        font-size: 14px;
    }
    table {
        width: 80%;
        margin-left:16em;
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


<div class="container">
    <div class="heading">
        <h2>📅 Events</h2>
        <a href="{{ route('admin.events.create') }}" class="add-btn">+ Add Event</a>
    </div>


    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ \Carbon\Carbon::parse($event->event_date)->format('d-m-Y') }}</td>
                    <td>{{ $event->time }}</td>
                    <td>{{ $event->location }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="no-data">No events found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
