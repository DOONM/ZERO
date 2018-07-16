<?php
  //SHARE Contact  V1
  // AL3KED @AL3KED
  //  CMD TM @l_lTM
$phone_number = '+0000000000'; // رقم المطور1 
$first_name = '|جهه 1|';
$phone_number1 = '+0000000000'; // رقم المطور2 
$first_name1 = '|جهه 2|';
$channel = "@l_lTM"; // قناة اولا
$channel1 = "@C_lov6"; // قناة ثانيه
$sudo = 00000000; // ايدي المطور
ob_start();
$API_KEY = ""; // توكنـــك هنا
echo "https://api.telegram.org/bot$API_KEY/setwebhook?url=".$_SERVER['SERVER_NAME']."".$_SERVER['SCRIPT_NAME'];
define('API_KEY',$API_KEY);
  //SHARE Contact  V1
  // AL3KED @AL3KED
  //  CMD TM @l_lTM
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
$update   = json_decode(file_get_contents('php://input'));
$message  = $update->message;
$from_id  = $message->from->id;
$chat_id  = $message->chat->id;
$text     = $message->text;
  //SHARE Contact  V1
  // AL3KED @AL3KED
  //  CMD TM @l_lTM
$user_id = $message->from->id;
$name = $message->from->first_name;
$username = $message->from->username; 
  //SHARE Contact  V1
  // AL3KED @AL3KED
  //  CMD TM @l_lTM
$id = $message->from->id;
$ASL = file_get_contents("https://api.telegram.org/bot".API_KEY."/getChatMember?chat_id=@l_lTM&user_id=$id");
if($text == "/start" and strpos($ASL, '"status":"left"') == TRUE){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"لا يمكنك استخدام البوت !⚠️
يــجب الأشــتراك اولاَ ",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[['text'=>"اضغط هنا للأشتراك", 'url'=>"https://telegram.me/l_lTM"]]    
]    
])
]);
}  //SHARE Contact  V1
  // AL3KED @AL3KED
  //  CMD TM @l_lTM

if($text == "/start"){
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"اهلا بك في بوت جهات الاتصال

ارســل جهتك الان لمشاركتها في قنوات جهات الاتــصال !!",
'parse_mode'=>"MarkDown",
'reply_markup'=>json_encode([
'inline_keyboard'=>[
[
['text'=>"لــمتابعة جديدنا 🏆", 'url'=>"https://t.me/l_lTM"]
],
[
['text'=>"AL3KED 🎩", 'url'=>"https://t.me/AL3KED"]
],
]
])
]);
}
  //SHARE Contact  V1
  // AL3KED @AL3KED
  //  CMD TM @l_lTM
if ($message->contact) {
    bot('sendContact',[
        'chat_id'=>$chat_id,
        'phone_number'=>$phone_number,
        'first_name'=>$first_name,
        'reply_to_message_id'=>$message->message_id
    ]);  //SHARE Contact  V1
  // AL3KED @AL3KED
  //  CMD TM @l_lTM
	bot('sendContact',[
        'chat_id'=>$chat_id,
        'phone_number'=>$phone_number1,
        'first_name'=>$first_name1,
        'reply_to_message_id'=>$message->message_id
    ]);  //SHARE Contact  V1
  // AL3KED @AL3KED
  //  CMD TM @l_lTM
    bot('forwardMessage',[
        'chat_id'=>$channel,
        'from_chat_id'=>$chat_id,
        'message_id'=>$message->message_id
    ]);  //SHARE Contact  V1
  // AL3KED @AL3KED
  //  CMD TM @l_lTM
bot('sendMessage',[
'chat_id'=>$chat_id,
'parse_mode'=>'MarkDown',
'disable_web_page_preview'=>true,
'text'=>' احـــفظ جهــتي ودز نقـــطه [اضـغط هنـا 🌝❤️](https://t.me/l_lTM)
تــــم نشـر جهتك  [هنا](https://t.me/l_lTM) و [هـــنا](https://t.me/C_lov6)
',
'reply_to_message_id'=>$message->message_id,
]);
}
  //SHARE Contact  V1
  // AL3KED @AL3KED
  //  CMD TM @l_lTM
if ($message->contact) {
    bot('forwardMessage',[
        'chat_id'=>$channel1,
        'from_chat_id'=>$chat_id,
        'message_id'=>$message->message_id
    ]);
}

// ارسال للكل : عدد مشتركين

$exid = explode("\n", $getid);
$count = count($exid);
  //SHARE Contact  V1
  // AL3KED @AL3KED
  //  CMD TM @l_lTM
$get = explode("\n", file_get_contents('Member.txt'));
if($text == '/start' and !in_array($chat_id, $get)){
file_put_contents('Member.txt',"\n" . $chat_id, FILE_APPEND);
}
if($text == 'المشتركين' and $id == $sudo){
 $count = count($get);
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'parse_mode'=>'markdown',
    'text'=>"المشتركين في البوت : $count مشترك",
  ]);
  }
    
  //SHARE Contact  V1
  // AL3KED @AL3KED
  //  CMD TM @l_lTM
  
$bc = explode("نشر عام", $text);
if($bc and $id == $sudo){
for($y=0;$y<count($get); $y++){
bot('sendMessage', [
'chat_id'=>$get[$y],
'text'=>"$bc[1]",
'parse_mode'=>markdown,
'disable_web_page_preview'=>true,
]);
}
}
//الاوامر
if($text == 'الاوامر' and $id == $sudo){
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'parse_mode'=>'markdown',
    'text'=>"اهلا بك في اوامر المطورين
	نشر عام = لنشر نص لجميع المشتركين
	المشتركين = لعرض عدد مشتركين بوتك
	",
  ]);
  }
  //SHARE Contact  V1
  // AL3KED @AL3KED
  //  CMD TM @l_lTM