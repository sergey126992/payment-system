<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Payment
 * @property int $id
 * @property int $service_id
 * @property int $amount
 * @property string $phone
 * @property string $description
 * @property string $external_id
 * @property string $success_message
 * @property Carbon $custom_data
 * @property string $signature
 * @property boolean $send_to_service
 * @method  Builder forSend()
 * @method  Builder withNewStatus()
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @mixin \Eloquent
 */
class Payment extends Model
{
    public const STATUS_SEND = 'send';
    public const STATUS_CREATED = 'created';
    public const STATUS_CHANGED = true;
    public const STATUS_NOT_CHANGED = false;

    protected $table = 'payments';

    protected $fillable = [
        'service_id', 'phone', 'amount', 'description', 'external_id', 'success_message', 'custom_data', 'signature', 'status', 'status_change',
    ];

    public function setStatusSend()
    {
        $this->update([
            'status' => self::STATUS_SEND,
            'status_change' => self::STATUS_CHANGED,
        ]);
    }

    public function setStatusChange()
    {
        $this->update([
            'status_change' => self::STATUS_NOT_CHANGED,
        ]);
    }

    public function scopeForSend(Builder $query)
    {
        return $query->where('status', '=',  self::STATUS_CREATED);
    }

    public function scopeWithNewStatus(Builder $query)
    {
        return $query->where('status_change', '=',  self::STATUS_CHANGED);
    }
}