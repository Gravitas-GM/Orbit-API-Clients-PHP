<?php
	namespace Tests;

	use Gravitas\Orbit\Api\Expr;
	use Gravitas\Orbit\Api\Query;

	class QueryTest extends TestCase {
		public function testAnd() {
			$query = (new Query())
				->and(Expr::eq('a', 1))
				->and(Expr::eq('b', 2));

			$this->assertEncodedJsonEqualsJsonString(['a' => 1, 'b' => 2], $query->build());
		}

		public function testOr() {
			$query = (new Query())
				->or(Expr::eq('a', 1))
				->or(Expr::eq('b', 2));

			$this->assertEncodedJsonEqualsJsonString(['$or' => [['a' => 1], ['b' => 2]]], $query->build());
		}
	}
