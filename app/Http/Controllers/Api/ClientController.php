<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
}
