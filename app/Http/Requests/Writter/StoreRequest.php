<?php

namespace App\Http\Requests\Writter;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        return [
            'name' => 'required|max:255',
            'birthdate' => 'required|max:255|date',
            'phone' => 'required|max:255|unique:writers,phone',
            'email' => 'email|required|max:255|unique:writers,email',
            'photo' => 'required|file',
        ];
    }

    /**
     * Custom the validation rules messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.email' => 'يجب إدخال بريد إلكتروني صالح',
            'photo.file' => 'يجب تحديد ملف لهذا الحقل',
            'photo.required' => 'يجب تحديد صورة الكاتب',
            '*.required' => 'لا يمكن ترك هذا الحقل فارغ !',
            '*.max' => 'عدد الاحرف يجب أن لا تزيد عن 255 حرف',
            '*.unique' => 'لا يمكن تكرر نفس القيمة مع كاتب أخر',
            '*.date' => 'يجب إدخال صيغة تاريخ صالحة',
        ];
    }


}
