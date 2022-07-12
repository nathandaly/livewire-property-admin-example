<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * @property $user_id
 * @property $account_id
 * @property $account_type
 */
class BusinessUserAccount extends Model
{
    protected $with = [
        'account',
    ];

    public function account()
    {
        return $this->morphTo();
    }
}
