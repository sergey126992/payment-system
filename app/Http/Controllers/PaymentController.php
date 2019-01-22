<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 21.01.2019
 * Time: 18:49
 */

namespace App\Http\Controllers;

use App\Http\Requests\Payment\CreateRequest;
use App\Http\Services\PaymentService;
use App\Models\Payment;
use Illuminate\Http\Response;

class PaymentController extends Controller
{
    private $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    /**
     * Create Payment and send it for operator
     *
     * @param CreateRequest $request
     * @return string
     */
    public function store(CreateRequest $request)
    {
        try {
            $payment = Payment::create($request->all());

            return response()->json(['result' => 'ok', 'id' => $payment->getAttribute('id')], Response::HTTP_CREATED);
        } catch (\DomainException $e) {
            return response()->json(['result' => $e->getMessage()], $e->getCode());
        }
    }
}