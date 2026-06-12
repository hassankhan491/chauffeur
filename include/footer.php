<footer class="footer py-5 bg-black text-white">
    <div class="container py-4">
        <div class="row gy-5">
           
            <div class="col-lg-4">
                <h5 class="mb-4" style="letter-spacing: 2px;">MY<span class="text-gold">CHAUFFEUR</span></h5>
                <p class="text-white-50" style="max-width: 280px; line-height: 1.6;">Precision transport assets for high-profile operations. Defining the standard of luxury and security since 2015.</p>
            </div>

            
            <div class="col-lg-4">
                <h6 class="text-uppercase text-gold mb-4" style="font-size: 0.75rem; letter-spacing: 3px;">Governance</h6>
                <ul class="list-unstyled d-flex flex-column gap-3">
                    <li><a href="#" class="text-white text-decoration-none opacity-75 hover-gold">Privacy Policy</a></li>
                    <li><a href="#" class="text-white text-decoration-none opacity-75 hover-gold">Terms of Fleet Usage</a></li>
                    <li><a href="#" class="text-white text-decoration-none opacity-75 hover-gold">Corporate Security</a></li>
                </ul>
            </div>

            
            <div class="col-lg-4">
                <h6 class="text-uppercase text-gold mb-4" style="font-size: 0.75rem; letter-spacing: 3px;">Operation Center</h6>
                <p class="h4 text-white mb-2">+1 (555) 019-2834</p>
                <p class="text-white-50">support@mychauffeur.com</p>
            </div>
        </div>

       
        <div class="mt-5 pt-4 border-top border-dark text-center">
            <p class="text-white-50 small" style="letter-spacing: 1px;">&copy; 2026 MyChauffeur Operations. All rights reserved.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('navToggle').addEventListener('click', function() {
        this.classList.toggle('active');
        document.getElementById('mainListDiv').classList.toggle('active');
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<script
    src="https://code.jquery.com/jquery-4.0.0.slim.js"
    integrity="sha256-M+GjhMBfXikM1izMplICCTscIj5hzPCp6uDzaypxtgg="
    crossorigin="anonymous"></script>

<script type="text/javascript">
    $('.navTrigger').click(function() {
        $(this).toggleClass('active');
        console.log("Clicked menu");
        $("#mainListDiv").toggleClass("show_list");
        $("#mainListDiv").fadeIn();

    });
</script>

<!-- MOB NAV REPSOONSIVE SCRIPT -->
 <script>
  // 1. Hamburger Menu Toggle
  const navToggle = document.getElementById('navToggle');
  const mainList = document.getElementById('mainListDiv');

  navToggle.addEventListener('click', () => {
    mainList.classList.toggle('mobile-active');
  });

  // 2. Mobile Dropdown Toggle (Touch devices ke liye)
  const dropdownItems = document.querySelectorAll('.dropdown-item');
  
  dropdownItems.forEach(item => {
    item.addEventListener('click', (e) => {
      // Sirf mobile screens par kaam kare
      if (window.innerWidth <= 992) {
        e.preventDefault(); // Link par click hone se rokein
        item.classList.toggle('mobile-dropdown-active');
      }
    });
  });


</script>


<script>
    document.getElementById('navToggle').addEventListener('click', function() {
        this.classList.toggle('active');
        document.getElementById('mainListDiv').classList.toggle('active');
    });
</script>
<!-- COUNTERS SCRIPT -->
<script>
    // Counter Animation
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('.stat-number');
        const progressCircles = document.querySelectorAll('.progress-ring-fill');

        const animateCounters = () => {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                const duration = 2000;
                const increment = target / (duration / 16);
                let current = 0;

                const updateCounter = () => {
                    current += increment;
                    if (current < target) {
                        counter.innerText = Math.ceil(current);
                        requestAnimationFrame(updateCounter);
                    } else {
                        counter.innerText = target;
                    }
                };

                updateCounter();
            });

            // Animate progress circles
            progressCircles.forEach(circle => {
                const target = +circle.getAttribute('data-target');
                const maxTarget = 120;
                const percentage = target / maxTarget;
                const circumference = 339.292;
                const offset = circumference - (percentage * circumference);

                setTimeout(() => {
                    circle.style.strokeDashoffset = offset;
                }, 100);
            });
        };

        // Trigger animation when section is in view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.disconnect();
                }
            });
        });

        const statsSection = document.querySelector('.stats-section');
        if (statsSection) {
            observer.observe(statsSection);
        }
    });
</script>


<!-- FAQS SCRIPT -->
<script>
    document.querySelectorAll('.faq-question').forEach(button => {
        button.addEventListener('click', () => {
            const faqItem = button.parentElement;

            // Agar pehle se active hai toh close kar do, varna open
            if (faqItem.classList.contains('active-faq')) {
                faqItem.classList.remove('active-faq');
                console.log("0");
            } else {
                // console.log("1");
                // Baqi sab items se active class hata do (taake sirf ek khula rahe)
                document.querySelectorAll('.faq-item').forEach(item => item.classList.remove('active-faq'));
                faqItem.classList.add('active-faq');
            }
        });
    });
</script>















<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    // =========================
// MAP INITIALIZATION
// =========================
let map, pickupMarker, dropoffMarker;

// Initialize Map (Call this when page loads)
function initMap() {
  // Center on Frankfurt, Germany
  map = L.map('bookingMap').setView([50.1109, 8.6821], 13); // Zoom level badha diya
  
  // Option 1: CartoDB Positron (Clean, minimal, great readability)
  L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
    subdomains: 'abcd',
    maxZoom: 20
  }).addTo(map);
}
// Call initMap when page loads
document.addEventListener('DOMContentLoaded', initMap);

