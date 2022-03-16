<?php

namespace App\Http\Controllers;

use App\Http\Requests\MeetingSaveRequest;
use Illuminate\Http\Request;
use App\Repositories\MeetingRepository;

class MeetingController extends Controller
{
    protected $meetingRepository;

    public function __construct(MeetingRepository $meetingRepository)
    {
        $this->meetingRepository = $meetingRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() {
        $data = $this->meetingRepository->getAll();
        
        return view('home', $data);
    }

    /**
     * Save the resource.
     *
     * @param MeetingSaveRequest $request
     * @return \Illuminate\View\View
     */
    public function save(MeetingSaveRequest $request) {
        $this->meetingRepository->save($request);
        
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function destroy($id) {
        $data = $this->meetingRepository->destroy($id);
        
        return back();
    }
}
