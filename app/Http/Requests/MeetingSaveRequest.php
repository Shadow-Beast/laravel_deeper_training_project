<?php

namespace App\Http\Requests;

use App\Models\Meeting;
use Illuminate\Foundation\Http\FormRequest;

class MeetingSaveRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->id) {
            return Meeting::ownMeeting()->where('id', $this->id)->exists();
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => ['nullable'],
            'title' => ['required'],
            'description' => ['required'],
            'start_at' => ['required'],
            'duration' => ['required'],
            'url' => ['required'],
            'is_published' => ['nullable', 'boolean'],
            'meeting_id' => ['nullable'],
            'meeting_password' => ['nullable'],
            'meeting_type_id' => ['required', 'exists:meeting_types,id'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,gif,svg'],
        ];
    }
}
