<?php
	namespace Gravitas\Orbit\Api;

	class Query {
		public function __construct(
			protected array $query = [],
		) {}

		public function and(Expr $expr): static {
			$this->query[$expr->getKey()] = $expr->getValue();
			return $this;
		}

		public function or(Expr $expr): static {
			if (!isset($this->query['$or']))
				$this->query['$or'] = [];

			$this->query['$or'][] = [$expr->getKey() => $expr->getValue()];

			return $this;
		}

		public function build(): string {
			return json_encode($this->query);
		}
	}
