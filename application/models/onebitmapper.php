<?php
class OnebitMapper extends DataMapper {
    function __construct($id = NULL) {
        parent::__construct($id);
    }
    
    // Add your method(s) here, such as:
    
    // only get if $this wasn't already loaded
    function get_once()
    {
        if( ! $this->exists())
        {
            $this->get();
        }
        return $this;
    }
    
}