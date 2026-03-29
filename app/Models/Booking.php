<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'challenge',
        'goals',
        'contact_method',
        'status',
    ];

    const STATUS_PENDING = 'pending';
    const STATUS_CONTACTED = 'contacted';
    const STATUS_COMPLETED = 'completed';
    const STATUS_POSTPONED = 'postponed';

    public static function getStatuses()
    {
        return [
            self::STATUS_PENDING => 'قيد الانتظار',
            self::STATUS_CONTACTED => 'تم التواصل',
            self::STATUS_POSTPONED => 'مؤجل',
            self::STATUS_COMPLETED => 'مكتمل',
        ];
    }
}
