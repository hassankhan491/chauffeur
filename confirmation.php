<?php include 'include/header.php'; ?>

<section class="page-banner fleet-banner">
    <div class="banner-content">
        <h1>Booking Confirmed</h1>
        <div class="breadcrumbs">
            <a href="index.php">Home</a> — 
            <a href="reserve-now.php">Book Now</a> — 
            <span>Confirmation</span>
        </div>
    </div>
</section>

<!-- Progress Bar -->
<div class="booking-progress">
    <div class="container">
        <div class="progress-steps">
            
            <!-- Step 1: Completed -->
            <div class="step completed">
                <div class="step-number">1</div>
                <div class="step-label">Ride Details</div>
            </div>
            
            <div class="step-connector active"></div>
            
            <!-- Step 2: Completed -->
            <div class="step completed">
                <div class="step-number">2</div>
                <div class="step-label">Contact Info</div>
            </div>
            
            <div class="step-connector active"></div>
            
            <!-- Step 3: Active -->
            <div class="step active">
                <div class="step-number">3</div>
                <div class="step-label">Confirmation</div>
            </div>
            
        </div>
    </div>
</div>

<!-- Confirmation Section -->
<section class="confirmation-section">
    <div class="container">
        
        <!-- Success Message -->
        <div class="success-message">
            <div class="success-icon">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <h2>Booking Confirmed Successfully!</h2>
            <p>Thank you for choosing MyChauffeur. Your ride has been booked and our team will contact you shortly.</p>
            <div class="booking-id">
                <span class="booking-id-label">Booking Reference:</span>
                <span class="booking-id-value" id="bookingId">MC-2024-XXXXX</span>
            </div>
        </div>

        <!-- Booking Details -->
        <div class="confirmation-wrapper">
            
            <!-- Left: Booking Details -->
            <div class="confirmation-details">
                
                <!-- Ride Information -->
                <div class="detail-card">
                    <div class="card-header">
                        <i class="bi bi-car-front-fill"></i>
                        <h3>Ride Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="detail-row">
                            <span class="detail-label">Ride Type:</span>
                            <span class="detail-value" id="confirmRideType">-</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Pickup Location:</span>
                            <span class="detail-value" id="confirmPickup">-</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Drop-off Location:</span>
                            <span class="detail-value" id="confirmDropoff">-</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Date & Time:</span>
                            <span class="detail-value" id="confirmDateTime">-</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Transfer Type:</span>
                            <span class="detail-value" id="confirmTransferType">-</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Passengers:</span>
                            <span class="detail-value" id="confirmPassengers">-</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Distance:</span>
                            <span class="detail-value" id="confirmDistance">-</span>
                        </div>
                    </div>
                </div>

                <!-- Contact Information -->
                <div class="detail-card">
                    <div class="card-header">
                        <i class="bi bi-person-fill"></i>
                        <h3>Contact Information</h3>
                    </div>
                    <div class="card-body">
                        <div class="detail-row">
                            <span class="detail-label">Full Name:</span>
                            <span class="detail-value" id="confirmName">-</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Email:</span>
                            <span class="detail-value" id="confirmEmail">-</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Phone:</span>
                            <span class="detail-value" id="confirmPhone">-</span>
                        </div>
                        <div class="detail-row">
                            <span class="detail-label">Address:</span>
                            <span class="detail-value" id="confirmAddress">-</span>
                        </div>
                    </div>
                </div>

                <!-- Special Requests -->
                <div class="detail-card" id="specialRequestsCard" style="display: none;">
                    <div class="card-header">
                        <i class="bi bi-chat-left-text-fill"></i>
                        <h3>Special Requests</h3>
                    </div>
                    <div class="card-body">
                        <p id="confirmSpecialRequests" style="margin: 0; color: var(--text-dark); line-height: 1.6;">-</p>
                    </div>
                </div>

            </div>

            <!-- Right: Summary & Actions -->
            <div class="confirmation-sidebar">
                
                <!-- Price Summary -->
                <div class="price-card">
                    <h3>Payment Summary</h3>
                    <div class="price-row">
                        <span>Base Fare:</span>
                        <span id="baseFare">€120.00</span>
                    </div>
                    <div class="price-row">
                        <span>Distance Charge:</span>
                        <span id="distanceCharge">€30.00</span>
                    </div>
                    <div class="price-row">
                        <span>Service Fee:</span>
                        <span>€15.00</span>
                    </div>
                    <div class="price-divider"></div>
                    <div class="price-row total">
                        <span>Total Amount:</span>
                        <span id="totalAmount">€165.00</span>
                    </div>
                    <div class="payment-note">
                        <i class="bi bi-info-circle"></i>
                        <span>Payment will be collected after the ride</span>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="action-buttons">
                    <button class="btn-action btn-print" onclick="window.print()">
                        <i class="bi bi-printer"></i>
                        Print Confirmation
                    </button>
                    <button class="btn-action btn-download" onclick="downloadConfirmation()">
                        <i class="bi bi-download"></i>
                        Download PDF
                    </button>
                    <a href="index.php" class="btn-action btn-home">
                        <i class="bi bi-house"></i>
                        Back to Home
                    </a>
                </div>

                <!-- Next Steps -->
                <div class="next-steps-card">
                    <h4><i class="bi bi-lightbulb"></i> What's Next?</h4>
                    <ul>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>You'll receive a confirmation email shortly</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Our team will contact you 24 hours before pickup</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Driver details will be shared 1 hour before pickup</span>
                        </li>
                        <li>
                            <i class="bi bi-check-circle-fill"></i>
                            <span>Free cancellation up to 24 hours before ride</span>
                        </li>
                    </ul>
                </div>

                <!-- Support -->
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
// Generate random booking ID
function generateBookingId() {
    const chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    let result = 'MC-2024-';
    for (let i = 0; i < 5; i++) {
        result += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    return result;
}

// Load booking data
document.addEventListener('DOMContentLoaded', function() {
    const bookingData = JSON.parse(localStorage.getItem('bookingData'));
    
    if (bookingData) {
        // Generate and display booking ID
        const bookingId = generateBookingId();
        document.getElementById('bookingId').textContent = bookingId;
        
        // Ride Information
        document.getElementById('confirmRideType').textContent = bookingData.rideType || 'Distance';
        document.getElementById('confirmPickup').textContent = bookingData.pickupLocation || '-';
        document.getElementById('confirmDropoff').textContent = bookingData.dropoffLocation || '-';
        document.getElementById('confirmDateTime').textContent = (bookingData.pickupDate + ' at ' + bookingData.pickupTime) || '-';
        document.getElementById('confirmTransferType').textContent = bookingData.transferType || 'One Way';
        document.getElementById('confirmPassengers').textContent = bookingData.passengers || '1';
        document.getElementById('confirmDistance').textContent = '165 km';
        
        // Contact Information
        document.getElementById('confirmName').textContent = bookingData.fullName || '-';
        document.getElementById('confirmEmail').textContent = bookingData.email || '-';
        document.getElementById('confirmPhone').textContent = bookingData.phone || '-';
        
        const address = [bookingData.address, bookingData.city, bookingData.postalCode].filter(Boolean).join(', ');
        document.getElementById('confirmAddress').textContent = address || '-';
        
        // Special Requests
        if (bookingData.specialRequests) {
            document.getElementById('specialRequestsCard').style.display = 'block';
            document.getElementById('confirmSpecialRequests').textContent = bookingData.specialRequests;
        }
        
        // Store booking ID for future reference
        localStorage.setItem('lastBookingId', bookingId);
    } else {
        // No booking data found
        alert('No booking data found. Redirecting to home page...');
        window.location.href = 'index.php';
    }
});

// Download confirmation (simulated)
function downloadConfirmation() {
    alert('PDF download feature coming soon! For now, please use the Print button.');
}
</script>

<?php include 'include/footer.php'; ?>