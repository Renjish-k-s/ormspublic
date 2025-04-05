<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Research Management System</title>
    <!-- Bootstrap CSS -->
    <!-- Font Awesome -->
    <link href="home/css/all.min.css" rel="stylesheet">
    <link href="home/css/bootstrap.min.css" rel="stylesheet">
    <link href="./home/css/coustom.css" rel="stylesheet">


   
</head>
<body>


<?php
session_start(); // Start the session

// Destroy all session data
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session
?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">ORMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./login/">Login or Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./login/complaint.php">Register complaint</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1>Transform Your Research Management</h1>
                    <p>Streamline your research approval process with our cutting-edge digital platform. Experience seamless collaboration, efficient workflows, and enhanced security.</p>
                    <button class="btn btn-custom">Get Started</button>
                </div>
                <div class="col-lg-6">
                    <!-- Add an illustration or image here -->
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <div class="row text-center mb-5">
                <h2>Key Features</h2>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Secure & Compliant</h3>
                        <p>Advanced encryption and role-based access control ensuring data protection and IEC compliance.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-comments"></i>
                        </div>
                        <h3>Integrated Communication</h3>
                        <p>Built-in chat system enabling direct communication between Applicants and Reviewers.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                        <h3>Streamlined Workflow</h3>
                        <p>Digitized processes eliminating paperwork and reducing manual errors.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta">
        <div class="container">
            <h2>Ready to Revolutionize Your Research Process?</h2>
            <p>Join our platform and experience the future of research management.</p>
            <button class="btn btn-custom mt-3">Register Now</button>
        </div>
    </section>


       



    <!-- Bootstrap JS -->
    <script src="./home/js/bootstrap.bundle.min.js"></script>
    <script src="./home/js/coustom.js"></script>
</body>
</html>