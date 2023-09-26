<?php
	namespace Gravitas\Orbit\Api\Models;

	class User {
		public function __construct(
			public readonly int $id,
			public readonly string $firstName,
			public readonly ?string $lastName,

			/**
			 * @var string[]
			 */
			public readonly array $permissions,

			/**
			 * @var array{id: int}
			 */
			public readonly array $account,
		) {}
	}
