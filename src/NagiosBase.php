<?php

namespace NagStatus;

class NagiosBase implements \JsonSerializable {
	const NAGIOS_TIMESTAMP = 0x1;
	const NAGIOS_STRING = 0x2;
	const NAGIOS_BOOLEAN = 0x3;
	const NAGIOS_INTEGER = 0x4;
	const NAGIOS_FLOAT = 0x5;
	const NAGIOS_UNKNOWN = 0xff;

	/**
	 * Read a line from a file ignoring blank lines and comments
	 * @param $handle A filehandle as returned from fopen() etc.
	 * @return A string representing a $line as read from file newlines
	 *         blank spaces at the beginning or end will be removed
	 */
	public static function readLine($handle) {
		while ($line = fgets($handle)) {
			$line = trim($line);

			// Skip blank lines
			if (strlen($line) === 0) {
				continue;
			}

			// Skip comments
			if ($line[0] === '#') {
				continue;
			}

			break;
		}

		return $line;
	}

	/**
	 * Read object properties from a stream according to the $fields
	 * property
	 * @param $handle A filehandle positioned just after the open tag
	 */
	public function readFromHandle($handle) {
		while ($line = self::readLine($handle)) {
			// A '}' alone on a line signals end of object
			if ($line === '}') {
				break;
			}

			list($key, $value) = preg_split('/\t|=/', $line, 2);

			if (array_key_exists($key, $this->fields)) {
				$this->$key = self::unmarshal($value, $this->fields[$key]);
			}
		}

		return;
	}

	/**
	 * Unmarshal a value from the nagios status.dat file to meaningfull
	 * PHP types according to the $fields property of the class
	 * @param $value The raw binary read from status.dat
	 * @param $type One of the NAGIOS_* types
	 * @return A PHP object or scalar representing the value
	 */
	public static function unmarshal($value, $type) {
		switch($type) {
			case self::NAGIOS_TIMESTAMP:
				if ($value == 0) {
					return NULL;
				} else {
					return new \DateTime("@{$value}");
				}
				break;
			case self::NAGIOS_STRING:
				return (string) $value;
				break;
			case self::NAGIOS_BOOLEAN:
				return (boolean) $value;
				break;
			case self::NAGIOS_INTEGER:
				return (int) $value;
				break;
			case self::NAGIOS_FLOAT:
				return (float) $value;
				break;
			case self::NAGIOS_UNKNOWN:
				return 'NAGIOS_UNKNOWN {$value}';
				break;
			default:
				trigger_error(__CLASS__ . '::' . __FUNCTION__ . "(): Not sure how to unmarshall {$type}");
				break;
		}
	}

	/**
	 * Return a representation of the object suitable for JSON encoding.
	 * @return {mixed} A new object representing the object with types
	 * sanely marshalled for Javascript consumption
	 */
	public function jsonSerialize() {
		$jsonObject = [];
		foreach ($this->fields as $key => $type) {
			switch($type) {
				case self::NAGIOS_TIMESTAMP:
					if (is_null($this->$key)) {
						$jsonObject[$key] = NULL;
					} else {
						// Mimic Javascript's Date object JSON marshalling
						$jsonObject[$key] = $this->$key->format('Y-m-d\TH:i:s.000\Z');
					}
					break;
				case self::NAGIOS_STRING:
				case self::NAGIOS_BOOLEAN:
				case self::NAGIOS_INTEGER:
				case self::NAGIOS_FLOAT:
				case self::NAGIOS_UNKNOWN:
					$jsonObject[$key] = $this->$key;
					break;
				default:
					trigger_error(__CLASS__ . '::' . __FUNCTION__ . "(): Not sure how to serialize {$type}");
					break;
			}
		}

		return $jsonObject;
	}
}

?>
