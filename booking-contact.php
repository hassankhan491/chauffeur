<?php include 'include/header.php'; ?>

<!-- Banner -->
<section class="page-banner fleet-banner">
    <div class="banner-content">
        <h1>Contact Information</h1>
        <div class="breadcrumbs">
            <a href="index.php">Home</a> — 
            <a href="reserve-now.php">Book Now</a> — 
            <span>Contact Info</span>
        </div>
    </div>
</section>

<!-- Progress Bar -->
<div class="booking-progress">
    <div class="container">
        <div class="progress-steps">
            
            <!-- Step 1: Completed -->
            <div class="step completed">
                <div class="step-number">
                    <i class="bi bi-check-lg"></i>
                </div>
                <div class="step-label">Ride Details</div>
            </div>
            
            <div class="step-connector active"></div>
            
            <!-- Step 2: Active -->
            <div class="step active">
                <div class="step-number">2</div>
                <div class="step-label">Contact Info</div>
            </div>
            
            <div class="step-connector"></div>
            
            <!-- Step 3: Inactive -->
            <div class="step">
                <div class="step-number">3</div>
                <div class="step-label">Confirmation</div>
            </div>
            
        </div>
    </div>
</div>

<!-- Contact Form Section -->
<section class="booking-contact-section">
    <div class="container">
        <div class="booking-wrapper">
            
            <!-- Left: Contact Form -->
            <div class="contact-form-wrapper">
                <div class="form-header">
                    <h2>Your Information</h2>
                    <p>Please provide your contact details to proceed with the booking</p>
                </div>
                
                <form id="contactForm" class="contact-form">
                    
                    <!-- Personal Info -->
                    <div class="form-section-title">Personal Information</div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Full Name *</label>
                            <input type="text" class="form-control" name="fullName" required placeholder="John Doe">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Email Address *</label>
                            <input type="email" class="form-control" name="email" required placeholder="john@example.com">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Phone Number *</label>
                            <input type="tel" class="form-control" name="phone" required placeholder="+49 123 4567890">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Alternate Phone</label>
                            <input type="tel" class="form-control" name="altPhone" placeholder="+49 123 4567891">
                        </div>
                    </div>
                    
                    <!-- Address -->
                    <div class="form-group">
                        <label class="form-label">Street Address</label>
                        <input type="text" class="form-control" name="address" placeholder="123 Main Street">
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">City *</label>
                            <input type="text" class="form-control" name="city" required placeholder="Frankfurt">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Postal Code *</label>
                            <input type="text" class="form-control" name="postalCode" required placeholder="60311">
                        </div>
                    </div>
                    
                    <!-- Additional Info -->
                    <div class="form-section-title">Additional Information</div>
                    
                    <div class="form-group">
                        <label class="form-label">Special Requests</label>
                        <textarea class="form-control" name="specialRequests" rows="3" placeholder="Any special requirements or instructions..."></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label">How did you hear about us?</label>
                        <select class="form-select" name="referral">
                            <option value="">Select an option</option>
                            <option value="google">Google Search</option>
                            <option value="social">Social Media</option>
                            <option value="friend">Friend/Family</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    
                    <!-- Terms -->
                    <div class="form-group">
                        <div class="checkbox-wrapper">
                            <input type="checkbox" id="terms" name="terms" required>
                            <label for="terms">I agree to the <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a> *</label>
                        </div>
                    </div>
                    
                    <!-- Buttons -->
                    <div class="form-actions">
                        <a href="reserve-now.php" class="btn-back">
                            <i class="bi bi-arrow-left"></i> Back to Ride Details
                        </a>
                        <button type="submit" class="btn-submit">
                            Confirm Booking <i class="bi bi-check-circle"></i>
                        </button>
                    </div>
                    
                </form>
            </div>
            
            <!-- Right: Booking Summary -->
            <div class="booking-summary-sidebar">
                
                <div class="summary-card">
                    <h3>Booking Summary</h3>
                    
                    <div class="summary-row">
                        <span class="summary-label">Ride Type:</span>
                        <span class="summary-value" id="summaryRideType">Distance</span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label">Pickup:</span>
                        <span class="summary-value" id="summaryPickup">-</span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label">Drop-off:</span>
                        <span class="summary-value" id="summaryDropoff">-</span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label">Date & Time:</span>
                        <span class="summary-value" id="summaryDateTime">-</span>
                    </div>
                    
                    <div class="summary-row">
                        <span class="summary-label">Distance:</span>
                        <span class="summary-value" id="summaryDistance">0 km</span>
                    </div>
                    
                    <div class="summary-divider"></div>
                    
                    <div class="summary-row total">
                        <span class="summary-label">Estimated Price:</span>
                        <span class="summary-value" id="summaryPrice">€0.00</span>
                    </div>
                </div>
                
                <!-- Support Card -->
                <div class="support-card">
                    <i class="bi bi-headset"></i>
                    <h4>Need Help?</h4>
                    <p>Our support team is available 24/7</p>
                    <a href="tel:+491234567890" class="support-phone">+49 123 456 7890</a>
                </div>
                
            </div>
            
        </div>
    </div>
</section>

<script>
// Load booking data from localStorage
document.addEventListener('DOMContentLoaded', function() {
    const bookingData = JSON.parse(localStorage.getItem('bookingData'));
    
    if (bookingData) {
        document.getElementById('summaryRideType').textContent = bookingData.rideType || 'Distance';
        document.getElementById('summaryPickup').textContent = bookingData.pickupLocation || '-';
        document.getElementById('summaryDropoff').textContent = bookingData.dropoffLocation || '-';
        document.getElementById('summaryDateTime').textContent = (bookingData.pickupDate + ' ' + bookingData.pickupTime) || '-';
        document.getElementById('summaryDistance').textContent = '165 km'; // Yahan actual distance aayegi
        document.getElementById('summaryPrice').textContent = '€150.00'; // Yahan actual price calculate karni hai
    }
});

// Form Submission
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    
    // Collect form data
    const formData = new FormData(this);
    const contactData = Object.fromEntries(formData);
    
    // Get ride details from localStorage
    const rideData = JSON.parse(localStorage.getItem('bookingData'));
    
    // Combine both
    const completeBooking = {
        ...rideData,
        ...contactData,
        bookingDate: new Date().toISOString()
    };
    
    console.log('Complete Booking:', completeBooking);
    
    // Yahan aap server ko data bhej sakte hain
    /*
    fetch('process-booking.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/json'},
        body: JSON.stringify(completeBooking)
    })
    .then(response => response.json())
    .then(data => {
        window.location.href = 'confirmation.php?booking=' + data.bookingId;
    });
    */
    
    // Temporary: Show success and redirect
    alert('🎉 Booking Confirmed! We will contact you shortly.');
    localStorage.removeItem('bookingData');
    window.location.href = 'index.php';
});
</script>

<?php include 'include/footer.php'; ?>