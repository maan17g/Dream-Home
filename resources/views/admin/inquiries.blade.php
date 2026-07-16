<!DOCTYPE html>
<html lang="en" data-theme="dark">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Inquiries | Dream Home Admin</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
<link rel="stylesheet" href="../assets/style.css">
<link rel="stylesheet" href="../assets/dashboard.css">
</head>
<body>
<div class="dash-body">
  <aside class="dash-sidebar" id="sidebar">
    <a href="admin-dashboard.html" class="dash-logo"><i class="bi bi-house-door-fill"></i><span class="dash-logo-text">Dream Home<span class="dash-logo-sub">Admin Panel</span></span></a>
    <div class="dash-nav-label">Overview</div>
    <ul class="dash-nav"><li><a href="admin-dashboard.html" class="dash-nav-link"><i class="bi bi-grid-1x2-fill"></i><span>Dashboard</span></a></li></ul>
    <div class="dash-nav-label">Management</div>
    <ul class="dash-nav">
      <li><a href="customers.html" class="dash-nav-link"><i class="bi bi-people-fill"></i><span>Users</span></a></li>
      <li><a href="agents.html" class="dash-nav-link"><i class="bi bi-person-badge-fill"></i><span>Agents</span></a></li>
      <li><a href="property-management.html" class="dash-nav-link"><i class="bi bi-buildings-fill"></i><span>Properties</span></a></li>
      <li><a href="#" class="dash-nav-link"><i class="bi bi-calendar-check-fill"></i><span>Bookings</span><span class="dash-nav-badge">12</span></a></li>
      <li><a href="inquiries.html" class="dash-nav-link active"><i class="bi bi-chat-dots-fill"></i><span>Inquiries</span><span class="dash-nav-badge">5</span></a></li>
    </ul>
    <div class="dash-nav-label">Content</div>
    <ul class="dash-nav">
      <li><a href="cms.html" class="dash-nav-link"><i class="bi bi-layout-text-window-reverse"></i><span>CMS Pages</span></a></li>
      <li><a href="blog-cms.html" class="dash-nav-link"><i class="bi bi-file-earmark-post-fill"></i><span>Blog</span></a></li>
      <li><a href="notifications.html" class="dash-nav-link"><i class="bi bi-bell-fill"></i><span>Notifications</span></a></li>
    </ul>
    <div class="dash-sidebar-footer"><ul class="dash-nav"><li><a href="#" class="dash-nav-link"><i class="bi bi-box-arrow-right"></i><span>Logout</span></a></li></ul></div>
  </aside>

  <div class="dash-main">
    <header class="dash-topbar">
      <button class="dash-burger" id="burgerBtn"><i class="bi bi-list"></i></button>
      <div class="dash-search"><i class="bi bi-search"></i><input type="text" placeholder="Search properties, agents, users..."></div>
      <div class="dash-topbar-right">
        <button class="dash-icon-btn" id="themeToggle"><i class="bi bi-moon-stars-fill"></i></button>
        <button class="dash-icon-btn"><i class="bi bi-bell-fill"></i><span class="dash-icon-dot"></span></button>
        <div class="dropdown">
          <button class="dash-profile border-0" data-bs-toggle="dropdown">
            <img src="https://i.pravatar.cc/64?img=12" alt="Admin">
            <span class="dash-profile-info d-none d-sm-block"><span class="dash-profile-name d-block">Admin User</span><span class="dash-profile-role">Super Admin</span></span>
            <i class="bi bi-chevron-down text-muted-custom" style="font-size:.7rem;"></i>
          </button>
          <div class="dropdown-menu dropdown-menu-end dash-dropdown-menu">
            <a class="dropdown-item" href="#"><i class="bi bi-person"></i> My Profile</a>
            <a class="dropdown-item" href="#" style="color:#e5484d"><i class="bi bi-box-arrow-right"></i> Logout</a>
          </div>
        </div>
      </div>
    </header>

    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="admin-dashboard.html">Admin</a> / <span class="current">Inquiries</span></div>
      <div class="dash-page-head">
        <div>
          <h1 class="dash-page-title">Inquiries</h1>
          <p class="dash-page-desc">5 unread conversations across your listings.</p>
        </div>
        <div class="dash-head-actions">
          <div class="dash-input-icon" style="width:220px;"><i class="bi bi-search"></i><input type="text" class="dash-input" placeholder="Search inquiries..."></div>
        </div>
      </div>

      <div class="row g-3">
        <div class="col-lg-5">
          <div class="dash-tabs">
            <button class="dash-tab active">All (24)</button>
            <button class="dash-tab">Unread (5)</button>
            <button class="dash-tab">Archived</button>
          </div>
          <div class="inquiry-list">
            <div class="inquiry-item unread" data-chat="1">
              <img class="inquiry-avatar" src="https://i.pravatar.cc/100?img=47" alt="">
              <img class="inquiry-prop-thumb" src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=100&q=60" alt="">
              <div class="inquiry-main">
                <div class="inquiry-name"><span class="priority-dot priority-high"></span>John Smith</div>
                <div class="inquiry-snippet">Is the Modern Villa still available for a viewing this weekend?</div>
              </div>
              <div class="inquiry-meta">2h ago<br>Agent: John Doe</div>
            </div>
            <div class="inquiry-item unread" data-chat="2">
              <img class="inquiry-avatar" src="https://i.pravatar.cc/100?img=32" alt="">
              <img class="inquiry-prop-thumb" src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=100&q=60" alt="">
              <div class="inquiry-main">
                <div class="inquiry-name"><span class="priority-dot priority-medium"></span>Amanda Lee</div>
                <div class="inquiry-snippet">Can you send more photos of the kitchen and balcony?</div>
              </div>
              <div class="inquiry-meta">5h ago<br>Agent: Sarah Smith</div>
            </div>
            <div class="inquiry-item" data-chat="3">
              <img class="inquiry-avatar" src="https://i.pravatar.cc/100?img=15" alt="">
              <img class="inquiry-prop-thumb" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=100&q=60" alt="">
              <div class="inquiry-main">
                <div class="inquiry-name"><span class="priority-dot priority-low"></span>Carlos Diaz</div>
                <div class="inquiry-snippet">Thanks, I'll get back to you after speaking with my partner.</div>
              </div>
              <div class="inquiry-meta">1d ago<br>Agent: Michael Brown</div>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="chat-panel">
            <div class="chat-header">
              <img class="inquiry-avatar" src="https://i.pravatar.cc/100?img=47" alt="">
              <div class="flex-fill">
                <div class="inquiry-name">John Smith</div>
                <div class="dash-row-sub">Re: Modern Villa in Miami · <span class="text-primary-custom">Assigned to John Doe</span></div>
              </div>
              <span class="status-pill warning"><i class="bi bi-circle-fill"></i>High Priority</span>
              <button class="row-action-btn" title="Assign"><i class="bi bi-person-check"></i></button>
              <button class="row-action-btn" title="Archive"><i class="bi bi-archive"></i></button>
            </div>
            <div class="chat-body">
              <div>
                <div class="chat-bubble in">Hi, is the Modern Villa in Miami still available for a viewing this weekend?</div>
                <div class="chat-time">John Smith · 2:14 PM</div>
              </div>
              <div style="align-self:flex-end;text-align:right;">
                <div class="chat-bubble out">Yes it is! We have Saturday 11 AM and Sunday 2 PM open — which works better for you?</div>
                <div class="chat-time">You · 2:30 PM</div>
              </div>
              <div>
                <div class="chat-bubble in">Saturday 11 AM works great, thank you!</div>
                <div class="chat-time">John Smith · 2:34 PM</div>
              </div>
            </div>
            <div class="chat-footer">
              <input type="text" class="dash-input" placeholder="Type your reply...">
              <button class="dash-btn-primary"><i class="bi bi-send"></i></button>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn').addEventListener('click', () => { if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open'); else sidebar.classList.toggle('collapsed'); });
  const themeBtn = document.getElementById('themeToggle'); const root = document.documentElement;
  themeBtn.addEventListener('click', () => { const isLight = root.getAttribute('data-theme') === 'light'; root.setAttribute('data-theme', isLight ? 'dark' : 'light'); themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' : '<i class="bi bi-sun-fill"></i>'; });
  document.querySelectorAll('.inquiry-item').forEach(item => item.addEventListener('click', () => {
    document.querySelectorAll('.inquiry-item').forEach(i => i.classList.remove('unread'));
  }));
</script>
</body>
</html>
