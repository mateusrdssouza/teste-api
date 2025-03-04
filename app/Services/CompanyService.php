<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyService
{
    public function getAll(int $perPage = 10): LengthAwarePaginator
    {
        return Company::paginate($perPage);
    }
}
