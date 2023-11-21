<?php

namespace App\Repositories\Log;

use App\Models\ApplicantLogs;
use App\Models\LogDetails;
use App\Repositories\Repository;
use Google\Service\Logging\Resource\Logs;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Log;

class LogRepository extends Repository
{

    /**
     * LogRepository constructor.
     * @param Log $Log
     */
    public function __construct(ApplicantLogs $log)
    {
        parent::__construct($log);
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
