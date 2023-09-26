<?php
	namespace Gravitas\Orbit\Api\Models;

	class Account {
		public function __construct(
			public readonly int $id,
			public readonly string $name,

			// TODO Replace `int` with `DayOfWeek` from `gravitas/contracts` /tyler
			public readonly int $weekStart,
		) {}
	}
