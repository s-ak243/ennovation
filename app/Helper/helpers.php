<?php

function sendSuccessResponse(string $message="" ,array $detail=null)
{
    $response['status'] =1;
    $response['message'] =$message;
    $response['detail'] =$detail;

    return response()->json($response);
}

function sendFailureMessage(string $message)
{
    $response['status'] =0;
    $response['message'] =$message;
    return response()->json($response);
}

function sendValidationError(array $errors)
{
    $response['status'] =0;
    $response['message'] ="The given data was invalid.";
    $response['errors'] = $errors;
    return response()->json($response);
}
