<?php

namespace App\Http\Controllers;

use App\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use GuzzleHttp\Client;

class DomainController extends Controller
{
    protected $client;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function index($errors = null)
    {
        return view('index', ['errors' => $errors]);
    }

    public function showAll()
    {
        $domains = Domain::paginate(4);

        return view('domains', ['domains' => $domains]);
    }

    public function show($id)
    {
        $dataDomain = Domain::findOrFail($id);
        return view('showDomain', ['domain' => $dataDomain]);
    }

    public function store(Request $request)
    {
        $errors = null;
        $validator = Validator::make($request->all(), ['name' => 'required|active_url']);
        if ($validator->fails()) {
            $errors = $validator->errors()->get('name');
            return self::index($errors);
        }

        $url = $request->input('name');

        $response = $this->client->request('GET', $url);

        $statusCode = $response->getStatusCode();
        $body = $response->getBody()->getContents();
        $contentLength = $response->getHeader('Content-Length')[0] ?? strlen($body);
        $domain = Domain::updateOrCreate(
            ['name' => $url],
            ['updated_at' => date("Y-m-d H:i:s"),
            'content_length' => $contentLength,
            'status_code' => $statusCode,
            'body' => $body]
        );
        return redirect()->route('showDomain', ['id' => $domain->id]);
    }

    //
}
