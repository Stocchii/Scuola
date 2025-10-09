<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Cifratura</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .navbar {
            background: white;
            padding: 15px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            margin-bottom: 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .navbar h2 {
            color: #667eea;
        }
        
        .nav-links a {
            text-decoration: none;
            color: #333;
            padding: 8px 16px;
            margin: 0 5px;
            border-radius: 5px;
            transition: all 0.3s;
        }
        
        .nav-links a:hover,
        .nav-links a.active {
            background: #667eea;
            color: white;
        }
        
        .container {
            max-width: 700px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
        }
        
        h1 {
            color: #667eea;
            margin-bottom: 30px;
            text-align: center;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: bold;
        }
        
        textarea,
        select {
            width: 100%;
            padding: 12px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            font-family: Arial, sans-serif;
        }
        
        textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        textarea:focus,
        select:focus {
            outline: none;
            border-color: #667eea;
        }
        
        button {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-right: 10px;
        }
        
        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        button.secondary {
            background: #6c757d;
        }
        
        .result-box {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #667eea;
        }
        
        .result-box h3 {
            color: #667eea;
            margin-bottom: 10px;
        }
        
        .result-box p {
            color: #333;
            line-height: 1.6;
            word-wrap: break-word;
        }
        
        .info-box {
            background: #e7f3ff;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #2196F3;
        }
        
        .error {
            background: #ffebee;
            color: #c62828;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #c62828;
        }
        
        .success {
            background: #e8f5e9;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            border-left: 4px solid #4caf50;
        }
        
        .success p {
            color: #2e7d32;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <?php
    $current_page = basename($_SERVER['PHP_SELF']);
    ?>
    <nav class="navbar">
        <h2>🔐 Sistema Cifratura</h2>
        <div class="nav-links">
            <a href="index.php" class="<?php echo $current_page == 'index.php' ? 'active' : ''; ?>">Home</a>
            <a href="cifrato.php" class="<?php echo $current_page == 'cifrato.php' ? 'active' : ''; ?>">Cifra</a>
            <a href="decifra.php" class="<?php echo $current_page == 'decifra.php' ? 'active' : ''; ?>">Decifra</a>
        </div>
    </nav>