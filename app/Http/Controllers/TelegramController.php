<?php

namespace App\Http\Controllers;
use Telegram\Bot\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TelegramController extends Controller
{


    public function __construct()
    {
        $this->telegram = new Api(env('TELEGRAM_BOT_TOKEN'));
    }

    public function index()
    {
        return $this->telegram->getUpdates();
    }

    public function sendMessage()
    {

        $response = $this->telegram->sendMessage([
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'text' => 'Hello Bang'
        ]);

        $messageId = $response->getMessageId();

        return $response;
    }

    public function setWebhook()
    {
        $url = env('APP_URL') . 'telegram/webhook/' . env('TELEGRAM_BOT_TOKEN');
        $response = $this->telegram->setWebhook(['url' => $url]);
        if ($response) {
            return 'webhook setup ok';
        }
        return 'webhook setup failed';
    }

    public function webhook($token,Request $request)
    {


        $update = $this->telegram->commandsHandler(true);

        $chat_id = $update->getMessage()->getChat()->getId();

        if($update) {
            $response = $this->telegram->sendMessage([
                'chat_id' => $chat_id,
                'text' => 'Hello Bang',
            ]);
        }





        Storage::put('telegram.txt', json_encode($request->all(), JSON_PRETTY_PRINT));





    }








}
