<?php

namespace Botble\RequestLog\Models;

use Botble\Base\Models\BaseModel;

class RequestLog extends BaseModel
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'request_logs';

    /**
     * The date fields for the model.clear
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url',
        'status_code',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'referrer' => 'json',
        'user_id'  => 'json',
    ];
}
