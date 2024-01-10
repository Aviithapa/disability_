<?php

namespace App\Repositories\Applicant;

use App\Models\ApplicantDetails;
use App\Models\CommunityMember;
use App\Repositories\Repository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class ApplicantRepository extends Repository
{

    /**
     * ApplicantRepository constructor.
     * @param ApplicantDetails $applicant
     */
    public function __construct(ApplicantDetails $applicantDetails)
    {
        parent::__construct($applicantDetails);
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
            ->whereNull('approved_by')
            ->filter(new ApplicantFilter($request))
            ->latest()
            ->paginate($limit);
    }


    public function getPaginatedListForPrint(Request $request, array $columns = array('*')): LengthAwarePaginator
    {
        $limit = $request->get('limit', config('app.per_page'));
        return $this->model->newQuery()
            ->where('approved_by', '!=', 'null')
            ->latest()
            ->paginate($limit);
    }

    public function getOrCreateMember($citizenship)
    {
        $existingMember = $this->model->where('citizenship', $citizenship)->first();
        return $existingMember ?? $this->model->create(['citizenship' => $citizenship]);
    }
}
