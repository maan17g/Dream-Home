@include('admin.layout.header', ['title' => 'Agents | Dream Home Admin'])

<main class="dash-content">
    <div class="dash-breadcrumb"><a href="{{ route('admin.index') }}">Admin</a> / <span class="current">Agents</span></div>
    <div class="dash-page-head">
        <div>
            <h1 class="dash-page-title">Agents</h1>
            <p class="dash-page-desc">{{ $agents->count() }} agents on your platform — manage verification, performance, and approvals.</p>
        </div>
    </div>
    <div class="row g-3 mb-3">
        <div class="col-6">
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-person-badge-fill"></i></div>
                <div>
                    <div class="stat-label">Total Agents</div>
                    <div class="stat-value">{{ $agents->total() }}</div>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="stat-card">
                <div class="stat-icon"><i class="bi bi-star-fill"></i></div>
                <div>
                    <div class="stat-label">Avg. Rating</div>
                    <div class="stat-value">{{ $globalAvgRating }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-3">
        @foreach ($agents as $agent)
            <div class="col-md-6 col-lg-4">
                <div class="agent-card position-relative d-flex flex-column h-100">
                    
                    {{-- Badges Header Container --}}
                    <div class="agent-card-badges">
                        @if($agent->is_featured)
                            <span class="featured-badge">
                                <i class="bi bi-star-fill"></i> Featured
                            </span>
                        @else
                            <div></div> {{-- Spacer to keep layout intact --}}
                        @endif

                        <span class="verified-badge">
                            <i class="bi bi-patch-check-fill"></i> Verified
                        </span>
                    </div>

                    {{-- Agent Main Body --}}
                    <div class="agent-card-body text-center flex-grow-1">
                        <img src="{{ asset('storage/' . $agent->user->avatar) }}" alt="{{ $agent->user->first_name }}" class="agent-avatar mb-2">
                        <h6>{{ $agent->user->first_name . ' ' . $agent->user->last_name }}</h6>
                        <div class="agent-role">{{ ucfirst(str_replace('_', ' ', $agent->agent_type)) }}</div>
                        
                        <div class="rating-stars mb-2">★★★★★ 
                            <span class="text-muted-custom">
                                {{ $agent->review->count() > 0 ? number_format($agent->review->avg('rating'), 1) : 'No Review' }}
                            </span>
                        </div>

                        <div class="agent-stats-row">
                            <div><strong>28</strong><span>Listings</span></div>
                            <div><strong>142</strong><span>Leads</span></div>
                            <div><strong>96%</strong><span>Response</span></div>
                        </div>
                    </div>

                    {{-- Card Footer Action Buttons --}}
                    <div class="d-flex mt-3 align-items-center gap-2 pt-2 border-top-custom">
                        <a href="{{ route('agent.show', $agent->id) }}" class="dash-btn-secondary text-decoration-none flex-fill text-center py-2">
                            <i class="bi bi-eye"></i> View
                        </a>

                        <form action="{{ route('admin.agents.toggle-feature', $agent->id) }}" method="POST" class="flex-fill m-0">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="dash-btn-primary w-100 py-2 {{ $agent->is_featured ? 'is-featured' : '' }}">
                                <i class="bi {{ $agent->is_featured ? 'bi-star-fill' : 'bi-star' }}"></i>
                                {{ $agent->is_featured ? 'Unfeature' : 'Feature' }}
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        @endforeach
    </div>

    <div class="dash-pagination-bar mt-4">
        <span>
            Showing {{ $agents->firstItem() }} to {{ $agents->lastItem() }} of {{ $agents->total() }} entries
        </span>

        <ul class="dash-pagination">
            {{ $agents->links() }}
        </ul>
    </div>
</main>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>