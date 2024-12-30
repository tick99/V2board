<?php
namespace App\Http\Routes\V1;

use Illuminate\Contracts\Routing\Registrar;

class GuestRoute
{
    public function map(Registrar $router)
    {
        $router->group([
            'prefix' => 'guest', 
            'middleware' => ['api'] 
        ], function ($router) {
            // Telegram
            $router->post('/telegram/webhook', 'V1\\Guest\\TelegramController@webhook');
            // Payment
            $router->match(['get', 'post'], '/payment/notify/{method}/{uuid}', 'V1\\Guest\\PaymentController@notify');
            // Comm
            $router->get ('/comm/config', 'V1\\Guest\\CommController@config');
            // Plan
            $router->get('/plan/fetch', 'V1\\Guest\\PlanController@fetch')
                ->withoutMiddleware(['auth', 'guest']); 
        });
    }
}
