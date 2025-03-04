<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Pagination\LengthAwarePaginator;

class ClientService
{
    public function getAll(int $perPage = 10): LengthAwarePaginator
    {
        return Client::paginate($perPage);
    }

    public function create(array $data): Client
    {
        return Client::create($data);
    }

    public function find(int $id): ?Client
    {
        return Client::find($id);
    }

    public function update(Client $client, array $data): Client
    {
        $client->fill($data);
        $client->save();

        return $client;
    }

    public function delete(Client $client): bool
    {
        return $client->delete();
    }
}
