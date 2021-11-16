<?php


class CarouselInner
{
    public static function view($arrPost, $urlPage)
    {
        $result = '';
        $hasActive = false;
        foreach ($arrPost as $item) {
            if ($hasActive == false) {
                $result .= '<div class="carousel-item active">' .
                    CarouselItem::view($item, $urlPage)
                    . '</div>';
                $hasActive = true;
            } else {
                $result .= '<div class="carousel-item">' .
                    CarouselItem::view($item, $urlPage)
                    . '</div>';
            }
        }

        return $result;
    }
}