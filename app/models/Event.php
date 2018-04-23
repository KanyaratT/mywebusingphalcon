<?php
use Phalcon\Mvc\Model;
class Event extends Model{

public function getSource(){
    return "event"; 
  }
}