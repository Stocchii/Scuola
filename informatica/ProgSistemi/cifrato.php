<?php
// cifrato.php - Mostra il messaggio cifrato
session_start();
require_once 'Cipher.php';
require_once 'navbar.php';

$error = '';
$encrypted = '';
$original = '';
$algorithm = '';
$key = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $original = trim($_POST['message'] ?? '');
    $algorithm = trim($_POST['algorithm'] ?? '');
    $key = trim($_POST['key'] ?? '');
    
    if (empty($original) || empty($algorithm)) {
        $error = 'Messaggio e algoritmo sono obbligatori!';
    } elseif ($algorithm == 'vigenere' && empty($key)) {
        $error = 'La chiave è obbligatoria per Vigenère!';
    } else {
        try {
            $cipher = new Cipher($original, $key, $algorithm);
            $encrypted = $cipher->encrypt();
            
            // Salva in sessione
            $_SESSION['encrypted'] = $encrypted;
            $_SESSION['algorithm'] = $algorithm;
            $_SESSION['key'] = $key;
            $_SESSION['original'] = $original;
            
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
}
?>

<div class="container">
    <h1>Messaggio Cifrato</h1>
    
    <?php if ($error): ?>
        <div class="error">
            <strong>❌ Errore:</strong> <?php echo htmlspecialchars($error); ?>
        </div>
        <button onclick="history.back()" class="secondary">← Torna Indietro</button>
        
    <?php elseif ($encrypted): ?>
        <div class="result-box">
            <h3>📝 Messaggio Originale:</h3>
            <p><?php echo htmlspecialchars($original); ?></p>
        </div>
        
        <div class="result-box">
            <h3>🔧 Algoritmo:</h3>
            <p><?php echo $algorithm == 'rot13' ? 'ROT13' : 'Vigenère'; ?></p>
        </div>
        
        <?php if ($algorithm == 'vigenere'): ?>
        <div class="result-box">
            <h3>🔑 Chiave:</h3>
            <p><?php echo htmlspecialchars($key); ?></p>
        </div>
        <?php endif; ?>
        
        <div class="success">
            <h3>✅ Messaggio Cifrato:</h3>
            <p><?php echo htmlspecialchars($encrypted); ?></p>
        </div>
        
        <button onclick="window.location.href='index.php'">🔄 Cifra Nuovo</button>
        <button onclick="window.location.href='decifra.php'" class="secondary">🔓 Decifra</button>
        
    <?php else: ?>
        <div class="error">
            Nessun dato. Torna alla home.
        </div>
        <button onclick="window.location.href='index.php'" class="secondary">← Home</button>
    <?php endif; ?>
</div>

</body>
</html>