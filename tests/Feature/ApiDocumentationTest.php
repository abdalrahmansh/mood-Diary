<?php

namespace Tests\Feature;

use Tests\TestCase;

class ApiDocumentationTest extends TestCase
{
    public function test_api_documentation_page_returns_successful_response(): void
    {
        $response = $this->get('/api/documentation');

        $response->assertOk();
        $response->assertSee('swagger-ui', false);
    }

    public function test_openapi_yaml_endpoint_returns_yaml_content(): void
    {
        $response = $this->get('/api/documentation/openapi.yaml');

        $response->assertOk();
        $this->assertStringContainsString(
            'application/x-yaml',
            (string) $response->headers->get('Content-Type')
        );
        $response->assertSee('openapi: 3.0.3', false);
    }
}
