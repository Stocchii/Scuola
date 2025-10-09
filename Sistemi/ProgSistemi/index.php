<?php
// index.php - Pagina principale
session_start();
require_once 'navbar.php';
?>

<div class="container">
    <h1>Cifratura Messaggio</h1>
    
    <div class="info-box">
        <p><strong>📌 Algoritmi disponibili:</strong></p>
        <p><strong>ROT13:</strong> Ruota ogni lettera di 13 posizioni (non serve chiave)</p>
        <p><strong>Vigenère:</strong> Usa una parola chiave per cifrare il messaggio</p>
    </div>
    
    <form action="cifrato.php" method="POST">
        <div class="form-group">
            <label for="message">Messaggio da cifrare:</label>
            <textarea name="message" id="message" required placeholder="Scrivi qui il tuo messaggio..."></textarea>
        </div>
        
        <div class="form-group">
            <label for="algorithm">Scegli algoritmo:</label>
            <select name="algorithm" id="algorithm" required onchange="toggleKey()">
                <option value="">-- Seleziona --</option>
                <option value="rot13">ROT13</option>
                <option value="vigenere">Vigenère</option>
            </select>
        </div>
        
        <div class="form-group" id="key-group" style="display: none;">
            <label for="key">Chiave (solo per Vigenère):</label>
            <textarea name="key" id="key" placeholder="Es: CHIAVE" style="min-height: 60px;"></textarea>
        </div>
        
        <button type="submit">🔒 Cifra Messaggio</button>
    </form>
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
        keyInput.value = '';
    }
}
</script>

</body>
</html>