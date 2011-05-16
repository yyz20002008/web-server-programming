<?php
        require_once('../inc/global.php');
        require_once('DataAccess.php');
        include_once('anet_php_sdk/AuthorizeNet.php');
        //print_r($_REQUEST);
        $transaction = new AuthorizeNetAIM('8wcp38yANE', '745G4FA2xhUe48nA');
        $transaction->amount = $_REQUEST[amount];
        $transaction->card_num = $_REQUEST[credit];
        $transaction->exp_date = $_REQUEST[expdate];
        
        
        $response = $transaction->authorizeAndCapture();
        
        //print_r($response);
        
        if ($response->approved) {
          echo "<h1>Success! The test credit card has been charged!</h1>";
          echo "Transaction ID: " . $response->transaction_id;
        } else {
          echo $response->error_message;
        }
        
        $error=Placeorder($response->transaction_id,$_REQUEST[amount],$_REQUEST[address]);
        //print_r($error);
        echo $qty;
        echo $pid;
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Shopping</title>
</head>
<body>

<a href="http://cs.newpaltz.edu/~N02202273/Web/FinalProject/">Back to Home</a>

</body>
</html>




