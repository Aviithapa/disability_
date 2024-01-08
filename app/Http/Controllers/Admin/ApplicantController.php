<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Applicant\CreateApplicantRequest;
use App\Repositories\Applicant\ApplicantRepository;
use App\Repositories\DisabilityType\DisabilityTypeRepository;
use App\Repositories\Log\LogRepository;
use App\Services\Log\LogCreator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends BaseController
{
    //
    private $applicantRepository, $disabilityTypeRepository, $logRepository, $logCreator;
    public function __construct(
        ApplicantRepository $applicantRepository,
        LogRepository $logRepository,
        DisabilityTypeRepository $disabilityTypeRepository,
        LogCreator $logCreator
    ) {
        $this->applicantRepository = $applicantRepository;
        $this->disabilityTypeRepository = $disabilityTypeRepository;
        $this->logRepository = $logRepository;
        $this->logCreator = $logCreator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $applicant = $this->applicantRepository->getPaginatedList($request);
        $disability_types = $this->disabilityTypeRepository->all()->where('type', 'nature_of_disability');
        $severity_types = $this->disabilityTypeRepository->all()->where('type', 'severity_of_disability');
        return view('admin.pages.applicant.index', compact('applicant', 'request', 'disability_types', 'severity_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.applicant.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateApplicantRequest $request)
    {
        $data = $request->all();
        $data['photo'] = $data['transcript_tslc'];
        try {
            $applicant = $this->applicantRepository->store($data);

            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $data = [
                'state' => 'admin',
                'status' => 'new',
                'created_by' => Auth::user()->id,
                'remarks' => 'New Applicant',
                'applicant_id' => $applicant['id']
            ];
            $this->logCreator->store($data);
            session()->flash('success', 'Applicant has been created successfully');
            return redirect()->route('applicant.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = $this->applicantRepository->find($id);
        $profile_logs = $this->logRepository->all()->where('applicant_id', $id);
        $disability_type = $this->disabilityTypeRepository->all()->where('type', 'nature_of_disability');
        $disability_group = $this->disabilityTypeRepository->all()->where('type', 'severity_of_disability');
        return view('admin.pages.applicant.show', compact('data', 'profile_logs', 'disability_type', 'disability_group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->applicantRepository->find($id);
        return view('admin.pages.applicant.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, LogCreator $logCreator)
    {
        $data = $request->all();
        $data['photo'] = $data['transcript_tslc'];
        try {
            $applicant = $this->applicantRepository->update($id, $data);
            if ($applicant == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $data = [
                'state' => 'admin',
                'status' => 'approved',
                'created_by' => Auth::user()->id,
                'remarks' => 'Applicant Updated Successfully',
                'applicant_id' => $id
            ];
            $logCreator->store($data);
            session()->flash('success', 'Applicant Data has been updated successfully');
            return redirect()->route('applicant.index');
        } catch (\Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //TODO: implement delete function here
    }
}