// =========================
// FORM FUNCTIONALITY
// =========================

// Set minimum date to today
const today = new Date().toISOString().split('T')[0];
const pickupDateInput = document.getElementById('pickupDate');
if (pickupDateInput) {
  pickupDateInput.min = today;
}

// Ride Type Switcher
function switchRideType(type) {
  document.querySelectorAll('.ride-tab').forEach(tab => tab.classList.remove('active'));
  event.target.closest('.ride-tab').classList.add('active');
  
  const extraOptions = document.getElementById('extraOptions');
  if (extraOptions) {
    extraOptions.style.display = type === 'hourly' ? 'block' : 'none';
  }
}

// Use Current Location
function useCurrentLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(position => {
      const lat = position.coords.latitude;
      const lng = position.coords.longitude;
      
      document.getElementById('pickupLocation').value = 'Current Location';
      
      // Update map
      if (map) {
        map.setView([lat, lng], 15);
        
        if (pickupMarker) map.removeLayer(pickupMarker);
        pickupMarker = L.marker([lat, lng]).addTo(map)
          .bindPopup('Pickup Location')
          .openPopup();
      }
    }, () => {
      alert('Unable to retrieve your location. Please enter manually.');
    });
  } else {
    alert('Geolocation is not supported by this browser.');
  }
}

// Calculate Route (Simulated - Replace with Google Maps API for production)
// Calculate Route (For Germany)
function calculateRoute() {
  const pickup = document.getElementById('pickupLocation').value;
  const dropoff = document.getElementById('dropoffLocation').value;
  
  if (pickup && dropoff && map) {
    // Simulated calculation for German cities
    setTimeout(() => {
      document.getElementById('distanceValue').textContent = '190 km';
      document.getElementById('timeValue').textContent = '2 h 5 min';
      
      // Example: Frankfurt to Munich (German cities)
      if (pickupMarker) map.removeLayer(pickupMarker);
      if (dropoffMarker) map.removeLayer(dropoffMarker);
      
      pickupMarker = L.marker([50.1109, 8.6821]).addTo(map).bindPopup('Pickup: Frankfurt');
      dropoffMarker = L.marker([48.1351, 11.5820]).addTo(map).bindPopup('Drop-off: Munich');
      
      // Fit bounds to show both markers
      const group = new L.featureGroup([pickupMarker, dropoffMarker]);
      map.fitBounds(group.getBounds(), { padding: [50, 50] });
    }, 500);
  }
}

// Auto-calculate when locations change
const pickupLocation = document.getElementById('pickupLocation');
const dropoffLocation = document.getElementById('dropoffLocation');

if (pickupLocation) pickupLocation.addEventListener('blur', calculateRoute);
if (dropoffLocation) dropoffLocation.addEventListener('blur', calculateRoute);

// =========================
// FORM SUBMISSION - FIXED
// =========================
document.getElementById('bookingForm').addEventListener('submit', function(e) {
  e.preventDefault();
  
  // Collect form data
  const formData = {
    rideType: document.querySelector('.ride-tab.active') ? document.querySelector('.ride-tab.active').dataset.type || 'distance' : 'distance',
    pickupDate: document.getElementById('pickupDate').value,
    pickupTime: document.getElementById('pickupTime').value,
    pickupLocation: document.getElementById('pickupLocation').value,
    dropoffLocation: document.getElementById('dropoffLocation').value,
    transferType: document.getElementById('transferType').value,
    passengers: document.querySelector('select[name="passengers"]') ? document.querySelector('select[name="passengers"]').value : '1'
  };
  
  console.log('Booking Data:', formData);
  
  // Store in localStorage (for next page)
  localStorage.setItem('bookingData', JSON.stringify(formData));
  
  // Update progress steps
  updateProgressSteps(2);
  
  // Option 1: Redirect to next page
  // window.location.href = 'booking-contact.php';
  
  // Option 2: Show success message and redirect
  showNotification('Ride details saved! Proceeding to contact information...');
  
  setTimeout(() => {
    window.location.href = 'booking-contact.php'; // Change to your actual contact page
  }, 1500);
});

// Update Progress Steps
function updateProgressSteps(stepNumber) {
  const steps = document.querySelectorAll('.step');
  steps.forEach((step, index) => {
    step.classList.remove('active', 'completed');
    if (index + 1 < stepNumber) {
      step.classList.add('completed');
    } else if (index + 1 === stepNumber) {
      step.classList.add('active');
    }
  });
}

// Show Notification
function showNotification(message) {
  const notification = document.createElement('div');
  notification.className = 'booking-notification';
  notification.innerHTML = `
    <i class="bi bi-check-circle"></i>
    <span>${message}</span>
  `;
  notification.style.cssText = `
    position: fixed;
    top: 100px;
    right: 20px;
    background: linear-gradient(135deg, var(--primary-gold) 0%, var(--dark-gold) 100%);
    color: #fff;
    padding: 15px 25px;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    display: flex;
    align-items: center;
    gap: 10px;
    z-index: 9999;
    animation: slideIn 0.3s ease;
  `;
  
  document.body.appendChild(notification);
  
  setTimeout(() => {
    notification.remove();
  }, 3000);
}

// Add animation CSS
const style = document.createElement('style');
style.textContent = `
  @keyframes slideIn {
    from { transform: translateX(400px); opacity: 0; }
    to { transform: translateX(0); opacity: 1; }
  }
`;
document.head.appendChild(style);
</script>
</body>

</html>