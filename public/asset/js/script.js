/* ============================================================
   DREAM HOME — Main JavaScript
   ============================================================ */

// // ---- 1. THEME TOGGLE ----
// const themeBtn = document.getElementById("themeToggle");

// if (themeBtn) {
//     const themeIcon = themeBtn.querySelector("i");
//     const body = document.body;

//     // Restore saved theme
//     const savedTheme = localStorage.getItem("theme") || "dark";
//     body.setAttribute("data-theme", savedTheme);

//     if (savedTheme === "light") {
//         themeIcon.classList.replace("bi-sun-fill", "bi-moon-fill");
//     } else {
//         themeIcon.classList.replace("bi-moon-fill", "bi-sun-fill");
//     }

//     themeBtn.addEventListener("click", () => {
//         const current = body.getAttribute("data-theme");

//         if (current === "dark") {
//             body.setAttribute("data-theme", "light");
//             themeIcon.classList.replace("bi-sun-fill", "bi-moon-fill");
//             localStorage.setItem("theme", "light");
//         } else {
//             body.setAttribute("data-theme", "dark");
//             themeIcon.classList.replace("bi-moon-fill", "bi-sun-fill");
//             localStorage.setItem("theme", "dark");
//         }
//     });
// }

// ---- 2. NAVBAR SCROLL EFFECT ----
const navbar = document.getElementById("navbar");
if (navbar) {
  window.addEventListener("scroll", () => {
    navbar.classList.toggle("nav-scroll", window.scrollY > 50);
  });
}

// ---- 3. COUNTER ANIMATION ----
const counters = document.querySelectorAll(".counter");
if (counters.length) {
  counters.forEach(counter => {
    const start  = +counter.dataset.bsStart;
    const end    = +counter.dataset.bsEnd;
    const sign   = counter.dataset.bsSign || "";
    let i = start;
    const duration = 2000; // ms total
    const steps    = end - start;
    const interval = setInterval(() => {
      counter.innerHTML = i + sign;
      i++;
      if (i > end) clearInterval(interval);
    }, duration / steps);
  });
}

