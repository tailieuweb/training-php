<?php
require_once 'models/PostModel.php';
require_once 'sites/VnExpressSite.php';
$site = new VnExpressSite();
$post = new PostModel();

$maxPage = 2;

for ($i = 1; $i <= $maxPage; $i++) {
    $site->setFullUrl('the-thao-p'.$i);

    $content = $site->getContent();

    $data = $site->parseUrlTitle($content);

    if (!empty($data['url'])) {

        foreach ($data['url'] as $index => $url) {
            $row = [
                'url' => trim($url),
                'title' => trim($data['title'][$index])
            ];

            $post->insertPostUrlTitle($row);
        }
    }
}
