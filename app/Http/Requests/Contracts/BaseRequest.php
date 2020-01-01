<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 6:20 PM
 */

namespace App\Http\Requests\Contracts;


use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;

abstract class BaseRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public abstract function rules();

    protected function failedValidation(Validator $validator)
    {
        if (request()->expectsJson()) {
            throw new HttpResponseException(restful_exception(new ValidationException($validator)));
        }
        parent::failedValidation($validator);
    }

    public function authorize()
    {
        return true;
    }
}
