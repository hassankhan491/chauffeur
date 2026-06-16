<footer class="footer py-5 bg-black text-white">
    <div class="container py-4">
        <div class="row gy-5">
           
            <!-- Column 1: Company Info -->
            <div class="col-lg-3">
                <h5 class="mb-4" style="letter-spacing: 2px;">MY<span class="text-gold">CHAUFFEUR</span></h5>
                <p class="text-white-50" style="max-width: 280px; line-height: 1.6;">Precision transport assets for high-profile operations. Defining the standard of luxury and security since 2015.</p>
            </div>

            <!-- Column 2: Quick Links -->
            <div class="col-lg-3">
                <h6 class="text-uppercase text-gold mb-4" style="font-size: 0.75rem; letter-spacing: 3px;">Quick Links</h6>
                <ul class="list-unstyled d-flex flex-column gap-3">
                    <li><a href="#" class="text-white text-decoration-none opacity-75 hover-gold">Home</a></li>
                    <li><a href="#" class="text-white text-decoration-none opacity-75 hover-gold">About Us</a></li>
                    <li><a href="#" class="text-white text-decoration-none opacity-75 hover-gold">Contact</a></li>
                </ul>
            </div>

            <!-- Column 3: Help -->
            <div class="col-lg-3">
                <h6 class="text-uppercase text-gold mb-4" style="font-size: 0.75rem; letter-spacing: 3px;">Help</h6>
                <ul class="list-unstyled d-flex flex-column gap-3">
                    <li><a href="#" class="text-white text-decoration-none opacity-75 hover-gold">Privacy Policy</a></li>
                    <li><a href="#" class="text-white text-decoration-none opacity-75 hover-gold">Terms of Fleet Usage</a></li>
                    <li><a href="#" class="text-white text-decoration-none opacity-75 hover-gold">Corporate Security</a></li>
                </ul>
            </div>

            <!-- Column 4: Operation Center -->
            <div class="col-lg-3">
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

<!-- 1. BOOTSTRAP JS (Sirf ek baar, latest version) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

<!--  2. CLEAN MOBILE NAV SCRIPT (jQuery hata diya, sirf vanilla JS rakhi) -->
<script>
  // Hamburger Menu Toggle
  const navToggle = document.getElementById('navToggle');
  const mainList = document.getElementById('mainListDiv');

  if (navToggle && mainList) {
      navToggle.addEventListener('click', () => {
        mainList.classList.toggle('mobile-active');
      });
  }

  
  const dropdownItems = document.querySelectorAll('.dropdown-item');
  
  dropdownItems.forEach(item => {
    item.addEventListener('click', (e) => {
      if (window.innerWidth <= 992) {
        e.preventDefault(); 
        item.classList.toggle('mobile-dropdown-active');
      }
    });
  });
</script>

<!--  3. COUNTERS SCRIPT (About page ke liye) -->
<script>
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

