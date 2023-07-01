// Code By DevSiNo :)

<?php
$API_KEY ="Token"; // put token
define("API_KEY","$API_KEY");
function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

function hi($Tz){
$hex=hex2bin($Tz);
$x = str_replace([','], ",\n", $hex);
return $x;
}
$update = json_decode(file_get_contents('php://input'));
if(isset($update->message)){
    $message = $update->message; 
    $chat_id = $message->chat->id;
    $text = $message->text;
    $message_id = $message->message_id;
    $from_id = $message->from->id;
}
if($text !="/start"){
$cc = hi("$text");
bot('sendmessage',[
	'chat_id'=>$chat_id,
	'text'=>"
<strong>
├ • ┅┅━━━━ 𖣫 ━━━━┅┅ •
├ 💠 • <code>$cc</code>
├ • ┅┅━━━━ 𖣫 ━━━━┅┅ •
├ • Developer: @DevSiNo
</strong>
	",
	'parse_mode'=>'html',
	 'reply_to_message_id' => $message_id
	 ]);
	}

if($text == '/start'){
bot('sendmessage', [
'chat_id' => $chat_id,
'text' =>"
<strong>
<u>🇮🇷 This project was made by an Iranian 🇮🇷</u>

💠 Send Me Hex Text 

💠 Channel: @V2RayTz
💠 Developer: @DevSiNo</strong>
",
'parse_mode'=>"html",
]);
}


// Code By DevSiNo :)