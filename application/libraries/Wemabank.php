<?php


class Wemabank{

    public function lookup_account($account_number)
    {
       $businessId = "3a000d3b-9760-4d1a-f501-08daf9260b71";
 
        $url = "https://alatpay.azure-api.net/merchant-onboarding/api/v1/banks/accountName";
        
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        # Request headers
        $headers = array(
            'Content-Type: application/json',
            'Cache-Control: no-cache',);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        # Request body
        $request_body = '{
            "accountNumber": "'.$account_number.'",
            "bankCode": "035"
        }';
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);

        $resp = curl_exec($curl);
        curl_close($curl);
        #var_dump($resp);
        echo $resp;


    }


    public function virtual_account_create($apikey, $businessId, $amount, $orderid, $email, $phone, $first_name)
    {
       
         // $businessId="3a000d3b-9760-4d1a-f501-08daf9260b71";

         // echo $businessId;

        $curl = curl_init();

        $fields = array(
     
            'transactionId'=> 'f603d89e-35a4-4287-48f8-08db339ed38d',
            'amount'=> $amount,
            'currency'=> 'NGN',
            'orderId'=> '',
            'businessId'=> $businessId,
            'businessName'=> null,
            'description'=> null,
            'customer'=> array(
                'email'=>  $email,
                'phone'=> $phone,
                'firstName'=> $first_name,
                'lastName'=> $first_name,
                'metadata'=> 'null')
    );

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://lagos-alat-blueapi.azure-api.net/bank-transfer/api/v1/bankTransfer/virtualAccount',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => json_encode($fields),
          CURLOPT_HTTPHEADER => array(
            'Ocp-Apim-Subscription-Key: 88a33283cbd74fe8880c8d147605809c',
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
       // var_dump($response);

    

    }


    public function initialize_card($businessId, $amount, $orderid, $email, $phone, $firstname)
    {
       

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://lagos-alat-blueapi.azure-api.net/paymentcard/api/v1/paymentCard/mc/initialize',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
                "businessId": "'.$businessId.'",
                "cardNumber": "5123450000000008",
                "currency": "NGN"
            }',
          CURLOPT_HTTPHEADER => array(
            'Ocp-Apim-Subscription-Key: 88a33283cbd74fe8880c8d147605809c',
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;


    }

    public function card_validation($businessId, $amount, $orderid, $email, $phone, $firstname)
    {
       

        $url = "https://lagos-alat-blueapi.azure-api.net/paymentcard/api/v1/paymentCard/mc/authenticate";
        
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        # Request headers
        $headers = array(
            'Ocp-Apim-Subscription-Key: 88a33283cbd74fe8880c8d147605809c',
            'Content-Type: application/json',
            'Cache-Control: no-cache',);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        # Request body
        $request_body = '{
          "businessId": "3a000d3b-9760-4d1a-f501-08daf9260b71",
          "cardNumber": "5369020005431749",
          "cardMonth": "02",
          "cardYear": "23",
          "securityCode": "702",
          "amount": 20,
 
          "currency": "NGN",
          "customer":
            {
              "email": "jane.joe@email.com",
              "phone": "+23480000000001",
              "firstName": "Jane",
              "lastName": "+23480000000001",
              "metadata": "string"
            },
           "transactionId": ""
        }';
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);

        $resp = curl_exec($curl);
        curl_close($curl);
        var_dump($resp);
        echo $resp;


    }

    public function authenticate_card($businessId, $card_number, $cvv, $expiry_date, $amount, $orderid, $email, $phone, $first_name)
    {
       

        $url = "https://lagos-alat-blueapi.azure-api.net/paymentcard/api/v1/paymentCard/mc/authenticate";
        $fields = array(
     
            'transactionId'=> '',
            'cardNumber'=> $card_number,
            'cardMonth'=> '02',
            'cardYear'=> '26',
            'securityCode'=> $cvv,
            'amount'=> $amount,
            'currency'=> 'NGN',
            'orderId'=> '',
            'businessId'=> $businessId,
            'businessName'=> '',
            'description'=> '',
            'channel' => 'string',
            'customer'=> array(
                'email'=>  $email,
                'phone'=> $phone,
                'firstName'=> $first_name,
                'lastName'=> $first_name,
                'metadata'=> 'null')
        );
           
        $curl = curl_init($url);

        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        # Request headers
        $headers = array(
            'Ocp-Apim-Subscription-Key: 88a33283cbd74fe8880c8d147605809c',
            'Content-Type: application/json',
            'Cache-Control: no-cache',);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($fields));

        $resp = curl_exec($curl);
        curl_close($curl);
        #var_dump($resp);
        echo $resp;


    }
 

   
}
