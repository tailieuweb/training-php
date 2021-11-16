<?php


class PostSmall
{
    public static function view($post, $urlPage)
    {
        return '
            <li class="media post post-small">
                <div class="inner">
                    <a href="' . $urlPage . 'pages/detail.php?idPost=' . rand(100, 999) . $post['ID_POST'] . rand(100, 999) . '">
                       <img src="' . $urlPage . 'public/images/' . $post['IMAGE1'] . '" class="img-post" alt="">
                    </a>
                </div>
                <div class="ml-md-3 media-body post-body">
                    <h5 class="hv-l">
                        <a href="' . $urlPage . 'pages/detail.php?idPost=' . rand(100, 999) . $post['ID_POST'] . rand(100, 999) . '">
                           ' . $post['TITLE'] . '
                        </a>
                    </h5>
                </div>
            </li>
        ';
    }
}