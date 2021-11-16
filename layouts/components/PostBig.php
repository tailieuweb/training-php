<?php


class PostBig
{
    public static function view($post, $urlPage, $left)
    {
        if ($left) {
            return '
                <div class="row post-big" data-scroll>
                    <div class="col-md-7">
                        <div class="content">
                            <p class="category">' . $post['NAME'] . '</p>
                            <h2 class="hv-l">
                                <a href="' . $urlPage . 'pages/detail.php?idPost=' . rand(100, 999) . $post['ID_POST'] . rand(100, 999) . '">
                                ' . $post['TITLE'] . '
                                </a>
                            </h2>
                            <p class="post-sapo">' . $post['SAPO'] . '</p>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <img src="' . $urlPage . 'public/images/' . $post['IMAGE1'] . '" class="img-post" alt="">
                    </div>
                </div>';
        } else {
            return '
                <div class="row post-big" data-scroll>
                    <div class="col-md-5">
                        <img src="' . $urlPage . 'public/images/' . $post['IMAGE1'] . '" class="img-post" alt="">
                    </div>
                    <div class="col-md-7">
                        <div class="content">
                            <p class="category">' . $post['NAME'] . '</p>
                            <h2 class="hv-l">
                                <a href="' . $urlPage . 'pages/detail.php?idPost=' . rand(100, 999) . $post['ID_POST'] . rand(100, 999) . '">
                                ' . $post['TITLE'] . '
                                </a>
                            </h2>
                            <p class="post-sapo">' . $post['SAPO'] . '</p>
                        </div>
                    </div>
                </div>';
        }
    }
}