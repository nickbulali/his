<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Util\Post;

class ApiController extends Controller
{
    public function index()
    {
    	$client = new Client();
    	$response = $client->request('GET', 'https://jsonplaceholder.typicode.com/todos/1');
    	$statusCode = $response->getStatusCode();
    	$body = $response->getBody()->getContents();

    	return $body;
    }

    protected $post;

    public function __construct(Post $post)
    {
    	$this->post = $post;
    }

    public function index()
    {
    	// Get all the post
    	$posts = $this->post->all();

    	return view('someview', compact('posts'));
    }

    public function show($id)
    {
    	$post = $this->post->findById($id);

    	return view('someview', compact('post'));
    }
}
