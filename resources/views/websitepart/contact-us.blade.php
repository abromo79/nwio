@extends('layouts.website')

@section('content')
<!-- Hero Section -->
<div class="hero-section p-4 p-md-5 mb-5 fade-in">
    <div class="row align-items-center">
        <div class="col-lg-8 slide-in-left">
            <div class="mb-4">
                <span class="badge bg-primary mb-3">Contact Us</span>
                <h1 class="display-4 fw-bold mb-3">Get in Touch with NWIO</h1>
                <p class="lead mb-4">Reach out to us for partnerships, volunteer opportunities, or any questions about our marine conservation work in Tanzania.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a class="btn btn-primary btn-lg" href="tel:+255652605241">
                        <i class="bi bi-telephone me-2"></i>Call Now
                    </a>
                    <a class="btn btn-outline-primary btn-lg" href="mailto:info@nwio.or.tz">
                        <i class="bi bi-envelope me-2"></i>Send Email
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 text-center slide-in-right">
            <div class="img-hover-zoom">
                <img src="{{ asset('images/m24.jpeg') }}" class="img-fluid rounded-3 shadow-lg" alt="Contact NWIO for marine conservation">
            </div>
        </div>
    </div>
</div>

<!-- Contact Information & Form -->
<section class="mb-5">
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="contact-info-card card h-100 border-0 shadow-lg">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <i class="bi bi-building text-primary me-3" style="font-size: 2rem;"></i>
                        <h3 class="mb-0">Office Information</h3>
                    </div>
                    
                    <div class="contact-item mb-4">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-geo-alt text-primary me-3 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Physical Address</h6>
                                <p class="text-muted mb-0">Coastal Tanzania<br>Near Marine Conservation Center<br>Dar es Salaam, Tanzania</p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-item mb-4">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-telephone text-primary me-3 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Phone Numbers</h6>
                                <p class="text-muted mb-0">
                                    Main: +255 652 605 241<br>
                                    Office: +255 22 266 9012<br>
                                    Mobile: +255 754 321 789
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-item mb-4">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-envelope text-primary me-3 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Email Addresses</h6>
                                <p class="text-muted mb-0">
                                    General: info@nwio.or.tz<br>
                                    Partnerships: partnerships@nwio.or.tz<br>
                                    Volunteers: volunteers@nwio.or.tz
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-clock text-primary me-3 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1">Office Hours</h6>
                                <p class="text-muted mb-0">
                                    Monday - Friday: 8:00 AM - 5:00 PM<br>
                                    Saturday: 9:00 AM - 1:00 PM<br>
                                    Sunday: Closed
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="contact-form-card card h-100 border-0 shadow-lg">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center mb-4">
                        <i class="bi bi-chat-dots text-primary me-3" style="font-size: 2rem;"></i>
                        <h3 class="mb-0">Send Us a Message</h3>
                    </div>

                    <form class="contact-form">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">First Name *</label>
                                <input type="text" class="form-control" placeholder="Enter your first name" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Last Name *</label>
                                <input type="text" class="form-control" placeholder="Enter your last name" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email Address *</label>
                            <input type="email" class="form-control" placeholder="your.email@example.com" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Phone Number</label>
                            <input type="tel" class="form-control" placeholder="+255 XXX XXX XXX">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Subject *</label>
                            <select class="form-select">
                                <option value="">Select a subject</option>
                                <option value="general">General Inquiry</option>
                                <option value="partnership">Partnership Opportunity</option>
                                <option value="volunteer">Volunteer Application</option>
                                <option value="donation">Donation Information</option>
                                <option value="research">Research Collaboration</option>
                                <option value="media">Media Inquiry</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Message *</label>
                            <textarea class="form-control" rows="5" placeholder="Tell us how we can help you..." required></textarea>
                        </div>

                        <div class="mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="newsletter">
                                <label class="form-check-label" for="newsletter">
                                    Subscribe to our newsletter for marine conservation updates
                                </label>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <button type="submit" class="btn btn-primary btn-lg flex-fill">
                                <i class="bi bi-send me-2"></i>Send Message
                            </button>
                            <button type="reset" class="btn btn-outline-secondary btn-lg">
                                <i class="bi bi-arrow-clockwise me-2"></i>Reset
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick Contact Options -->
<section class="mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">Other Ways to Connect</h2>
        <p class="text-muted">Follow our work and stay updated on marine conservation efforts</p>
    </div>
    <div class="row g-4">
        <div class="col-md-4">
            <div class="social-card card h-100 border-0 shadow-sm text-center p-4">
                <div class="social-icon bg-primary bg-opacity-10 rounded-circle p-3 mb-3 mx-auto">
                    <i class="bi bi-facebook text-primary fs-2"></i>
                </div>
                <h5 class="card-title mb-2">Facebook</h5>
                <p class="card-text text-muted">Follow us for daily updates and community stories</p>
                <a href="#" class="btn btn-outline-primary btn-sm">Follow Page</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="social-card card h-100 border-0 shadow-sm text-center p-4">
                <div class="social-icon bg-info bg-opacity-10 rounded-circle p-3 mb-3 mx-auto">
                    <i class="bi bi-twitter text-info fs-2"></i>
                </div>
                <h5 class="card-title mb-2">Twitter</h5>
                <p class="card-text text-muted">Join conversations about ocean conservation</p>
                <a href="#" class="btn btn-outline-info btn-sm">Follow Us</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="social-card card h-100 border-0 shadow-sm text-center p-4">
                <div class="social-icon bg-success bg-opacity-10 rounded-circle p-3 mb-3 mx-auto">
                    <i class="bi bi-instagram text-success fs-2"></i>
                </div>
                <h5 class="card-title mb-2">Instagram</h5>
                <p class="card-text text-muted">Visual stories from our marine conservation work</p>
                <a href="#" class="btn btn-outline-success btn-sm">Follow Us</a>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">Visit Our Office</h2>
        <p class="text-muted">Find us at our headquarters in Coastal Tanzania</p>
    </div>
    <div class="map-container card border-0 shadow-lg">
        <div class="card-body p-0">
            <div class="ratio ratio-16x9">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.123456!2d39.208332!3d-6.156667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1" 
                    style="border:0;" 
                    allowfullscreen="" 
                    loading="lazy" 
                    class="rounded-3">
                </iframe>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="mb-5">
    <div class="text-center mb-4">
        <h2 class="display-5 fw-bold">Frequently Asked Questions</h2>
        <p class="text-muted">Quick answers to common questions about NWIO</p>
    </div>
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="faq-item card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h6 class="fw-bold mb-2">How can I volunteer with NWIO?</h6>
                    <p class="text-muted mb-0">You can apply through our Get Involved page or contact our volunteer coordinator at volunteers@nwio.or.tz for current opportunities.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="faq-item card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h6 class="fw-bold mb-2">Do you accept international partnerships?</h6>
                    <p class="text-muted mb-0">Yes! We welcome international partnerships. Email partnerships@nwio.or.tz with your proposal.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="faq-item card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h6 class="fw-bold mb-2">How can I donate to support marine conservation?</h6>
                    <p class="text-muted mb-0">Visit our Get Involved page for donation options or contact us directly for specific project funding.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="faq-item card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <h6 class="fw-bold mb-2">What areas do you work in?</h6>
                    <p class="text-muted mb-0">We work across coastal Tanzania, focusing on marine ecosystems, coral reefs, and sustainable fishing practices.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
