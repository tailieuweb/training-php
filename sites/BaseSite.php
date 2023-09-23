<?php
class BaseSite {

    public $url;
    public $baseSiteUrl = '';
    public $patterns = [];
    public $content;

    /**
     * Set full url
     * @param $subUrl
     */
    public function setFullUrl($subUrl) {
        $this->url = $this->baseSiteUrl . $subUrl;
    }

    /**
     * Get full url
     */
    public function getFullUrl() {
        return $this->url;
    }

    /**
     * Get content by url
     */
    public function getContent() {
        $this->content = file_get_contents($this->getFullUrl());

        return $this->content;
    }

    /**
     * Parse content
     * @param $pattern
     * @param $content
     */
    public function parseContent($pattern, $content) {
        preg_match_all($pattern, $content, $matches);
        return $matches;
    }
}