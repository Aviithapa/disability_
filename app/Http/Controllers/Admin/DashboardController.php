<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DisabilityType;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    protected $userRepository;

    public function __construct(
        UserRepository $userRepository,

    ) {
        $this->userRepository = $userRepository;
    }


    public function index()
    {
        $role = Auth::user() ? Auth::user()->role : 'default';
        switch ($role) {
            case 'admin':
                $countsByCategory = DisabilityType::withCount(['applicantDetails'])->where('type', 'severity_of_disability')->get();
                $natureOfDisability = DisabilityType::withCount(['applicantDetailsBasedOnNatureOfDisability'])->where('type', 'nature_of_disability')->get();
                return view('admin.dashboard.admin', compact('countsByCategory', 'natureOfDisability'));
                break;
            case 'user':
                $countsByCategory = DisabilityType::withCount(['applicantDetails'])->where('type', 'severity_of_disability')->get();
                $natureOfDisability = DisabilityType::withCount(['applicantDetailsBasedOnNatureOfDisability'])->where('type', 'nature_of_disability')->get();
                return view('admin.dashboard.admin', compact('countsByCategory', 'natureOfDisability'));
                break;


            default:
                return $this->view('dashboard.default');
                break;
        }
    }
}
