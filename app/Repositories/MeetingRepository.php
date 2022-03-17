<?php

namespace App\Repositories;

use App\Enums\Meeting as EnumsMeeting;
use App\Enums\MeetingType as EnumsMeetingType;
use App\Enums\Paginator;
use App\Models\Category;
use App\Models\Meeting;
use App\Models\MeetingType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Throwable;

class MeetingRepository
{
    public function getAll()
    {
        $meetings = Meeting::with([
            'user.image',
            'meetingType',
            'category',
            'image',
        ])
            ->filter(request([
                'search',
            ]))
            ->sort(empty(request('sort')) ? 'created_at' : request('sort'))
            ->published()
            ->paginate(Paginator::LIMIT)
            ->withQueryString();

        $meetings->map(function ($meeting) {
            if (optional($meeting->image)->url == null) {
                if ($meeting->meeting_type_id == EnumsMeetingType::ZOOM) {
                    $meeting->image_url = asset('images/defaults/zoom.jpg');
                } elseif ($meeting->meeting_type_id == EnumsMeetingType::GOOGLE_MEETING) {
                    $meeting->image_url = asset('images/defaults/google_meet.jpg');
                }
            } else {
                $meeting->image_url = $meeting->image->url;
            }
            $meeting->description = nl2br($meeting->description);
            return $meeting;
        });

        $allMeetings = Meeting::with([
            'user.image',
            'meetingType',
            'category',
            'image',
        ])->get();
        $allMeetings->map(function ($meeting) {
            if (optional($meeting->image)->url == null) {
                if ($meeting->meeting_type_id == EnumsMeetingType::ZOOM) {
                    $meeting->image_url = asset('images/defaults/zoom.jpg');
                } elseif ($meeting->meeting_type_id == EnumsMeetingType::GOOGLE_MEETING) {
                    $meeting->image_url = asset('images/defaults/google_meet.jpg');
                }
            } else {
                $meeting->image_url = $meeting->image->url;
            }
            return $meeting;
        });

        $categories = Category::all();
        $meetingTypes = MeetingType::all();

        return compact(
            'meetings',
            'allMeetings',
            'categories',
            'meetingTypes',
        );
    }

    public function save($request)
    {
        try {
            DB::beginTransaction();

            $meetingParam = [
                'id' => $request->id,
                'title' => $request->title,
                'description' => $request->description,
                'start_at' => $request->start_at,
                'duration' => $request->duration,
                'url' => $request->url,
                'is_published' => $request->filled('is_published') ? EnumsMeeting::PUBLISH : EnumsMeeting::UNPUBLISH,
                'meeting_id' => $request->meeting_id,
                'meeting_password' => $request->meeting_password,
                'meeting_type_id' => $request->meeting_type_id,
                'category_id' => $request->category_id,
                'user_id' => auth()->id(),
            ];
            $meeting = Meeting::firstOrNew(
                [
                    'id' => $request->id,
                ],
                $meetingParam
            );
            if ($meeting->id) {
                $meeting->fill($meetingParam);
            }
            $meeting->save();

            DB::commit();

            session()->flash('success', 'Meeting Saved Successfully.');
        } catch (Throwable $th) {
            Log::error(__CLASS__ . '::' . __FUNCTION__ . '[line: ' . __LINE__ . '][Meetin Saving failed] Message: ' . $th->getMessage());
            DB::rollBack();

            session()->flash('fail', 'Meeting Saving Failed.');
        }
    }

    public function destroy($id)
    {
        $meeting = Meeting::findOrFail($id);
        abort_unless($meeting->isOwnMeeting(), 403);

        $meeting->delete();

        session()->flash('success', 'Delete Successful');
    }
}
