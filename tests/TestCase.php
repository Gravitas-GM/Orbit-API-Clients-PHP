<?php
	namespace Tests;

	use PHPUnit\Framework\TestCase as Base;

	abstract class TestCase extends Base {
		protected function assertEncodedJsonEqualsJsonString(
			mixed $expected,
			string $actual,
			string $message = '',
		): void {
			$this->assertJsonStringEqualsJsonString(json_encode($expected), $actual, $message);
		}
	}
