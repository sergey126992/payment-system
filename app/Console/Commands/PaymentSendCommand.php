<?php

namespace App\Console\Commands;

use App\Http\Services\PaymentService;
use Illuminate\Console\Command;

class PaymentSendCommand extends Command
{
    protected $signature = 'payment:send';

    private $service;

    public function __construct(PaymentService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function handle(): bool
    {
        try {
            $this->service->sendToService();
        } catch (\DomainException $e) {
            $this->error($e->getMessage());

            return false;
        }
        $this->info('Payments send success!');

        return true;
    }

}