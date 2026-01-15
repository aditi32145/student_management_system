<div class="admin-header">
    <div class="header-left">
        <h1 class="page-title">
            @yield('page-title', 'Dashboard')
        </h1>
        <p class="page-subtitle">
            Welcome to Admin Panel
        </p>
    </div>


    <div class="header-right">
        
        <!-- Notification Icon -->
        <div class="notification-wrapper">
            <span class="notification-icon">🔔</span>
            <span class="notification-badge">3</span>
        </div>

        <div class="admin-info">
            <span class="admin-name">👤 Admin</span>
        </div>
    </div>
</div>


<style>
.admin-header {
    height: 70px;
    margin-left: 36px;
    margin-right: 6px;
    background: linear-gradient(90deg, #7a0000 0%, #5a0000 100%);
    color: #fff;
    padding: 0 25px;
    display: flex;
    border-radius: 8px;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    position: fixed;
    top: 0;
    right: 0;
    left: 200px;
    z-index: 1000;
}


.header-left {
    display: flex;
    flex-direction: column;
}


.page-title {
    font-size: 22px;
    margin: 0;
    font-weight: 600;
}


.page-subtitle {
    font-size: 13px;
    margin: 2px 0 0;
    opacity: 0.85;
}


.header-right {
    display: flex;
    align-items: center;
}

.header-right {
display: flex;
align-items: center;
gap: 18px;
}
.notification-wrapper {
position: relative;
cursor: pointer;
}
.notification-icon {
font-size: 22px;
}
.notification-badge {
position: absolute;
top: -2px;
right: -2px;
background: #ffcc00;
color: #000;
font-size: 11px;
font-weight: bold;
padding: 1px;
border-radius: 50%;
min-width: 14px;
text-align: center;
}

.admin-info {
    background: rgba(255, 255, 255, 0.15);
    padding: 8px 14px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
}
</style>
