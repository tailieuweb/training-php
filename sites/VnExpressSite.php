<?php
require_once 'BaseSite.php';
class VnExpressSite extends BaseSite {

    public function __construct(){
        $this->baseSiteUrl = 'https://vnexpress.net/';

        $this->setPatternTitle();
    }

    /**
     * Set pattern tittle
     */
    public function setPatternTitle() {
        $this->patterns['title'] = '/<h2 class="title-news"><a data-medium.*?href="(.*?)".*?>([\s\S]*?)<\/a>/';
    }

    public function parseUrlTitle($content) {
        //URL & Title
        $data = [];
        $matches = $this->parseContent($this->patterns['title'], $content);

        if (!empty($matches['1'])) {
            $data['url'] = $matches['1'];
        }

        if (!empty($matches['2'])) {
            $data['title'] = $matches['2'];
        }

        return $data;
    }
}