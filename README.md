# DevPilot AI — AI Web Development Employee

Laravel 12 + Inertia.js + Vue 3 application for TASK 02, “Build Your Own AI Employee.” The assistant turns web development requests into structured implementation drafts and saves runs for human review.

The complete assignment concept, workflow, reusable prompt, five controlled demo examples, comparison, limitations, and future plan are in [TASK-02-SUBMISSION.md](TASK-02-SUBMISSION.md). The five examples are explicitly marked as demo outputs; they do not claim live AI execution or real client work.

## Features

- Requirement, database, CRUD, API, bug, Vue, documentation, and testing drafts
- Saved run history with mode and server duration
- Human verification workflow
- Deterministic local demo mode (enabled by default)
- Optional OpenAI Responses API integration

## Requirements

- PHP 8.2+
- Composer 2+
- Node.js 20+
- npm
- SQLite (default) or MySQL

## Windows setup

Run `setup-windows.ps1` in PowerShell, or follow these steps:

```powershell
composer install
Copy-Item .env.example .env
php artisan key:generate
New-Item database\database.sqlite -ItemType File -Force
php artisan migrate
npm install
npm run build
php artisan serve
```

For frontend development, run `npm run dev` in a second terminal. Open http://127.0.0.1:8000.

## Demo mode

Demo mode works without an API key. It returns a deterministic generic template so the interface and save/history workflow can be exercised. It does not perform task-specific reasoning or inspect your codebase.

```env
AI_EMPLOYEE_DEMO_MODE=true
```

## Live AI mode

Set a valid API key and choose a model available to your OpenAI API account:

```env
AI_EMPLOYEE_DEMO_MODE=false
OPENAI_API_KEY=your_key_here
OPENAI_MODEL=gpt-5.6-luna
OPENAI_BASE_URL=https://api.openai.com/v1
OPENAI_TIMEOUT=90
```

The app sends the task type and user-provided context to the OpenAI Responses API. The [OpenAI API quickstart](https://platform.openai.com/docs/quickstart/make-your-first-api-request) documents the Responses API and `output_text` response pattern. Model availability depends on the account; change `OPENAI_MODEL` as needed. Never commit a real API key.

## Validation

```powershell
php artisan test
npm run build
```

Do not treat demo output as a live model result. For a real evaluation, complete five genuine tasks, keep redacted prompt/output evidence, time the manual and AI-assisted workflows, and update the report with measured results.
