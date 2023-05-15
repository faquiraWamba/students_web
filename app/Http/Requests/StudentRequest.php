<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name'=>['required','min:2', 'max:255'],
            // 'level'=>['required'],
            'user_id'=>['required','integer'],
            'last_name'=>'required|min:2|max:255',
            'gender'=>['required',Rule::in(['F', 'M']),],
            'picture'=>['image'],
            'school_year'=>['required','integer', 'max:'.(date('Y')+1),'min:'.date('Y')]
        ];
        
    }
    // public function messages() :array{
    //     return [
    //       'name.required' => 'Le nom est obligatoire',
    //       'last_name.required' => 'Le prenom est obligatoire',
    //       'age.required' => 'L\'age est obligatoire',
    //       'age.min:14' => 'L\'age minimal est 14 ans',
    //       'age.max:35' => 'L\'age maximal est 35 ans',
    //       'gender.required' => 'Le sexe est obligatoire',
    //     ];
    //   }
    //   public function prepareForValidation(): void
    //   {
    //     $this->merge(['is_asi'=>$this->request->has('is_asi')]);
    //   }
}