// ---- 4. PROPERTIES DATA ----
const allProperties = [
  {
    status: "For Sale",
     statusClass: "sale",
     price: "$850,000", priceNum: 850000,
    img: "https://images.unsplash.com/photo-1600585154526-990dced4db0d?auto=format&fit=crop&w=800&q=80",
    title: "Modern Luxury Villa", location: "Beverly Hills, CA",
    beds: 5, baths: 4, size: "4,500 sqft", sizeNum: 4500,
    type: "villa", featured: true
  },
  {
    status: "New Listing", statusClass: "new",
    price: "$2,100,000", priceNum: 2100000,
    img: "https://images.unsplash.com/photo-1572120360610-d971b9d7767c?auto=format&fit=crop&w=800&q=80",
    title: "Ocean View Penthouse", location: "Miami, FL",
    beds: 3, baths: 4, size: "3,200 sqft", sizeNum: 3200,
    type: "penthouse", featured: true
  },
  {
    status: "For Rent", statusClass: "rent",
    price: "$6,500/mo", priceNum: 6500,
    img: "https://images.unsplash.com/photo-1568605114967-8130f3a36994?auto=format&fit=crop&w=800&q=80",
    title: "Modern Family Townhouse", location: "Seattle, WA",
    beds: 4, baths: 3, size: "2,800 sqft", sizeNum: 2800,
    type: "townhouse", featured: true
  },
  {
    status: "For Sale", statusClass: "sale",
    price: "$1,250,000", priceNum: 1250000,
    img: "https://images.unsplash.com/photo-1600566752355-35792bedcfea?auto=format&fit=crop&w=800&q=80",
    title: "Contemporary Apartment", location: "New York, NY",
    beds: 2, baths: 2, size: "1,800 sqft", sizeNum: 1800,
    type: "apartment",featured:true
  },
  {
    status: "For Sale", statusClass: "sale",
    price: "$3,500,000", priceNum: 3500000,
    img: "https://images.unsplash.com/photo-1600047509358-9dc75507daeb?auto=format&fit=crop&w=800&q=80",
    title: "Waterfront Estate", location: "Malibu, CA",
    beds: 6, baths: 5, size: "6,200 sqft", sizeNum: 6200,
    type: "villa"
  },
  {
    status: "For Rent", statusClass: "rent",
    price: "$4,200/mo", priceNum: 4200,
    img: "https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=800&q=80",
    title: "Downtown Loft", location: "Chicago, IL",
    beds: 2, baths: 2, size: "1,500 sqft", sizeNum: 1500,
    type: "apartment"
  },
  {
    status: "New Listing", statusClass: "new",
    price: "$975,000", priceNum: 975000,
    img: "https://images.unsplash.com/photo-1599423300746-b62533397364?auto=format&fit=crop&w=800&q=80",
    title: "Suburban Family Home", location: "Austin, TX",
    beds: 4, baths: 3, size: "3,400 sqft", sizeNum: 3400,
    type: "townhouse"
  },
  {
    status: "For Sale", statusClass: "sale",
    price: "$1,800,000", priceNum: 1800000,
    img: "https://images.unsplash.com/photo-1600607687644-c7171b42498b?auto=format&fit=crop&w=800&q=80",
    title: "Mountain View Chalet", location: "Denver, CO",
    beds: 5, baths: 4, size: "4,100 sqft", sizeNum: 4100,
    type: "villa"
  },
  {
    status: "For Rent", statusClass: "rent",
    price: "$5,800/mo", priceNum: 5800,
    img: "https://images.unsplash.com/photo-1600607687920-4e2a09cf159d?auto=format&fit=crop&w=800&q=80",
    title: "Luxury High-Rise", location: "San Francisco, CA",
    beds: 3, baths: 3, size: "2,400 sqft", sizeNum: 2400,
    type: "penthouse"
  },
  {
    status: "For Sale", statusClass: "sale",
    price: "$650,000", priceNum: 650000,
    img: "https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&w=800&q=80",
    title: "Cozy Cottage", location: "Portland, OR",
    beds: 3, baths: 2, size: "2,100 sqft", sizeNum: 2100,
    type: "townhouse"
  },
  {
    status: "New Listing", statusClass: "new",
    price: "$4,200,000", priceNum: 4200000,
    img: "https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?auto=format&fit=crop&w=800&q=80",
    title: "Beachfront Paradise", location: "Hawaii",
    beds: 5, baths: 5, size: "5,500 sqft", sizeNum: 5500,
    type: "villa"
  },
  {
    status: "For Rent", statusClass: "rent",
    price: "$3,900/mo", priceNum: 3900,
    img: "https://images.unsplash.com/photo-1600585152915-d208bec867a1?auto=format&fit=crop&w=800&q=80",
    title: "Urban Studio", location: "Boston, MA",
    beds: 1, baths: 1, size: "850 sqft", sizeNum: 850,
    type: "apartment"
  }
];

// ---- 5. RENDER PROPERTY CARD ----
const AGENTS = [
  { name: "Jenny Wilson",     role: "Premium Agent",    img: "https://randomuser.me/api/portraits/women/44.jpg" },
  { name: "Robert Fox",       role: "Luxury Specialist", img: "https://randomuser.me/api/portraits/men/32.jpg" },
  { name: "Leslie Alexander", role: "Rental Expert",     img: "https://randomuser.me/api/portraits/women/68.jpg" },
  { name: "Darrell Steward",  role: "Property Advisor",  img: "https://randomuser.me/api/portraits/men/76.jpg" }
];

