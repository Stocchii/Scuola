<?php
// Cipher.php - Classe per algoritmi di cifratura

class Cipher {
    private $message;
    private $key;
    private $algorithm;
    
    public function __construct($message, $key, $algorithm) {
        $this->message = $message;
        $this->key = $key;
        $this->algorithm = $algorithm;
    }
    
    public function encrypt() {
        if ($this->algorithm == 'rot13') {
            return $this->rot13Encrypt();
        } else {
            return $this->vigenereEncrypt();
        }
    }
    
    public function decrypt() {
        if ($this->algorithm == 'rot13') {
            return $this->rot13Decrypt();
        } else {
            return $this->vigenereDecrypt();
        }
    }
    
    // ROT13 - ruota ogni lettera di 13 posizioni
    private function rot13Encrypt() {
        $result = '';
        for($i = 0; $i< strlen($this->message); $i++ ){
            $char = $this->message[$i];

            if(ctype_alpha($char)){
                $isUpper = ctype_upper($char);
                $base .= $isUpper ? ord('A') : ord('a');
                $pos = ord($char)- $base;
                $newPos = ($pos +  13) %26;
                $newChar = chr($newPos +  $base);
                $result .= $newChar;
            }else{
                $result .= $Char;
            }
            

        } 
         return $result;
    }

    

    
    private function rot13Decrypt() {
        return str_rot13($this->message); // ROT13 è reversibile
    }
    
    // Vigenère - cifratura con parola chiave
    private function vigenereEncrypt() {
        $result = '';
        $key = strtoupper($this->key);
        $keyLen = strlen($key);
        $keyIndex = 0;
        
        for ($i = 0; $i < strlen($this->message); $i++) {
            $char = $this->message[$i];
            
            if (ctype_alpha($char)) {
                $isUpper = ctype_upper($char);
                $charPos = ord(strtoupper($char)) - ord('A');
                $keyPos = ord($key[$keyIndex % $keyLen]) - ord('A');
                $newPos = ($charPos + $keyPos) % 26;
                $newChar = chr($newPos + ord('A'));
                $result .= $isUpper ? $newChar : strtolower($newChar);
                $keyIndex++;
            } else {
                $result .= $char;
            }
        }
        
        return $result;
    }
    
    private function vigenereDecrypt() {
        $result = '';
        $key = strtoupper($this->key);
        $keyLen = strlen($key);
        $keyIndex = 0;
        
        for ($i = 0; $i < strlen($this->message); $i++) {
            $char = $this->message[$i];
            
            if (ctype_alpha($char)) {
                $isUpper = ctype_upper($char);
                $charPos = ord(strtoupper($char)) - ord('A');
                $keyPos = ord($key[$keyIndex % $keyLen]) - ord('A');
                $newPos = ($charPos - $keyPos + 26) % 26;
                $newChar = chr($newPos + ord('A'));
                $result .= $isUpper ? $newChar : strtolower($newChar);
                $keyIndex++;
            } else {
                $result .= $char;
            }
        }
        
        return $result;
    }
}
?>