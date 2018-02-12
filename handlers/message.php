<?php
require('../config.php');
    switch ($_REQUEST['action']) {
        case 'sendMessage':
            //新增聊天內容
            session_start();
            $query=$dbh->prepare("INSERT INTO messages SET user=?,message=?");
            $run=$query->execute([$_SESSION['username'],$_REQUEST['message']]);
            if ($run) {
                echo 1;

            }
            break;
        case 'getMessage':
            //抓出聊天內容
            $query=$dbh->prepare("SELECT * FROM messages");
            $run=$query->execute();
            $rs=$query->fetchAll(PDO::FETCH_OBJ);//返回obj
            $chat='';
            foreach ($rs as $message) {
                //$chat .=$message->message.'<br/>';
                $chat .='<div class="single-message">
                        <strong>'.$message->user.':</strong>'.$message->message.'
                        <span>'.date('h:i a',strtotime($message->date)).'</span>
                        </div>';
            }
            echo $chat;
        break;

        // default:
        //     # code...
        //     break;
    }
?>
