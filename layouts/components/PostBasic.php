<?php


class PostBasic
{
    public static function view($post, $urlPage)
    {
        return '
            <div class="card post-basic post" data-scroll>
                <div class="card-body post-body">
                    <p class="category">' . $post['NAME'] . '</p>
                    <h5 class="post-title hv-l">
                        <a href="' . $urlPage . 'pages/detail.php?idPost=' . rand(100, 999) . $post['ID_POST'] . rand(100, 999) . '">
                            ' . $post['TITLE'] . '
                        </a>
                    </h5>
                    <p class="card-text post-sapo">
                        ' . $post['SAPO'] . '
                    </p>
                    <p class="post-date-up">
                        ' . DateUp::view($post['DATE_UP']) . '
                    </p>
                </div>
            </div>
        ';
    }
}