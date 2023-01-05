<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Facades\Vonage;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;

class NotificationController extends Controller
{
    public function sendSmsNotofication()
    {
//        $basic = new Basic(VONAGE_API_KEY, VONAGE_API_SECRET);
//        $client = new Client($basic);
    }
}
