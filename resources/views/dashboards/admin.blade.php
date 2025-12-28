<!DOCTYPE html>
<html>
<body>
    
    @include('sidebar.admin')
    @include('header.admin')
        <div class="main-content" style="margin-left:0px; margin-right:40px;">
            <h1>Hello Admin</h1>
            @yield('content')
    </div>
</body>
</html>