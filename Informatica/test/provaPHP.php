<?php
echo "<h1>Informazioni sul browser</h1>";
$user_agent = $_SERVER['HTTP_USER_AGENT'];
echo "<p><strong>User agent:</strong>  " . $user_agent . "</p>";
echo "<h2>Dettagliu aggiuntivi (se disponibili)</h2>";

if (ini_get('browscap')){
    $browser = get_browser(null, true);
    echo "<ul>";
    echo"<li><strong>Browser:</strong> " . $browser['browser'] . "</li>"; 
    echo"<li><strong>Versione:</strong> " . $browser['version'] . "</li>";
    echo"<li><strong>Sistema Operativo:</strong> " . $browser['platform'] . "</li>";
    echo"<li><strong>Dispositivo Mobile?</strong> " . ($browser['ismobiledevice'] ? 'Mobile' : 'Desktop') . "</li>";
    echo "</ul>";
} else {
    echo "<p>La direttiva 'browscap' non è configurata nel file php.ini. Non è possibile ottenere informazioni dettagliate sul browser.</p>";
}
?>