<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class postFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [ 
            // 'sub_category_id' => [  
            //     'required',
            //     'integer',
            // ],
            'category_id' => [  
                'nullable',
                'integer',
            ], 
            'sub_category_id' => [  
                'required',
                'integer',
            ],
            'title' => [
                'required',
                'string',
                'max:255'            
            ],
            'target' => [
                'required',
                'string',
                'max:255'            
            ],
            'reason' => [
                'nullable',
                'string',
                'max:255'            
            ],
            'city' => [
                'required',
                'string', 
            ],
            'slug' => [  
                'string',
            ],
            'description' => [
                'required',
                'string',   
            ], 
            'bedroom' => [  
                'nullable',
                'integer',
            ],
            'rooms' => [  
                'nullable',
                'integer',
            ],
            'bathrooms' => [  
                'nullable',
                'integer',
            ], 
            'phone' => [   
                'string', 
                'max:15'
            ],
            'publish' => [   
                'string', 
                'required', 
            ],
            'address' => [  
                'required',
                'string',
                'max:255',
            ],
            'meta_title' => [
                'nullable',  
                'string',
            ], 
            'meta_keyword' => [
                'nullable', 
                'string',
            ], 
            'currency' => [
                'required', 
                'string',
            ], 
            'money' => [
                'required', 
                'integer',
            ],
            'area' => [
                'nullable', 
                'string',
            ],
            'meta_description' => [     
                'nullable',
                'string',
            ],    
            'pictures' => [  
                'nullable',  
            ],  
            'user_id' =>[  
                'integer',
            ],
            'admin_id' =>[  
                'integer',
            ]
            
        ];
    }
}
