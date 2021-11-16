<?php


class CommentItem
{
    public static function view($comment){
        return '
            <li class="comment-item">
                <p class="body">
                    <span class="name">'. $comment['USERNAME'] .'</span>: '. $comment['CONTENT'] .'
                </p>
                <p class="date-up">'. DateUp::view($comment['DATE_UP']) .'</p>
            </li>';
    }
}