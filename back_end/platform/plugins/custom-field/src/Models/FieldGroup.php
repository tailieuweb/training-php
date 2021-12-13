<?php

namespace Botble\CustomField\Models;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Botble\Base\Traits\EnumCastable;
use Botble\CustomField\Repositories\Interfaces\FieldItemInterface;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FieldGroup extends BaseModel
{
    use EnumCastable;

    /**
     * @var string
     */
    protected $table = 'field_groups';

    /**
     * @var array
     */
    protected $fillable = [
        'order',
        'rules',
        'title',
        'status',
        'created_by',
        'updated_by',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'status' => BaseStatusEnum::class,
    ];

    protected static function boot()
    {
        parent::boot();

        self::deleting(function (FieldGroup $fieldGroup) {
            app(FieldItemInterface::class)->deleteBy(['field_group_id' => $fieldGroup->id]);
        });
    }

    /**
     * @return HasMany
     */
    public function fieldItems(): HasMany
    {
        return $this->hasMany(FieldItem::class, 'field_group_id');
    }
}
