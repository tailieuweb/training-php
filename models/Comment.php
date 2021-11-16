<?php


class Comment extends Database
{
    public function getByIDPost($idPost)
    {
        $sql = self::$connect->prepare("SELECT * FROM commtent WHERE ID_POST = $idPost");
        $sql->execute();

        return $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($username, $content, $id_post, $date_up)
    {
        $sql = self::$connect->prepare("INSERT INTO commtent(  USERNAME, CONTENT, ID_POST, DATE_UP) 
                                        VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssis", $username, $content, $id_post, $date_up);
        return $sql->execute();
    }
}