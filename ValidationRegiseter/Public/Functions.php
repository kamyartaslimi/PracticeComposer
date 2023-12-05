<?php

function CreateRegisterSession(): void
{
    session_start([
        'cache_expire' => 60,
        'cookie_httponly' => true,
        'cookie_lifetime' => 60,
        'name' => 'PHPSessionAddress',
        'save_path' => (processString(__DIR__ , 'PracticeComposer').'\..\Sessions')
    ]);
}

function processString($inputString , $substringToRemove) {
    $position = strpos($inputString, $substringToRemove);
    if ($position !== false) {
        return substr($inputString, 0, $position + strlen($substringToRemove));
    } else {
        return $inputString;
    }
}
function LoginStatus(){

}
function CreateLoginSession(): void
{
    session_start([
        'cache_expire' => 60 * 60 * 24 * 5,
        'cookie_httponly' => true,
        'cookie_lifetime' => 60 * 60 * 24 * 5,
        'name' => 'PHPSessionAddress',
        'save_path' => (processString(__DIR__ , 'PracticeComposer').'\..\Sessions')
    ]);
}
