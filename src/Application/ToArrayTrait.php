<?php
declare(strict_types=1);

namespace Propcom\RestAPI\Application;

trait ToArrayTrait
{

	/**
	 * Recursively convert an object into an array
	 *
	 * @throws \UnexpectedValueException If a child object does not implement the necessary ToArrayInterface
	 *
	 * @return array
	 */
	public function toArray(): array
	{
		$array = get_object_vars($this);

		foreach ($array as $key => $value) {
			if (is_array($value)) {
				foreach ($value as $subkey => $subvalue) {
					$array[$key][$subkey] = $subvalue->toArray();
				}
			} elseif ($value instanceof ToArrayInterface) {
				$array[$key] = $value->toArray();
			} elseif (is_object($value)) {
				throw new \UnexpectedValueException(
					'Objects must implement the 
					\Propcom\RestAPI\Application\ToArrayInterface to be 
					converted to array'
				);
			}
		}

		return $array;
	}
}
