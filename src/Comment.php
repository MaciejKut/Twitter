<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comment
 *
 * @author maciej
 */
class Comment {

    private $id;
    private $id_user;
    private $id_post;
    private $creation_date;
    private $text;

    public function __construct() {
        $this->id = -1;
        $this->id_post = '';
        $this->id_user = '';
        $this->creation_date = '';
        $this->text = '';
    }

    public function getId() {
        return $this->id;
    }

    public function getId_user() {
        return $this->id_user;
    }

    public function getId_post() {
        return $this->id_post;
    }

    public function getCreation_date() {
        return $this->creation_date;
    }

    public function getText() {
        return $this->text;
    }

    public function setId_user($id_user) {
        $this->id_user = $id_user;
    }

    public function setId_post($id_post) {
        $this->id_post = $id_post;
    }

    public function setCreation_date($creation_date) {
        $this->creation_date = $creation_date;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public function saveToDB(mysqli $connection) {
        if ($this->id == -1) {
            $query = "INSERT INTO Comment (id_user, id_post, creation_date, text) 
                VALUES ('$this->id_user', '$this->id_post', '$this->creation_date', '$this->text')";
            if ($connection->query($query)) {
                return true;
            } else {
                return false;
            }
        }
    }

    static public function loadCommentById(mysqli $connection, $id) {
        $query = " SELECT * FROM Comment WHERE id =" . $connection->real_escape_string($id);

        $res = $connection->query($query);
        if ($res && $res->num_rows == 1) {
            $row = $res->fetch_assoc();
            $comment = new Comment();
            $comment->id = $row['id'];
            $comment->id_user = $row['id_user'];
            $comment->id_post = $row['id_post'];
            $comment->creation_date = $row['creation_date'];
            $comment->text = $row['text'];

            return $comment;
        }
        return null;
    }

    static function loadAllCommentsByPostId(mysqli $connection, $postId) {
        
        $query = "SELECT * FROM `Comment` WHERE id_post=".$connection->real_escape_string($postId)." ORDER BY creation_date DESC";

        $result = $connection->query($query);

        $comments = [];
        if ($result) {
            foreach ($result as $row) {
                $comment = new Comment();
                $comment->id = $row['id'];
                $comment->id_post = $row['id_post'];
                $comment->id_user = $row['id_user'];
                $comment->creation_date = $row['creation_date'];
                $comment->text = $row['text'];
                $comments[] = $comment;
            }
        }
        return $comments;
    }

}
