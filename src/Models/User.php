<?php
	namespace Gravitas\Orbit\Api\Models;

	class User {
		private int $id;
		private string $firstName;
		private ?string $lastName;
		private string $emailAddress;

		/**
		 * @var string[]
		 */
		private array $permissions;

		/**
		 * @var array{id: int} $account
		 */
		private array $account;

		public function getId(): int {
			return $this->id;
		}

		public function getFirstName(): string {
			return $this->firstName;
		}

		public function getLastName(): ?string {
			return $this->lastName;
		}

		public function getEmailAddress(): string {
			return $this->emailAddress;
		}

		/**
		 * @return string[]
		 */
		public function getPermissions(): array {
			return $this->permissions;
		}

		/**
		 * @return array{id: int}
		 */
		public function getAccount(): array {
			return $this->account;
		}
	}
