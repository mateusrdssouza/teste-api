<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyService
{
    public function getAll(int $perPage = 10, string $pagination = 'true'): LengthAwarePaginator|Collection
    {
        $pagination = filter_var($pagination, FILTER_VALIDATE_BOOLEAN);

        if ($pagination) {
            return Company::paginate($perPage);
        } else {
            return Company::all();
        }
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
