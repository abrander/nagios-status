<?php

namespace NagStatus;

class ServiceStatus extends NagiosBase {
	var $fields = [
		'host_name' => self::NAGIOS_STRING,
		'service_description' => self::NAGIOS_STRING,
		'modified_attributes' => self::NAGIOS_INTEGER,
		'check_command' => self::NAGIOS_STRING,
		'check_period' => self::NAGIOS_STRING,
		'notification_period' => self::NAGIOS_STRING,
		'check_interval' => self::NAGIOS_FLOAT,
		'retry_interval' => self::NAGIOS_FLOAT,
		'event_handler' => self::NAGIOS_UNKNOWN,
		'has_been_checked' => self::NAGIOS_BOOLEAN,
		'should_be_scheduled' => self::NAGIOS_BOOLEAN,
		'check_execution_time' => self::NAGIOS_FLOAT,
		'check_latency' => self::NAGIOS_FLOAT,
		'check_type' => self::NAGIOS_INTEGER,
		'current_state' => self::NAGIOS_INTEGER, // FIXME
		'last_hard_state' => self::NAGIOS_INTEGER,
		'last_event_id' => self::NAGIOS_INTEGER,
		'current_event_id' => self::NAGIOS_INTEGER,
		'current_problem_id' => self::NAGIOS_INTEGER,
		'last_problem_id' => self::NAGIOS_INTEGER,
		'current_attempt' => self::NAGIOS_INTEGER,
		'max_attempts' => self::NAGIOS_INTEGER,
		'state_type' => self::NAGIOS_INTEGER,
		'last_state_change' => self::NAGIOS_TIMESTAMP,
		'last_hard_state_change' => self::NAGIOS_TIMESTAMP,
		'last_time_ok' => self::NAGIOS_TIMESTAMP,
		'last_time_warning' => self::NAGIOS_TIMESTAMP,
		'last_time_unknown' => self::NAGIOS_TIMESTAMP,
		'last_time_critical' => self::NAGIOS_TIMESTAMP,
		'plugin_output' => self::NAGIOS_STRING,
		'long_plugin_output' => self::NAGIOS_STRING,
		'performance_data' => self::NAGIOS_STRING, // FIXME: Should this be parsed?
		'last_check' => self::NAGIOS_TIMESTAMP,
		'next_check' => self::NAGIOS_TIMESTAMP,
		'check_options' => self::NAGIOS_UNKNOWN,
		'current_notification_number' => self::NAGIOS_INTEGER,
		'current_notification_id' => self::NAGIOS_INTEGER,
		'last_notification' => self::NAGIOS_TIMESTAMP,
		'next_notification' => self::NAGIOS_TIMESTAMP,
		'no_more_notifications' => self::NAGIOS_INTEGER,
		'notifications_enabled' => self::NAGIOS_BOOLEAN,
		'active_checks_enabled' => self::NAGIOS_BOOLEAN,
		'passive_checks_enabled' => self::NAGIOS_BOOLEAN,
		'event_handler_enabled' => self::NAGIOS_BOOLEAN,
		'problem_has_been_acknowledged' => self::NAGIOS_BOOLEAN,
		'acknowledgement_type' => self::NAGIOS_INTEGER,
		'flap_detection_enabled' => self::NAGIOS_BOOLEAN,
		'failure_prediction_enabled' => self::NAGIOS_BOOLEAN,
		'process_performance_data' => self::NAGIOS_BOOLEAN,
		'obsess_over_service' => self::NAGIOS_BOOLEAN,
		'last_update' => self::NAGIOS_TIMESTAMP,
		'is_flapping' => self::NAGIOS_BOOLEAN,
		'percent_state_change' => self::NAGIOS_FLOAT,
		'scheduled_downtime_depth' => self::NAGIOS_INTEGER,
	];

	public $host = NULL;
}

?>
