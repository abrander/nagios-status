<?php

namespace NagStatus;

class ContactGroupObject extends NagiosBase {
	protected $fields = [
		'contactgroup_name' => self::NAGIOS_STRING,
		'alias' => self::NAGIOS_STRING,
		'members' => self::NAGIOS_STRING
	];
}

?>
