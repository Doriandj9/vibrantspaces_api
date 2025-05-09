<?php
use App\Core\SanitizerHelper;


if (!function_exists('sanitize_data')) {
    /**
     * @param $value
     * @return mixed
     */
    function sanitize_data($value)
    {
        return resolve(SanitizerHelper::class)->filterData($value);
    }
}


if (!function_exists('sanitize_inputs')) {
    /**
     * @param $value
     * @return mixed
     */
    function sanitize_inputs($value,$lowercase = false, $uppercase= false){
        $data = trim($value);

        if($lowercase && $uppercase) {
            throw new ErrorException(__('errors.Error cannot sanitize text by converting to uppercase and lowercase at the same time.'));
        }
        
        if($lowercase){
            $data = strtolower($data);
        }

        if($uppercase){
            $data = strtoupper($data);
        }
        
        return $data;
    }
}


if (!function_exists('verify_mail')) {

    function verify_mail($mail):string {
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            throw new ErrorException(__('errors.The text entered is not a valid email'));
        }
        $partsMail = preg_split('/@/', $mail);
        $identifier = $partsMail[0];
        $domain = $partsMail[1];
        $email = str_replace('.','',$identifier). '@' . $domain;

        return $email;

    }
}
