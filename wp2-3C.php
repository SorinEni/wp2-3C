<?php 
 $submit = filter_input(INPUT_POST, 'submit');
 $amount = filter_input(INPUT_POST, 'amount');
 $switch = filter_input(INPUT_POST, 'currency');
 define('EUR_CZK', 27);
 define('USD_CZK', 23);
 define('GBP_CZK', 30);
 
 
 ?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Převod</h1>
    
<?php 
switch ($switch) {
    case 'eur_czk':
            $convertedamount = $amount / EUR_CZK;
            $currencyfrom = 'czk';
            $currencyto = 'eur';
        break;
    
    case 'czk_eur':
            $convertedamount = $amount * EUR_CZK;
            $currencyfrom = 'eur';
            $currencyto = 'czk';
        break;

    case 'dol_czk':
            $convertedamount = $amount * USD_CZK;
            $currencyfrom = 'usd';
            $currencyto = 'czk';
        break;
        
    case 'czk_dol':
            $convertedamount = $amount / USD_CZK;
            $currencyfrom = 'czk';
            $currencyto = 'usd';
        break;

    case 'lib_czk':
            $convertedamount = $amount * GBP_CZK;
            $currencyfrom = 'gbp';
            $currencyto = 'czk';
        break;
        
    case 'czk_lib':
            $convertedamount = $amount / GBP_CZK;
            $currencyfrom = 'czk';
            $currencyto = 'gbp';
        break;
    
}?>






    <?php 
    if (isset($submit)) {?>
     <br>Částka <?= $amount ?> <?= $currencyfrom ?> byla změněná na částku <?= $convertedamount ?> <?= $currencyto ?>
<?php
} else {?> 
    <form action="wp2-3C.php" method="post">
    <input type="text" name="amount" id="amount" > 
    <br>CZK -> €<input type="radio" name="currency" id="" value="eur_czk" >
    <br>€ -> CZK<input type="radio" name="currency" id="" value="czk_eur" > 

    <br>$ -> CZK<input type="radio" name="currency" id="" value="dol_czk" > 
    <br>CZK -> $<input type="radio" name="currency" id="" value="czk_dol" > 

    <br>£ -> CZK<input type="radio" name="currency" id="" value="lib_czk" > 
    <br>CZK -> £<input type="radio" name="currency" id="" value="czk_lib" > 

    <br><input type="submit" name="submit" value="Odeslat">
    </form>
<?php 
} ?>      









</body>
</html>