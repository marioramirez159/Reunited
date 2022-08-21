<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlockchainController extends Controller
{
    
    public function createIPFS($file){
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api-eu1.tatum.io/v3/ipfs",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => array('file'=> new \CURLFile($file)),
          CURLOPT_HTTPHEADER => array(
            "Content-Type: multipart/form-data; boundary=---011000010111000001101001",
            "x-api-key: ".env("TATUMIPKEY"),
          ),
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        if(curl_errno($curl)){
            return [
                "error" => true,
                "msg" => $error
            ];
        }

        curl_close($curl);

        return (json_decode($response))->txId;
    }

    public function mintNTF($ipfs, $data){

        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api-eu1.tatum.io/v3/nft/mint",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS =>'{ "to": "'.env('WALLET').'", "url": "ipfs://'.$ipfs.'", "tokenId" : "'.$data["id"].'", "chain": "MATIC", "contractAddress": "'.env('CONTRACTADDRESS').'", "fromPrivateKey" : "'.env('walletprivkey').'" }',
          CURLOPT_HTTPHEADER => array(
            "x-api-key: ".env("TATUMIPKEY"),
            "Content-Type: application/json"
          ),
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);

        if(curl_errno($curl)){
            return [
                "error" => true,
                "msg" => $error
            ];
        }

        curl_close($curl);

        return (json_decode($response))->txId;
    }
}
