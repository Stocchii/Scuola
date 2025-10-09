<?php
// decifra.php - Decifra messaggi
session_start();
require_once 'Cipher.php';
require_once 'navbar.php';

$error = '';
$decrypted = '';
$encrypted_msg = '';
$algorithm = '';
$key = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $encrypted_msg = trim($_POST['encrypted_message'] ?? '');
    $algorithm = trim($_POST['algorithm'] ?? '');
    $key = trim($_POST['key'] ?? '');
    
    if (empty($encrypted_msg) || empty($algorithm)) {
        $error = 'Messaggio e algoritmo sono obbligatori!';
    } elseif ($algorithm == 'vigenere' && empty($key)) {
        $error = 'La chiave è obbligatoria per Vigenère!';
    } else {
        try {
            $cipher = new Cipher($encrypted_msg, $key, $algorithm);
            $decrypted = $cipher->decrypt();
            
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
    }
} else {
    // Carica dalla sessione
    if (isset($_SESSION['encrypted'])) {
        $encrypted_msg = $_SESSION['encrypted'];
        $algorithm = $_SESSION['algorithm'];
        $key = $_SESSION['key'];
    }
}
?>

<div class="container">
    <h1>Decifratura Messaggio</h1>
    
    <?php if (isset($_SESSION['original']) && !$_POST): ?>
        <div class="info-box">
            <p><strong>💡 I campi sono già compilati con l'ultima cifratura</strong></p>
        </div>
    <?php endif; ?>
    
    <?php if ($error): ?>
        <div class="error">
            <strong>❌ Errore:</strong> <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>
    
    <?php if ($decrypted): ?>
        <div class="result-box">
            <h3>📝 Messaggio Cifrato:</h3>
            <p><?php echo htmlspecialchars($encrypted_msg); ?></p>
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
            <h3>🔓 Messaggio Decifrato:</h3>
            <p><?php echo htmlspecialchars($decrypted); ?></p>
        </div>
        
        <button onclick="window.location.href='index.php'">🔄 Nuovo</button>
        <button onclick="window.location.href='decifra.php'" class="secondary">🔄 Decifra Altro</button>
        
    <?php else: ?>
        <form action="decifra.php" method="POST">
            <div class="form-group">
                <label for="encrypted_message">Messaggio cifrato:</label>
                <textarea name="encrypted_message" id="encrypted_message" required 
                    placeholder="Incolla qui il messaggio da decifrare..."><?php echo htmlspecialchars($encrypted_msg); ?></textarea>
            </div>
            
            <div class="form-group">
                <label for="algorithm">Algoritmo usato:</label>
                <select name="algorithm" id="algorithm" required onchange="toggleKey()">
                    <option value="">-- Seleziona --</option>
                    <option value="rot13" <?php echo $algorithm == 'rot13' ? 'selected' : ''; ?>>ROT13</option>
                    <option value="vigenere" <?php echo $algorithm == 'vigenere' ? 'selected' : ''; ?>>Vigenère</option>
                </select>
            </div>
            
            <div class="form-group" id="key-group" style="display: <?php echo $algorithm == 'vigenere' ? 'block' : 'none'; ?>;">
                <label for="key">Chiave (solo per Vigenère):</label>
                <textarea name="key" id="key" placeholder="Inserisci la stessa chiave usata per cifrare" 
                    style="min-height: 60px;"><?php echo htmlspecialchars($key); ?></textarea>
            </div>
            
            <button type="submit">🔓 Decifra</button>
            <button type="button" onclick="window.location.href='index.php'" class="secondary">← Home</button>
        </form>
    <?php endif; ?>
</div>

<script>
function toggleKey() {
    const algorithm = document.getElementById('algorithm').value;
    const keyGroup = document.getElementById('key-group');
    const keyInput = document.getElementById('key');
    
    if (algorithm === 'vigenere') {
        keyGroup.style.display = 'block';
        keyInput.required = true;
    } else {
        keyGroup.style.display = 'none';
        keyInput.required = false;
    }
}

// Imposta visualizzazione al caricamento
window.onload = function() {
    toggleKey();
};
</script>

</body>
</html>