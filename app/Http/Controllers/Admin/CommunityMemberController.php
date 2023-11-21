<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CommunityMember\CommunityMemberRequest;
use App\Repositories\CommunityMember\CommunityMemberRepository;
use Illuminate\Http\Request;

class CommunityMemberController extends Controller
{

    protected $communityMemberRepository;

    public function __construct(CommunityMemberRepository $communityMemberRepository)
    {
        $this->communityMemberRepository = $communityMemberRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $members = $this->communityMemberRepository->getPaginatedList($request);
        return view('admin.pages.community-member.index', compact('members', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommunityMemberRequest $request)
    {
        //
        $data = $request->all();

        $member = $this->communityMemberRepository->all()->where('citizenship', $data['citizenship'])->first();

        if ($member) {
            return redirect()->back()->withErrors([
                'already' => 'You have been already registered'
            ]);
        } else {
            $member = $this->communityMemberRepository->store($data);

            if ($data['marital_status'] === 'married' && $request->has('spouse_citizenship')) {
                $spouse = $this->communityMemberRepository->getOrCreateMember($request->input('spouse_citizenship'));
                $member->spouse()->associate($spouse);
                $member->save();
            }

            // If the mother is provided, link the mother
            if ($request->has('mother_citizenship')) {
                $mother = $this->communityMemberRepository->getOrCreateMember($request->input('mother_citizenship'));
                $member->mother()->associate($mother);
                $member->save();
            }

            // If the father is provided, link the father
            if ($request->has('parent_citizenship')) {
                $father = $this->communityMemberRepository->getOrCreateMember($request->input('parent_citizenship'));
                $member->father()->associate($father);
                $member->save();
            }
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
