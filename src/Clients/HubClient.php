<?php
	namespace Gravitas\Orbit\Api\Clients;

	use Gravitas\Orbit\Api\Models\Account;
	use Gravitas\Orbit\Api\Models\User;
	use Gravitas\Orbit\Api\Projection;
	use Gravitas\Orbit\Api\Query;
	use Symfony\Component\Serializer\Serializer;
	use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
	use Symfony\Contracts\HttpClient\HttpClientInterface;

	class HubClient extends AbstractClient {
		public function __construct(
			HttpClientInterface $orbitHubClient,
			Serializer $serializer,
		) {
			parent::__construct($orbitHubClient, $serializer);
		}

		/**
		 * @param Projection|null $projection
		 * @param Query|null      $query
		 *
		 * @return Account[]
		 * @throws ExceptionInterface {@see static::deserialize()}
		 */
		public function accounts(Projection $projection = null, Query $query = null): array {
			$request = $this->client->request(
				static::METHOD_GET,
				'/accounts',
				$this->buildOptions($projection, $query),
			);

			return $this->deserialize(Account::class, $request);
		}

		/**
		 * @param Projection|null $projection
		 * @param Query|null      $query
		 *
		 * @return User[]
		 * @throws ExceptionInterface {@see static::deserialize()}
		 */
		public function users(Projection $projection = null, Query $query = null): array {
			$request = $this->client->request(
				static::METHOD_GET,
				'/users',
				$this->buildOptions($projection, $query),
			);

			return $this->deserialize(User::class, $request);
		}

		protected function buildOptions(?Projection $projection = null, ?Query $query = null): array {
			$options = ['query' => []];

			if ($projection)
				$options['query']['p'] = $query->build();

			if ($query)
				$options['query']['q'] = $query->build();

			return $options;
		}
	}
