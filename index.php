<?php

session_start();


$page_title = "WellOp - Water Service";


$logged_in = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;


if ($_POST['action'] ?? '' === 'login') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    
    if ($username === 'admin' && $password === 'password') {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        header('Location: ?page=home');
        exit;
    } else {
        $login_error = 'Invalid username or password';
    }
}


if ($_POST['action'] ?? '' === 'signup') {
    $signup_message = 'Account created! Please login with username: admin, password: password';
}


$page = $_GET['page'] ?? 'login';
if ($logged_in && $page === 'login') {
    $page = 'home';
}


if (!$logged_in && in_array($page, ['home', 'about', 'blog', 'contact', 'profile'])) {
    $page = 'login';
}


switch($page) {
    case 'home':
        $page_title = "WellOp - Home";
        break;
    case 'about':
        $page_title = "WellOp - About Us";
        break;
    case 'blog':
        $page_title = "WellOp - Blog";
        break;
    case 'contact':
        $page_title = "WellOp - Contact";
        break;
    case 'profile':
        $page_title = "WellOp - Profile";
        break;
    default:
        $page_title = "WellOp - Login";
}


if ($page !== 'login') {
    include 'Header.php';
}

// Page Content
switch($page) {
    case 'login':
        include 'login.php';
        break;
    case 'home':
        include 'homepage.php';
        break;
    case 'about':
        include 'about.php';
        break;
    case 'blog':
        include 'blog.php';
        break;
    case 'contact':
        include 'contact.php';
        break;
}

// Include footer (only for logged-in pages)
if ($page !== 'login') {
    include 'footer.php';
}
?>