@extends('layouts.admin')

@section('content')
<style>
    .container {
        margin-left: 20px;
        padding: 20px;
        /* margin-top: 70px; */
    }
    .card {
        background: #fff;
        padding: 25px;
        border-radius: 5px;
        margin-left:16em;
        max-width: 600px;
    }
    .card h2 {
        margin-bottom: 20px;
    }
    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
    }
    button {
        background: #7a0000;
        color: #fff;
        padding: 10px 18px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    button:hover {
        opacity: 0.9;
    }
</style>


<div class="container">
    <div class="card">
        <h2>➕ Add Event</h2>


        <form method="POST" action="{{ route('admin.events.store') }}">
            @csrf


            <input type="text" name="title" placeholder="Event Title" required>


            <input type="date" name="event_date" required>


            <input type="text" name="time" placeholder="8:00 am - 5:00 pm" required>


            <input type="text" name="location" placeholder="Location" required>


            <input type="text" name="booking_link" placeholder="Booking Link (optional)">


            <button type="submit">Save Event</button>
        </form>
    </div>
</div>
@endsection
