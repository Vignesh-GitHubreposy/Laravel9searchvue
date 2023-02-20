<?php

namespace App\Traits;

trait HttpResponses{
    protected function success($data,$messsage=null,$code=200){
        return response()->json([
            "status"=>true,
            "message"=>$messsage,
            "data"=>$data
        ],$code);
    }
    protected function error($data, $messsage = null, $code)
    {
        return response()->json([
            "status" => false,
            "message" => $messsage,
            "data" => $data
        ], $code);
    }
    protected function searchresponse($data, $datacount, $messsage = null, $code)
    {
        return response()->json([
            "status" => "OK",
            "code" => $code,
            "total"=> $datacount,
            "message" => $messsage,
            "data" => $data
        ], $code);
    }
}