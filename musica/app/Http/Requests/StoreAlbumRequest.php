<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlbumRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
    // Allow authenticated users (route middleware handles auth)
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
            'title' => ['required', 'string', 'max:255'],
            'artist' => ['required', 'string', 'max:255'],
            'release_date' => ['required', 'date'],
            'genre' => ['required', 'string', 'max:100'],
            'songs' => ['nullable', 'string'],
            'producer' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image', 'max:2048'],
        ];
    }
}
