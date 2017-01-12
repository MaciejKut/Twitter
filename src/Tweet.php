<?php

/*
  CREATE TABLE Tweet(
  id int PRIMARY KEY Auto_INCREMENT,
  userId int NOT NULL,
  text varchar(144),
  creationDate DATE,
  FOREIGN KEY(UserId) REFERENCES Users(id)
  );
 */

/**
 * Description of Tweet
 *
 * @author maciej
 */
class Tweet implements Iterator {

    private $id;
    private $userId;
    private $text;
    private $creationDate;
    private $position = 0;

    public function __construct() {
        $this->id = -1;
        $this->userId = '';
        $this->text = '';
        $this->creationDate = '';
        $this->position = 0;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getText() {
        return $this->text;
    }

    public function getCreationDate() {
        return $this->creationDate;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public function setCreationDate($creationDate) {
        $this->creationDate = $creationDate;
    }

    public function saveToDB(mysqli $connection) {
        if ($this->id == -1) {
            $query = "INSERT INTO Tweet (userId, text, creationDate)
                    VALUES ('$this->userId', '$this->text', '$this->creationDate')";
            if ($connection->query($query)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            $query = "Update Tweet
                SET text = '$this->text',
                    creationDate = '$this->creationDate'
                WHERE id = $this->id";
            if ($connection->query($query)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    static function loadTweetById(mysqli $connection, $id) {
        $query = " SELECT * FROM Tweet WHERE id =" . $connection->real_escape_string($id);

        $result = $connection->query($query);
        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $tweet = new Tweet();
            $tweet->id = $row['id'];
            $tweet->text = $row['text'];
            $tweet->userId = $row['userId'];
            $tweet->creationDate = $row['creationDate'];

            return $tweet;
        }
        return NULL;
    }

    static function loadAllTweetByUserId(mysqli $connection, $userId) {
        $query = "SELECT * FROM Tweet WHERE userId=" . $connection->real_escape_string($userId);

        $result = $connection->query($query);

        $tweets = [];
        if($result){
            foreach ($result as $row) {
                $tweet = new Tweet();
                $tweet->id = $row['id'];
                $tweet->text =$row['text'] ;
                $tweet->userId=$row['userId'];
                $tweet->creationDate= $row['creationDate'];
                $tweets[] = $tweet;
            }
        }
        return $tweets;
    }
    
    static public function loadAllTweets(mysqli $connection) {
        $query = "SELECT * FROM Tweet";
        
        $tweets = [];
        $result = $connection->query($query);
        
        if($result){
            foreach ($result as $row) {
                $tweet = new Tweet();
                $tweet->id = $row['id'];
                $tweet->text = $row['text'];
                $tweet->userId = $row['userId'];
                $tweet->creationDate = $row['creationDate'];
                $tweets[] = $tweet;
                
            }
        }
        return $tweets;
    }
    
    /*
     * Iterator
     */
    public function rewind() {
        $this->position = 0;
    }
    
    public function current() {
        return $this->vehicles[$this->position];
    }
    
    public function key() {
        return $this->position;
    }
    
    public function next() {
        ++$this->position;
    }
    
    public function valid() {
        return isset($this->vehicles[$this->position]);
    }
}
