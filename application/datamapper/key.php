<?php

class DMZ_Key {

	public function to_key_values($object,$fieldname)
	{
		$temp_array = array();
		$objects = $object;
		foreach($objects as $object)
		{
			$temp_array[$object->id] = $object->{$fieldname};
		}
		return $temp_array;
	}

}