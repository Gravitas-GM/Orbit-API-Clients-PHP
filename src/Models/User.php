<?php
	namespace Gravitas\Orbit\Api\Models;

	class User {
		public int $id;
		public string $firstName;
		public ?string $lastName;

		/**
		 * @var string[]
		 */
		public array $permissions;

		/**
		 * @var array{id: int}
		 */
		public array $account;
	}
