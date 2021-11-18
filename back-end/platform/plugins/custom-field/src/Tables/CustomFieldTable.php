<?php

namespace Botble\CustomField\Tables;

use BaseHelper;
use Illuminate\Support\Facades\Auth;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\CustomField\Repositories\Interfaces\FieldGroupInterface;
use Botble\Table\Abstracts\TableAbstract;
use Html;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTables;

class CustomFieldTable extends TableAbstract
{

    /**
     * @var bool
     */
    protected $hasActions = true;

    /**
     * @var bool
     */
    protected $hasFilter = true;

    /**
     * @var string
     */
    protected $view = 'plugins/custom-field::list';

    /**
     * CustomFieldTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param FieldGroupInterface $fieldGroupRepository
     */
    public function __construct(
        DataTables $table,
        UrlGenerator $urlGenerator,
        FieldGroupInterface $fieldGroupRepository
    ) {
        parent::__construct($table, $urlGenerator);

        $this->repository = $fieldGroupRepository;

        if (!Auth::user()->hasAnyPermission(['custom-fields.edit', 'custom-fields.destroy'])) {
            $this->hasOperations = false;
            $this->hasActions = false;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('title', function ($item) {
                if (!Auth::user()->hasPermission('custom-fields.edit')) {
                    return $item->name;
                }

                return Html::link(route('custom-fields.edit', $item->id), $item->title);
            })
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            })
            ->editColumn('status', function ($item) {
                return $item->status->toHtml();
            })
            ->addColumn('operations', function ($item) {
                return $this->getOperations('custom-fields.edit', 'custom-fields.destroy', $item,
                    Html::link(
                        route('custom-fields.export', ['id' => $item->id]),
                        Html::tag('i', '', ['class' => 'fa fa-download'])->toHtml(),
                        [
                            'class' => 'btn btn-icon btn-info btn-sm tip',
                            'title' => trans('plugins/custom-field::base.export'),
                        ],
                        null,
                        false
                    )->toHtml());
            });

        return $this->toJson($data);
    }

    /**
     * {@inheritDoc}
     */
    public function query()
    {
        $query = $this->repository->getModel()->select([
            'id',
            'title',
            'status',
            'order',
            'created_at',
        ]);

        return $this->applyScopes($query);
    }

    /**
     * {@inheritDoc}
     */
    public function columns()
    {
        return [
            'id'         => [
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'title'      => [
                'title' => trans('core/base::tables.name'),
                'class' => 'text-left',
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ],
            'status'     => [
                'title' => trans('core/base::tables.status'),
                'width' => '100px',
            ],
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function buttons()
    {
        $buttons = $this->addCreateButton(route('custom-fields.create'), 'custom-fields.create');

        $buttons['import-field-group'] = [
            'link' => '#',
            'text' => view('plugins/custom-field::_partials.import')->render(),
        ];

        return $buttons;
    }

    /**
     * {@inheritDoc}
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('custom-fields.deletes'), 'custom-fields.destroy', parent::bulkActions());
    }

    /**
     * {@inheritDoc}
     */
    public function getBulkChanges(): array
    {
        return [
            'title'      => [
                'title'    => trans('core/base::tables.name'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'status'     => [
                'title'    => trans('core/base::tables.status'),
                'type'     => 'select',
                'choices'  => BaseStatusEnum::labels(),
                'validate' => 'required|' . Rule::in(BaseStatusEnum::values()),
            ],
            'created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type'  => 'date',
            ],
        ];
    }
}
