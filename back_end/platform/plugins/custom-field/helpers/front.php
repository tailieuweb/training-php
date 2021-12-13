<?php

use Illuminate\Database\Eloquent\Model;

if (!function_exists('get_field')) {
    /**
     * @param Eloquent|Model $data
     * @param null $key
     * @param null $default
     * @return string|array|null
     * @deprecated since v5.17
     */
    function get_field($data, $key = null, $default = null)
    {
        return CustomField::getField($data, $key, $default);
    }
}

if (!function_exists('has_field')) {
    /**
     * @param Eloquent|Model $data
     * @param null $key
     * @return bool
     * @deprecated since v5.17
     */
    function has_field($data, $key = null)
    {
        return CustomField::getField($data, $key);
    }
}

if (!function_exists('get_sub_field')) {
    /**
     * @param array $parentField
     * @param string $key
     * @param null $default
     * @return string|array|null
     * @deprecated since v5.17
     */
    function get_sub_field(array $parentField, $key, $default = null)
    {
        return CustomField::getChildField($parentField, $key, $default);
    }
}

if (!function_exists('has_sub_field')) {
    /**
     * @param array $parentField
     * @param string $key
     * @return bool
     * @deprecated since v5.17
     */
    function has_sub_field(array $parentField, $key)
    {
        return CustomField::getChildField($parentField, $key);
    }
}