<!--  4. MAP & BOOKING SCRIPTS (Sirf reserve-now.php par load hongi) -->
<?php if (basename($_SERVER['PHP_SELF']) == 'reserve-now.php'): ?>
    
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <script>
        let map, pickupMarker, dropoffMarker, routeLine;

        function initMap() {
          map = L.map('bookingMap').setView([50.1109, 8.6821], 13);
          L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; OpenStreetMap &copy; CARTO',
            subdomains: 'abcd',
            maxZoom: 20
          }).addTo(map);
        }

        document.addEventListener('DOMContentLoaded', initMap);

        const today = new Date().toISOString().split('T')[0];
        const pickupDateInput = document.getElementById('pickupDate');
        if (pickupDateInput) pickupDateInput.min = today;

        function switchRideType(type) {
          document.querySelectorAll('.ride-tab').forEach(tab => tab.classList.remove('active'));
          event.target.closest('.ride-tab').classList.add('active');
          const extraOptions = document.getElementById('extraOptions');
          if (extraOptions) {
            extraOptions.style.display = type === 'hourly' ? 'block' : 'none';
          }
        }

        function useCurrentLocation() {
          if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
              const lat = position.coords.latitude;
              const lng = position.coords.longitude;
              document.getElementById('pickupLocation').value = 'Current Location';
              if (map) {
                map.setView([lat, lng], 15);
                if (pickupMarker) map.removeLayer(pickupMarker);
                pickupMarker = L.marker([lat, lng]).addTo(map).bindPopup('Pickup Location').openPopup();
              }
            }, () => { alert('Unable to retrieve your location.'); });
          } else { alert('Geolocation is not supported.'); }
        }

        async function calculateRoute() {
            const pickup = document.getElementById('pickupLocation').value.trim();
            const dropoff = document.getElementById('dropoffLocation').value.trim();
            if (!pickup || !dropoff) return;
            try {
                const pickupCoords = await geocodeLocation(pickup);
                const dropoffCoords = await geocodeLocation(dropoff);
                if (!pickupCoords || !dropoffCoords) return;
                
                const osrmUrl = `https://router.project-osrm.org/route/v1/driving/${pickupCoords.lng},${pickupCoords.lat};${dropoffCoords.lng},${dropoffCoords.lat}?overview=full`;
                const response = await fetch(osrmUrl);
                const data = await response.json();
                
                if (data.routes && data.routes.length > 0) {
                    const route = data.routes[0];
                    const distanceKm = (route.distance / 1000).toFixed(1);
                    const durationMin = Math.round(route.duration / 60);
                    const hours = Math.floor(durationMin / 60);
                    const mins = durationMin % 60;
                    
                    document.getElementById('distanceValue').textContent = distanceKm + ' km';
                    document.getElementById('timeValue').textContent = hours + ' h ' + mins + ' min';
                    
                    if (map) {
                        if (pickupMarker) map.removeLayer(pickupMarker);
                        if (dropoffMarker) map.removeLayer(dropoffMarker);
                        if (routeLine) map.removeLayer(routeLine);
                        
                        pickupMarker = L.marker([pickupCoords.lat, pickupCoords.lng]).addTo(map).bindPopup('<b>Pickup:</b> ' + pickup).openPopup();
                        dropoffMarker = L.marker([dropoffCoords.lat, dropoffCoords.lng]).addTo(map).bindPopup('<b>Drop-off:</b> ' + dropoff);
                        
                        const routeCoords = route.geometry.coordinates.map(c => [c[1], c[0]]);
                        routeLine = L.polyline(routeCoords, { color: '#d49a28', weight: 4, opacity: 0.8 }).addTo(map);
                        
                        const group = new L.featureGroup([pickupMarker, dropoffMarker, routeLine]);
                        map.fitBounds(group.getBounds(), { padding: [50, 50] });
                    }
                }
            } catch (error) { console.error('Error calculating route:', error); }
        }

        async function geocodeLocation(locationName) {
            try {
                const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(locationName)}&limit=1`;
                const response = await fetch(url, { headers: { 'Accept-Language': 'en' } });
                const data = await response.json();
                if (data && data.length > 0) {
                    return { lat: parseFloat(data[0].lat), lng: parseFloat(data[0].lon) };
                }
                return null;
            } catch (error) { console.error('Geocoding error:', error); return null; }
        }

        let debounceTimer;
        function debounceCalculate() {
            clearTimeout(debounceTimer);
            debounceTimer = setTimeout(calculateRoute, 1000);
        }

        const pickupLocationEl = document.getElementById('pickupLocation');
        const dropoffLocationEl = document.getElementById('dropoffLocation');
        if (pickupLocationEl) pickupLocationEl.addEventListener('blur', debounceCalculate);
        if (dropoffLocationEl) dropoffLocationEl.addEventListener('blur', debounceCalculate);

        const bookingForm = document.getElementById('bookingForm');
        if (bookingForm) {
            bookingForm.addEventListener('submit', function(e) {
              e.preventDefault();
              const formData = {
                rideType: document.querySelector('.ride-tab.active') ? document.querySelector('.ride-tab.active').dataset.type || 'distance' : 'distance',
                pickupDate: document.getElementById('pickupDate').value,
                pickupTime: document.getElementById('pickupTime').value,
                pickupLocation: document.getElementById('pickupLocation').value,
                dropoffLocation: document.getElementById('dropoffLocation').value,
                transferType: document.getElementById('transferType').value,
                passengers: document.querySelector('select[name="passengers"]') ? document.querySelector('select[name="passengers"]').value : '1'
              };
              localStorage.setItem('bookingData', JSON.stringify(formData));
              updateProgressSteps(2);
              showNotification('Ride details saved! Proceeding to contact information...');
              setTimeout(() => { window.location.href = 'booking-contact.php'; }, 1500);
            });
        }

        function updateProgressSteps(stepNumber) {
          const steps = document.querySelectorAll('.step');
          steps.forEach((step, index) => {
            step.classList.remove('active', 'completed');
            if (index + 1 < stepNumber) step.classList.add('completed');
            else if (index + 1 === stepNumber) step.classList.add('active');
          });
        }

        function showNotification(message) {
          const notification = document.createElement('div');
          notification.className = 'booking-notification';
          notification.innerHTML = `<i class="bi bi-check-circle"></i><span>${message}</span>`;
          notification.style.cssText = `position: fixed; top: 100px; right: 20px; background: linear-gradient(135deg, var(--primary-gold) 0%, var(--dark-gold) 100%); color: #fff; padding: 15px 25px; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); display: flex; align-items: center; gap: 10px; z-index: 9999; animation: slideIn 0.3s ease;`;
          document.body.appendChild(notification);
          setTimeout(() => { notification.remove(); }, 3000);
        }

        const style = document.createElement('style');
        style.textContent = `@keyframes slideIn { from { transform: translateX(400px); opacity: 0; } to { transform: translateX(0); opacity: 1; } }`;
        document.head.appendChild(style);
    </script>
<?php endif; ?>

</body>
</html>