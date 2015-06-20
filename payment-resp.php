<?php
    require_once ('Veritrans.php');
    require_once ('config/databases.php');
    Veritrans_Config::$isProduction = false;
    Veritrans_Config::$serverKey = 'VT-server-vUp77KtAuLYjjB_obHT2oDQI';
    
    $resp = new Veritrans_Notification();
    $conn = new database();
    $qp = $conn->connect("wq_wiqico_master");
    $qr = $conn->connect("wq_wiqico_log");
    
    $trans = $resp->transaction_status;
    $ptype = $resp->payment_type;
    $oid = $resp->order_id;
    $fraud = $resp->fraud_status;
    $bank = $resp->bank;
    $trans_time = $resp->transaction_time;
    $trans_id = $resp->transaction_id;
    $card_num = $resp->masked_card;
    $approval_code = $resp->approval_code;
    $amount = $resp->gross_amount;
    $signature = $resp->signature_key;

    $query = "INSERT INTO wq_payment_detail (tb_transactionid_detail,tb_transactiondate_detail,tb_transactionstatus_detail,tb_maskedcard_detail,tb_bankcard_detail,tb_fraudstatus_detail,tb_approvalcode_detail,tb_signaturekey_detail,tb_paymentype_detail,tb_grossamount_detail)"
            . "VALUES ($trans_id,$trans_time,$trans,$card_num,$bank,$fraud,$approval_code,$signature,$ptype,$amount)";
    
    if($qp->query($query)){
        header("Location: http://payment.wiqi.co/result.php?action=finish&result=success");
    }
    else{
        $log_que = "INSERT INTO wq_log (tb_result_log,tb_priority_log,tb_type_log)"
                . "VALUES ('Failed to insert payment detail'.$trans_id.',1,'payment-resp')";
        $qr->query($log_que);
    }
    
?>