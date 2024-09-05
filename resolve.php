<?php
$dsn = 'mysql:host=localhost;dbname=url_shortener';
$username = 'root';
$password = '';

// Koneksi ke database
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $shortCode = $_GET['code'];

    $stmt = $pdo->prepare("SELECT url FROM urls WHERE short_code = ?");
    $stmt->execute([$shortCode]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        header("Location: " . $result['url']);
    } else {
        echo 'URL not found';
    }
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
