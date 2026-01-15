<!DOCTYPE html>
<html>
<body> 
    <style>
      h1{
        margin-left:20em;
        margin-top:4em;
      }
      </style>
    @include('sidebar.student')
    <!-- @include('header.student') -->
      @include('header.common', ['role' => 'student', 'icon' => '🎓'])
        <div class="main-content" style="margin-left:0px; margin-right:40px;">
            @yield('content')
    </div>
</body>
</html>