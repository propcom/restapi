<?php

namespace Propcom\RestAPI\Application;

trait ToArrayTrait
{

	public function toArray(): array
	{
		$array = get_object_vars($this);

		foreach ($array as $key => $value) {
			if (is_null($value) or $value === []) {
				unset($array[$key]);
			} elseif (is_array($value)) {
				foreach ($value as $subkey => $subvalue) {
					$array[$key][$subkey] = $subvalue->toArray();
				}
			} elseif ($value instanceof ToArrayInterface) {
				$array[$key] = $value->toArray();
			} elseif (is_object($value)) {
				throw new \Exception('Invalid object');
			}
		}

		return $array;
	}

}
