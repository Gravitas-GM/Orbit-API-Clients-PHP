<?php
	namespace Gravitas\Orbit\Api\Clients;

	use Gravitas\Orbit\Api\Projection;
	use Gravitas\Orbit\Api\Query;
	use Symfony\Component\Serializer\Serializer;
	use Symfony\Contracts\HttpClient\Exception\ExceptionInterface;
	use Symfony\Contracts\HttpClient\HttpClientInterface;
	use Symfony\Contracts\HttpClient\ResponseInterface;

	abstract class AbstractClient {
		protected const METHOD_GET = 'GET';

		public function __construct(
			protected HttpClientInterface $client,
			protected Serializer $serializer,
			protected string $responseFormat = 'json',
		) {}

		/**
		 * @template T of object
		 *
		 * @param class-string<T>   $class
		 * @param ResponseInterface $response
		 *
		 * @return T&object
		 * @throws ExceptionInterface {@see ResponseInterface::getContent()}
		 */
		protected function deserialize(string $class, ResponseInterface $response): object {
			return $this->serializer->deserialize($response->getContent(), $class, $this->responseFormat);
		}

		protected function buildOptions(?Projection $projection = null, ?Query $query = null): array {
			$options = ['query' => []];

			if ($projection)
				$options['query']['p'] = $projection->build();

			if ($query)
				$options['query']['q'] = $query->build();

			return $options;
		}
	}
