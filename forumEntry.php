<?php
//class_ForumEntry.php

class ForumEntry {

    //declare member variables first. Member variables, sometimes called fields(from Java)
    //Should usually have a "private" access specifier and be controlled with "gets and sets"
    //This makes the object's interface more secure and durable
    private $GuestName;
    private $Topic;
    private $Message;
    private $MyTimeStamp;

    function __construct()
    {
        $this->GuestName = "";
        $this->Topic = "a topic";
        $this->Message = "a message";
        $this->MyTimeStamp = time();
    }

    //We need three accessor/mutator method pairs to handle the private field members (variables)
    //Note that the time stamp may only be read (with a get) and not written (with a set)
    public function setName($TheName) {
        $this->GuestName = $TheName;
    }

    public function getName() {
        return $this->GuestName;
    }

    public function setTopic($TheTopic) {
        $this->Topic = $TheTopic;
    }

    public function getTopic() {
        return $this->Topic;
    }

    public function setMessage($TheMessage) {
        $this->Message = $TheMessage;
    }

    public function getMessage() {
        return $this->Message;
    }

    public function getTimeStamp() {
        return $this->MyTimeStamp;
    }

}

