<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Payment
 * @property int $id
 * @property int $company_id
 * @property string $title
 * @property string $url
 * @property string $description
 * @property string $secret_key
 * @property string $url_status
 * @property Carbon $url_check
 * @property string $signature
 * @property Payment[] $payments
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 */
class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'company_id', 'title', 'url', 'description', 'secret_key', 'url_status', 'url_check', 'signature',
    ];

    public function payments()
    {
        return $this->hasMany(ServicePayment::class, 'service_id', 'id');
    }
}