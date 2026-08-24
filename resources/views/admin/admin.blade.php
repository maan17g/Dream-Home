@include('admin.layout.header', ['title' => 'Admin Profile | Dream Home'])
<main class="dash-content">
    <div class="dash-breadcrumb">
        <a href="{{ route('admin.index') }}">Home</a> / <span class="current">Profile</span>
    </div>

    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">Admin Profile</h1>
            <p class="dash-page-desc">Manage your personal info, security, and preferences.</p>
        </div>
    </div>

    <div class="row g-3">
        <!-- Sidebar Profile Panel -->
        <div class="col-lg-3">
            <div class="dash-panel text-center">
                <div class="avatar-upload">
                    <div class="avatar-wrapper">

                        {{-- User Avatar --}}
                        @if (Auth::user()->avatar)
                            <img id="avatar-preview" class="avatar-preview"
                                src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile Picture">
                        @endif

                        {{-- Camera Button (Triggers Hidden Input inside Form 1) --}}
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
                <div class="dash-row-sub">Member since {{ Auth::user()->created_at->format('F Y') }}</div>
            </div>
        </div>

        <!-- Main Content Area with Tabs -->
        <div class="col-lg-9">
            <div class="dash-panel">
                <div class="dash-tabs mb-4">
                    <button type="button" class="dash-tab active" data-tab="personal">Personal</button>
                    <button type="button" class="dash-tab" data-tab="security">Security</button>
                </div>

                {{-- TAB 1: PERSONAL INFO FORM --}}
                <div class="dash-tab-pane active" id="tab-personal">
                    <form action="{{ route('register.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Hidden File Input linked via label --}}
                        <input type="file" name="profile_picture" id="profile_picture" class="d-none" accept="image/*">

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="dash-form-label">First Name</label>
                                <input type="text" name="first_name" class="dash-input"
                                    value="{{ Auth::user()->first_name }}">
                                @error('first_name')
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">Last Name</label>
                                <input type="text" name="last_name" class="dash-input"
                                    value="{{ Auth::user()->last_name }}">
                                @error('last_name')
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">Email</label>
                                <input type="email" name="email" class="dash-input"
                                    value="{{ Auth::user()->email }}" disabled>
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">Phone</label>
                                <input type="text" name="phone" class="dash-input"
                                    value="{{ Auth::user()->phone }}">
                                @error('phone')
                                    <div style="color: red; font-size: 0.8rem; margin-top: 5px;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="dash-btn-primary mt-3">
                            <i class="bi bi-check-lg"></i> Save Changes
                        </button>
                    </form>
                </div>

                {{-- TAB 2: SECURITY FORM --}}
                <div class="dash-tab-pane d-none" id="tab-security">
                    <form action="{{ route('register.update.password') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-3">
                            <div class="col-md-4">
                                <label class="dash-form-label">Current Password</label>
                                <input type="password" name="current_password" class="dash-input form-control"
                                    placeholder="••••••••" required>
                                @error('current_password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="dash-form-label">New Password</label>
                                <input type="password" name="password" class="dash-input form-control"
                                    placeholder="••••••••" required>
                                @error('password')
                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label class="dash-form-label">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="dash-input form-control"
                                    placeholder="••••••••" required>
                            </div>
                        </div>

                        <button type="submit" class="dash-btn-primary btn btn-primary mt-4">
                            <i class="bi bi-shield-check me-1"></i> Update Password
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</main>

<div class="dash-toast" id="successToast">
    <i class="bi bi-check-circle-fill"></i>
    <span>Changes saved successfully.</span>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    @if ($errors->has('current_password') || $errors->has('password'))
        document.querySelector('[data-tab="security"]')?.click();
    @endif

    const userTabs = document.querySelectorAll('.dash-tabs .dash-tab');
    const userPanes = document.querySelectorAll('.dash-tab-pane');

    userTabs.forEach(tab => {
        tab.addEventListener('click', () => {
            const targetPaneId = 'tab-' + tab.dataset.tab;

            userTabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');

            userPanes.forEach(pane => {
                if (pane.id === targetPaneId) {
                    pane.classList.remove('d-none');
                    pane.classList.add('active');
                } else {
                    pane.classList.add('d-none');
                    pane.classList.remove('active');
                }
            });
        });
    });

    const fileInput = document.getElementById('profile_picture');
    if (fileInput) {
        fileInput.addEventListener('change', function(event) {
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
    }

    const sidebar = document.getElementById('sidebar');
    const burgerBtn = document.getElementById('burgerBtn');
    if (burgerBtn) {
        burgerBtn.addEventListener('click', () => {
            if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open');
            else sidebar.classList.toggle('collapsed');
        });
    }
</script>