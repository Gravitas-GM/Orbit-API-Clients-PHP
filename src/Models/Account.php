<?php
	namespace Gravitas\Orbit\Api\Models;

	class Account {
		public int $id;
		public string $name;

		// TODO Replace `int` with `DayOfWeek` from `gravitas/contracts` /tyler
		public int $weekStart;
	}
