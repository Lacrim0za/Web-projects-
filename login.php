<?php
// pages/login.php - Login Page Content Only
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <div class="login-page">
        <div class="login-container">
            <div class="login-logo">
                <div class="water-drop"></div>
                <div class="logo-text">WellOp</div>
            </div>
            
            <p class="login-subtitle">Need info on your Water? We'll let you know</p>

            <?php if (isset($login_error)): ?>
                <div class="error-message"><?php echo htmlspecialchars($login_error); ?></div>
            <?php endif; ?>

            <?php if (isset($signup_message)): ?>
                <div class="success-message"><?php echo htmlspecialchars($signup_message); ?></div>
            <?php endif; ?>

            <form method="POST" action="">
                <input type="hidden" name="action" value="login">
                
                <div class="form-group">
                    <i class="fas fa-user form-icon"></i>
                    <input type="text" name="username" class="form-input" placeholder="Username" required>
                </div>

                <div class="form-group">
                    <i class="fas fa-lock form-icon"></i>
                    <input type="password" name="password" class="form-input" placeholder="Password" required>
                </div>

                <button type="submit" class="login-button">Log in</button>
            </form>

            <form method="POST" action="">
                <input type="hidden" name="action" value="signup">
                <button type="submit" class="signup-button">Sign Up</button>
            </form>
        </div>
    </div>
</body>
</html>