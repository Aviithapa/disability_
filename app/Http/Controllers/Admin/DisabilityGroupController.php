<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\DisabilityType\CreateDisabilityTypeRequest;
use App\Http\Requests\DisabilityType\UpdateDisabilityTypeRequest;
use App\Models\DisabilityType;
use App\Repositories\DisabilityType\DisabilityTypeRepository;
use App\Repositories\Log\LogRepository;
use App\Services\Log\LogCreator;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;

class DisabilityGroupController extends BaseController
{
    private $disabilityTypeRepository, $logRepository;
    public function __construct(DisabilityTypeRepository $disabilityTypeRepository, LogRepository $logRepository)
    {
        $this->disabilityTypeRepository = $disabilityTypeRepository;
        $this->logRepository = $logRepository;
    }

    public function index(HttpRequest $request)
    {

        $applicant = DisabilityType::where('type', 'severity_of_disability')->paginate(20);
        return view('admin.pages.disability-group.index', compact('applicant'));
    }


    public function store(CreateDisabilityTypeRequest $request, LogCreator $logCreator)
    {
        $data = $request->all();
        try {
            $applicant = $this->disabilityTypeRepository->store($data);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $data = [
                'state' => 'admin',
                'status' => 'new',
                'created_by' => Auth::user()->id,
                'remarks' => 'New Disability Group',
                'applicant_id' => $applicant['id']
            ];
            $logCreator->store($data);
            session()->flash('success', 'Data has been created successfully');
            return redirect()->route('disability-group.index');
        } catch (\Exception $e) {
            dd($e);
            session()->flash('danger', 'Oops! Something went wrong.' . $e);
            return redirect()->back()->withInput();
        }
    }

    public function update(UpdateDisabilityTypeRequest $request, $id, LogCreator $logCreator)
    {
        $data = $request->all();
        try {
            $applicant = $this->disabilityTypeRepository->update($data, $id);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $data = [
                'state' => 'admin',
                'status' => 'updated',
                'created_by' => Auth::user()->id,
                'remarks' => 'Disability Group Updated Successfully',
                'applicant_id' => $id
            ];
            $logCreator->store($data);
            session()->flash('success', 'Data has been updated successfully');
            return redirect()->route('disability-group.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function show()
    {
        return view('admin.pages.disability-group.form');
    }

    public function edit($id)
    {
        $data = $this->disabilityTypeRepository->find($id);
        return view('admin.pages.disability-group.edit', compact('data'));
    }
}
