<?php

namespace NagStatus;

class Objects {
	var $hosts = [];
	var $commands = [];
	var $services = [];

	/**
	 * Read Nagios status from Nagios's objects.cache file
	 * @return {boolean} Returns TRUE if we file could be opened and
	 * read, FALSE otherwise
	 */
	public function readFromObjectsCache($path) {
		$handle = fopen($path, 'r', FALSE);

		if ($handle === FALSE) {
			return FALSE;
		}

		while ($line = NagiosBase::readLine($handle)) {
			switch($line) {
				case 'define command {':
					$command = new CommandObject();
					$command->readFromHandle($handle);

					$this->commands[$command->command_name] = $command;
					break;
				case 'define contact {':
					// FIXME: stub
					break;
				case 'define contactgroup {':
					// FIXME: stub
					break;
				case 'define host {':
					$host = new HostObject();
					$host->readFromHandle($handle);

					$this->hosts[$host->host_name] = $host;
					break;
				case 'define hostgroup {':
					// FIXME: stub
					break;
				case 'define service {':
					$service = new ServiceObject();
					$service->readFromHandle($handle);

					$service->host = $this->hosts[$service->host_name];
					$this->hosts[$service->host_name]->services[$service->service_description] = $service;
					break;
				case 'define timeperiod {':
					// FIXME: stub
					break;
				default:
					break;
			}
		}
		fclose($handle);

		return TRUE;
	}
}

?>
