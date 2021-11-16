<?php


class PostNormal
{
    public static function view($post, $urlPage)
    {
        $quickView = '';
        if ($urlPage == '') {
            $quickView = '
            ';
        }

        return '
                    <div class="card post-medium post shadow" data-scroll>
                        <div class="inner">
                            <a href="' . $urlPage . 'pages/detail.php?idPost=' . rand(100, 999) . $post['ID_POST'] . rand(100, 999) . '">
                                <img src="' . $urlPage . 'public/images/' . $post['IMAGE1'] . '" class="img-post" alt="">
                            </a>
                                ' . $quickView . '
                        </div>
                        <div class="card-body post-body">
                            <h5 class="post-title hv-l">
                                <a href="' . $urlPage . 'pages/detail.php?idPost=' . rand(100, 999) . $post['ID_POST'] . rand(100, 999) . '">
                                    ' . $post['TITLE'] . '
                                </a>
                            </h5>
                            <p class="card-text post-sapo">
                                ' . substr($post['SAPO'], 0, 200) . '
                            </p>
                            <p class="post-date-up">
                                 ' . DateUp::view($post['DATE_UP']) . '
                            </p>
                        </div>
                    </div>
        ';
    }
}