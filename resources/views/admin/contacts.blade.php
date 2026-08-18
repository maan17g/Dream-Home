@include('admin.layout.header', ['title' => 'Inquiries | Dream Home Admin'])

<main class="dash-content">
  <div class="dash-breadcrumb">
    <a href="{{ route('admin.index') }}">Admin</a> / <span class="current">Inquiries</span>
  </div>
  
  <div class="dash-page-head">
    <div>
      <h1 class="dash-page-title">Contact Inquiries</h1>
      <p class="dash-page-desc">{{ number_format(\App\Models\ContactInquiry::count()) }} total messages — review lead details, status, and property questions.</p>
    </div>
  </div>

  {{-- Filters Section --}}
  

  {{-- Inquiries Table --}}
  <div class="dash-panel">
    <div class="dash-table-wrap">
      <table class="dash-table">
        <thead>
          <tr>
            <th>Sender</th>
            <th>Phone</th>
            <th>Subject / Property</th>
            <th>Message Preview</th>
            <th>Received</th>
          </tr>
        </thead>
        <tbody>
          @forelse($inquiries as $inquiry)
            <tr>
              <td>
                <div>
                  <div class="dash-row-title">{{ ucfirst($inquiry->name) }}</div>
                  <div class="dash-row-sub">{{ $inquiry->email }}</div>
                </div>
              </td>
              <td>{{ $inquiry->phone ?? 'N/A' }}</td>
              <td>
                <div class="fw-semibold">{{ $inquiry->subject ?? 'General Inquiry' }}</div>
                @if($inquiry->property)
                  <small class="text-primary">
                    <i class="bi bi-house"></i> {{ Str::limit($inquiry->property->title, 25) }}
                  </small>
                @endif
              </td>
              <td style="max-width: 250px;">
                <span class="text-truncate d-block" title="{{ $inquiry->message }}">
                  {{ Str::limit($inquiry->message, 60) }}
                </span>
              </td>
              <td>{{ \Carbon\Carbon::parse($inquiry->created_at)->format('M d, Y') }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center py-4">No contact inquiries found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- Pagination Bar --}}
    <div class="dash-pagination-bar">
      <span>Showing {{ $inquiries->firstItem() ?? 0 }} to {{ $inquiries->lastItem() ?? 0 }} of {{ number_format($inquiries->total()) }} entries</span>
      
      <div class="dash-pagination">
        {!! $inquiries->withQueryString()->links('pagination::bootstrap-5') !!}
      </div>
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