<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
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

    public function show(string $id)
    {
        $client = $this->clientService->find($id);

        if (!$client) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }

        return response()->json($client);
    }

    public function update(UpdateClientRequest $request, string $id)
    {
        $client = $this->clientService->find($id);

        if (!$client) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }

        $data = $request->only(['empresa', 'razao_social', 'tipo', 'cpf_cnpj']);
        $client = $this->clientService->update($client, $data);

        return response()->json($client);
    }

    public function destroy(string $id)
    {
        $client = $this->clientService->find($id);

        if (!$client) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }

        $delete = $this->clientService->delete($client);

        if (!$delete) {
            return response()->json(['message' => 'Erro ao excluir cliente'], 400);
        }

        return response()->json(['message' => 'Cliente excluído com sucesso']);
    }
}
