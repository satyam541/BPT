<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Log;
use App\Order;
use Exception;
use App\Mail\OrderMail;
use Carbon\CarbonImmutable;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class sendIncompleteEnquiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try{
            
            $this->sendJwtForIncompleteOrder();
        }
        catch(Exception $x)
        {
            
            Log::alert($x);
        }
    }

    private function sendJwtForIncompleteOrder()
    {
        // get current timestamp from carbon
        $now = CarbonImmutable::now();
        $modified = $now->sub("15 minutes");

        // get recent orders with incomplete progress
        // also skip orders already processed for incomplete jwt
        $orders = Order::with(['customer','billingDetail','lineItems','country'])->where(function($query){
            return $query->whereIn("progress",['1','2','4']);
        })->where('updated_at',"<",$modified)->get();
    

        // check if any order available as expected
        if($orders->isNotEmpty())
        {
           
            foreach($orders as $order){
                $mailData['type'] = 'incomplete';
                $mailData['customerDetail'] = $order->customer;
                $mailData['billingDetail'] = $order->billingDetail;
                $mailData['orderDetail'] = $order;
      
                $view               = \View::make('email.cartOrder',$mailData);
                $mailData['emailsent'] =  $view->render();
                MakeJWTEnquiry($mailData);
                Mail::to("enquiries@bestpracticetraining.com")->send(new OrderMail($mailData));
                // update order with a flag to identify processed
                $order->progress = 7;
                $order->save();
            }
        }
    }
}
