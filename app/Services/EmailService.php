<?php

namespace App\Services;

use GuzzleHttp\Client;

class EmailService
{
    public function sendEmail($email, $code):string
    {
        $client = new Client();
        $data = [
            'apikey' => env('ELASTIC_EMAIL_API'),
            'subject' => 'code',
            'from' => env('ELASTIC_EMAIL_FROM'),
            'to' => $email,
            'bodyHtml' => "
                <html>
                <body>
                <h1>Ваш код авторизации: $code</h1>
                </body>
                </html>",
        ];

        $response = $client->post('https://api.elasticemail.com/v2/email/send', [
            'form_params' => $data,
            'verify' => false
        ]);

        if ($response->getStatusCode() == 200) {
            return 'Email sent successfully';
        } else {
            return 'There was an error sending the email';
        }
    }
}
