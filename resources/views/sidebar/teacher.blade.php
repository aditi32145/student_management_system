<div class="sidebar">
    <h2 class="sidebar-title">Teacher Panel</h2>
@php
    $teacherRole = session('teacher_role');
@endphp

    <ul class="nav-links">
     
  {{-- Dashboard (ALL) --}}
<li>
    <a href="{{ route('teacher.dashboard') }}">📊 Dashboard</a>
</li>


{{-- FULL_TIME --}}
@if($teacherRole === 'FULL_TIME')
<li>
    <a href="#">🗓️ Class Schedule</a>
</li>
@endif


{{-- PART_TIME --}}
@if($teacherRole === 'PART_TIME')
<li>
    <a href="#">📤 Upload Notice</a>
</li>
@endif


{{-- HOD --}}
@if($teacherRole === 'HOD')
<li>
    <a href="#">📝 Exam Routine</a>
</li>


<li>
    <a href="{{ route('teacher.ca.index') }}">📂 CA Upload</a>
</li>
@endif



    <div class="logout-section">
        <a href="{{ route('login') }}" class="logout-btn">Logout</a>
    </div>
</div>


<style>
.sidebar {
    width: 200px;
    height: 95vh;
    background: linear-gradient(180deg, #7a0000 0%, #5a0000 100%);
    color: white;
    padding: 5px 15px;
    display: flex;
    flex-direction: column;
    position: fixed;
    left: 0;
    top: 0;
    box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
}
.sidebar-title {
    font-size: 24px;
    margin-bottom: 3px;
    font-weight: 600;
    padding-bottom: 15px;
    border-bottom: 1px solid rgba(235, 224, 224, 0.75);
}
.nav-links {
    list-style: none;
    flex-grow: 1;
    padding: 0;
}
.nav-links li {
    margin-bottom: 8px;
}
.nav-links li a {
    color: rgba(255, 255, 255, 0.9);
    text-decoration: none;
    font-size: 16px;
    padding: 8px 15px;
    border-radius: 8px;
    display: flex;
    align-items: center;
    transition: all 0.3s ease;
}
.nav-links li a:hover {
    background: rgba(255, 255, 255, 0.1);
    color: white;
    transform: translateX(5px);
}
.nav-links li a span {
    margin-right: 12px;
    font-size: 18px;
}
.nav-links li a.active {
    background: rgba(255, 255, 255, 0.15);
    color: white;
    font-weight: 500;
}
.logout-section {
    margin-top: auto;
    padding-top: 20px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
}
.logout-btn {
    color: #fff;
    background: rgba(255, 255, 255, 0.1);
    padding: 12px 20px;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    border: 1px solid rgba(255, 255, 255, 0.15);
}
.logout-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}
</style>
