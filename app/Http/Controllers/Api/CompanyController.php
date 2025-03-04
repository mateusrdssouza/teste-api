<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Services\CompanyService;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function index(Request $request)
    {
        $perPage = $request->query('perPage', 10);
        $companies = $this->companyService->getAll($perPage);

        return response()->json($companies);
    }

    public function store(StoreCompanyRequest $request)
    {
        $data = $request->only(['codigo', 'empresa', 'sigla', 'razao_social']);
        $company = $this->companyService->create($data);

        return response()->json($company, 201);
    }

    public function show(string $id)
    {
        $company = $this->companyService->find($id);

        if (!$company) {
            return response()->json(['message' => 'Empresa não encontrada'], 404);
        }

        return response()->json($company);
    }

    public function update(UpdateCompanyRequest $request, string $id)
    {
        $company = $this->companyService->find($id);

        if (!$company) {
            return response()->json(['message' => 'Empresa não encontrada'], 404);
        }

        $data = $request->only(['empresa', 'sigla', 'razao_social']);
        $company = $this->companyService->update($company, $data);

        return response()->json($company);
    }

    public function destroy(string $id)
    {
        $company = $this->companyService->find($id);

        if (!$company) {
            return response()->json(['message' => 'Empresa não encontrada'], 404);
        }

        $delete = $this->companyService->delete($company);

        if (!$delete) {
            return response()->json(['message' => 'Erro ao excluir empresa'], 400);
        }

        return response()->json(['message' => 'Empresa excluída com sucesso']);
    }
}
