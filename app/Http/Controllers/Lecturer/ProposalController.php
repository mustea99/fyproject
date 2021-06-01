<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\ProjectChapter;
use App\Models\Proposal;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProposalController extends Controller
{

    public function index()
    {
        $proposal = Proposal::query()
            ->select('proposals.*', 'students.First_name', 'students.Other_names')
            ->join('students', 'students.id', 'proposals.student')
            ->where('students.Supervisor_id', auth::guard('lecturer')->user()->id)
            ->get();
        // @dd( $proposal);

        return view('lecturer.manage_proposal', ['proposals' => $proposal]);
    }

    /**
     * View proposal information
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function viewProposal(Request $request)
    {
        $chapters = ProjectChapter::query()
            ->where('proposal', $request['id'])
            ->get();

        return view('lecturer.view_proposal', [
            'proposal' => Proposal::query()->find($request['id']),
            'chapters' => $chapters,
        ]);
    }

    /**
     * Change proposal status
     *
     * @param int $proposalId
     * @param int $status
     * @return RedirectResponse
     */
    protected function changeStatus(int $proposalId, int $status): RedirectResponse
    {
        $proposal = Proposal::query()->find($proposalId);
        if ($proposalId){
            $proposal->update([
                'status' => $status
            ]);
        }

        return redirect()->route('lecturer.proposal.view', $proposalId);
    }

    /**
     * Accept proposal
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function accept(Request $request): RedirectResponse
    {
        return $this->changeStatus($request['id'], 1);
    }

    /**
     * Reject proposal
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function reject(Request $request): RedirectResponse
    {
        return $this->changeStatus($request['id'], 2);
    }
}
