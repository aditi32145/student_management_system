@extends('layouts.admin')


@section('content')


<style>
/* ===== Page Layout ===== */
.admin-container{
    margin:60px 0 0 15em;
    padding:20px;
    font-family:Arial, sans-serif;
}


/* ===== Header ===== */
.admin-header{
    margin-bottom:25px;
}
.admin-header h2{
    margin:0;
    font-size:22px;
}


/* ===== Stats Cards ===== */
.stats-grid{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
    gap:20px;
    margin-bottom:30px;
}
.stat-card{
    background:#fff;
    padding:20px;
    border-radius:6px;
    box-shadow:0 0 10px rgba(0,0,0,.08);
}
.stat-card h4{
    margin:0;
    color:#666;
    font-size:14px;
}
.stat-card p{
    margin-top:8px;
    font-size:28px;
    font-weight:bold;
    color:#7a0000;
}


/* ===== Chart Card ===== */
.chart-card{
    background:#fff;
    padding:20px;
    border-radius:6px;
    box-shadow:0 0 10px rgba(0,0,0,.08);
}
.chart-card h3{
    margin-bottom:15px;
    font-size:18px;
}
</style>


<div class="admin-container">


    {{-- Header --}}
    <div class="admin-header">
        <h2>📊 Admin Dashboard</h2>
        <p style="color:#666">Overview of system statistics</p>
    </div>


    {{-- Summary Cards --}}
    <div class="stats-grid">
        <div class="stat-card">
            <h4>Total Teachers</h4>
            <p>{{ $totalTeachers }}</p>
        </div>


        <div class="stat-card">
            <h4>Total Students</h4>
            <p>{{ $totalStudents }}</p>
        </div>


        <div class="stat-card">
            <h4>Total Events</h4>
            <p>{{ $totalEvents }}</p>
        </div>
    </div>


    {{-- Chart --}}
    <div class="chart-card">
        <h3>📈 System Summary</h3>
        <canvas id="summaryChart" height="120"></canvas>
    </div>


</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>
const ctx = document.getElementById('summaryChart');


new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Teachers', 'Students', 'Events'],
        datasets: [{
            label: 'Total Count',
            data: [
                {{ $totalTeachers }},
                {{ $totalStudents }},
                {{ $totalEvents }},
            ],
            backgroundColor: '#7a0000',
            borderRadius: 5
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>


@endsection
