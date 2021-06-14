<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Payer;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use App\Servicio;
use \PayPal\Exception\PayPalConnectionException;
use Illuminate\Support\Facades\Mail;
use App\Chofer;
use App\Mail\NuevoViajeConductor;




class PaymentController extends Controller
{
    private $apiContext;

    public function __construct(){

        $payPalConfig = Config::get('paypal');

        $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $payPalConfig['client_id'],     // ClientID
                $payPalConfig['secret']     // ClientSecret
            )
    );
    }



    public function pagarViaje($servicioId){

        $servicio = Servicio::find($servicioId);

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new Amount();
        $amount->setTotal($servicio->precio);
        $amount->setCurrency('EUR');

        $transaction = new Transaction();
        $transaction->setAmount($amount);
        $transaction->setDescription('Abona el viaje:');

        
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route("pago-retrun",['servicioId' => $servicio->id])) //respuesta, valida o no
            ->setCancelUrl(route("pago-cancel",['servicioId' => $servicio->id])); //el usuario cancelo

        $payment = new Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);


        try {
            $payment->create($this->apiContext);
            //echo $payment;

            return redirect()->away( $payment->getApprovalLink());
        
        }
        catch (PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }

    }




    public function pagoRetrun(Request $request, $servicioId){
        $paymentId = $request->paymentId;
        $payerId = $request->PayerID;
        $token = $request->token;

        if( !$payerId || !$paymentId || !$token) //si no existe alguno de estos es que el pago falló
        {
            return "pago fallido";
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /******** EJECUTANDO EL PAGO ********/
        $result = $payment->execute($execution, $this->apiContext);

        if ($result->getState() === 'approved') {
            //pago aprobado edito el servicio
            $servicio = Servicio::find($servicioId);
            $servicio->pagado  = 1;
            $servicio->save();


            //se envia un correo al conductor
            $chofer = Chofer::find($servicio->chofers_chofers_id);
            Mail::to($chofer->user->email)->send( new NuevoViajeConductor($servicio));

            return redirect()->route('home')
            ->with('success','Viaje creado con exito');
            }

        //pago no se ha podido realizar
        return redirect()->route('home')
        ->with('error','Has ocurrido un problema con el pago, lo sentimos! :c');

        
    }


    
    public function pagocancel(){
        
        return redirect()->route('home')
        ->with('warning','Has cancelado el pago, esperamos que te decidas en otro momento :D');
    }

}
