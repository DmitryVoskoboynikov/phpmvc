<?php

use Shared\Controller as Controller;
use Framework\Registry as Registry;
use Framework\RequestMethods as RequestMethods;

class Users extends Controller
{
    public function register()
    {
        if (RequestMethods::post("register")) {
            $first = RequestMethods::post("first");
            $last = RequestMethods::post("last");
            $email = RequestMethods::post("email");
            $password = RequestMethods::post("password");

            $view = $this->getActionView();
            $error = false;

            if (empty($first))
            {
                $view->set("first_error", "First name not provided");
                $error = true;
            }

            if (empty($last))
            {
                $view->set("last_error", "Last name not provided");
                $error = true;
            }

            if (empty($email))
            {
                $view->set("email_error", "Email not provided");
                $error = true;
            }

            if (empty($password))
            {
                
            }


        }
    }
}
