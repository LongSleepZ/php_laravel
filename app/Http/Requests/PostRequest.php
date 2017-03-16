<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        switch (strtolower($this->input('_method'))) {
            case 'patch':
                return \App\Models\post::where('id', $this->route('id'))
                        ->where('user_id', \Auth::user()->id)
                        ->exists();
            default :
                return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'title' => 'required',
            'sub_title' => 'required',
            'content' => 'required',
            'is_feature' => 'boolean',
        ];
    }

}
