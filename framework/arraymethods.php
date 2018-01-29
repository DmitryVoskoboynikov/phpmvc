<?php

namespace Framework
{
    class ArrayMethods
    {
        private function __consruction()
        {
            
        }
        
        private function __clone()
        {
            
        }
        
        public static function clean($array)
        {
            return array_filter($array, function($item) {
                return !empty($item);
            });
        }
        
        public static function trim($array)
        {
            return array_map(function($item) {
                return trim($item);
            }, $array);
        }

        public static function toObject($array)
        {
            $result = new \stdClass();

            foreach ($array as $key => $value)
            {
                if (is_array($value))
                {
                    $result->{$key} = self::toObject($value);
                }
                else
                {
                    $result->{$key} = $value;
                }
            }
            
            return $result;
        }
        
        public function flatten($array, $return = array())
        {
            foreach ($array as $key => $value)
            {
                if (is_array($value) || is_object($value))
                {
                    $return = self::flatten($value, $return);
                }
                else 
                {
                    $return[] = $value;
                }
            }
            
            return $return;
        }

        public static function last($array)
        {
            if (sizeof($array) == 0)
            {
                return null;
            }

            $keys = array_keys($array);
            return $array[$keys[sizeof($keys) - 1]];
        }
        
    }
}

