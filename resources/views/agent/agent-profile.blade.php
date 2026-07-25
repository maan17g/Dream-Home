@include('agent.layout.header', ['title' => 'My Profile | Dream Home Agent'])

<main class="dash-content">
    <div class="dash-breadcrumb"><a href="{{ route('agent.index') }}">Agent</a> / <span class="current">Profile</span></div>
    
    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">My Profile</h1>
            <p class="dash-page-desc">Manage your personal info, professional details, and social channels.</p>
        </div>
    </div>

    <form action="{{ route('register.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row g-3">
            <!-- Sidebar Profile Card -->
            <div class="col-lg-3">
                <div class="dash-panel text-center">
                    <div class="avatar-upload">
                        <div class="avatar-wrapper">
                            @if(Auth::user()->avatar)
                                <img id="avatar-preview" class="avatar-preview" src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile Picture">
                            @endif

                            <input type="file" name="profile_picture" id="profile_picture" class="d-none" accept="image/*">

                            <label for="profile_picture" class="avatar-upload-btn">
                                <i class="bi bi-camera-fill"></i>
                            </label>
                        </div>

                        @error('profile_picture')
                            <div style="color: red; font-size: 0.8rem; text-align: center; margin-top: 5px;">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <h6 class="mt-3 mb-0">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h6>
                    <div class="dash-row-sub mb-2">Agent Account</div>
                    <div class="dash-row-sub">Member since {{ Auth::user()->created_at->format('F Y') }}</div>
                </div>
            </div>

            <!-- Main Form Area -->
            <div class="col-lg-9">
                <div class="dash-panel">
                    <!-- Navigation Tabs -->
                    <div class="dash-tabs">
                        <button type="button" class="dash-tab active" data-tab="personal">Personal</button>
                        <button type="button" class="dash-tab" data-tab="professional">Professional</button>
                        <button type="button" class="dash-tab" data-tab="social">Social</button>
                    </div>

                    <!-- 1. Personal Info Tab -->
                    <div class="dash-tab-pane active" id="tab-personal">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="dash-form-label">First Name</label>
                                <input type="text" name="first_name" class="dash-input" value="{{ old('first_name', Auth::user()->first_name) }}">
                                @error('first_name')
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">Last Name</label>
                                <input type="text" name="last_name" class="dash-input" value="{{ old('last_name', Auth::user()->last_name) }}">
                                @error('last_name')
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">Email</label>
                                <input type="email" class="dash-input" value="{{ Auth::user()->email }}" disabled>
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">Phone</label>
                                <input type="text" name="phone" class="dash-input" value="{{ old('phone', Auth::user()->phone) }}">
                                @error('phone')
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label class="dash-form-label">Bio</label>
                                <textarea name="bio" class="dash-input" rows="4">{{ old('bio', Auth::user()->agent['bio']) }}</textarea>
                                @error('bio')
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="dash-btn-primary mt-3">
                            <i class="bi bi-check-lg"></i> Save Personal Details
                        </button>
                    </div>

                    <!-- 2. Professional Tab -->
                    <div class="dash-tab-pane d-none" id="tab-professional">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="dash-form-label">License Number</label>
                                <input type="text" name="license_number" class="dash-input" value="{{ old('license_number', Auth::user()->agent['license_no']) }}">
                                @error('license_number')
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">Years of Experience</label>
                                <input type="number" name="experience" class="dash-input" value="{{ old('experience', Auth::user()->agent['years_experience']) }}">
                                @error('experience')
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="dash-btn-primary mt-3">
                            <i class="bi bi-check-lg"></i> Save Professional Info
                        </button>
                    </div>

                    <!-- 3. Social Links Tab -->
                    <div class="dash-tab-pane d-none" id="tab-social">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="dash-form-label">Instagram Profile</label>
                                <input type="url" name="instagram" class="dash-input" value="{{ old('instagram', Auth::user()->agent['instagram']) }}" placeholder="https://instagram.com/username">
                                @error('instagram')
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">LinkedIn Profile</label>
                                <input type="url" name="linkedin" class="dash-input" value="{{ old('linkedin', Auth::user()->agent['linkedin']) }}" placeholder="https://linkedin.com/in/username">
                                @error('linkedin')
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">Twitter / X Profile</label>
                                <input type="url" name="twitter" class="dash-input" value="{{ old('twitter', Auth::user()->agent['twitter']) }}" placeholder="https://x.com/username">
                                @error('twitter')
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">Facebook Profile</label>
                                <input type="url" name="facebook" class="dash-input" value="{{ old('facebook', Auth::user()->agent['facebook']) }}" placeholder="https://facebook.com/username">
                                @error('facebook')
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="dash-btn-primary mt-3">
                            <i class="bi bi-check-lg"></i> Save Social Links
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</main>

<div class="dash-toast" id="successToast">
    <i class="bi bi-check-circle-fill"></i>
    <span>Changes saved successfully.</span>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Live Avatar Preview Functionality
    document.getElementById('profile_picture').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const allAvatars = document.getElementsByClassName('avatar-preview');
                Array.from(allAvatars).forEach(img => {
                    img.src = e.target.result;
                });
            };
            reader.readAsDataURL(file);
        }
    });

    // Profile Tabs Switcher (Personal, Professional, Social)
    const agentTabs = document.querySelectorAll('.dash-tabs .dash-tab');
    const agentPanes = document.querySelectorAll('.dash-tab-pane');

    agentTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const targetId = 'tab-' + tab.dataset.tab;

            agentTabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');

            agentPanes.forEach(pane => {
                if (pane.id === targetId) {
                    pane.classList.remove('d-none');
                    pane.classList.add('active');
                } else {
                    pane.classList.add('d-none');
                    pane.classList.remove('active');
                }
            });
        });
    });

    // Sidebar & Theme Toggle Handlers
    const sidebar = document.getElementById('sidebar');
    const burgerBtn = document.getElementById('burgerBtn');
    if (burgerBtn && sidebar) {
        burgerBtn.addEventListener('click', () => {
            if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open');
            else sidebar.classList.toggle('collapsed');
        });
    }

    const themeBtn = document.getElementById('themeToggle');
    const root = document.documentElement;
    if (themeBtn) {
        themeBtn.addEventListener('click', () => {
            const isLight = root.getAttribute('data-theme') === 'light';
            root.setAttribute('data-theme', isLight ? 'dark' : 'light');
            themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' : '<i class="bi bi-sun-fill"></i>';
        });
    }
</script>
@include('layout.Notification')
</body>
</html>