function renderPropertyCard(prop, index = 0) {
  const agent = AGENTS[index % AGENTS.length];
  const col = document.createElement("div");
  col.className = "col-lg-4 col-md-6 fprop-card reveal-child";
  col.innerHTML = `

    <div class="card property-card border-0 h-100">
      <div class="card-image-wrapper position-relative">
        <span class="badge-custom position-absolute top-0 start-0 m-3">${prop.status}</span>
        <button type="button" class="card-fav-btn position-absolute top-0 end-0 m-3" aria-label="Save property">
          <i class="bi bi-heart"></i>
        </button>
        <span class="badge-price position-absolute bottom-0 end-0 m-3">${prop.price}</span>
        <img src="${prop.img}" alt="${prop.title}" loading="lazy">
        <span class="badge-tag position-absolute start-0 ms-3">${prop.status}</span>
      </div>
      <div class="card-body p-4 d-flex flex-column">
        <h5 class="card-title mb-2">${prop.title}</h5>
        <p class="card-location mb-3 d-flex align-items-center">
          <i class="bi bi-geo-alt-fill me-2"></i>${prop.location}
        </p>
        <div class="card-features d-flex justify-content-between pt-3 feature-border">
          <div class="feature-item d-flex align-items-center gap-1">
            <i class="bi bi-door-open border-end-1"></i> ${prop.beds} Beds
          </div>
          <div class="feature-item d-flex align-items-center gap-1">
            <i class="bi bi-droplet-half"></i> ${prop.baths} Baths
          </div>
          <div class="feature-item d-flex align-items-center gap-1">
            <i class="bi bi-arrows-fullscreen"></i> ${prop.size}
          </div>
        </div>
        <div class="card-agent-row">
          <img class="card-agent-avatar" src="${agent.img}" alt="${agent.name}" loading="lazy">
          <div class="card-agent-info">
            <span class="card-agent-name">${agent.name}</span>
            <span class="card-agent-role">${agent.role}</span>
          </div>
        </div>
      </div>
    </div>
  `;

  const favBtn = col.querySelector(".card-fav-btn");
  favBtn.addEventListener("click", (e) => {
    e.stopPropagation();
    favBtn.classList.toggle("active");
    const icon = favBtn.querySelector("i");
    icon.classList.toggle("bi-heart");
    icon.classList.toggle("bi-heart-fill");
  });

  return col;

}

// ---- 6. FEATURED PROPERTIES (index.html) ----
const featuredGrid = document.querySelector(".cont-prop");
if (featuredGrid) {
  featuredGrid.classList.add("reveal-stagger");
  allProperties
    .filter(p => p.featured)
    .forEach((p, i) => featuredGrid.appendChild(renderPropertyCard(p, i)));
}


