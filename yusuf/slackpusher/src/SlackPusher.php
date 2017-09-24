<?php
/**
 * Created by PhpStorm.
 * User: Yusuf <agboolar09@gmail.com>
 * Date: 24/09/2017
 * Time: 4:42 PM
 */

namespace Yusuf\SlackPusher;

class SlackPusher
{

    public static function pushToSlack(string $channelHook, string $message){
        return self::curl($channelHook, $message);
    }

    private static function curl(string $url, string $message){

        $post = [
            'text' => $message
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($post));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);  // Seems like good practice
        return $result;
    }

}