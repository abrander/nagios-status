<?php

namespace NagStatus;

class ContactStatus extends NagiosBase {
	var $fields = [
		'contact_name' => self::NAGIOS_STRING,
		'modified_attributes' => self::NAGIOS_INTEGER,
		'modified_host_attributes' => self::NAGIOS_INTEGER,
		'modified_service_attributes' => self::NAGIOS_INTEGER,
		'host_notification_period' => self::NAGIOS_STRING,
		'service_notification_period' => self::NAGIOS_STRING,
		'last_host_notification' => self::NAGIOS_TIMESTAMP,
		'last_service_notification' => self::NAGIOS_TIMESTAMP,
		'host_notifications_enabled' => self::NAGIOS_BOOLEAN,
		'service_notifications_enabled' => self::NAGIOS_BOOLEAN
	];
}

?>
