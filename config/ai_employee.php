<?php
return [
    'demo_mode' => (bool) env('AI_EMPLOYEE_DEMO_MODE', true),
    'api_key' => env('OPENAI_API_KEY'),
    'model' => env('OPENAI_MODEL', 'gpt-5.6-luna'),
    'base_url' => rtrim(env('OPENAI_BASE_URL', 'https://api.openai.com/v1'), '/'),
    'timeout' => (int) env('OPENAI_TIMEOUT', 90),
];
