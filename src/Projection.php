<?php
	namespace Gravitas\Orbit\Api;

	class Projection {
		public function __construct(
			protected array $fields = [],
			protected ?bool $defaultMatchBehavior = null,
			protected string $defaultMatchKey = '_default',
		) {}

		public function include(string $field): static {
			$this->fields[$field] = true;
			return $this;
		}

		public function exclude(string $field): static {
			$this->fields[$field] = false;
			return $this;
		}

		public function default(?bool $default): static {
			$this->defaultMatchBehavior = $default;
			return $this;
		}

		public function setDefaultMatchKey(string $defaultMatchKey): static {
			$this->defaultMatchKey = $defaultMatchKey;
			return $this;
		}

		public function build(): string {
			$fields = $this->fields;

			if ($this->defaultMatchBehavior !== null)
				$fields[$this->defaultMatchKey] = $this->defaultMatchBehavior;

			return json_encode($fields);
		}
	}
