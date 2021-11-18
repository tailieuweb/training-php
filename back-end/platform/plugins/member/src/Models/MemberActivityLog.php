<?php

namespace Botble\Member\Models;

use Html;
use Botble\Base\Models\BaseModel;

class MemberActivityLog extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'member_activity_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'action',
        'user_agent',
        'reference_url',
        'reference_name',
        'ip_address',
        'member_id',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->user_agent = $model->user_agent ? $model->user_agent : request()->userAgent();
            $model->ip_address = $model->ip_address ? $model->ip_address : request()->ip();
            $model->member_id = $model->member_id ? $model->member_id : auth('member')->user()->getAuthIdentifier();
            $model->reference_url = str_replace(route('public.index'), '', $model->reference_url);
        });
    }

    /**
     * @return array|\Illuminate\Contracts\Translation\Translator|string|null
     */
    public function getDescription()
    {
        $name = $this->reference_name;
        if ($this->reference_name && $this->reference_url) {
            $name = Html::link($this->reference_url, $this->reference_name, ['style' => 'color: #1d9977']);
        }

        $time = Html::tag('span', $this->created_at->diffForHumans(), ['class' => 'small italic']);

        return trans('plugins/member::dashboard.actions.' . $this->action, ['name' => $name]) . ' . ' . $time;
    }
}
