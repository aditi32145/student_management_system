<!DOCTYPE html>
<html>
<body> 
    
    @include('sidebar.admin')
     @include('header.common', ['role' => 'admin', 'icon' => '👤'])
        <div class="main-content" style="margin-left:0px; margin-right:40px;">
            @yield('content')
    </div>
</body>
</html>