<?php
	namespace Gravitas\Orbit\Api;

	class Projection {
		public function __construct(
			protected array $fields = [],
			protected ?bool $defaultMatchBehavior = null,
		) {}

		public function include(string $field): static {
			$this->fields[$field] = true;
			return $this;
		}

		public function exclude(string $field): static {
			$this->fields[$field] = false;
			return $this;
		}

		public function build(): string {
			$fields = $this->fields;

			if ($this->defaultMatchBehavior !== null)
				$fields['_default'] = $this->defaultMatchBehavior;

			return json_encode($fields);
		}
	}
