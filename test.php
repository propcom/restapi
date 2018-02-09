<?php

require_once('../../autoload.php');

use Propcom\RestAPI\Application\BasicCollection;
use Propcom\RestAPI\Application\Collection;
use Propcom\RestAPI\Application\ToArrayInterface;
use Propcom\RestAPI\Application\ToArrayTrait;

use Propcom\RestAPI\Infrastructure\FailDetails;
use Propcom\RestAPI\Infrastructure\ErrorDetails;
use Propcom\RestAPI\Infrastructure\Resultset;

use Propcom\RestAPI\Infrastructure\ErrorResponse;
use Propcom\RestAPI\Infrastructure\FailResponse;
use Propcom\RestAPI\Infrastructure\SuccessSingleResponse;
use Propcom\RestAPI\Infrastructure\SuccessCollectionResponse;

class Thing implements ToArrayInterface
{

	use ToArrayTrait;

	protected $name;
	protected $description;

	public function __construct($name, $description)
	{
		$this->name = $name;
		$this->description = $description;
	}
}

/******************************************************************************/
echo "\n\nBasic Error\n";

$error = new ErrorResponse('Counldn\'t do it', 500, 'Database is wonky');

#var_dump($error->toArray());
echo json_encode($error->toArray(), JSON_PRETTY_PRINT);

/******************************************************************************/
echo "\n\nError with details\n";

$error = new ErrorResponse('Counldn\'t do it', 500, 'Database is wonky');
$error->addError(
	new ErrorDetails(
		'DB1',
		'Could not database'
	)
);

#var_dump($error->toArray());
echo json_encode($error->toArray(), JSON_PRETTY_PRINT);

/******************************************************************************/
echo "\n\nFail\n";

$fail = new FailResponse('Validation failed', 422, 'The data passed needs to be fixed up');
$fail->addError(
	new FailDetails(
		'title',
		'Title is required'
	)
);
$fail->addError(
	new FailDetails(
		'description',
		'Description should only contain letters and numbers'
	)
);
$fail->addError(
	new FailDetails(
		'description',
		'Description must be at least 10 characters'
	)
);

#var_dump($fail->toArray());
echo json_encode($fail->toArray(), JSON_PRETTY_PRINT);


/******************************************************************************/
echo "\n\nSingle Success\n";

$foo = new Thing('foo', 'fooooooooooooooooo');

$single = new SuccessSingleResponse($foo, 'Found foo');

#var_dump($single->toArray());
echo json_encode($single->toArray(), JSON_PRETTY_PRINT);

/******************************************************************************/
echo "\n\nCollection Success\n";

$bar = new Thing('bar', 'baaaaaaaaaaaaaaar');

$collection = new SuccessCollectionResponse(
	new BasicCollection([$foo, $bar]),
	'All the things',
	'We\'re thupa thmart, we found you ALL the thingz'
);

#var_dump($collection->toArray());
echo json_encode($collection->toArray(), JSON_PRETTY_PRINT);

/******************************************************************************/
echo "\n\nCollection Success\n";

$collection = new SuccessCollectionResponse(
	new Collection(new Resultset(1,2,3,4), [$foo, $bar]),
	'All the things',
	'We\'re thupa thmart, we found you ALL the thingz'
);

#var_dump($collection->toArray());
echo json_encode($collection->toArray(), JSON_PRETTY_PRINT);
