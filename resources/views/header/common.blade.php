<div class="common-header">
    <div class="header-left">
        <h1 class="page-title">
            @yield('page-title', 'Dashboard')
        </h1>
        <p class="page-subtitle">
            Welcome to {{ ucfirst($role ?? 'user') }} Panel
        </p>
    </div>


    <div class="header-right">
        @if($role === 'student')
<div class="notification-wrapper" id="notifyWrapper-student">
    <span class="notification-icon">🔔</span>


    <span class="notification-badge" id="notifyCount-student">0</span>


    <div class="notification-popup" id="notifyPopup-student">
        <h4>Notifications</h4>
        <ul id="notifyList-student"></ul>
    </div>
</div>
@endif

        <div class="user-info">
            {{ $icon ?? '👤' }} {{ ucfirst($role ?? 'User') }}
        </div>

    </div>
</div>


<style>
.common-header {
    height: 70px;
    margin-left: 36px;
    margin-right: 6px;
    color: #fff;
    padding: 0 25px;
    display: flex;
    border-radius: 8px;
    align-items: center;
    justify-content: space-between;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    position: fixed;
    top: 0;
    right: 0;
    left: 200px;
    z-index: 1000;
    background: linear-gradient(135deg, #7e0d0d, #690606)
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
    margin-top: 2px;
    opacity: 0.85;
}


.header-right {
    display: flex;
    align-items: center;
    gap: 18px;
}


/* Notification */
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
    border-radius: 50%;
    min-width: 14px;
    text-align: center;
}


/* Popup */
.notification-popup {
    position: absolute;
    top: 35px;
    right: 0;
    width: 260px;
    background: #fff;
    color: #000;
    border-radius: 8px;
    box-shadow: 0 8px 25px rgba(0,0,0,0.2);
    display: none;
    z-index: 2000;
}


.notification-popup h4 {
    margin: 0;
    padding: 10px;
    background: #f4f4f4;
    border-radius: 8px 8px 0 0;
    font-size: 14px;
}


.notification-popup ul {
    list-style: none;
    margin: 0;
    padding: 8px;
}


.notification-popup li {
    padding: 8px;
    font-size: 13px;
    border-bottom: 1px solid #eee;
}


.notification-popup li:last-child {
    border-bottom: none;
}


.user-info {
    background: rgba(255,255,255,0.15);
    padding: 8px 14px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 500;
}
</style>


<script>
document.addEventListener("DOMContentLoaded", function () {


    const wrapper = document.getElementById("notifyWrapper-student");
    const popup   = document.getElementById("notifyPopup-student");
    const countEl = document.getElementById("notifyCount-student");
    const listEl  = document.getElementById("notifyList-student");


    if (!wrapper || !popup) return;


    // ✅ FETCH NOTIFICATIONS
    fetch("/student/notifications")
        .then(res => res.json())
        .then(data => {
            countEl.textContent = data.count;
            listEl.innerHTML = "";


            if (data.notifications.length === 0) {
                listEl.innerHTML = "<li>No notifications</li>";
                return;
            }


            data.notifications.forEach(n => {
                listEl.innerHTML += `<li>📢 ${n.message}</li>`;
            });
        })
        .catch(err => {
            console.error("Notification fetch error:", err);
        });


    // ✅ Toggle popup
    wrapper.addEventListener("click", function (event) {
        event.stopPropagation();
        popup.style.display =
            popup.style.display === "block" ? "none" : "block";
    });


    // ✅ Close on outside click
    document.addEventListener("click", function (e) {
        if (!wrapper.contains(e.target)) {
            popup.style.display = "none";
        }
    });


});
</script>

