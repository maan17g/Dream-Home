@include('user.layout.header', ['title' => 'My Profile | Dream Home'])
<main class="dash-content">
    <div class="dash-breadcrumb"><a href="{{ route('user.index') }}">Home</a> / <span class="current">Profile</span></div>
    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">My Profile</h1>
            <p class="dash-page-desc">Manage your personal info, security, and preferences.</p>
        </div>
    </div>
    <form action="{{ route('register.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- Uncomment or remove depending on your route definition --}}
        @method('PUT')
        <div class="row g-3">
            <div class="col-lg-3">
                <div class="dash-panel text-center">
                    <div class="avatar-upload">
    <div class="avatar-wrapper">

        {{-- User Avatar --}}
        @if(Auth::user()->avatar)
            <img id="avatar-preview" class="avatar-preview" src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Profile Picture">
        
        @endif

        {{-- Hidden File Input --}}
        <input type="file" name="profile_picture" id="profile_picture" class="d-none" accept="image/*">

        {{-- Camera Button --}}
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

            <div class="col-lg-9">
                <div class="dash-panel">
                    <div class="dash-tabs">
                        <button type="button" class="dash-tab active" data-tab="personal">Personal</button>
                    </div>

                    <div class="dash-tab-pane active" id="tab-personal">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="dash-form-label">First Name</label>
                                <input type="text" name="first_name" class="dash-input"
                                    value="{{ Auth::user()->first_name }}">
                                @error('first_name')
                                    <div style="color: red; font-size: 0.8rem; text-align: center; margin-top: 5px;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label class="dash-form-label">Last Name</label>
                                <input type="text" name="last_name" class="dash-input"
                                    value="{{ Auth::user()->last_name }}">
                                @error('last_name')
                                    <div style="color: red; font-size: 0.8rem; text-align: center; margin-top: 5px;">
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
                                    <div style="color: red; font-size: 0.8rem; text-align: center; margin-top: 5px;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" class="dash-btn-primary mt-3"><i class="bi bi-check-lg"></i> Save
                            Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</main>

<div class="dash-toast" id="successToast"><i class="bi bi-check-circle-fill"></i><span>Changes saved
        successfully.</span></div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  document.getElementById('profile_picture').addEventListener('change', function(event) {
    const file = event.target.files[0];
    
    if (file) {
            const reader = new FileReader();
            
            reader.onload = function(e) {
                // 3. Find ALL profile images across the page and update their source
                const allAvatars = document.getElementsByClassName('avatar-preview');
                
                Array.from(allAvatars).forEach(img => {
                    img.src = e.target.result;
                });
            };
            
            reader.readAsDataURL(file);
        }
});
    const sidebar = document.getElementById('sidebar');
    const burgerBtn = document.getElementById('burgerBtn');
    if (burgerBtn) {
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
            themeBtn.innerHTML = isLight ? '<i class="bi bi-moon-stars-fill"></i>' :
                '<i class="bi bi-sun-fill"></i>';
        });
    }
</script>
