<?php

namespace App\Repositories\DisabilityType;

use App\Models\ApplicantDetails;
use App\Models\DisabilityType;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DisabilityTypeRepository extends Repository
{

    /**
     * DisabilityTypeRepository constructor.
     * @param DisabilityType $DisabilityType
     */
    public function __construct(DisabilityType $disabilityType)
    {
        parent::__construct($disabilityType);
    }

    /**
     * @param Request $request
     * @param array $columns
     * @return LengthAwarePaginator
     */
    public function getPaginatedList(Request $request, array $columns = array('*')): LengthAwarePaginator
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->latest()
            ->paginate($limit);
    }


    public function getOrCreateMember($citizenship)
    {
        $existingMember = $this->model->where('citizenship', $citizenship)->first();
        return $existingMember ?? $this->model->create(['citizenship' => $citizenship]);
    }
}
