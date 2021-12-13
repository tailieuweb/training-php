<?php

if (!function_exists('remove_query_string_var')) {
    /**
     * @param string $url
     * @param string|array $key
     * @return bool|mixed|string
     */
    function remove_query_string_var($url, $key)
    {
        if (!is_array($key)) {
            $key = [$key];
        }

        foreach ($key as $item) {
            $url = preg_replace('/(.*)(?|&)' . $item . '=[^&]+?(&)(.*)/i', '$1$2$4', $url . '&');
            $url = substr($url, 0, -1);
        }

        return $url;
    }
}
