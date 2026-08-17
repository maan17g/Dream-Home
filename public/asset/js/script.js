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
    counters.forEach((counter) => {
        const start = +counter.dataset.bsStart;
        const end = +counter.dataset.bsEnd;
        const sign = counter.dataset.bsSign || "";
        let i = start;
        const duration = 2000; // ms total
        const steps = end - start;
        const interval = setInterval(() => {
            counter.innerHTML = i + sign;
            i++;
            if (i > end) clearInterval(interval);
        }, duration / steps);
    });
}

// ---- 5. RENDER PROPERTY CARD ----
const AGENTS = [
    {
        name: "Jenny Wilson",
        role: "Premium Agent",
        img: "https://randomuser.me/api/portraits/women/44.jpg",
    },
    {
        name: "Robert Fox",
        role: "Luxury Specialist",
        img: "https://randomuser.me/api/portraits/men/32.jpg",
    },
    {
        name: "Leslie Alexander",
        role: "Rental Expert",
        img: "https://randomuser.me/api/portraits/women/68.jpg",
    },
    {
        name: "Darrell Steward",
        role: "Property Advisor",
        img: "https://randomuser.me/api/portraits/men/76.jpg",
    },
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


// ---- 8. SCROLL REVEAL ----
// Sections and cards fade/slide into place the first time they enter the viewport.
const revealTargets = document.querySelectorAll(
    "[data-reveal], .mission-card, .team-card, .testimonial-card, .info-card, " +
        ".contact-info-card, .feature-box, .social-connect-card, .sleek-card, " +
        ".timeline-item, .value-item, .city-card, .category-card, .step-item, " +
        ".blog-card, .partner-logo, .alerts-banner",
);
if (revealTargets.length && "IntersectionObserver" in window) {
    revealTargets.forEach((el) => el.classList.add("reveal"));
    const io = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("in-view");
                    io.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15, rootMargin: "0px 0px -40px 0px" },
    );
    revealTargets.forEach((el) => io.observe(el));
}

// Also fire the property/featured grids' stagger once they scroll into view
const staggerGrids = document.querySelectorAll(".reveal-stagger");
if (staggerGrids.length && "IntersectionObserver" in window) {
    const gridIo = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("in-view");
                    gridIo.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.1 },
    );
    staggerGrids.forEach((el) => gridIo.observe(el));
}
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".js-fav-btn").forEach((button) => {
        button.addEventListener("click", async function (e) {
            e.preventDefault();
            e.stopPropagation();

            if (!window.Laravel?.isLoggedIn) {
                alert("Please log in to save properties.");
                return;
            }

            const icon = this.querySelector("i");
            // Prefer data-url if available, fallback to dynamic construction
            const url = this.dataset.url || `/properties/${this.dataset.id}/save`; 
            const csrfToken = document.querySelector('meta[name="csrf-token"]')?.content;

            if (!csrfToken) {
                console.error("CSRF token meta tag missing.");
                return;
            }

            // Save visual state for rollback if server request fails
            const originalClasses = icon.className;

            // Optimistic visual update
            icon.classList.toggle("bi-heart");
            icon.classList.toggle("bi-heart-fill");
            icon.classList.toggle("text-success");

            try {
                // 1. Declare 'response' properly here
                const response = await fetch(url, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": csrfToken,
                        "Accept": "application/json",
                        "Content-Type": "application/json",
                    },
                });

                // 2. Safely check 'response.ok'
                if (!response.ok) {
                    throw new Error(`Server returned HTTP status ${response.status}`);
                }

                const data = await response.json();

                if (data.success) {
                    // Sync icon strictly with backend response state
                    if (data.is_favorited) {
                        icon.className = "bi bi-heart-fill text-success";
                    } else {
                        icon.className = "bi bi-heart";
                    }
                } else {
                    // Revert UI if server returns success: false
                    icon.className = originalClasses;
                }
            } catch (error) {
                console.error("Error toggling favorite state:", error);
                // Revert visual state on error/network failure
                icon.className = originalClasses;
            }
        });
    });
});
