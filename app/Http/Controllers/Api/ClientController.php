<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 10);
        $companies = $this->clientService->getAll($perPage);

        return response()->json($companies);
    }

    public function store(StoreClientRequest $request)
    {
        $data = $request->only(['empresa', 'codigo', 'razao_social', 'tipo', 'cpf_cnpj']);
        $client = $this->clientService->create($data);

        return response()->json($client, 201);
    }
}
