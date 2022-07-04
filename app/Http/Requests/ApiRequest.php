<?php
    
    namespace App\Http\Requests;
    
    use Illuminate\Contracts\Validation\Validator;
    use Illuminate\Foundation\Http\FormRequest;
    use Illuminate\Http\Response;
    use Illuminate\Validation\ValidationException;
    
    /**
     * Class ApiFormRequest
     * @package App\Core\Requests
     */
    abstract class ApiRequest extends FormRequest
    {
        /**
         * Determine if the user is authorized to make this request.
         *
         * @return bool
         */
        public function authorize()
        : bool
        {
            return true;
        }
        
        /**
         * @return array
         */
        public function rules()
        : array
        {
            return [];
        }
        
        /**
         * @return array
         */
        public function messages()
        : array
        {
            return [];
        }
        
        /**
         * Handle a failed validation attempt.
         *
         * @param  Validator  $validator
         *
         * @return void
         * @throws ValidationException
         */
        public function failedValidation(Validator $validator)
        {
            $response = response()->json(
                [
                    'errors' => $validator->errors(),
                ],
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
            
            throw new ValidationException($validator, $response);
        }
    }
