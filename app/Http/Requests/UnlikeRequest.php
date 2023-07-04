<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnlikeRequest extends FormRequest
{
    public function authorize()
    {
        return $this->user()->can('unlike', $this->likeable());
    }
}
