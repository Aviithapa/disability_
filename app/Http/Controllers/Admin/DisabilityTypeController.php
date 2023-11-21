<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\DisabilityType\CreateDisabilityTypeRequest;
use App\Http\Requests\DisabilityType\UpdateDisabilityTypeRequest;
use App\Models\DisabilityType;
use App\Repositories\DisabilityType\DisabilityTypeRepository;
use App\Services\Log\LogCreator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DisabilityTypeController extends BaseController
{
    private $disabilityTypeRepository;
    public function __construct(DisabilityTypeRepository $disabilityTypeRepository)
    {
        $this->disabilityTypeRepository = $disabilityTypeRepository;
    }

    public function index(Request $request)
    {
        $applicant = DisabilityType::where('type', 'nature_of_disability')->paginate(20);
        return view('admin.pages.disability-type.index', compact('applicant'));
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
                'remarks' => 'New Disability Type',
                'applicant_id' => $applicant['id']
            ];
            $logCreator->store($data);

            session()->flash('success', 'Data has been created successfully');
            return redirect()->route('disability-type.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function update(UpdateDisabilityTypeRequest $request, $id, LogCreator $logCreator)
    {
        $data = $request->all();
        try {
            $applicant = $this->disabilityTypeRepository->update($id, $data);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $data = [
                'state' => 'admin',
                'status' => 'new',
                'created_by' => Auth::user()->id,
                'remarks' => 'New Disability Type',
                'applicant_id' => $id
            ];
            $logCreator->store($data);
            session()->flash('success', 'Data has been updated successfully');
            return redirect()->route('disability-type.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function show()
    {
        return view('admin.pages.disability-type.form');
    }

    public function edit($id)
    {
        $data = $this->disabilityTypeRepository->find($id);
        return view('admin.pages.disability-type.edit', compact('data'));
    }
}
