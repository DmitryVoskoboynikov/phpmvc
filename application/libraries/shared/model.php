<?php

namespace Shared
{
    class Model extends \Framework\Model
    {
        /**
         * @column
         * @readwrite
         * @primary
         * @type autonumber
         */    
        protected $_id;
        
        /**
         * @column
         * @readwrite
         * @type boolean
         * @index
         */
        protected $_live;
        
        /**
         * @column
         * @readwrite
         * @type boolean
         * @index
         */
        protected $_deleted;
        
        /**
         * @column
         * @readwrite
         * @type datetime
         */
        protected $_created;
        
        /**
         * @column
         * @readwrite
         * @type datetime
         */
        protected $_modified;
    }
}
