<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Uppercase;
class Productrequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', new Uppercase],
            'price'=> 'required',
            'size' => 'required',
            'stock' => 'required',
            'image' => 'required',
        ];
    }
    public function message() {
        return[
            'name.required' => 'name is required',
            'price.required' => 'price is required',
            'size.required' => 'size is required',
            'stock.required' => 'stock is required',
            'image.required' => 'image is required',
            // 'useremail.email' => 'email is required'
        ];
    }
    public function attributes(){
        return[
            'name' => 'User Name' ,//name feilds name change show User Name is required message
        ];
    }
    // protected function prepareForValidation():void{

    //     $this->merge([
    //         'name' => strtoupper($this->name)
    //     ]);

    // }//this method convert value uppercase send output
 
 //    protected $stopOnFirstFaliure = true; //show only one time one error
     //only show first  error message

}  
