<?php
session_start();
$method = 'aes-256-cbc';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'encrypt' && isset($_POST['plaintext'])) {
            $plaintext = $_POST['plaintext'];
            $encrypted = openssl_encrypt($plaintext, $method, 0 );            
            echo "<h2>الناتج</h2>";
            echo "<p><strong>النص المدخل---:</strong> " . htmlspecialchars($plaintext) . "</p>";
            echo "<p><strong>النص المشفر:</strong> " . $encrypted . "</p>";
            echo "<p><strong>النص بعد فك التشفير:</strong> " . htmlspecialchars($plaintext) . "</p>";

        }
    }
}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <title> securty web</title>
</head>
<body>
  
    <form method="post">
        <label for="plaintext">النص الذي تريد تشفيره:</label><br>
        <textarea name="plaintext" id="plaintext" rows="5" cols="50" required><?php 
            echo isset($_SESSION['plaintext']) ? htmlspecialchars($_SESSION['plaintext']) : ''; 
        ?></textarea><br><br>
        
        <button type="submit" name="action" value="encrypt">تشفير</button>
        <button type="submit" name="action" value="decrypt" class="decrypt-btn"> فك التشفير</button>

        <?php if (isset($_SESSION['encrypted'])): ?>
        <?php endif; ?>
    </form>
</body>
</html>
