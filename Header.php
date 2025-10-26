<?php
// header.php - Reusable Header Component
// This file should be included on pages that need the header

// Make sure session is started (can be called multiple times safely)
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if user is logged in
$is_logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$username = $_SESSION['username'] ?? 'User';

// Get current page for active nav highlighting
$current_page = $_GET['page'] ?? 'home';

// Handle logout if requested
if (($_GET['action'] ?? '') === 'logout') {
    session_destroy();
    header('Location: ?page=login');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title : 'WellOp - Water Service'; ?></title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<?php if ($is_logged_in): ?>
    <!-- Header Navigation (only show if logged in) -->
    <header class="header">
        <div class="nav-container">
            <div class="social-icons">
                <a href="#" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" title="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="#" title="Instagram"><i class="fab fa-instagram"></i></a>
            </div>
            
            <nav>
                <ul class="nav-menu">
                    <li>
                        <a href="?page=home" <?php echo ($current_page === 'home') ? 'class="active"' : ''; ?>>
                            HOME
                        </a>
                    </li>
                    <li>
                        <a href="?page=about" <?php echo ($current_page === 'about') ? 'class="active"' : ''; ?>>
                            ABOUT
                        </a>
                    </li>
                    <li>
                        <a href="?page=blog" <?php echo ($current_page === 'blog') ? 'class="active"' : ''; ?>>
                            BLOG
                        </a>
                    </li>
                    <li>
                        <a href="?page=contact" <?php echo ($current_page === 'contact') ? 'class="active"' : ''; ?>>
                            CONTACT
                        </a>
                    </li>
                </ul>
            </nav>
            
            <div class="user-menu">
                <i class="fas fa-user user-toggle" onclick="toggleUserMenu()" title="User Menu"></i>
                <div class="user-dropdown" id="userDropdown">
                    <a href="#" onclick="event.preventDefault()">
                        <i class="fas fa-user"></i> Welcome, <?php echo htmlspecialchars($username); ?>!
                    </a>
                    <a href="?page=profile" <?php echo ($current_page === 'profile') ? 'class="active"' : ''; ?>>
                        <i class="fas fa-cog"></i> Settings
                    </a>
                    <a href="?action=logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </header>

    <script>
        function toggleUserMenu() {
            const dropdown = document.getElementById('userDropdown');
            dropdown.classList.toggle('show');
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const userMenu = document.querySelector('.user-menu');
            const dropdown = document.getElementById('userDropdown');
            
            if (!userMenu.contains(event.target)) {
                dropdown.classList.remove('show');
            }
        });
    </script>
<?php endif; ?>