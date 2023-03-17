<?php

function createPayment($amount) {
	$url = "https://test.oppwa.com/v1/checkouts";
	$data = "entityId=8a8294174d0595bb014d05d82e5b01d2" .
                "&amount=". $amount .
                "&currency=USD" .
                "&paymentType=DB";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGE4Mjk0MTc0ZDA1OTViYjAxNGQwNWQ4MjllNzAxZDF8OVRuSlBjMm45aA=='));
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	return $responseData;

    // Success
    // {
    //     "result":{
    //       "code":"000.200.100",
    //       "description":"successfully created checkout"
    //     },
    //     "buildNumber":"2a9e1a1fea2547edade8490646feba5654f5eba0@2022-06-06 00:42:35 +0000",
    //     "timestamp":"2022-06-13 20:21:26+0000",
    //     "ndc":"44D9E4553C7F6DA836E84EB66E1A83FA.uat01-vm-tx02",
    //     "id":"44D9E4553C7F6DA836E84EB66E1A83FA.uat01-vm-tx02"
    //   }
}

function checkPayment($payment_id) {
	$url = "https://test.oppwa.com/v1/checkouts/$payment_id/payment";
	$url .= "?entityId=8a8294174d0595bb014d05d82e5b01d2";

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                   'Authorization:Bearer OGE4Mjk0MTc0ZDA1OTViYjAxNGQwNWQ4MjllNzAxZDF8OVRuSlBjMm45aA=='));
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$responseData = curl_exec($ch);
	if(curl_errno($ch)) {
		return curl_error($ch);
	}
	curl_close($ch);
	return $responseData;

    // Error
    // {
    //     "result":{
    //       "code":"200.300.404",
    //       "description":"invalid or missing parameter - (opp) No payment session found for the requested id - are you mixing test/live servers or have you paid more than 30min ago?"
    //     },
    //     "buildNumber":"2a9e1a1fea2547edade8490646feba5654f5eba0@2022-06-06 00:42:35 +0000",
    //     "timestamp":"2022-06-13 20:21:33+0000",
    //     "ndc":"8a8294174d0595bb014d05d82e5b01d2_2c04e4560dea4cc19a8d1b6200b791ad"
    //   }

    // Success
    // {
    //     "id":"8ac7a4a18159f25501815ecc624a105d",
    //     "paymentType":"DB",
    //     "paymentBrand":"VISA",
    //     "amount":"92.00",
    //     "currency":"EUR",
    //     "descriptor":"7038.8008.8895 OPP_Channel",
    //     "result":{
    //       "code":"000.100.110",
    //       "description":"Request successfully processed in 'Merchant in Integrator Test Mode'"
    //     },
    //     "resultDetails":{
    //       "RiskStatusCode":"APPROVE",
    //       "ResponseCode":"00",
    //       "clearingInstituteName":"Acceptance Test",
    //       "RequestId":"700003447737",
    //       "RiskResponseCode":"0100",
    //       "action":"created",
    //       "OrderId":"000034353278"
    //     },
    //     "card":{
    //       "bin":"480176",
    //       "binCountry":"US",
    //       "last4Digits":"1639",
    //       "holder":"Anna Oliver",
    //       "expiryMonth":"07",
    //       "expiryYear":"2025",
    //       "issuer":{
    //         "bank":"WELLS FARGO BANK, N.A.",
    //         "website":"HTTPS://WWW.WELLSFARGO.COM/",
    //         "phone":"+ (1) 800-869-3557"
    //       },
    //       "type":"DEBIT",
    //       "level":"BUSINESS",
    //       "country":"US",
    //       "maxPanLength":"16",
    //       "binType":"COMMERCIAL",
    //       "regulatedFlag":"Y"
    //     },
    //     "customer":{
    //       "ip":"2a01:9700:1af1:ab00:db9:fab5:a00f:8fe1"
    //     },
    //     "threeDSecure":{
    //       "eci":"07"
    //     },
    //     "customParameters":{
    //       "SHOPPER_EndToEndIdentity":"e58b17dc1c74a7806b357009c0d909f6878096eaa5d632b2b02b248f961f2f85",
    //       "CTPE_DESCRIPTOR_TEMPLATE":""
    //     },
    //     "risk":{
    //       "score":"0"
    //     },
    //     "buildNumber":"2a9e1a1fea2547edade8490646feba5654f5eba0@2022-06-06 00:42:35 +0000",
    //     "timestamp":"2022-06-13 20:41:02+0000",
    //     "ndc":"1E04B8F855453512D81C1554DD758055.uat01-vm-tx03"
    //   }
}
