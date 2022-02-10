<?php

namespace App\Http\Requests\API;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use InfyOm\Generator\Request\APIRequest;

class BaseApiRequest extends APIRequest
{
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'errors' => $validator->errors(),
        ]));
    }

    public function messages()
    {
        return [
            'required' => ':attribute ni to‘ldirish shart!',
            'string' => ':attribute matn ko‘rinishida bo‘lishi shart!',
            'integer' => ':attribute raqam bo‘lishi shart!',
            'unique' => 'Ushbu :attribute avvaldan band qilingan! (unique)',
            'max' => ':attribute :max belgidan oshmasligi shart!',
            'min' => ':attribute :min belgidan kam bo‘lmasligi shart!',
            'regex' => ':attribute formati xato kiritildi!',
            'email' => ':attribute Email ko‘rinishida bo‘lishi shart!',
            'digits' => ':attribute :digits ta raqam bo‘lishi kerak!',
            'numeric' => ':attribute raqam bo‘lishi kerak!',
            'exists' => ':attribute mos kelmadi',
            'digits_between' => ':attribute :min dan :max gacha bo‘lishi kerak!',
            'mimes' => 'Faylni tizimga faqat pdf formatida yuklashingiz mumkin!',
            'uploaded' => 'Faylni hajmi 2 MB dan oshmasligi shart!',
            'date' => ':attribute sana kiriting',
            'in' => ':attribute ga mos ma\'lumot kiriting',
        ];
    }
}
