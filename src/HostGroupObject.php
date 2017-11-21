<?php

namespace NagStatus;

class HostGroupObject extends NagiosBase {
	protected $fields = [
		'hostgroup_name' => self::NAGIOS_STRING,
		'alias' => self::NAGIOS_STRING,
		'members' => self::NAGIOS_STRING
	];
}

?>
