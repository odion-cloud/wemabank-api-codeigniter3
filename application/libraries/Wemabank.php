<?php


class Wemabank{

    public function lookup_account($account_number)
    {
       

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


    public function virtual_account_create($apikey,$businessId, $amount, $orderid, $email, $phone, $firstname)
    {
       


        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://lagos-alat-blueapi.azure-api.net/bank-transfer/api/v1/bankTransfer/virtualAccount',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "transactionId": "",
            "amount": "7500000",
            "currency": "NGN",
            "orderId": "",
            "businessId": "3a000d3b-9760-4d1a-f501-08daf9260b71",
            "businessName": null,
            "description": null,
            "customer": {
                "email": "danielibanga@gmail.com",
                "phone": "2347037805351",
                "firstName": "Daniel",
                "lastName": "Ibanga",
                "metadata": "null"
            }
        }',
          CURLOPT_HTTPHEADER => array(
            'Ocp-Apim-Subscription-Key: 1d133fe1bd144b8582ae7c387c00818c',
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
    "businessId": "3a000d3b-9760-4d1a-f501-08daf9260b71",
    "cardNumber": "5123450000000008",
    "currency": "NGN"
}',
          CURLOPT_HTTPHEADER => array(
            'Ocp-Apim-Subscription-Key: 1d133fe1bd144b8582ae7c387c00818c',
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
            'Ocp-Apim-Subscription-Key: 1d133fe1bd144b8582ae7c387c00818c',
            'Content-Type: application/json',
            'Cache-Control: no-cache',);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        # Request body
        $request_body = '{
          "businessId": "3a000d3b-9760-4d1a-f501-08daf9260b71",
          "cardNumber": "4173960034038339",
          "expiryDate": "02/23",
          "amount": 2000,

          "cvV2": "string",
          "currency": "NGN"
        }';
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);

        $resp = curl_exec($curl);
        curl_close($curl);
        var_dump($resp);
        echo $resp;


    }

    public function authenticate_card($businessId, $amount, $orderid, $email, $phone, $firstname)
    {
       

        $url = "https://lagos-alat-blueapi.azure-api.net/paymentcard/api/v1/paymentCard/mc/authenticate";
        
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
              "cardNumber": "4173960034038339",
              "cardMonth": "3",
              "cardYear": "25",
              "securityCode": "100",
              "businessId": "3a000d3b-9760-4d1a-f501-08daf9260b71",
              "businessName": "",
              "amount": 1000,
              "currency": "NGN",
              "orderId": "",
              "description": "ALATpay Checkout Payment",
              "channel": "string",
              "customer": {
                "email": "jane.joe@email.com",
                "phone": "+2348000000001",
                "firstName": "Jane",
                "lastName": "Joe",
                "metadata": ""
              },
              "transactionId": "string"
            }
               
        }';
        curl_setopt($curl, CURLOPT_POSTFIELDS, $request_body);

        $resp = curl_exec($curl);
        curl_close($curl);
        #var_dump($resp);
        echo $resp;


    }
 

   
}