// ---- 7. PROPERTIES PAGE (property.html) ----
const propertiesGrid = document.getElementById("propertiesGrid");
if (propertiesGrid) {
  let currentProps = [...allProperties];

  function renderGrid(props) {
    propertiesGrid.innerHTML = "";
    propertiesGrid.classList.add("reveal-stagger");
    propertiesGrid.classList.remove("in-view");
    const count = document.getElementById("resultCount");
    if (count) count.textContent = props.length;
    props.forEach((p, i) => propertiesGrid.appendChild(renderPropertyCard(p, i)));
    requestAnimationFrame(() => propertiesGrid.classList.add("in-view"));
  }

  renderGrid(currentProps);

  // Price range display
  const priceRange = document.getElementById("priceRange");
  const priceValue = document.getElementById("priceValue");
  if (priceRange && priceValue) {
    priceRange.addEventListener("input", () => {
      priceValue.textContent = "$" + Number(priceRange.value).toLocaleString();
    });
  }

  // Apply filters
  const btnFilter = document.querySelector(".btn-filter");
  if (btnFilter) {
    btnFilter.addEventListener("click", applyFilters);
  }

  // Reset filters
  function resetFilters() {
    document.getElementById("searchInput").value = "";
    document.getElementById("propertyType").value = "";
    document.getElementById("bedrooms").value = "";
    document.getElementById("bathrooms").value = "";
    document.getElementById("minArea").value = "";
    document.getElementById("statusSale").checked = false;
    document.getElementById("statusRent").checked = false;
    document.getElementById("statusNew").checked  = false;
    if (priceRange) { priceRange.value = 5000000; priceValue.textContent = "$5,000,000"; }
    renderGrid(allProperties);
  }

  const btnReset = document.querySelector(".btn-reset");
  if (btnReset) btnReset.addEventListener("click", resetFilters);

  const btnResetAll = document.getElementById("btnResetAll");
  if (btnResetAll) btnResetAll.addEventListener("click", resetFilters);

  // Sort
  const sortBy = document.getElementById("sortBy");
  if (sortBy) {
    sortBy.addEventListener("change", applyFilters);
  }

  function applyFilters() {
    const search   = (document.getElementById("searchInput")?.value || "").toLowerCase();
    const type     = document.getElementById("propertyType")?.value || "";
    const minBeds  = +(document.getElementById("bedrooms")?.value || 0);
    const minBaths = +(document.getElementById("bathrooms")?.value || 0);
    const minArea  = +(document.getElementById("minArea")?.value || 0);
    const maxPrice = +(priceRange?.value || 5000000);
    const wantSale = document.getElementById("statusSale")?.checked;
    const wantRent = document.getElementById("statusRent")?.checked;
    const wantNew  = document.getElementById("statusNew")?.checked;
    const sort     = sortBy?.value || "featured";

    let filtered = allProperties.filter(p => {
      if (search && !p.title.toLowerCase().includes(search) && !p.location.toLowerCase().includes(search)) return false;
      if (type && p.type !== type) return false;
      if (minBeds  && p.beds  < minBeds)  return false;
      if (minBaths && p.baths < minBaths) return false;
      if (minArea  && p.sizeNum < minArea) return false;
      if (p.priceNum > maxPrice) return false;
      if (wantSale || wantRent || wantNew) {
        const matchSale = wantSale && p.statusClass === "sale";
        const matchRent = wantRent && p.statusClass === "rent";
        const matchNew  = wantNew  && p.statusClass === "new";
        if (!matchSale && !matchRent && !matchNew) return false;
      }
      return true;
    });

    // Sort
    if (sort === "price-low")  filtered.sort((a, b) => a.priceNum - b.priceNum);
    if (sort === "price-high") filtered.sort((a, b) => b.priceNum - a.priceNum);
    if (sort === "beds")       filtered.sort((a, b) => b.beds - a.beds);
    if (sort === "newest")     filtered.reverse();

    renderGrid(filtered);
  }
}

// ---- 8. SCROLL REVEAL ----
// Sections and cards fade/slide into place the first time they enter the viewport.
const revealTargets = document.querySelectorAll(
  "[data-reveal], .mission-card, .team-card, .testimonial-card, .info-card, " +
  ".contact-info-card, .feature-box, .social-connect-card, .sleek-card, " +
  ".timeline-item, .value-item, .city-card, .category-card, .step-item, " +
  ".blog-card, .partner-logo, .alerts-banner"
);
if (revealTargets.length && "IntersectionObserver" in window) {
  revealTargets.forEach(el => el.classList.add("reveal"));
  const io = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("in-view");
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15, rootMargin: "0px 0px -40px 0px" });
  revealTargets.forEach(el => io.observe(el));
}

// Also fire the property/featured grids' stagger once they scroll into view
const staggerGrids = document.querySelectorAll(".reveal-stagger");
if (staggerGrids.length && "IntersectionObserver" in window) {
  const gridIo = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add("in-view");
        gridIo.unobserve(entry.target);
      }
    });
  }, { threshold: 0.1 });
  staggerGrids.forEach(el => gridIo.observe(el));
}

// ---- 9. CONTACT FORM TOAST ----
const contactForm = document.getElementById("contactForm");
const successToast = document.getElementById("successToast");
if (contactForm && successToast) {
  contactForm.addEventListener("submit", (e) => {
    e.preventDefault();
    successToast.classList.add("show");
    setTimeout(() => successToast.classList.remove("show"), 4000);
    contactForm.reset();
  });
}