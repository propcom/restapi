<?php

namespace Propcom\RestAPI\Infrastructure;

use Propcom\RestAPI\Application\CollectionInterface;

class SuccessCollectionResponse extends BaseResponse
{

	/**
	 * @var array
	 */
	protected $data;

	public function __construct(CollectionInterface $data, $message, $details = null, $code = 200)
	{
		$this->data = $data;

		$meta = new CollectionMeta('success', $code, $message, $details);

		if ($data instanceof Collection) {
			$meta->setResultset($data->getResultset());
		} else {
			$meta->setResultset(
				new Resultset(
					$this->data->getCount(),
					$this->data->getTotal(),
					$this->data->getOffset(),
					$this->data->getLimit()
				)
			);
		}

		parent::__construct($meta);
	}

}
