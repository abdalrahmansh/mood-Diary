<?php

namespace App\Http\Requests\Concerns;

trait ResolvesUserIdFromHeader
{
    protected function mergeUserIdFromHeader(): void
    {
        $this->merge([
            'user_id' => $this->header('X-User-Id'),
        ]);
    }

    public function userId(): int
    {
        return (int) $this->integer('user_id');
    }
}
