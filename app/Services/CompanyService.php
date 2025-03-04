<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyService
{
    public function getAll(int $perPage = 10): LengthAwarePaginator
    {
        return Company::paginate($perPage);
    }

    public function create(array $data): Company
    {
        return Company::create($data);
    }

    public function find(int $id): ?Company
    {
        return Company::find($id);
    }

    public function update(Company $company, array $data): Company
    {
        $company->fill($data);
        $company->save();

        return $company;
    }

    public function delete(Company $company): bool
    {
        return $company->delete();
    }
}
