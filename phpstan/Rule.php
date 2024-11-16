<?php

use PhpParser\Node;
use PhpParser\Node\Expr\PropertyFetch;
use PhpParser\Node\Expr\Variable;
use PHPStan\Analyser\Scope;
use PHPStan\Collectors\Collector;
use PHPStan\Type\ErrorType;
use PHPStan\Type\VerbosityLevel;


/**
 * @implements Collector<Node, list<null>>
 */
class SomeCollector {
	public function getNodeType(): string
	{
		return Node::class;
	}


	/** @var list<CollectedData> */
	public function processNode(Node $node, Scope $scope): ?array
	{
		/** @var list<CollectedData> $data */
		$data = [];

		if ($node instanceof Variable || $node instanceof PropertyFetch) {
			$type = $scope->getType($node);
			if (!($type instanceof ErrorType)) {
				// Comment/uncomment the below line
				$typeDescr = $type->describe(VerbosityLevel::precise());
			}
		}

		return $data;
	}
}
