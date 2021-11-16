<?php


class CarouselItem
{
    public static function view($post, $urlPage)
    {
        $fontSize = '';
        if (strlen($post['TITLE']) > 100) {
            $fontSize = 'style="font-size: 2.2rem;"';
        }

        return '
                <img src="' . $urlPage . 'public/images/' . $post['IMAGE1'] . '" class="w-100" alt="">

                <div class="carousel-caption">
                    <h5 '. $fontSize .'>
                        <a href="' . $urlPage . 'pages/detail.php?idPost=' . rand(100, 999) . $post['ID_POST'] . rand(100, 999) . '">
                            ' . $post['TITLE'] . '
                        </a>
                    </h5>
                    <p>" ' . $post['SAPO'] . '"</p>
                </div>
        ';
    }
}