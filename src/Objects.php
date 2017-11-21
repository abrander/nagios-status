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
					$contact = new ContactObject();
					$contact->readFromHandle($handle);

					$this->contacts[$contact->contact_name] = $contact;
					break;
				case 'define contactgroup {':
					$contactgroup = new ContactGroupObject();
					$contactgroup->readFromHandle($handle);

					$this->contactgroups[$contactgroup->contactgroup_name] = $contactgroup;
					break;
				case 'define host {':
					$host = new HostObject();
					$host->readFromHandle($handle);

					$this->hosts[$host->host_name] = $host;
					break;
				case 'define hostgroup {':
					$hostgroup = new HostGroupObject();
					$hostgroup->readFromHandle($handle);

					$this->hostgroups[$hostgroup->hostgroup_name] = $hostgroup;
					break;
				case 'define service {':
					$service = new ServiceObject();
					$service->readFromHandle($handle);

					$service->host = $this->hosts[$service->host_name];
					$this->hosts[$service->host_name]->services[$service->service_description] = $service;
					break;
				case 'define timeperiod {':
					$timeperiod = new TimePeriodObject();
					$timeperiod->readFromHandle($handle);

					$this->timeperiods[$timeperiod->timeperiod_name] = $timeperiod;
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
