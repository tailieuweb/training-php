<?php


class ListPost
{
    public static function view($listPost, $urlPage)
    {
        $result = '<ul class="list-post list-unstyled"  data-scroll>';
        foreach ($listPost as $item) {
            $result .= PostSmall::view($item, $urlPage);
        }
        return $result . '</ul>';
    }
}