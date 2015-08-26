<?php

namespace NagStatus;

class ProgramStatus extends StatusBase {
	var $fields = [
        'modified_host_attributes' => self::NAGIOS_INTEGER,
        'modified_service_attributes' => self::NAGIOS_INTEGER,
        'nagios_pid' => self::NAGIOS_INTEGER,
        'daemon_mode' => self::NAGIOS_BOOLEAN,
        'program_start' => self::NAGIOS_TIMESTAMP,
        'last_command_check' => self::NAGIOS_TIMESTAMP,
        'last_log_rotation' => self::NAGIOS_TIMESTAMP,
        'enable_notifications' => self::NAGIOS_BOOLEAN,
        'active_service_checks_enabled' => self::NAGIOS_BOOLEAN,
        'passive_service_checks_enabled' => self::NAGIOS_BOOLEAN,
        'active_host_checks_enabled' => self::NAGIOS_BOOLEAN,
        'passive_host_checks_enabled' => self::NAGIOS_BOOLEAN,
        'enable_event_handlers' => self::NAGIOS_BOOLEAN,
        'obsess_over_services' => self::NAGIOS_BOOLEAN,
        'obsess_over_hosts' => self::NAGIOS_BOOLEAN,
        'check_service_freshness' => self::NAGIOS_BOOLEAN,
        'check_host_freshness' => self::NAGIOS_BOOLEAN,
        'enable_flap_detection' => self::NAGIOS_BOOLEAN,
        'enable_failure_prediction' => self::NAGIOS_BOOLEAN,
        'process_performance_data' => self::NAGIOS_BOOLEAN,
        'global_host_event_handler' => self::NAGIOS_UNKNOWN,
        'global_service_event_handler' => self::NAGIOS_UNKNOWN,
        'next_comment_id' => self::NAGIOS_INTEGER,
        'next_downtime_id' => self::NAGIOS_INTEGER,
        'next_event_id' => self::NAGIOS_INTEGER,
        'next_problem_id' => self::NAGIOS_INTEGER,
        'next_notification_id' => self::NAGIOS_INTEGER,
        'total_external_command_buffer_slots' => self::NAGIOS_INTEGER,
        'used_external_command_buffer_slots' => self::NAGIOS_INTEGER,
        'high_external_command_buffer_slots' => self::NAGIOS_INTEGER,
        'active_scheduled_host_check_stats' => self::NAGIOS_STRING, // Array? 8,24,75
        'active_ondemand_host_check_stats' => self::NAGIOS_STRING, // Array? 0,1,2
        'passive_host_check_stats' => self::NAGIOS_STRING, // Array? 0,0,0
        'active_scheduled_service_check_stats' => self::NAGIOS_STRING, // Array? 68,369,1108
        'active_ondemand_service_check_stats' => self::NAGIOS_STRING, // Array? 0,0,0
        'passive_service_check_stats' => self::NAGIOS_STRING, // Array? 0,0,0
        'cached_host_check_stats' => self::NAGIOS_STRING, // Array? 0,1,2
        'cached_service_check_stats' => self::NAGIOS_STRING, // Array? 0,0,0
        'external_command_stats' => self::NAGIOS_STRING, // Array? 0,0,0
        'parallel_host_check_stats' => self::NAGIOS_STRING, // Array? 8,24,75
        'serial_host_check_stats' => self::NAGIOS_STRING // Array? 0,0,0
	];
}

?>
