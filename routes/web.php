

<?php
use GuzzleHttp\Client;

Route::get('/json-api', function() {
	$client = new Client();

	$response = $client->request('GET', 'https://desertebs.com/api/dummy/posts');
	$statusCode = $response->getStatusCode();
	$body = $response->getBody()->getContents();

	return $body;


});

Route::get('json-api', 'ApiController@index');