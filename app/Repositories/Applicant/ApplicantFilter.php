<?php

namespace App\Repositories\Applicant;

use App\Infrastructure\Filters\BaseFilter;

class ApplicantFilter extends BaseFilter
{
    /**
     * Filter is allowed with following parameters.
     *
     * @var array
     */
    protected $filters = ['full_name', 'type', 'status'];


    /**
     * keyword
     *
     * @return void
     */
    public function fullName()
    {
        if ($this->request->has('full_name')) {
            $this->builder->where('full_name', 'LIKE', '%' . $this->request->get('full_name') . '%');
        }
    }


    public function type()
    {
        if ($this->request->has('type')) {
            $this->builder->where('type', $this->request->get('type'));
        }
    }

    public function status()
    {
        if ($this->request->has('status')) {
            $this->builder->where('status', $this->request->get('status'));
        }
    }
}
