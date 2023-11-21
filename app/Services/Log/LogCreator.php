<?php

namespace App\Services\Log;


use App\Repositories\Log\LogRepository;


class LogCreator
{
    protected $logRepository;

    public function __construct(LogRepository $logRepository)
    {
        $this->logRepository = $logRepository;
    }

    public function store($data)
    {
        return $this->logRepository->store($data);
    }
}
