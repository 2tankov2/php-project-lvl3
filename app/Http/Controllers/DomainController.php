<?php

namespace App\Http\Controllers;

use App\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DomainController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index($errors = null)
    {
        return view('index', ['errors' => $errors]);
    }

    public function main()
    {
        $domains = Domain::paginate(2);;

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
        $domain = Domain::updateOrCreate(['name' => $url], ['updated_at' => date("Y-m-d H:i:s")]);
        return redirect()->route('showDomain', ['id' => $domain->id]);
    }

    //
}
