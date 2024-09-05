<?php
$dsn = 'mysql:host=localhost;dbname=url_shortener';
$username = 'root';
$password = '';

// Koneksi ke database
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $url = $_POST['url'];
    $shortCode = substr(md5($url), 0, 6);

    $stmt = $pdo->prepare("INSERT INTO urls (short_code, url) VALUES (?, ?)");
    $stmt->execute([$shortCode, $url]);

    echo json_encode(['short_url' => 'https://short.url/' . $shortCode]);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
