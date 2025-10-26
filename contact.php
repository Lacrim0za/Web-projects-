<?php
// pages/contact.php - Contact Page Content Only

// Handle contact form submission
$success_message = '';
$error_message = '';

if ($_POST['action'] ?? '' === 'contact') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    // Basic validation
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        $error_message = 'Please fill in all required fields.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = 'Please enter a valid email address.';
    } else {
        // In a real application, you would:
        // 1. Save to database
        // 2. Send email notification
        // 3. Send confirmation email to user
        
        // For demo purposes, just show success message
        $success_message = 'Thank you for contacting us! We will get back to you within 24 hours.';
        
        // Clear form fields after successful submission
        $name = $email = $phone = $subject = $message = '';
    }
}
?>

<section class="contact-hero">
    <div class="contact-hero-content">
        <div class="water-drop"></div>
        <h1>Contact WellOp</h1>
        <p>Get in touch with our water management experts</p>
    </div>
</section>

<section class="contact-content-section">
    <div class="contact-container">
        
        <!-- Contact Information Cards -->
        <div class="contact-info-grid">
            <div class="contact-info-card">
                <div class="contact-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <h3>Phone Support</h3>
                <p>+1 (555) 123-4567</p>
                <p class="contact-detail">24/7 Emergency Support</p>
                <p class="contact-detail">Mon-Fri 8AM-6PM Regular Support</p>
            </div>

            <div class="contact-info-card">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <h3>Email Support</h3>
                <p>info@wellop.com</p>
                <p class="contact-detail">Response within 4 hours</p>
                <p class="contact-detail">support@wellop.com for technical issues</p>
            </div>

            <div class="contact-info-card">
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <h3>Office Location</h3>
                <p>1234 Water Management Blvd</p>
                <p class="contact-detail">Suite 100</p>
                <p class="contact-detail">Cebu City, Central Visayas 6000</p>
            </div>

            <div class="contact-info-card">
                <div class="contact-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3>Business Hours</h3>
                <p>Monday - Friday: 8:00 AM - 6:00 PM</p>
                <p class="contact-detail">Saturday: 9:00 AM - 3:00 PM</p>
                <p class="contact-detail">Sunday: Emergency calls only</p>
            </div>
        </div>

        <!-- Contact Form and Map Section -->
        <div class="contact-form-section">
            <div class="contact-form-container">
                <h2>Send us a Message</h2>
                <p>Have questions about our water management services? We'd love to hear from you.</p>

                <?php if ($success_message): ?>
                    <div class="success-message"><?php echo htmlspecialchars($success_message); ?></div>
                <?php endif; ?>

                <?php if ($error_message): ?>
                    <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
                <?php endif; ?>

                <form method="POST" action="" class="contact-form">
                    <input type="hidden" name="action" value="contact">
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Full Name *</label>
                            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name ?? ''); ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="phone">Phone Number</label>
                            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($phone ?? ''); ?>">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject *</label>
                            <select id="subject" name="subject" required>
                                <option value="">Select a subject</option>
                                <option value="General Inquiry" <?php echo (($subject ?? '') === 'General Inquiry') ? 'selected' : ''; ?>>General Inquiry</option>
                                <option value="Technical Support" <?php echo (($subject ?? '') === 'Technical Support') ? 'selected' : ''; ?>>Technical Support</option>
                                <option value="Billing Question" <?php echo (($subject ?? '') === 'Billing Question') ? 'selected' : ''; ?>>Billing Question</option>
                                <option value="Service Request" <?php echo (($subject ?? '') === 'Service Request') ? 'selected' : ''; ?>>Service Request</option>
                                <option value="Partnership Inquiry" <?php echo (($subject ?? '') === 'Partnership Inquiry') ? 'selected' : ''; ?>>Partnership Inquiry</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="6" placeholder="Please describe how we can help you..." required><?php echo htmlspecialchars($message ?? ''); ?></textarea>
                    </div>

                    <button type="submit" class="contact-submit-btn">
                        <i class="fas fa-paper-plane"></i> Send Message
                    </button>
                </form>
            </div>

            <div class="contact-map-container">
                <h3>Find Our Office</h3>
                <div class="map-placeholder">
                    <i class="fas fa-map"></i>
                    <p>Interactive Map</p>
                    <p class="map-address">1234 Water Management Blvd, Suite 100<br>Cebu City, Central Visayas 6000</p>
                    <a href="https://maps.google.com/?q=Cebu+City+Central+Visayas" target="_blank" class="map-link">
                        <i class="fas fa-external-link-alt"></i> View in Google Maps
                    </a>
                </div>

                <div class="emergency-contact">
                    <h4><i class="fas fa-exclamation-triangle"></i> Emergency Contact</h4>
                    <p>For urgent water system issues outside business hours:</p>
                    <p class="emergency-phone">📞 +1 (555) 911-WATER</p>
                    <p class="emergency-note">Available 24/7 for emergency situations</p>
                </div>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="contact-faq-section">
            <h2>Frequently Asked Questions</h2>
            <div class="faq-grid">
                <div class="faq-item">
                    <h4>How quickly do you respond to service requests?</h4>
                    <p>We respond to all service requests within 4 hours during business hours. Emergency situations are handled immediately 24/7.</p>
                </div>
                <div class="faq-item">
                    <h4>Do you provide installation services?</h4>
                    <p>Yes, our certified technicians provide complete installation services for all water monitoring systems. Contact us for a consultation.</p>
                </div>
                <div class="faq-item">
                    <h4>What areas do you serve?</h4>
                    <p>We currently serve the Central Visayas region with plans to expand. Contact us to check if we serve your specific location.</p>
                </div>
                <div class="faq-item">
                    <h4>Is there a minimum contract period?</h4>
                    <p>No minimum contract required. We offer flexible monthly plans and can accommodate both short-term and long-term needs.</p>
                </div>
            </div>
        </div>
    </div>
</section>