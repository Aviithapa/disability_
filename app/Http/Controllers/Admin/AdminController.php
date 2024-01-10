<?php


namespace  App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\BaseController as AdminBaseController;
use App\Http\Requests\Applicant\CreateApplicantRequest;
use App\Http\Requests\Applicant\UpdateApplicantRequest;
use App\Modules\Framework\Request;
use App\Repositories\Applicant\ApplicantRepository;
use App\Repositories\DisabilityType\DisabilityTypeRepository as DisabilityTypeDisabilityTypeRepository;
use App\Repositories\Log\LogRepository;
use Carbon\Carbon;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Pratiksh\Nepalidate\Facades\NepaliDate;

class AdminController extends AdminBaseController
{
    private $applicantController, $logRepository, $disabilityTypeRepository;
    public function __construct(ApplicantRepository $applicantController, LogRepository $logRepository, DisabilityTypeDisabilityTypeRepository $disabilityTypeRepository)
    {
        $this->applicantController = $applicantController;
        $this->logRepository = $logRepository;
        $this->disabilityTypeRepository = $disabilityTypeRepository;
    }

    public function updateAdmin(UpdateApplicantRequest $request, $id)
    {
        $data = $request->all();
        $data['status'] = 'approved';
        $data['approved_by'] = Auth::user()->id;
        $data['approved_date'] = NepaliDate::create(\Carbon\Carbon::now())->toBS();;
        try {
            $applicant = $this->applicantController->update($id, $data);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $this->logs('all_approved', 'approved', $id, 'Disability Type Allocated');
            session()->flash('success', 'Data has been updated successfully');
            return redirect()->route('applicant.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function state(HttpRequest $request, $id)
    {
        $data = $request->all();
        try {
            $applicant = $this->applicantController->update($id, $data);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            if ($data['status'] === 'rejected')
                $this->logs('ward', 'rejected', $id, $data['remarks']);
            else
                $this->logs('all_approved', 'admin_approved', $id, 'Application ready for decision');
            session()->flash('success', 'Data has been updated successfully');
            return redirect()->route('applicantData');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function logs($state, $status, $applicantId, $remarks)
    {
        $data['state'] = $state;
        $data['status'] = $status;
        $data['created_by'] = Auth::user()->id;
        $data['remarks'] = $remarks;
        $data['applicant_id'] = $applicantId;

        try {
            $logs = $this->logRepository->store($data);
            if ($logs == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            return;
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }




    public function generateCardNumber($id)
    {
        $applicant =  $this->applicantController->find($id);
        $data['IdNumber'] = $this->generateNumber($id, $applicant->disability_type);
        try {
            $applicant = $this->applicantController->update($data, $id);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            session()->flash('success', 'Id card number has been generated successfully');
            return redirect()->route('applicantData');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function generateNumber($id, $type)
    {
        $now = Carbon::now();
        $year = $now->year;
        $year = substr($year, -2);
        $num = $year . $type . str_pad($id, 5, "0", STR_PAD_LEFT);
        return $num;
    }
}
