<?php


class ListComment
{
    public static function view($listComment)
    {
        $result = '<ul class="list-comment animated slideInDown">';

        foreach ($listComment as $item) {
            $result .= CommentItem::view($item);
        }
        return $result . '</ul>';
    }
}