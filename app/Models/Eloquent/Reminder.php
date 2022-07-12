<?php

namespace App\Models\Eloquent;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reminder extends Model
{
    use SoftDeletes;

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'reminder_date',
    ];

    public function remindable()
    {
        return $this->morphTo();
    }

    public function userToRemind()
    {
        return $this->belongsTo(User::class, 'remind_user_id', 'id');
    }
}
