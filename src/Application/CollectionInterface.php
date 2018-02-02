<?php

namespace Propcom\RestAPI\Application;

use Propcom\RestAPI\Infrastructure\ToArrayInterface;

interface CollectionInterface extends ToArrayInterface
{

	public function getCount(): int;
	public function getTotal(): int;
	public function getOffset(): int;
	public function getLimit(): int;
	public function getData(): array;

}
