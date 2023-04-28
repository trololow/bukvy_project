<?php namespace Bukvy\Parse;

class TelegramApi {
    private static $telegram_base_api = 'https://api.telegram.org/bot';

    public static function sendTelegram( $message_text = '' ){
        $message_text = !empty( $message_text )?  $message_text : 'Message from Bukvy';

        $result = static::sendTelegramMessage( USER_TG_ID, BOT_TG_TOKEN, $message_text );
        return json_encode( $result );
    }

    public static function sendTelegramMessage( $chat_id, $bot_token, $message_text ){
        $url = static::$telegram_base_api .$bot_token ."/sendMessage";

        $params = array(
            'chat_id'   => $chat_id,
            'text'      => $message_text
        );

        $request_url = $url . '?' . http_build_query($params);

        $curl = curl_init($request_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        $response_data = json_decode($response, true);

        if( $response_data['ok'] !== true ){
            error_log('Telegram API error: ' . $response_data['description']);
            return false;
        }

        return true;
    }
    


}

class_alias( 'Bukvy\Parse\TelegramApi', 'TelegramApi' );