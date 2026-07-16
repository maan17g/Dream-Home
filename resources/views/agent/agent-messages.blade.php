@include('agent.layout.header',['title'=>'Messages | Dream Home Agent'])

    <main class="dash-content">
      <div class="dash-breadcrumb"><a href="agent-dashboard.html">Agent</a> / <span class="current">Messages</span></div>
      <div class="dash-page-head">
        <div><h1 class="dash-page-title">Messages</h1><p class="dash-page-desc">3 unread conversations with prospective buyers.</p></div>
      </div>

      <div class="row g-3">
        <div class="col-lg-5">
          <div class="dash-input-icon mb-3"><i class="bi bi-search"></i><input type="text" class="dash-input" placeholder="Search conversations..."></div>
          <div class="inquiry-list">
            <div class="inquiry-item unread">
              <img class="inquiry-avatar" src="https://i.pravatar.cc/100?img=47" alt="">
              <img class="inquiry-prop-thumb" src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=100&q=60" alt="">
              <div class="inquiry-main"><div class="inquiry-name">John Smith</div><div class="inquiry-snippet">Is the Modern Villa still available this weekend?</div></div>
              <div class="inquiry-meta">2h ago</div>
            </div>
            <div class="inquiry-item unread">
              <img class="inquiry-avatar" src="https://i.pravatar.cc/100?img=32" alt="">
              <img class="inquiry-prop-thumb" src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=100&q=60" alt="">
              <div class="inquiry-main"><div class="inquiry-name">Amanda Lee</div><div class="inquiry-snippet">Can you send more photos of the kitchen?</div></div>
              <div class="inquiry-meta">5h ago</div>
            </div>
            <div class="inquiry-item unread">
              <img class="inquiry-avatar" src="https://i.pravatar.cc/100?img=15" alt="">
              <img class="inquiry-prop-thumb" src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?auto=format&fit=crop&w=100&q=60" alt="">
              <div class="inquiry-main"><div class="inquiry-name">Carlos Diaz</div><div class="inquiry-snippet">What's the HOA fee for the Downtown Loft?</div></div>
              <div class="inquiry-meta">1d ago</div>
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <div class="chat-panel">
            <div class="chat-header">
              <img class="inquiry-avatar" src="https://i.pravatar.cc/100?img=47" alt="">
              <div class="flex-fill"><div class="inquiry-name">John Smith</div><div class="dash-row-sub">Re: Modern Villa in Miami</div></div>
              <button class="row-action-btn" title="Property"><i class="bi bi-house"></i></button>
            </div>
            <div style="padding:.9rem 1.3rem;border-bottom:1px solid var(--border-color);display:flex;align-items:center;gap:10px;">
              <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=100&q=60" style="width:44px;height:44px;border-radius:8px;object-fit:cover;">
              <div class="flex-fill"><div class="dash-row-title" style="font-size:.82rem;">Modern Villa in Miami</div><div class="dash-row-sub">$850,000 · Miami, Florida</div></div>
              <a href="agent-properties.html" class="dash-link">View</a>
            </div>
            <div class="chat-body">
              <div><div class="chat-bubble in">Hi, is the Modern Villa in Miami still available for a viewing this weekend?</div><div class="chat-time">John Smith · 2:14 PM</div></div>
              <div style="align-self:flex-end;text-align:right;"><div class="chat-bubble out">Yes it is! We have Saturday 11 AM and Sunday 2 PM open — which works better?</div><div class="chat-time">You · 2:30 PM</div></div>
              <div><div class="chat-bubble in">Saturday 11 AM works great, thank you!</div><div class="chat-time">John Smith · 2:34 PM</div></div>
              <div style="align-self:flex-end;text-align:right;">
                <div class="chat-bubble out"><i class="bi bi-paperclip"></i> floor-plan.pdf</div>
                <div class="chat-time">You · 2:36 PM</div>
              </div>
            </div>
            <div class="chat-footer">
              <button class="row-action-btn" title="Attach"><i class="bi bi-paperclip"></i></button>
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
  document.querySelectorAll('.inquiry-item').forEach(item => item.addEventListener('click', () => item.classList.remove('unread')));
</script>
</body>
</html>
