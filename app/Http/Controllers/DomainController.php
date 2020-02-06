<?php

namespace App\Http\Controllers;

use App\Domain;
use Illuminate\Http\Request;

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

    public function index()
    {
        return view('index', []);
    }

    public function main()
    {
        $domains = Domain::all()->toArray();

        return view('domains', ['domains' => $domains]);
    }

    public function show($id)
    {
        return Domain::findOrFail($id);
    }

    public function store(Request $request)
    {
        //$id = $request->input('id');
        //$name = $request->input('name');
        //$allData = $request->all();
        //return redirect()->route('showDomain', ['id' => $id]);
        //return $allData;


        //$domain = new Domain;

        //$domain->name = $request->name;

        //$domain->save();

        $name = $request->input('name');
        $domain = Domain::create(['name' => $name]);
        return redirect()->route('showDomain',  ['id' => $domain->id]);
    }

    //
}
