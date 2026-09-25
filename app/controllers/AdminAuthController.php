<?php
// app/controllers/AdminAuthController.php

$db = DB::conn();

if ($adminUri === 'logout') {
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_name']);
    header('Location: ' . url('admin/login'));
    exit;
}

// If already logged in, redirect to dashboard
if (isset($_SESSION['admin_id'])) {
    header('Location: ' . url('admin/dashboard'));
    exit;
}

// Handle Login POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $db->prepare("SELECT id, password FROM admin_users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->bind_result($id, $hash);
    
    if ($stmt->fetch() && password_verify($password, $hash)) {
        $_SESSION['admin_id'] = $id;
        $_SESSION['admin_name'] = $username;
        $stmt->close();
        header('Location: ' . url('admin/dashboard'));
        exit;
    } else {
        $error = "Invalid username or password.";
    }
    $stmt->close();
}

// Show Login View
require VIEW_PATH . 'admin/auth/login.php';
