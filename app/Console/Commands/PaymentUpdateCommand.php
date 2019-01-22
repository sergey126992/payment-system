<?php

namespace App\Console\Commands;

use App\Http\Services\PaymentService;
use Illuminate\Console\Command;

class PaymentUpdateCommand extends Command
{
    protected $signature = 'payment:update';

    private $service;

    public function __construct(PaymentService $service)
    {
        parent::__construct();
        $this->service = $service;
    }

    public function handle(): bool
    {
        try {
            $this->service->updateStatus();
        } catch (\DomainException $e) {
            $this->error($e->getMessage());

            return false;
        }
        $this->info('Update payments statuses success!');

        return true;
    }

}