<?php include 'include/header.php'; ?>



<!-- Existing Banner -->
<section class="page-banner fleet-banner">
    <div class="banner-content">
        <h1>Book Your Ride</h1>
        <div class="breadcrumbs">
            <a href="index.php">Home</a> — <span>Book Now</span>
        </div>
    </div>
</section>

<!-- BOOKING SECTION-->
<section class="booking-section">
    <div class="container">
        
        <!-- Progress Steps -->
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
        <!-- <div class="booking-progress">
            <div class="progress-steps">
                <div class="step active">
                    <div class="step-number">1</div>
                    <div class="step-label">Ride Details</div>
                </div>
                <div class="step-connector"></div>
                <div class="step">
                    <div class="step-number">2</div>
                    <div class="step-label">Contact Info</div>
                </div>
                <div class="step-connector"></div>
                <div class="step">
                    <div class="step-number">3</div>
                    <div class="step-label">Confirmation</div>
                </div>
            </div>
        </div> -->

        <!-- Main Booking Form -->
        <div class="booking-wrapper">
            
            <!-- Left: Form -->
            <div class="booking-form">
                <div class="form-card">
                    
                    <!-- Ride Type Tabs -->
                    <div class="ride-type-tabs">
                        <button class="ride-tab active" onclick="switchRideType('distance')">
                            <i class="bi bi-signpost-2"></i>
                            <span>Distance</span>
                        </button>
                        <button class="ride-tab" onclick="switchRideType('hourly')">
                            <i class="bi bi-clock"></i>
                            <span>Hourly</span>
                        </button>
                        <button class="ride-tab" onclick="switchRideType('flat')">
                            <i class="bi bi-cash-coin"></i>
                            <span>Flat Rate</span>
                        </button>
                    </div>

                    <form id="bookingForm" class="booking-form-content">
                        
                        <!-- Date & Time -->
                        <div class="form-row">
                            <div class="form-group">
                                <label class="form-label">Pickup Date</label>
                                <input type="date" class="form-control" id="pickupDate" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Pickup Time</label>
                                <input type="time" class="form-control" id="pickupTime" required>
                            </div>
                        </div>

                        <!-- Locations -->
                        <div class="form-group">
                            <label class="form-label">Pickup Location</label>
                            <div class="location-input">
                                <input type="text" class="form-control" id="pickupLocation" placeholder="Enter pickup address" required>
                                <button type="button" class="location-btn" onclick="useCurrentLocation()">
                                    <i class="bi bi-geo-alt"></i>
                                </button>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Drop-off Location</label>
                            <input type="text" class="form-control" id="dropoffLocation" placeholder="Enter destination" required>
                        </div>

                        <!-- Transfer Type -->
                        <div class="form-group">
                            <label class="form-label">Transfer Type</label>
                            <select class="form-select" id="transferType">
                                <option value="oneway">One Way</option>
                                <option value="roundtrip">Round Trip</option>
                                <option value="hourly">Hourly Booking</option>
                            </select>
                        </div>

                        <!-- Extra Options -->
                        <div class="form-group" id="extraOptions" style="display: none;">
                            <label class="form-label">Extra Hours</label>
                            <select class="form-select">
                                <option value="0">0 hours</option>
                                <option value="1">1 hour</option>
                                <option value="2">2 hours</option>
                                <option value="3">3 hours</option>
                                <option value="4">4 hours</option>
                            </select>
                        </div>

                        <!-- Passengers -->
                        <div class="form-group">
                            <label class="form-label">Number of Passengers</label>
                            <select class="form-select">
                                <option value="1">1 Passenger</option>
                                <option value="2">2 Passengers</option>
                                <option value="3">3 Passengers</option>
                                <option value="4">4 Passengers</option>
                                <option value="5">5+ Passengers</option>
                            </select>
                        </div>

                        <!-- Notes -->
                        <div class="form-group">
                            <label class="form-label">Special Requests (Optional)</label>
                            <textarea class="form-control" rows="3" placeholder="Any special requirements..."></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-booking-submit">
                            Continue to Contact Info
                            <i class="bi bi-arrow-right"></i>
                        </button>

                    </form>
                </div>
            </div>

            <!-- Right: Map & Summary -->
            <div class="booking-sidebar">
                
                <!-- Map -->
                <div class="map-container">
                    <div id="bookingMap" class="booking-map"></div>
                </div>

                <!-- Trip Summary -->
                <div class="trip-summary">
                    <div class="summary-item">
                        <div class="summary-icon">
                            <i class="bi bi-signpost-split"></i>
                        </div>
                        <div class="summary-content">
                            <span class="summary-label">Distance</span>
                            <span class="summary-value" id="distanceValue">0 km</span>
                        </div>
                    </div>
                    <div class="summary-item">
                        <div class="summary-icon">
                            <i class="bi bi-clock"></i>
                        </div>
                        <div class="summary-content">
                            <span class="summary-label">Est. Time</span>
                            <span class="summary-value" id="timeValue">0 min</span>
                        </div>
                    </div>
                </div>

                <!-- Info Card -->
                <div class="booking-info-card">
                    <i class="bi bi-shield-check"></i>
                    <h4>Free Cancellation</h4>
                    <p>Cancel up to 24 hours before your ride for a full refund.</p>
                </div>

            </div>

        </div>

    </div>
</section>



<?php include 'include/footer.php'; ?>