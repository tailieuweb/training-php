<?php


class PagePostDepCate
{
    public static function view($arrPostDepCate, $urlPage, $left)
    {
        $item = $arrPostDepCate[0];
        $arrList = [];

        if (!empty($arrPostDepCate[3])) {
            array_push($arrList, $arrPostDepCate[3]);
        }
        if (!empty($arrPostDepCate[4])) {
            array_push($arrList, $arrPostDepCate[4]);
        }
        if (!empty($arrPostDepCate[5])) {
            array_push($arrList, $arrPostDepCate[5]);
        }
        if (!empty($arrPostDepCate[6])) {
            array_push($arrList, $arrPostDepCate[6]);
        }

        return '
        <div id="category-' . $item['id_category'] . '" class="post-dep-cate" data-cate="cate-' . $item['id_category'] . '">
            ' . PostBig::view($item, $urlPage, $left) . '
            <div class="row my-md-5">
                <div class="col-md-4 mb-md-5 mr-xs-2">
                    ' . PostNormal::view($arrPostDepCate[1], $urlPage) . '
                </div>
                <div class="col-md-4 mb-md-5 mr-xs-2">
                    ' . PostNormal::view($arrPostDepCate[2], $urlPage) . '
                </div>
                <div class="col-md-4 mb-md-5 mr-xs-2">
                    ' . ListPost::view($arrList, $urlPage) . '
                </div>
            </div>
        </div>';
    }
}