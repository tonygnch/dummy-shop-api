<?php

namespace App\Adapters;

use Exception;
use GuzzleHttp\Exception\ClientException;

class Client
{
	private $client;

	public function __construct(){
		$this->client = new \GuzzleHttp\Client();
	}

	protected function makeRequest(string $method, string $type = '', array $parameters = [], ?array $auth = null)
	{
		// try {

			# Make request
			$response = $this->client->request(
				$method, 
				sprintf($this->url, $type), 
				$this->defaultFormParams($parameters, $auth)
			);
			
			# Return response
			return json_decode($response->getBody()->getContents());

		// } catch (ClientException $e) {

		// 	# Throw client request exception
		//     throw new Exception($e->getMessage());
		// }
	}

	protected function defaultFormParams($parameters, $auth)
	{
		# Default params
		$defaultParams = [
			'headers' => [
				'Accept' => 'application/json'
			]
		];

		# Set auth api key
		if($auth)
			$defaultParams = array_merge($defaultParams['headers'], $auth); # ['X-API-KEY' => config('opensea.api_key')]
		
		# Merge params
		if($parameters)
			$defaultParams = array_merge($defaultParams, ['form_params' => $parameters]);

		return  $defaultParams;
	}
}