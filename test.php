<?php
header('Content-Type: text/html; charset=utf-8');
$message= file_get_contents("php://input");
$arrayMessage= json_decode($message, true);

$token= "249879980:AAHNdWnXjdq6Fw17NF81xXTtjA3xs19Sc6w";
$chat_id= $arrayMessage['message']['from']['id'];
$command= $arrayMessage['message']['text'];

if($command == '/start'){
    $text= "سلام، به ربات ما خوش آمدید";
    $url= "https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat_id."&text=".$text;
    file_get_contents($url);    
}else if($command == '/aboutus'){
    $text= "این یک متن درباره ماست";
    $url= "https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat_id."&text=".$text;
    file_get_contents($url);
}else if($command == '/poets'){
    $poets= array(
        'keyboard' => array(
                array('/Ferdowsi', '/Mawlawi', '/Hafez', '/Rudaki')
            ),
        );
    $jsonPoets= json_encode($poets);
    $text= "نام یکی از شعرای بزرگ ایرانی را انتخاب کنید";
    $url= "https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat_id."&text=".$text."&reply_markup=".$jsonPoets;
    file_get_contents($url);
}else{
    $text= "دستور نا معتبر است";
    $url= "https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat_id."&text=".$text;
    file_get_contents($url);
}
