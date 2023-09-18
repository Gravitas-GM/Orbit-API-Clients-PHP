<?php
	namespace Gravitas\Orbit\Api\Models;

	class Account {
		private int $id;
		private string $name;

		// TODO Replace `int` with DayOfWeek enum from contracts library
		private int $weekStart;

		public function getId(): int {
			return $this->id;
		}

		public function getName(): string {
			return $this->name;
		}

		public function getWeekStart(): int {
			return $this->weekStart;
		}
	}
