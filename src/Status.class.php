<?php

namespace NagStatus;

class Status {
	var $contacts = [];
	var $hosts = [];
	var $services = [];

	public function readFromStatusFile($path) {
		$handle = fopen($path, 'r');

		while ($line = StatusBase::readLine($handle)) {
			switch($line) {
				case 'contactstatus {':
					$c = new ContactStatus();
					$c->readFromHandle($handle);

					$this->contacts[$c->contact_name] = $c;
					break;
				case 'hoststatus {':
					$host = new HostStatus();
					$host->readFromHandle($handle);

					$this->hosts[$host->host_name] = $host;
					break;
				case 'info {':
					$i = new Info();
					$i->readFromHandle($handle);
					// FIXME: Use this for something
					break;
				case 'programstatus {':
					$p = new ProgramStatus();
					$p->readFromHandle($handle);
					// FIXME: Use this for something
					break;
				case 'servicestatus {':
					$service = new ServiceStatus();
					$service->readFromHandle($handle);
					$this->services[] = $service;

					// Add the host to the ServiceStatus class
					$service->host = $this->hosts[$service->host_name];

					// Add the service to the "parent" HostStatus class
					$this->hosts[$service->host_name]->services[] = $service;
					break;
				default:
					break;
			}
		}
		fclose($handle);
	}
}

?>
