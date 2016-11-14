<?php

if ($_SERVER['QUERY_STRING'] != 'json') {
	header('Content-Type: text/html');
	readfile('example.html');
	exit();
}

require("src/StatusBase.php");
require("src/ContactStatus.php");
require("src/HostStatus.php");
require("src/Info.php");
require("src/ProgramStatus.php");
require("src/ServiceStatus.php");
require("src/Status.php");

// Search for status.dat in common locations. Check status_file
// configuration for Nagios
$searchPath = [
	'/var/log/nagios/status.dat', // RPM-based (RedHat, CentOS, etc)
	'/var/cache/nagios3/status.dat', // deb-based (Debian, Ubuntu, etc)
	'/usr/local/nagios/var/status.dat', // Default Nagios placement
	'../status.dat' // For development of this very software
];

$status = new NagStatus\Status();

$ok = false;
foreach ($searchPath as $path) {
	if ($ok = $status->readFromStatusFile($path))
		break;
}

if (!$ok) {
	header("HTTP/1.1 500 Cannot read status.dat");
	exit();
}

$overview = [
	'hosts' => [
		'up' => [],
		'down' => []
	],
	'services' => [
		'ok' => [],
		'warning' => [],
		'critical' => [],
		'unknown' => []
	],
	'title' => ''
];

foreach ($status->hosts as $hostname => $host) {
	switch($host->current_state) {
		case NagStatus\Status::HOST_UP:
			$overview['hosts']['up'][] = $host;
			break;
		case NagStatus\Status::HOST_DOWN:
			$overview['hosts']['down'][] = $host;
			break;
	}

	foreach($host->services as $service) {
		switch ($service->current_state) {
			case NagStatus\Status::SERVICE_OK:
				$overview['services']['ok'][] = $service->service_description;
				break;
			case NagStatus\Status::SERVICE_WARNING:
				$overview['services']['warning'][] = $service;
				break;
			case NagStatus\Status::SERVICE_CRITICAL:
				$overview['services']['critical'][] = $service;
				break;
			case NagStatus\Status::SERVICE_UNKNOWN:
				$overview['services']['unknown'][] = $service;
				break;
		}
	}
}

$overview['title'] = file_get_contents('/etc/hostname');

header('Content-Type: application/json');
echo json_encode($overview);

?>
