<?php
	namespace Gravitas\Orbit\Api;

	class Expr {
		protected function __construct(
			protected string $key,
			protected mixed $value,
		) {}

		public static function and(Expr ...$exprs): static {
			return new static('$and', $exprs);
		}

		public static function or(Expr ...$exprs): static {
			return new static('$or', $exprs);
		}

		public static function eq(string $field, mixed $value): static {
			return new static($field, $value);
		}

		public function neq(string $field, mixed $value): static {
			return new static(
				$field,
				[
					'$neq' => $value,
				],
			);
		}

		public function in(string $field, array $values): static {
			return new static(
				$field,
				[
					'$in' => $values,
				],
			);
		}

		public function nin(string $field, array $values): static {
			return new static(
				$field,
				[
					'$nin' => $values,
				],
			);
		}

		public function gt(string $field, mixed $value): static {
			return new static(
				$field,
				[
					'$gt' => $value,
				],
			);
		}

		public function gte(string $field, mixed $value): static {
			return new static(
				$field,
				[
					'$gte' => $value,
				],
			);
		}

		public function lt(string $field, mixed $value): static {
			return new static(
				$field,
				[
					'$lt' => $value,
				],
			);
		}

		public function lte(string $field, mixed $value): static {
			return new static(
				$field,
				[
					'$lte' => $value,
				],
			);
		}

		public function like(string $field, string $pattern): static {
			return new static(
				$field,
				[
					'$like' => $pattern,
				],
			);
		}

		public function nlike(string $field, string $pattern): static {
			return new static(
				$field,
				[
					'$nlike' => $pattern,
				],
			);
		}

		public function exists(string $field, bool $check): static {
			return new static(
				$field,
				[
					'$exists' => $check,
				],
			);
		}

		public static function size(string $field, array|int $value): static {
			return new static(
				$field,
				[
					'$size' => $value,
				],
			);
		}

		public static function contains(string $field, mixed $value): static {
			return new static(
				$field,
				[
					'$contains' => $value,
				],
			);
		}

		public static function ncontains(string $field, mixed $value): static {
			return new static(
				$field,
				[
					'$ncontains' => $value,
				],
			);
		}

		public function getKey(): string {
			return $this->key;
		}

		public function getValue(): mixed {
			return $this->value;
		}
	}
