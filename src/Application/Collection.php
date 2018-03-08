<?php
declare(strict_types=1);

namespace Propcom\RestAPI\Application;

use Propcom\RestAPI\Infrastructure\Resultset;

class Collection implements CollectionInterface
{

	use ToArrayTrait {
		toArray as defaultToArray;
	}

	/**
	 * @var \Propcom\RestAPI\Infrastructure\Resultset
	 */
	protected $resultset;

	/**
	 * @var \Propcom\RestAPI\Application\ToArrayInterface[]
	 */
	protected $items = [];

	public function __construct(Resultset $resultset, array $items = [])
	{
		$this->resultset = $resultset;
		foreach ($items as $item) {
			$this->addItem($item);
		}
	}

	public function addItem(ToArrayInterface $item)
	{
		array_push($this->items, $item);
	}

	public function getItems(): array
	{
		return $this->items;
	}

	public function getResultset(): Resultset
	{
		return $this->resultset;
	}

	public function getCount(): int
	{
		return $this->resultset->getCount();
	}

	public function getTotal(): int
	{
		return $this->resultset->getTotal();
	}

	public function getOffset(): int
	{
		return $this->resultset->getOffset();
	}

	public function getLimit(): int
	{
		return $this->resultset->getLimit();
	}

	public function toArray(): array
	{
		$array = $this->defaultToArray();

		unset($array['resultset']);

		return $array;
	}
}
