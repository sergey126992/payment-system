<?php

namespace App\Http\Services;

use App\Models\Payment;

class PaymentService
{
    public function sendToService()
    {
        $paymentsToSend = Payment::forSend()->getModels();

        foreach ($paymentsToSend as $payment) {
            $child_pid = pcntl_fork();
            if ($child_pid == -1) {
                die ("Can't fork process");
            } elseif ($child_pid) {
                $child_processes[] = $child_pid;
                if ($i = count($paymentsToSend) - 1){
                    foreach ($child_processes as $process_pid) {
                        $status = 0;
                        pcntl_waitpid($process_pid, $status);
                    }
                }
            } else {
                $this->send();
                $payment->setStatusSend();

                exit(0);
            }
        }
    }

    public function updateStatus()
    {
        $paymentsToSend = Payment::withNewStatus()->getModels();

        foreach ($paymentsToSend as $payment) {
            $child_pid = pcntl_fork();
            if ($child_pid == -1) {
                die ("Can't fork process");
            } elseif ($child_pid) {
                $child_processes[] = $child_pid;
                if ($i = count($paymentsToSend) - 1){
                    foreach ($child_processes as $process_pid) {
                        $status = 0;
                        pcntl_waitpid($process_pid, $status);
                    }
                }
            } else {
                $this->notifyAboutNewStatus($payment->status);
                $payment->setStatusChange();

                exit(0);
            }
        }
    }


    public function send()
    {
        //this logic for send payment to service
    }

    public function notifyAboutNewStatus($status)
    {
        //this logic for notify about set new status
    }
}