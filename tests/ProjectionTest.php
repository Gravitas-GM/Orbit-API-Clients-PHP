<?php
	namespace Tests;

	use Gravitas\Orbit\Api\Projection;

	class ProjectionTest extends TestCase {
		public function testInclude() {
			$projection = (new Projection())
				->include('a')
				->include('a.b');

			$this->assertEncodedJsonEqualsJsonString(['a' => true, 'a.b' => true], $projection->build());
		}

		public function testExclude() {
			$projection = (new Projection())
				->exclude('a')
				->exclude('a.b');

			$this->assertEncodedJsonEqualsJsonString(['a' => false, 'a.b' => false], $projection->build());
		}

		public function testMixed() {
			$projection = (new Projection())
				->include('a')
				->exclude('b');

			$this->assertEncodedJsonEqualsJsonString(['a' => true, 'b' => false], $projection->build());
		}

		public function testDefaultBehavior() {
			$projection = (new Projection())
				->default(false)
				->include('a');

			$this->assertEncodedJsonEqualsJsonString(['_default' => false, 'a' => true], $projection->build());
		}

		public function testDefaultKey() {
			$projection = (new Projection())
				->default(true)
				->setDefaultMatchKey('_match')
				->exclude('b');

			$this->assertEncodedJsonEqualsJsonString(['_match' => true, 'b' => false], $projection->build());
		}
	}
