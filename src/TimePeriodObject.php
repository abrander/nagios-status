<?php

namespace NagStatus;

class TimePeriodObject extends NagiosBase {
	protected $fields = [
		'timeperiod_name' => self::NAGIOS_STRING,
		'alias' => self::NAGIOS_STRING,
		'monday' => self::NAGIOS_STRING,
		'tuesday' => self::NAGIOS_STRING,
		'wednesday' => self::NAGIOS_STRING,
		'thursday' => self::NAGIOS_STRING,
		'friday' => self::NAGIOS_STRING
	];
}

?>
