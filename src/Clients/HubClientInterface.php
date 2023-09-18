<?php
	namespace Gravitas\Orbit\Api\Clients;

	use Gravitas\Orbit\Api\Models\Account;
	use Gravitas\Orbit\Api\Models\User;
	use Gravitas\Orbit\Api\Projection;
	use Gravitas\Orbit\Api\Query;
	use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
	use Symfony\Contracts\HttpClient\Exception\HttpExceptionInterface;

	interface HubClientInterface {
		/**
		 * @param Projection|null $projection
		 * @param Query|null      $query
		 *
		 * @return Account[]
		 *
		 * @throws ExceptionInterface if the response could not be deserialized
		 * @throws HttpExceptionInterface if the request could not be completed
		 */
		public function accounts(Projection $projection = null, Query $query = null): array;

		/**
		 * @param Projection|null $projection
		 * @param Query|null      $query
		 *
		 * @return User[]
		 *
		 * @throws ExceptionInterface if the response could not be deserialized
		 * @throws HttpExceptionInterface if the request could not be completed
		 */
		public function users(Projection $projection = null, Query $query = null): array;
	}
