<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Meesage
 *
 * @author maciej
 */
class Meesages {

    private $id;
    private $sender;
    private $reciver;
    private $creation_date;
    private $text;
    private $status;
    private $meesage_subject;

    public function __construct() {
        $this->id = -1;
        $this->sender = '';
        $this->reciver = '';
        $this->creation_date = '';
        $this->text = '';
        $this->status = 0;
        $this->meesage_subject = '';
    }

    public function getMeesage_subject() {
        return $this->meesage_subject;
    }

    public function setMeesage_subject($meesage_subject) {
        $this->meesage_subject = $meesage_subject;
    }

    public function getCreation_date() {
        return $this->creation_date;
    }

    public function setCreation_date($creation_date) {
        $this->creation_date = $creation_date;
    }

    public function getId() {
        return $this->id;
    }

    public function getSender() {
        return $this->sender;
    }

    public function getReciver() {
        return $this->reciver;
    }

    public function getText() {
        return $this->text;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setSender($sender) {
        $this->sender = $sender;
    }

    public function setReciver($reciver) {
        $this->reciver = $reciver;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function saveToDB(mysqli $connection) {
        if ($this->id == -1) {
            $query = "INSERT INTO Meesages (sender, reciver, creation_date, text, status, meesage_subject)
                    VALUES ('$this->sender', '$this->reciver', '$this->creation_date', '$this->text', '$this->status', '$this->meesage_subject')";
            if ($connection->query($query)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            $query = "UPDATE Meesages SET status = '$this->status' WHERE id = $this->id";
            if ($connection->query($query)) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }

    static function loadMeesageById(mysqli $connection, $id) {
        $query = " SELECT * FROM Meesages WHERE id =" . $connection->real_escape_string($id);

        $result = $connection->query($query);
        if ($result && $result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $newMeesage = new Meesages();
            $newMeesage->id = $row['id'];
            $newMeesage->reciver = $row['reciver'];
            $newMeesage->sender = $row['sender'];
            $newMeesage->status = $row['status'];
            $newMeesage->text = $row['text'];
            $newMeesage->creation_date = $row['creation_date'];
            $newMeesage->meesage_subject = $row['meesage_subject'];

            return $newMeesage;
        }
        return NULL;
    }

    static function loadAllMeesagesByUserId(mysqli $connection, $id) {

        $query = "SELECT * FROM Meesages WHERE Meesages.reciver="
                . $connection->real_escape_string($id);
        $result = $connection->query($query);

        $meesages = [];
        if ($result) {
            foreach ($result as $row) {
                $newMeesage = new Meesages();
                $newMeesage->id = $row['id'];
                $newMeesage->reciver = $row['reciver'];
                $newMeesage->sender = $row['sender'];
                $newMeesage->status = $row['status'];
                $newMeesage->text = $row['text'];
                $newMeesage->creation_date = $row['creation_date'];
                $newMeesage->meesage_subject = $row['meesage_subject'];
                $meesages[] = $newMeesage;
            }
        }
        return $meesages;
    }

    static function loadAllMeesagesSentBySenderId(mysqli $connection, $id) {

        $query = "SELECT * FROM Meesages WHERE Meesages.sender="
                . $connection->real_escape_string($id);
        $result = $connection->query($query);

        $meesages = [];
        if ($result) {
            foreach ($result as $row) {
                $newMeesage = new Meesages();
                $newMeesage->id = $row['id'];
                $newMeesage->reciver = $row['reciver'];
                $newMeesage->sender = $row['sender'];
                $newMeesage->status = $row['status'];
                $newMeesage->text = $row['text'];
                $newMeesage->creation_date = $row['creation_date'];
                $newMeesage->meesage_subject = $row['meesage_subject'];
                $meesages[] = $newMeesage;
            }
        }
        return $meesages;
    }

}
