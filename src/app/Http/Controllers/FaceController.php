<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaceController extends Controller
{

    public function compare( $imageDB , $imageCheck ){

        // you can get the app_id in user dashboard
        $APP_ID = "62a5601544d91f0d6e528390";

        //----------------------

        // add image path from local system
        /*$IMAGE1_PATH =$imageDB;
        $IMAGE2_PATH =$imageCheck;
        //---------------


        $imageObject1 = $this->makecUrlFile($IMAGE1_PATH);
        $imageObject2 = $this->makecUrlFile($IMAGE2_PATH);
        $request = curl_init();
        $queryUrl = "http://facexapi.com/compare_faces?face_det=1"; // face compare url
        $imageObject =  array("img_1" => $imageObject1, "img_2" => $imageObject2);
        curl_setopt($request, CURLOPT_URL, $queryUrl);
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request, CURLOPT_HTTPHEADER, array(
            "content-type: multipart/form-data",
            "user_id:" . $APP_ID,

        )
            );
        curl_setopt($request,CURLOPT_POSTFIELDS,$imageObject);
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($request);  // curl response
        //echo $response;
        curl_close($request);*/

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.facexapi.com/compare_faces',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => array('img_1'=> new \CURLFILE($imageDB),'img_2'=> new \CURLFILE($imageCheck)),
        CURLOPT_HTTPHEADER => array(
            'user_id: 62a5601544d91f0d6e528390'
        ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    public function compareBase64orURL( $imageDB, $imageCheck ){

        // you can get the app_id in user dashboard
        $APP_ID = "62a5601544d91f0d6e528390";

        //-----------------------

        // add image url
        /*$IMAGE1_URL = $imageDB;
        $IMAGE2_URL = $imageCheck;
        //--------------------------

        $queryUrl = "http://facexapi.com/compare_faces";// face compare url

        $imageObject =  array("img_1" => $IMAGE1_URL , "img_2" => $IMAGE2_URL);
        $request = curl_init();
        curl_setopt($request, CURLOPT_URL, $queryUrl);
        curl_setopt($request, CURLOPT_POST, true);
        curl_setopt($request,CURLOPT_POSTFIELDS,$imageObject);
        curl_setopt($request, CURLOPT_HTTPHEADER, array(
            "Content-type: application/json",
            "user_id:" . $APP_ID,
          
        )
            );
        curl_setopt($request, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($request); // curl response
        //echo $response;
        curl_close($request);*/

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://www.facexapi.com/match_faces',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'img_1'=> new \CURLFILE($imageDB),
                'img_2'=> new \CURLFILE($imageCheck)
            ),
            CURLOPT_HTTPHEADER => array(
                'user_id: '.$APP_ID
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    private function makecUrlFile($file){
        $mime = mime_content_type($file);
        $info = pathinfo($file);
        $name = $info['basename'];
        $output = new \CURLFile($file, $mime, $name);
        return $output;
    }

}
