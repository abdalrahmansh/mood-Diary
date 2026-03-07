<?php

namespace App\Http\Requests;

use App\Enums\MoodType;
use App\Http\Requests\Concerns\ResolvesUserIdFromHeader;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreMoodEntryRequest extends FormRequest
{
    use ResolvesUserIdFromHeader;

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
            'user_id' => ['required', 'integer', 'min:1'],
            'mood' => ['required', 'string', Rule::in(MoodType::values())],
            'note' => ['nullable', 'string', 'max:255'],
            'logged_at' => ['nullable', 'date'],
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->mergeUserIdFromHeader();
    }
}
