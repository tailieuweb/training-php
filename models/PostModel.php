<?php

require_once 'BaseModel.php';

class PostModel extends BaseModel {

    /**
     * Get post by ID
     * @param $id
     * @return array
     */
    public function findPostById($id) {
        $sql = 'SELECT * FROM post WHERE id = '.$id;
        $post = $this->select($sql);

        return $post;
    }

    /**
     * Find post by keyword
     * @param $keyword
     * @return array
     */
    public function findPost($keyword) {
        $sql = 'SELECT * FROM post WHERE post_title LIKE %'.$keyword.'%'. ' OR post_description LIKE %'.$keyword.'%';
        $posts = $this->select($sql);

        return $posts;
    }


    /**
     * Delete post by id
     * @param $id
     * @return mixed
     */
    public function deletePostById($id) {
        $sql = 'DELETE FROM post WHERE id = '.$id;
        return $this->delete($sql);

    }

    /**
     * Update post
     * @param $input
     * @return mixed
     */
    public function updatePost($input) {
        $sql = 'UPDATE post SET 
                 post_title = "' . $input['post_title'] .'", 
                 post_description="'. md5($input['post_description']) .'"
                WHERE id = ' . $input['id'];
        $post = $this->update($sql);

        return $post;
    }

    /**
     * Insert post
     * @param $input
     * @return mixed
     */
    public function insertPostUrlTitle($input) {
        $title = $input['title'];
        $title = mysqli_real_escape_string($this->getConnection(),$title);
        $sql = "INSERT INTO `post` (`post_url`, `post_title`) VALUES (" .
                "'" . $input['url'] . "', '".$title."')";

        $post = $this->insert($sql);

        return $post;
    }

    /**
     * Search posts
     * @param array $params
     * @return array
     */
    public function getPosts($params = []) {
        //Keyword
        if (!empty($params['keyword'])) {
            $sql = 'SELECT * FROM post WHERE name LIKE "%' . $params['keyword'] .'%"';

            $posts = self::$_connection->multi_query($sql);
        } else {
            $sql = 'SELECT * FROM post';
            $posts = $this->select($sql);
        }

        return $posts;
    }
}