<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class DocumentationController extends Controller
{
    public function index(): View
    {
        return view('swagger-ui');
    }

    public function spec(): Response
    {
        $content = file_get_contents(base_path('openapi.yaml'));

        return response($content ?: '', 200, [
            'Content-Type' => 'application/x-yaml',
        ]);
    }
}
