<?php

$ch = curl_init();
$url = readline("Введите  url = ");
$log = fopen('log.txt', "w+");


curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_NOBODY,true);
curl_setopt($ch,CURLOPT_HEADER,true);

$head = curl_exec($ch);
if ($head) {
    $head_ar = explode(' ', $head);
    fputs($log ,"HTTP код = ");
    fputs($log ,$head_ar[1]."\r\n");
    $time = curl_getinfo($ch);
    fputs($log ,"Время отклика = ");
    fputs($log ,$time['total_time']);
    echo "Проверка успешна. См. файл log.txt"."\r\n" ;
} else {
    echo "Url не удовлетворяет условиям. См. файл log.txt"."\r\n";
    fputs($log ,"Url не удовлетворяет условиям.");
}
fclose($log);
curl_close($ch);

?>