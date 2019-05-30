<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules =[];
        if($this->avatars){

            $nbr = count($this->avatars);
            // dd($this->avatars[0]->getClientMimeType());
            foreach(range(0, $nbr) as $index) {
                $rules['avatars.' . $index] = 'mimeTypes:image/svg,image/svg+xml';
            }
        }
        
        
        return $rules;
    }
}
