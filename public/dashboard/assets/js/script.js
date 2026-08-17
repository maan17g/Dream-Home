document.addEventListener('DOMContentLoaded', function () {

    // ==========================================
    // 1. PROPERTY FORM TABS & NAVIGATION
    // ==========================================
    const propertyTabs = document.querySelectorAll('.property-tab');
    const propertyPanes = document.querySelectorAll('.property-tab-pane');
    const order = ['basic', 'pricing', 'media', 'location', 'features', 'seo'];

    function activatePropertyTab(name) {
        propertyTabs.forEach(t => t.classList.toggle('active', t.dataset.tab === name));
        propertyPanes.forEach(p => {
            if (p.id === 'tab-' + name) {
                p.classList.remove('d-none');
                p.classList.add('active');
            } else {
                p.classList.add('d-none');
                p.classList.remove('active');
            }
        });
    }

    if (propertyTabs.length > 0) {
        propertyTabs.forEach(t => t.addEventListener('click', () => activatePropertyTab(t.dataset.tab)));
    }

    // Next Button
    const nextBtn = document.getElementById('nextTabBtn');
    if (nextBtn) {
        nextBtn.addEventListener('click', () => {
            const activeTab = document.querySelector('.property-tab.active');
            if (activeTab) {
                const current = activeTab.dataset.tab;
                const idx = order.indexOf(current);
                if (idx < order.length - 1) activatePropertyTab(order[idx + 1]);
            }
        });
    }

    // Prev Button
    const prevBtn = document.getElementById('prevTabBtn');
    if (prevBtn) {
        prevBtn.addEventListener('click', () => {
            const activeTab = document.querySelector('.property-tab.active');
            if (activeTab) {
                const current = activeTab.dataset.tab;
                const idx = order.indexOf(current);
                if (idx > 0) activatePropertyTab(order[idx - 1]);
            }
        });
    }

    // ==========================================
    // 2. FEATURED IMAGE LIVE PREVIEW
    // ==========================================
    const propertyImageInput = document.getElementById('property_f_image');
    if (propertyImageInput) {
        propertyImageInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            const previewBox = document.getElementById('featuredPreview');
            const previewImg = document.getElementById('featuredPreviewImg');

            if (file && previewBox && previewImg) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    previewBox.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            }
        });
    }

    // ==========================================
    // 3. GALLERY IMAGES LIVE PREVIEW
    // ==========================================
    const galleryImagesInput = document.getElementById('property_all_images');
    if (galleryImagesInput) {
        galleryImagesInput.addEventListener('change', function (e) {
            const files = e.target.files;
            const galleryPreview = document.getElementById('galleryPreview');
            if (!galleryPreview) return;

            galleryPreview.innerHTML = ''; // Clear previous previews

            if (files.length > 0) {
                Array.from(files).forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const col = document.createElement('div');
                        col.className = 'col-3 position-relative';
                        col.innerHTML = `
                            <div class="border rounded p-1 bg-dark text-center">
                                <img src="${e.target.result}" class="img-fluid rounded" style="height: 100px; width: 100%; object-fit: cover;">
                                <span class="badge bg-secondary position-absolute top-0 end-0 m-1">#${index + 1}</span>
                            </div>
                        `;
                        galleryPreview.appendChild(col);
                    };
                    reader.readAsDataURL(file);
                });
            }
        });
    }

    // ==========================================
    // 4. SIDEBAR TOGGLE
    // ==========================================
    const sidebar = document.getElementById('sidebar');
    const burgerBtn = document.getElementById('burgerBtn');

    if (burgerBtn && sidebar) {
        burgerBtn.addEventListener('click', () => {
            if (window.innerWidth <= 991) {
                sidebar.classList.toggle('mobile-open');
            } else {
                sidebar.classList.toggle('collapsed');
            }
        });
    }

    // ==========================================
    // 5. DASHBOARD APPOINTMENT TABS
    // ==========================================
    const dashTabs = document.querySelectorAll('.dash-tab');
    if (dashTabs.length > 0) {
        dashTabs.forEach(t => t.addEventListener('click', () => {
            dashTabs.forEach(x => x.classList.remove('active'));
            t.classList.add('active');

            const apptPanes = document.querySelectorAll('.appt-pane');
            apptPanes.forEach(p => p.classList.add('d-none'));

            const targetPane = document.getElementById('pane-' + t.dataset.tab);
            if (targetPane) {
                targetPane.classList.remove('d-none');
            }
        }));
    }

});