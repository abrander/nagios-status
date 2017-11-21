<?php

namespace NagStatus;

class ContactObject extends NagiosBase {
	var $fields = [
		'contact_name' => self::NAGIOS_STRING,
		'alias' => self::NAGIOS_STRING,
		'service_notification_period' => self::NAGIOS_STRING,
		'host_notification_period' => self::NAGIOS_STRING,
		'service_notification_options' => self::NAGIOS_STRING,
		'host_notification_options' => self::NAGIOS_STRING,
		'service_notification_commands' => self::NAGIOS_STRING,
		'host_notification_commands' => self::NAGIOS_STRING,
		'host_notifications_enabled' => self::NAGIOS_BOOLEAN,
		'service_notifications_enabled' => self::NAGIOS_BOOLEAN,
		'can_submit_commands' => self::NAGIOS_BOOLEAN,
		'retain_status_information' => self::NAGIOS_BOOLEAN,
		'retain_nonstatus_information' => self::NAGIOS_BOOLEAN
	];
}

?>
