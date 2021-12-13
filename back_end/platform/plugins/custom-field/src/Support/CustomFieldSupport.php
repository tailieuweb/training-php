<?php

namespace Botble\CustomField\Support;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\CustomField\Repositories\Interfaces\CustomFieldInterface;
use Botble\CustomField\Repositories\Interfaces\FieldGroupInterface;
use Botble\CustomField\Repositories\Interfaces\FieldItemInterface;
use Closure;
use Eloquent;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Throwable;

class CustomFieldSupport
{
    /**
     * @var array
     */
    protected $ruleGroups = [
        'basic' => [
            'items' => [

            ],
        ],
        'other' => [
            'items' => [

            ],
        ],
    ];

    /**
     * @var array|string
     */
    protected $rules = [];

    /**
     * @var Application|mixed
     */
    protected $app;

    /**
     * @var FieldGroupInterface
     */
    protected $fieldGroupRepository;

    /**
     * @var CustomFieldInterface
     */
    protected $customFieldRepository;

    /**
     * @var FieldItemInterface
     */
    protected $fieldItemRepository;

    /**
     * @var bool
     */
    protected $isRenderedAssets = false;

    /**
     * CustomFieldSupport constructor.
     * @throws BindingResolutionException
     */
    public function __construct()
    {
        $this->app = app();
        $this->fieldGroupRepository = $this->app->make(FieldGroupInterface::class);
        $this->customFieldRepository = $this->app->make(CustomFieldInterface::class);
        $this->fieldItemRepository = $this->app->make(FieldItemInterface::class);
    }

    /**
     * @param string $groupName
     * @return $this
     */
    public function expandRuleGroup($groupName): self
    {
        if (!isset($this->ruleGroups[$groupName])) {
            return $this->registerRuleGroup($groupName);
        }

        return $this;
    }

    /**
     * @param string $groupName
     * @return $this
     */
    public function registerRuleGroup($groupName): self
    {
        $this->ruleGroups[$groupName] = [
            'items' => [],
        ];
        return $this;
    }

    /**
     * @param string $group
     * @param string $title
     * @param string $slug
     * @param Closure|array $data
     * @return $this
     */
    public function expandRule($group, $title, $slug, $data): self
    {
        if (!isset($this->ruleGroups[$group]['items'][$slug]['data']) || !$this->ruleGroups[$group]['items'][$slug]['data']) {
            return $this->registerRule($group, $title, $slug, $data);
        }

        if (!is_array($data)) {
            $data = [$data];
        }

        $this->ruleGroups[$group]['items'][$slug]['data'] = array_merge($this->ruleGroups[$group]['items'][$slug]['data'],
            $data);

        return $this;
    }

    /**
     * @param string $group
     * @param string $title
     * @param string $slug
     * @param Closure|array $data
     * @return $this
     */
    public function registerRule($group, $title, $slug, $data): self
    {
        if (!isset($this->ruleGroups[$group])) {
            $this->registerRuleGroup($group);
        }

        $slug = Str::slug(str_replace('\\', '_', $slug), '_');

        $this->ruleGroups[$group]['items'][$slug] = [
            'title' => $title,
            'slug'  => $slug,
            'data'  => [],
        ];

        if (!is_array($data)) {
            $data = [$data];
        }

        $this->ruleGroups[$group]['items'][$slug]['data'] = $data;

        return $this;
    }

    /**
     * @param array|string $rules
     * @return $this
     */
    public function setRules($rules): self
    {
        if (!is_array($rules)) {
            $this->rules = json_decode((string)$rules, true);
        } else {
            $this->rules = $rules;
        }

        return $this;
    }

    /**
     * @param string|array $ruleName
     * @param $value
     * @return $this
     */
    public function addRule($ruleName, $value = null): self
    {
        if (is_array($ruleName)) {
            $rules = [];
            foreach ($ruleName as $key => $rule) {
                $rules[Str::slug(str_replace('\\', '_', $key), '_')] = $rule;
            }
        } else {
            $ruleName = Str::slug(str_replace('\\', '_', $ruleName), '_');
            $rules = [$ruleName => $value];
        }

        $this->rules = array_merge($this->rules, $rules);

        return $this;
    }

