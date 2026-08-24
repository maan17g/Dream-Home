@include('admin.layout.header', ['title' => 'Customers | Dream Home Admin'])

<main class="dash-content">
  <div class="dash-breadcrumb">
    <a href="{{ route('admin.index') }}">Admin</a> / <span class="current">Customers</span>
  </div>
  
  <div class="dash-page-head">
    <div>
      <h1 class="dash-page-title">Customers</h1>
      <p class="dash-page-desc">{{ number_format(\App\Models\User::count()) }} registered users — track activity, saved properties, and inquiries.</p>
    </div>
   
  </div>

  {{-- Filters Section --}}
  <div class="dash-filter-bar">
    <form action="{{ request()->url() }}" method="GET">
      <div class="row g-3 align-items-end">
       
        <div class="col-lg-3 col-6">
          <label class="dash-filter-label">Status</label>
          <select name="status" class="dash-select" onchange="this.form.submit()">
            <option value="">All</option>
            <option value="verified" {{ request('status') == 'verified' ? 'selected' : '' }}>Verified</option>
            <option value="unverified" {{ request('status') == 'unverified' ? 'selected' : '' }}>Unverified</option>
          </select>
        </div>
        <div class="col-lg-4 col-12">
          <label class="dash-filter-label">Sort By</label>
          <select name="sort" class="dash-select" onchange="this.form.submit()">
            <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
            <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
          </select>
        </div>
      </div>
    </form>
  </div>

  {{-- Users Table --}}
  <div class="dash-panel">
    <div class="dash-table-wrap">
      <table class="dash-table">
        <thead>
          <tr>
            <th>Customer</th>
            <th>Role</th>
            <th>Phone</th>
            <th>Status</th>
            <th>Joined</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($users as $user)
            <tr>
              <td class="d-flex align-items-center gap-2">
                <img 
                  class="dash-row-thumb" 
                  style="border-radius:50%; width: 40px; height: 40px; object-fit: cover;" 
                  src="{{asset('storage/' . $user->avatar)}}" 
                  alt="{{ $user['first_name'] }}"
                >
                <div>
                  <div class="dash-row-title">{{ ucfirst($user->first_name) }} {{ ucfirst($user->last_name) }}</div>
                  <div class="dash-row-sub">{{ $user->email }}</div>
                </div>
              </td>
              <td>
              <form action="{{ route('users.updateRoles', $user->id) }}" method="POST" class="d-inline">
    @csrf
    @method('PATCH')
   @if($user->role==='agent')
    <div name="role" 
            class="badge border-0 {{ $user->role === 'admin' ? 'bg-danger' : ($user->role === 'agent' ? 'bg-info' : 'bg-secondary') }}" 
            onchange="this.form.submit()" 
            style="cursor: pointer; outline: none;">
            <option value="agent" {{ $user->role === 'agent' ? 'selected' : '' }}>Agent</option>
              </div >
    @else
    <select name="role" 
            class="badge border-0 {{ $user->role === 'admin' ? 'bg-danger' : ($user->role === 'agent' ? 'bg-info' : 'bg-secondary') }}" 
            onchange="this.form.submit()" 
            style="cursor: pointer; outline: none;">
        
        <option value="buyer" {{ $user->role === 'buyer' ? 'selected' : '' }}>Buyer</option>
        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>

    </select>
    @endif
</form>
              </td>
              <td>{{ $user['phone'] ?? 'N/A' }}</td>
              <td>
                @if($user['is_verified'])
                  <span class="status-pill success"><i class="bi bi-circle-fill"></i> Verified</span>
                @else
                  <span class="status-pill danger"><i class="bi bi-circle-fill"></i> Unverified</span>
                @endif
              </td>
              <td>{{ \Carbon\Carbon::parse($user->created_at)->format('M d, Y') }}</td>
              <td>
                <div class="row-actions mx-auto">
               
   <form action="{{ route('users.suspend', $user->id) }}" method="POST" class="d-inline">
    @csrf
    @method('PATCH')
    
    <button type="submit" 
            class="row-action-btn border-0 bg-transparent p-0 {{ $user->status !== 'inactive' ? 'danger' : 'success' }}" 
            title="{{ $user->status !== 'inactive' ? 'Suspend User' : 'Activate User' }}"
            onclick="return confirm('Are you sure you want to change this user status?')">
        
        @if($user->status !== 'inactive')
            <i class="bi bi-slash-circle "></i>
        @else
            <i class="bi bi-check-circle text-danger" style="color: #198754;"></i>
        @endif

    </button>
</form>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center py-4">No customers found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- Pagination Bar --}}
    <div class="dash-pagination-bar">
      <span>Showing {{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }} of {{ number_format($users->total()) }} entries</span>
      
      <ul class="dash-pagination">
        {{-- Previous Page Link --}}
        @if ($users['prev_page_url'])
          <li class="page-link"><a href="{{ $users['prev_page_url'] }}"><i class="bi bi-chevron-left"></i></a></li>
     
        @endif

        {{-- Page Number Links --}}
       <div class="dash-pagination-bar">
  
  {{-- Standard Laravel Pagination Links --}}
  <div class="dash-pagination">
    {!! $users->withQueryString()->links('pagination::bootstrap-5') !!}
  </div>
</div>
      </ul>
    </div>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  const sidebar = document.getElementById('sidebar');
  document.getElementById('burgerBtn')?.addEventListener('click', () => { 
    if (window.innerWidth <= 991) sidebar.classList.toggle('mobile-open'); 
    else sidebar.classList.toggle('collapsed'); 
  });

</script>
</body>
</html>