<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Birthday Wishes - Create Beautiful Birthday Cards</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-content">
            <div class="logo">
                <h1>Birthday Wisher</h1>
            </div>
            <div class="nav-buttons">
                <?php if ($isLoggedIn): ?>
                    <span class="welcome-text">Welcome, <?php echo htmlspecialchars($_SESSION['user_name']); ?></span>
                    <button id="logoutBtn" class="nav-btn"><i class="fas fa-sign-out-alt"></i> Logout</button>
                <?php else: ?>
                    <button id="loginBtn" class="nav-btn"><i class="fas fa-sign-in-alt"></i> Login</button>
                    <button id="signupBtn" class="nav-btn"><i class="fas fa-user-plus"></i> Sign Up</button>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Auth Modal -->
    <div id="authModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="auth-tabs">
                <button class="tab-btn active" data-tab="login">Login</button>
                <button class="tab-btn" data-tab="signup">Sign Up</button>
            </div>
            
            <!-- Login Form -->
            <form id="loginForm" class="auth-form">
                <div class="form-group">
                    <label for="loginEmail"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" id="loginEmail" name="email" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" id="loginPassword" name="password" required>
                </div>
                <button type="submit" class="auth-btn">Login</button>
            </form>
            
            <!-- Signup Form -->
            <form id="signupForm" class="auth-form" style="display: none;">
                <div class="form-group">
                    <label for="signupName"><i class="fas fa-user"></i> Name</label>
                    <input type="text" id="signupName" name="name" required>
                </div>
                <div class="form-group">
                    <label for="signupEmail"><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" id="signupEmail" name="email" required>
                </div>
                <div class="form-group">
                    <label for="signupPassword"><i class="fas fa-lock"></i> Password</label>
                    <input type="password" id="signupPassword" name="password" required>
                </div>
                <button type="submit" class="auth-btn">Sign Up</button>
            </form>
        </div>
    </div>

    <?php if ($isLoggedIn): ?>
    <!-- Main Content -->
    <div class="hero-section">
        <div class="hero-content">
            <h1>Create Magical Birthday Moments</h1>
            <p>Design and send beautiful birthday cards that bring smiles to your loved ones</p>
        </div>
    </div>

    <div class="container">
        <!-- Rest of your existing content -->
        <?php include 'templates/main_content.php'; ?>
    </div>
    <?php else: ?>
    <!-- Landing Page Content -->
    <div class="hero-section">
        <div class="hero-content">
            <h1>Welcome to Birthday Wisher</h1>
            <p>Sign up or login to create and send beautiful birthday cards to your loved ones</p>
            <div class="hero-buttons">
                <button class="hero-btn" onclick="document.getElementById('loginBtn').click()">
                    <i class="fas fa-sign-in-alt"></i> Get Started
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <footer>
        <p>Made with <i class="fas fa-heart"></i> for spreading joy</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="auth.js"></script>
    <script src="script.js"></script>
</body>
</html>
