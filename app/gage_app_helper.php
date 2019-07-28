<?php
/**
 * Created by PhpStorm.
 * User: gem
 * Date: 7/7/17
 * Time: 2:50 PM
 */


function encrypt_decrypt($action, $string)
{
    $output = false;

    $encrypt_method = "AES-256-CBC";
    $secret_key = 'LaoN';
    $secret_iv = 'simELp';

    // hash
    $key = hash('sha256', $secret_key);

    // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    if ($action == 'encrypt') {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    } else if ($action == 'decrypt') {
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
    }

    return $output;
}

function search_query_constructor($searchString, $col)
{
    $dataArray = (array_filter(explode(" ", trim($searchString))));
    $constructor_sql = "(";
    if (count($dataArray) < 1) {
        return " 1 ";
    }
    if (is_array($col)) {
        foreach ($col as $col_name) {
            if ($col_name !== $col[0]) {
                $constructor_sql .= " OR ";
            }
            for ($i = 0; $i < count($dataArray); $i++) {
                if (count($dataArray) - 1 === $i) {
                    $constructor_sql .= "$col_name LIKE '%{$dataArray[$i]}%' ";
                } else {
                    $constructor_sql .= "$col_name LIKE '%{$dataArray[$i]}%' OR ";
                }
            }
        }
    } else {
        for ($i = 0; $i < count($dataArray); $i++) {
            if (count($dataArray) - 1 === $i) {
                $constructor_sql .= "$col LIKE '%{$dataArray[$i]}%' ";
            } else {
                $constructor_sql .= "$col LIKE '%{$dataArray[$i]}%' OR ";
            }
        }
    }
    $constructor_sql .= ")";
    return $constructor_sql;
}

function multi_unset($array, $keys)
{
    if (is_array($array)) {
        foreach ($keys as $key) {
            unset($array[$key]);
        }

        return $array;

    } else {
        return null;
    }
}

function select_array_indexes($array, $keys)
{
    $val = [];
    if (is_array($array)) {
        foreach ($keys as $key) {
            if (isset($array[$key])) {
                $val[$key] = $array[$key];
            }
        }

        return $val;

    } else {
        return null;
    }
}


function sendErrorEmail($message, $subject, $to)
{
    if (!isValidEmail($to))
        return false;

    $info['subject'] = $subject;
    $info['message'] = $message;

    \Illuminate\Support\Facades\Mail::to($to)->send(new \App\Mail\ApiErrorMail($info));

}

function problemResponse($message = null, $status_code = null, $request = null, $trace = null)
{
    $code = ($status_code != null) ? $status_code : "404";
    $body = [
        'message' => "$message",
        'code' => $code,
        'status_code' => $code,
        'status' => false
    ];


    if (!is_null($request)) {
        save_log($request, $body);
        if ($code == "500" && !is_null($trace)) {

            $message = 'URL : ' . $request->fullUrl() .
                '<br /> METHOD: ' . $request->method() .
                '<br /> DATA_PARAM: ' . json_encode($request->all()) .
                '<br /> RESPONSE: ' . json_encode($body) .
                '<br /> Trace Message: ' . $trace->getMessage() .
                '<br /> <b> Trace: ' . json_encode($trace->getTrace()) . "</b>";
            if (config("app.SEND_EMAIL_ON_500_ERR", false))
                sendErrorEmail($message, 'API ERROR ALERT', config("app.SEND_EMAIL_ON_500_ERR", 'georgetheprogrammer@gmail.com') );
        }
    }


    return response()->json($body)->setStatusCode($code);
}

function validResponse($message = null, $data = [], $request = null)
{
    $body = [
        'message' => "$message",
        'data' => $data,
        'status' => true,
        'status_code' => 200,
    ];

    if (!is_null($request)) {
        save_log($request, $body);
    }

    return response()->json($body);
}

function save_log($request, $response)
{
    return \App\Models\ApiLog::create([
        'url' => $request->fullUrl(),
        'method' => $request->method(),
        'data_param' => json_encode($request->all()),
        'response' => json_encode($response),
    ]);
}


function generic_logger($fullUrl = null, $method = null, $param = [], $response = [])
{
    \App\Models\ApiLog::create([
        'url' => $fullUrl,
        'method' => $method,
        'data_param' => json_encode($param),
        'response' => json_encode($response),
    ]);
}


function isValidEmail($email)
{
    return (boolean)filter_var($email, FILTER_VALIDATE_EMAIL) && preg_match('/@.+\./', $email);
}

function generateRandomReferenceCode($length = 6)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }


    return $randomString;
}

function ddd($var)
{
    $dump = $var;
    print_r($dump);
    exit;

}

function clean_up_string($string)
{
    $string = str_replace(['%', '^', '#', '!', '@', '$', '*', '1', '2', '3', '4', '5', '6', '7', '8', '9'], '', $string);
    // trim
    $string = array_filter(array_map(static function ($entry) {
        $entry = trim($entry);
        return $entry;
    }, explode(' ', trim(strtolower($string)))));
    $string = strtoupper(implode(' ', $string));

    return $string;
}

//pass $uppercase_final_key_case as null to ignore case check
function array_keys_prepend_text($arr, $prepend_text, $separator = "_", $uppercase_final_key_case = true)
{
    $holder = [];
    $prepend_text = clean_up_string($prepend_text);
    foreach ($arr as $key => $val) {
        $new_key = "$prepend_text" . "$separator" . $key;

        if ($uppercase_final_key_case === true) {
            $new_key = strtoupper($new_key);
        } elseif ($uppercase_final_key_case === false) {
            /** @var String $new_key */
            $new_key = strtolower($new_key);
        }

        $holder[$new_key] = $val;
    }


    return $holder;
}


/**
 * @param $timestring
 * @return bool|\Carbon\Carbon
 */
function validateDateOrTime($timestring)
{
    try {
        $newDateTime = \Carbon\Carbon::parse($timestring);
        return $newDateTime;
    } catch (\Exception $e) {
        return false;
    }

}



?>
