<?php

namespace NagStatus;

class CommandObject extends NagiosBase {
	protected $fields = [
		'command_name' => self::NAGIOS_STRING,
		'command_line' => self::NAGIOS_STRING
	];
}

?>
