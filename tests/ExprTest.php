<?php
	namespace Tests;

	use Gravitas\Orbit\Api\Expr;
	use PHPUnit\Framework\TestCase;

	class ExprTest extends TestCase {
		public function testAnd() {
			$expr = Expr::and(
				Expr::eq('a', 1),
				Expr::eq('b', 2),
			);

			$this->assertEquals(['$and' => ['a' => 1, 'b' => 2]], $expr->build());
		}

		public function testOr() {
			$expr = Expr::or(
				Expr::eq('a', 1),
				Expr::eq('b', 2),
			);

			$this->assertEquals(['$or' => [['a' => 1], ['b' => 2]]], $expr->build());
		}

		public function testEq() {
			$this->assertEquals(['a' => 1], Expr::eq('a', 1)->build());
		}

		public function testNeq() {
			$this->assertEquals(['a' => ['$neq' => 1]], Expr::neq('a', 1)->build());
		}

		public function testIn() {
			$this->assertEquals(['a' => ['$in' => [1, 2, 3]]], Expr::in('a', [1, 2, 3])->build());
		}

		public function testNin() {
			$this->assertEquals(['a' => ['$nin' => [1, 2, 3]]], Expr::nin('a', [1, 2, 3])->build());
		}

		public function testGt() {
			$this->assertEquals(['a' => ['$gt' => 1]], Expr::gt('a', 1)->build());
		}

		public function testGte() {
			$this->assertEquals(['a' => ['$gte' => 1]], Expr::gte('a', 1)->build());
		}

		public function testLt() {
			$this->assertEquals(['a' => ['$lt' => 1]], Expr::lt('a', 1)->build());
		}

		public function testLte() {
			$this->assertEquals(['a' => ['$lte' => 1]], Expr::lte('a', 1)->build());
		}

		public function testLike() {
			$this->assertEquals(['a' => ['$like' => 'abc%']], Expr::like('a', 'abc%')->build());
		}

		public function testNlike() {
			$this->assertEquals(['a' => ['$nlike' => 'abc%']], Expr::nlike('a', 'abc%')->build());
		}

		public function testExists() {
			$this->assertEquals(['a' => ['$exists' => true]], Expr::exists('a', true)->build());
			$this->assertEquals(['a' => ['$exists' => false]], Expr::exists('a', false)->build());
		}

		public function testSize() {
			$this->assertEquals(['a' => ['$size' => 1]], Expr::size('a', 1)->build());
			$this->assertEquals(['a' => ['$size' => ['$gt' => 1]]], Expr::size('a', ['$gt' => 1])->build());
		}

		public function testContains() {
			$this->assertEquals(['a' => ['$contains' => 1]], Expr::contains('a', 1)->build());
		}

		public function testNcontains() {
			$this->assertEquals(['a' => ['$ncontains' => 1]], Expr::ncontains('a', 1)->build());
		}
	}
