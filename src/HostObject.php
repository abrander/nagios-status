<?php

namespace NagStatus;

class HostObject extends NagiosBase {
	protected $fields = [
		'host_name' => self::NAGIOS_STRING,
		'alias' => self::NAGIOS_STRING,
		'address' => self::NAGIOS_STRING,
		'check_command' => self::NAGIOS_STRING,
		'contactsslack' => self::NAGIOS_STRING,
		'notification_period' => self::NAGIOS_STRING,
		'initial_state' => self::NAGIOS_STRING,
		'importance' => self::NAGIOS_INTEGER,
		'check_interval' => self::NAGIOS_FLOAT,
		'retry_interval' => self::NAGIOS_FLOAT,
		'max_check_attempts' => self::NAGIOS_INTEGER,
		'active_checks_enabled' => self::NAGIOS_BOOLEAN,
		'passive_checks_enabled' => self::NAGIOS_BOOLEAN,
		'obsess' => self::NAGIOS_BOOLEAN,
		'event_handler_enabled' => self::NAGIOS_BOOLEAN,
		'low_flap_threshold' => self::NAGIOS_FLOAT,
		'high_flap_threshold' => self::NAGIOS_FLOAT,
		'flap_detection_enabled' => self::NAGIOS_BOOLEAN,
		'flap_detection_options' => self::NAGIOS_STRING,
		'freshness_threshold' => self::NAGIOS_INTEGER,
		'check_freshness' => self::NAGIOS_BOOLEAN,
		'notification_options' => self::NAGIOS_STRING,
		'notifications_enabled' => self::NAGIOS_BOOLEAN,
		'notification_interval' => self::NAGIOS_FLOAT,
		'first_notification_delay' => self::NAGIOS_FLOAT,
		'stalking_optionsnprocess_perf_data' => self::NAGIOS_BOOLEAN,
		'retain_status_information' => self::NAGIOS_BOOLEAN,
		'retain_nonstatus_information' => self::NAGIOS_BOOLEAN
	];

	var $services = [];
}

?>