    /**
     * @param string $morphClass
     * @param int $morphId
     * @return array
     */
    public function exportCustomFieldsData($morphClass, $morphId): array
    {
        $fieldGroups = $this->fieldGroupRepository->getFieldGroups([
            'status' => BaseStatusEnum::PUBLISHED,
        ]);

        $result = [];

        foreach ($fieldGroups as $row) {
            if ($this->checkRules(json_decode((string)$row->rules, true))) {
                $result[] = [
                    'id'    => $row->id,
                    'title' => $row->title,
                    'items' => $this->fieldGroupRepository->getFieldGroupItems(
                        $row->id,
                        null,
                        true,
                        $morphClass,
                        $morphId
                    ),
                ];
            }
        }

        return $result;
    }

    /**
     * @param array $ruleGroups
     * @return bool
     */
    protected function checkRules(array $ruleGroups): bool
    {
        if (!$ruleGroups) {
            return false;
        }

        foreach ($ruleGroups as $group) {
            if ($this->checkEachRule($group)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param array $ruleGroup
     * @return bool
     */
    protected function checkEachRule(array $ruleGroup): bool
    {
        foreach ($ruleGroup as $ruleGroupItem) {
            if (!array_key_exists($ruleGroupItem['name'], $this->rules)) {
                return false;
            }

            if ($ruleGroupItem['type'] == '==') {
                if (is_array($this->rules[$ruleGroupItem['name']])) {
                    $result = in_array($ruleGroupItem['value'], $this->rules[$ruleGroupItem['name']]);
                } else {
                    $result = $ruleGroupItem['value'] == $this->rules[$ruleGroupItem['name']];
                }
            } else {
                if (is_array($this->rules[$ruleGroupItem['name']])) {
                    $result = !in_array($ruleGroupItem['value'], $this->rules[$ruleGroupItem['name']]);
                } else {
                    $result = $ruleGroupItem['value'] != $this->rules[$ruleGroupItem['name']];
                }
            }

            if (!$result) {
                return false;
            }
        }

        return true;
    }

    /**
     * Render data
     * @return string
     * @throws Throwable
     */
    public function renderRules(): string
    {
        return view('plugins/custom-field::_script-templates.rules', [
            'ruleGroups' => $this->resolveGroups(),
        ])->render();
    }

    /**
     * Resolve all rule data from closure into array
     * @return array
     */
    protected function resolveGroups(): array
    {
        foreach ($this->ruleGroups as &$group) {
            foreach ($group['items'] as &$item) {
                $data = [];

                foreach ($item['data'] as $datum) {
                    if ($datum instanceof Closure) {
                        $resolvedClosure = call_user_func($datum);
                        if (is_array($resolvedClosure)) {
                            foreach ($resolvedClosure as $key => $value) {
                                $data[$key] = $value;
                            }
                        }
                    } elseif (is_array($datum)) {
                        foreach ($datum as $key => $value) {
                            $data[$key] = $value;
                        }
                    }
                }

                $item['data'] = $data;
            }
        }

        return $this->ruleGroups;
    }

    /**
     * @param array $boxes
     * @return string
     * @throws Throwable
     */
    public function renderCustomFieldBoxes(array $boxes): string
    {
        return view('plugins/custom-field::custom-fields-boxes-renderer', [
            'customFieldBoxes' => json_encode($boxes),
        ])->render();
    }

    /**
     * Echo the custom fields assets
     * @throws Throwable
     */
    public function renderAssets()
    {
        if (!$this->isRenderedAssets) {
            echo view('plugins/custom-field::_script-templates.render-custom-fields')->render();
            $this->isRenderedAssets = true;
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param mixed $data
     * @return bool
     */
    public function saveCustomFields(Request $request, $data)
    {
        $fields = $request->input('custom_fields');

        if (!$fields) {
            return false;
        }

        $rows = $this->parseRawData($fields);

        foreach ($rows as $row) {
            $this->saveCustomField(get_class($data), $data->id, $row);
        }

        return true;
    }

    /**
     * @param string $jsonString
     * @return array
     */
    protected function parseRawData($jsonString): array
    {
        try {
            $fieldGroups = json_decode((string)$jsonString, true) ?: [];
        } catch (Exception $exception) {
            return [];
        }

        $result = [];
        foreach ($fieldGroups as $fieldGroup) {
            foreach ($fieldGroup['items'] as $item) {
                $result[] = $item;
            }
        }

        return $result;
    }

    /**
     * @param string $reference
     * @param int $id
     * @param array $data
     */
    protected function saveCustomField($reference, $id, array $data)
    {
        $currentMeta = $this->customFieldRepository->getFirstBy([
            'field_item_id' => $data['id'],
            'slug'          => $data['slug'],
            'use_for'       => $reference,
            'use_for_id'    => $id,
        ]);

        $value = $this->parseFieldValue($data);

        if (!is_string($value)) {
            $value = json_encode($value);
        }

        $data['value'] = $value;

        if ($currentMeta) {
            $this->customFieldRepository->createOrUpdate($data, ['id' => $currentMeta->id]);
        } else {
            $data['use_for'] = $reference;
            $data['use_for_id'] = $id;
            $data['field_item_id'] = $data['id'];

            $this->customFieldRepository->create($data);
        }
    }

    /**
     * Get field value
     * @param array $field
     * @return array|string
     */
    protected function parseFieldValue($field)
    {
        $value = [];
        switch ($field['type']) {
            case 'repeater':
                if (!isset($field['value'])) {
                    break;
                }

                foreach ($field['value'] as $row) {
                    $groups = [];
                    foreach ($row as $item) {
                        $groups[] = [
                            'field_item_id' => $item['id'],
                            'type'          => $item['type'],
                            'slug'          => $item['slug'],
                            'value'         => $this->parseFieldValue($item),
                        ];
                    }
                    $value[] = $groups;
                }
                break;
            case 'checkbox':
                $value = isset($field['value']) ? (array)$field['value'] : [];
                break;
            default:
                $value = isset($field['value']) ? $field['value'] : '';
                break;
        }
        return $value;
    }

    /**
     * @param Eloquent|false $data
     * @throws Exception
     * @return bool
     */
    public function deleteCustomFields($data): bool
    {
        if ($data != false) {
            $this->customFieldRepository->deleteBy([
                'use_for'    => get_class($data),
                'use_for_id' => $data->id,
            ]);
        }
        return false;
    }

    /**
     * @param string | array $module
     * @return $this
     */
    public function registerModule($module): self
    {
        if (!is_array($module)) {
            $module = [$module];
        }

        $configKey = 'plugins.custom-field.general.supported';

        config([
            $configKey => array_merge(config($configKey, []), $module),
        ]);

        return $this;
    }

    /**
     * @return array
     */
    public function isSupportedModule(string $module): bool
    {
        return in_array($module, $this->supportedModules());
    }

    /**
     * @return array
     */
    public function supportedModules()
    {
        return config('plugins.custom-field.general.supported', []);
    }

    /**
     * @param string|array $ruleName
     * @param string $value
     * @return string|array|null
     */
    public function getField($data, $key = null, $default = null)
    {
        if (empty($data)) {
            return $default;
        }

        $customFieldRepository = app(CustomFieldInterface::class);

        if ($key === null || !trim($key)) {
            return $customFieldRepository->getFirstBy([
                'use_for'    => get_class($data),
                'use_for_id' => $data->id,
            ]);
        }

        $field = $customFieldRepository->getFirstBy([
            'use_for'    => get_class($data),
            'use_for_id' => $data->id,
            'slug'       => $key,
        ]);

        if (!$field || !$field->resolved_value) {
            return $default;
        }

        return $field->resolved_value;
    }

     /**
     * @param array $parentField
     * @param string $key
     * @param null $default
     * @return string|array|null
     */
    public function getChildField(array $parentField, $key, $default = null)
    {
        foreach ($parentField as $field) {
            if (Arr::get($field, 'slug') === $key) {
                return Arr::get($field, 'value', $default);
            }
        }

        return $default;
    }
}
