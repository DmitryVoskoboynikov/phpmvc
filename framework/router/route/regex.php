<?php

namespace Framework\Router\Route
{
    use Framework\Router as Router;
    
    class Regex extends Router\Route
    {
        /**
         * @readwrite
         */
        protected $_keys;
        
        public function matches($url)
        {
            $pattern = $this->pattern;
            
            preg_match_all("#^($pattern)#", $url, $values);
            
            if (sizeof($values) && sizeof($values[0]) && sizeof($values[1]))
            {
                $derived = array_combine($this->keys, $values[1]);
                $this->parametrs = array_merge($this->parameters, $derived);
                
                return true;
            }
            
            return false;
        }
    }
}