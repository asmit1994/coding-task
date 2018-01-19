<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public $client;

    public function __construct(ClientService $client)
    {
        $this->client = $client;
    }

    /**
     * @return $this
     */
    public function index()
    {
        $clients = $this->client->all();
        //dd($clients);
        return view('clients.index',compact('clients'))->with('i',1);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * @param ClientRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ClientRequest $request)
    {
        $this->client->create($request);

        return redirect(route('clients.index'))->with('status','Client Record Created Successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $client = $this->client->find($id);

        return view('clients.show',compact('client'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $client = $this->client->find($id);

        return view('clients.edit', compact('client','id'));
    }

    /**
     * @param ClientRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ClientRequest  $request, $id)
    {
        $this->client->update($request,$id);

        return redirect(route('clients.index'))->with('status','Client Record Updated Successfully');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function confirm($id)
    {
        $client = $this->client->find($id);

        return view('clients.confirm',compact('client','id'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $this->client->delete($id);

        return redirect(route('clients.index'))->with('status','Client Deleted Successfully');
    }
}