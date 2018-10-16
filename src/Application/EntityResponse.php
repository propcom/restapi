<?php
declare(strict_types=1);

namespace Propcom\RestAPI\Application;

use Propcom\RestAPI\Application\ToArrayInterface;
use Propcom\RestAPI\Application\ToArrayTrait;

class EntityResponse implements ToArrayInterface
{
	use ToArrayTrait;
}
