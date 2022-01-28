<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;

class PlaylistRequest extends FormRequest
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
    public function rules(Route $route)
    {
        $checkRoute = $route->getActionName() == 'App\Http\Controllers\Lunacast\PlaylistController@store';
        return [
            'thumbnail' => ['image', 'mimes:png,jpg,jpeg', Rule::requiredIf($checkRoute)],
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ];
    }
}
