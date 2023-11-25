<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommunityMember\CommunityMemberRequest;
use App\Repositories\CommunityMember\CommunityMemberRepository;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    //

    private $view_data;
    private $request, $communityMemberRepository;

    public function __construct(
        Request $request,

    ) {
        $this->request = $request;

        parent::__construct();
    }


    public function slug($slug = null)
    {
        $slug = $slug ? $slug : 'index';
        $file_path = resource_path() . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'website/pages' . DIRECTORY_SEPARATOR . $slug . '.blade.php';
        if (file_exists($file_path)) {

            return view('auth.login');
        }
        return view('website.pages.404');
    }

    public function register(CommunityMemberRequest $request)
    {
    }
}
