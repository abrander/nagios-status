<?php

namespace NagStatus;

class Info extends StatusBase {
	var $fields = [
		'created' => self::NAGIOS_TIMESTAMP,
		'version' => self::NAGIOS_STRING,
		'last_update_check' => self::NAGIOS_TIMESTAMP,
		'update_available' => self::NAGIOS_BOOLEAN,
		'last_version' => self::NAGIOS_STRING,
		'new_version' => self::NAGIOS_STRING
	];
}

?>
