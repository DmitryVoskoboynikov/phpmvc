<?php

use Shared\Controller as Controller;
use Framework\ArrayMethods as ArrayMethods;

class Home extends Controller
{
    public function index()
    {
        $user = $this->getUser();
        $view = $this->getActionView();
        
        if ($user)
        {
            $friends = Friend::all(array(
                "user = ?" => $user->id,
                "live = ?" => true,
                "deleted = ?" => false
            ), array("friend"));
            
            $ids = array();
            foreach ($friends as $friend)
            {
                $ids[] = $friend->friend;
            }
            
            $messages = Message::all(array(
               "user in ?" => $ids,
                "live = ?" => true,
                "deleted = ?" => false
            ), array(
                "*",
                "(SELECT CONCAT(first, \" \", last) FROM user WHERE user.id = message.user)" => "user_name"
            ), "created", "asc");
            
            $view->set("message", $messages);
        }
    }
    
}