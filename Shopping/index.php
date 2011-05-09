<?php
        include_once('../anet_php_sdk/AuthorizeNet.php');
        
        $transaction = new AuthorizeNetAIM('3Gq59TtH6', '528P6Gsrak65ztD6');
        $transaction->amount = '9.99';
        $transaction->card_num = '4007000000027';
        $transaction->exp_date = '10/10';
        
        
        $response = $transaction->authorizeAndCapture();
        
        //print_r($response);
        
        if ($response->approved) {
          echo "<h1>Success! The test credit card has been charged!</h1>";
          echo "Transaction ID: " . $response->transaction_id;
        } else {
          echo $response->error_message;
        }
?>

