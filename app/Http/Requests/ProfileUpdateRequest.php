<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($this->user()->id),
            ],
            'jenis_kelamin' => ['nullable', 'string', 'max:20'],
            'jurusan' => ['nullable', 'string', 'max:20'],
            'tempat_lahir' => ['nullable', 'string', 'max:255'],
            'tanggal_lahir' => ['nullable', 'date'],
            'tahun_masuk' => ['nullable', 'integer'],
            'tahun_lulus' => ['nullable', 'integer'],
            'jabatan' => ['nullable', 'string', 'max:255'],
            'perusahaan' => ['nullable', 'string', 'max:255'],
            'kota' => ['nullable', 'string', 'max:255'],
            'alamat' => ['nullable', 'string'],
        ];
    }
}
