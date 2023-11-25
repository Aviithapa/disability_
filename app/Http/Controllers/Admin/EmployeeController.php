<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Employee\CreateEmployeeRequest;
use App\Repositories\Employee\EmployeeRepository;
use App\Repositories\Log\LogRepository;
use App\Services\Log\LogCreator;
use Illuminate\Http\Request;

class EmployeeController extends BaseController
{

    private $employeeRepository, $logRepository, $logCreator;
    public function __construct(
        EmployeeRepository $employeeRepository,
        LogRepository $logRepository,
        LogCreator $logCreator
    ) {
        $this->employeeRepository = $employeeRepository;
        $this->logRepository = $logRepository;
        $this->logCreator = $logCreator;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $employees = $this->employeeRepository->getPaginatedList($request);
        return view('admin.pages.employee.index', compact('employees', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.pages.employee.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEmployeeRequest $request)
    {
        $data = $request->all();
        try {
            $employee = $this->employeeRepository->store($data);
            if ($employee == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Employee has been created successfully');
            return redirect()->route('employee.index');
        } catch (\Exception $e) {
            dd($e);
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $employee = $this->employeeRepository->find($id);
        return view('admin.pages.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $employee = $this->employeeRepository->find($id);
        return view('admin.pages.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        try {
            $employee = $this->employeeRepository->update($id, $data);
            if ($employee == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }

            session()->flash('success', 'Employee has been updated successfully');
            return redirect()->route('employee.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //TODO: implement delete function here
    }
}
