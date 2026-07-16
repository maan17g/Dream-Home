@include('user.layout.header',['title'=>'Inquiries | Dream Home'])
    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="user-dashboard.html">Home</a> / <span class="current">Inquiries</span></div>
      <div class="dash-page-head"><div><h1 class="dash-page-title">Inquiries</h1><p class="dash-page-desc">Your conversations with agents about listings.</p></div></div>

      <div class="row g-3">
        <div class="col-lg-5">
          <div class="inquiry-list">
            <div class="inquiry-item unread">
              <img class="inquiry-prop-thumb" src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=100&q=60" alt="">
              <div class="inquiry-main"><div class="inquiry-name">Modern Villa in Miami</div><div class="inquiry-snippet">Agent John Doe replied: "Yes it is! We have Saturday 11 AM..."</div></div>
              <div class="inquiry-meta">2h ago</div>
            </div>
            <div class="inquiry-item">
              <img class="inquiry-prop-thumb" src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=100&q=60" alt="">
              <div class="inquiry-main"><div class="inquiry-name">Luxury Apartment in LA</div><div class="inquiry-snippet">You: Can you send more photos of the kitchen?</div></div>
              <div class="inquiry-meta">1d ago</div>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="chat-panel">
            <div class="chat-header">
              <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=100&q=60" style="width:44px;height:44px;border-radius:8px;object-fit:cover;">
              <div class="flex-fill"><div class="inquiry-name">Modern Villa in Miami</div><div class="dash-row-sub">Agent: John Doe · $850,000</div></div>
              <span class="status-pill success"><i class="bi bi-circle-fill"></i>Active</span>
            </div>
            <div class="chat-body">
              <div style="align-self:flex-end;text-align:right;"><div class="chat-bubble out">Hi, is the Modern Villa in Miami still available for a viewing this weekend?</div><div class="chat-time">You · 2:14 PM</div></div>
              <div><div class="chat-bubble in">Yes it is! We have Saturday 11 AM and Sunday 2 PM open — which works better for you?</div><div class="chat-time">John Doe · 2:30 PM</div></div>
              <div style="align-self:flex-end;text-align:right;"><div class="chat-bubble out">Saturday 11 AM works great, thank you!</div><div class="chat-time">You · 2:34 PM</div></div>
            </div>
            <div class="chat-footer">
              <input type="text" class="dash-input" placeholder="Type your message...">
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
  document.querySelectorAll('.inquiry-item').forEach(item => item.addEventListener('click', () => item.classList.remove('unread')));
</script>
</body>
</html>
