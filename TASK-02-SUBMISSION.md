# TASK 02 — Build Your Own AI Employee

## DevPilot: AI Web Development Assistant

**Sector:** Web development / digital agency delivery  
**Employee role:** Development planning assistant for repetitive Laravel + Vue work  
**Status of evidence:** The five outputs below are controlled demo runs made with the app's local demo generator. They demonstrate the workflow, but are not represented as client work or live-model results. Replace or supplement them with five genuine tasks from your own work before claiming the final challenge is complete.

## 1. Problem

Small web projects repeatedly require turning loosely written requests, database ideas, API requirements, bug reports, and UI requests into structured plans. Doing this manually involves reformatting requirements, listing edge cases, and remembering security and test checks. It is repetitive and omissions can lead to rework. DevPilot drafts a consistent implementation plan; the developer remains responsible for decisions and code changes.

## 2. Current manual workflow

1. Read a client or team request and clarify missing details.
2. Search the existing codebase and identify framework conventions.
3. Draft data structures, routes, validation, UI states, and edge cases.
4. Check authentication, authorization, privacy, and failure behavior.
5. Write the plan or checklist, then implement and test it manually.

The baseline timings in the comparison are estimates for a small, scoped task, not stopwatch measurements. Record actual timings for your own five tasks before submission.

## 3. AI employee design and workflow

**Input:** Select one of eight task types, provide a title and task context.  
**Processing:** Validate input; send the task type and context to the configured model, or generate a labeled local demo response when demo mode is enabled or the API key is missing.  
**Output:** Structured development draft with objective, assumptions, architecture/tasks, edge cases, verification, and next step.  
**Record:** Save prompt, output, mode, duration, and timestamp for review.  
**Human gate:** Check facts against the repository and stakeholders, revise, implement, run project checks, and approve. The assistant does not deploy or modify the product code.

```text
Task/context → validation → AI draft → saved run → human review → code changes → tests/review → approval
```

## 4. Tools

- Laravel 12 / PHP: validation, controller, service, persistence, and server-side API call.
- Vue 3 + Inertia.js: task form, output view, and run history.
- OpenAI Responses API in live mode; configurable model and API base URL.
- Local deterministic demo mode: evaluate the interface without credentials. Demo output is a template, not model-generated analysis.
- SQLite by default for saved run history; can be configured for MySQL.

The application defaults to demo mode. For live work, set `AI_EMPLOYEE_DEMO_MODE=false`, provide `OPENAI_API_KEY`, and set `OPENAI_MODEL` to a model enabled for the account. The code uses the Responses API; the official OpenAI quickstart demonstrates this API and `output_text` pattern ([OpenAI API quickstart](https://platform.openai.com/docs/quickstart/make-your-first-api-request)).

## 5. Reusable prompt / workflow

The application sends this system instruction (with the selected task type appended):

> You are DevPilot AI, a senior Laravel 12 + Vue 3 + Inertia.js web-development employee. Return practical implementation-ready output. Never claim code was tested unless it was actually tested. Use sections such as Objective, Assumptions, Analysis, Architecture, Database, API, Frontend, Implementation, Edge Cases, Security, Testing and Verification when relevant. Be explicit about file paths. Task type: `{task_type}`.

For each run, the user supplies a concrete requirement, error, or development context. Improve results by including framework versions, relevant existing files/schema, expected behavior, constraints, and acceptance criteria. Do not include secrets or personal/client data.

## 6. Five controlled demo outputs

These are sample tasks and concise extracts from the application's deterministic demo mode. The demo generator repeats a generic implementation plan for each prompt; therefore these are not evidence of five distinct live AI analyses. Use the dashboard's quick examples or enter the prompts below, then save actual runs for a genuine evaluation.

### Run 1 — Requirement analysis: LMS

**Prompt:** “I need an LMS with Admin, Instructor and Student roles, courses, lessons, quizzes, payments and student progress.”  
**Output extract:** Objective: convert the LMS request into an implementation-ready Laravel/Vue plan. Assumptions: Laravel 12, Vue 3 + Inertia, SQLite/MySQL, protected actions require authorization. Tasks: clarify roles and edge cases; create migrations and relationships; add validated controllers/routes; build reusable Vue pages; test success and failure paths.  
**Human check:** Confirm enrollment/payment rules, quiz grading, role permissions, and existing auth implementation. The generic demo output does not design these details.

### Run 2 — Database planning: service booking

**Prompt:** “Design a database for a service booking platform with customers, services, bookings, staff and payments.”  
**Output extract:** Objective: produce a database plan. Tasks: confirm requirements, create migrations and relationships, add duplicate/unauthorized/not-found edge cases, and test.  
**Human check:** Specify booking status transitions, time zones, availability conflicts, currency/refund handling, and foreign-key delete policies. The demo output does not provide a schema.

### Run 3 — CRUD planning: product inventory

**Prompt:** “Create a Product CRUD with name, SKU, price, stock quantity, category, image and active status.”  
**Output extract:** Recommended architecture: controller coordinates validated requests; Form Request owns validation; models own relationships; Vue pages handle screens. Test invalid input, duplicates, unauthorized actions, missing records, empty results, and concurrent updates.  
**Human check:** Define SKU uniqueness scope, decimal/currency rules, stock adjustments, image storage and authorization policy.

### Run 4 — Bug analysis: missing status column

**Prompt:** “SQLSTATE[42S22]: Column not found: 1054 Unknown column status in where clause. The dashboard request fails.”  
**Output extract:** First inspect the query/model scope and table migrations; verify the actual schema and migration state; add or correct a migration only if `status` is an intended field; test the query and failure path.  
**Human check:** Check the real failing SQL, database engine, deployment migration status, and whether the field was renamed. Demo output is generic and cannot diagnose the repository.

### Run 5 — UI planning: customer table

**Prompt:** “Create a responsive customer table with search, filters, pagination, loading, empty state and delete confirmation.”  
**Output extract:** Build reusable Vue components; connect frontend actions to validated backend routes; cover empty results, network/API failure, unauthorized actions, and deletion confirmation.  
**Human check:** Confirm keyboard access, mobile layout, pagination ownership, search debounce, and soft-delete/retention requirements.

## 7. Before vs after and time saving

Illustrative estimate per scoped task. AI time includes prompt entry, draft generation, and human review; actual times vary. Replace with measured times from your own five tasks.

| Task | Manual estimate | AI-assisted estimate | Estimated saved | Quality / remaining review |
|---|---:|---:|---:|---|
| LMS requirements | 35 min | 18 min | 17 min (49%) | Faster outline; verify roles, payments, progress rules |
| Booking database | 30 min | 16 min | 14 min (47%) | Faster checklist; schema and concurrency rules need human design |
| Product CRUD | 25 min | 14 min | 11 min (44%) | Good starting checklist; confirm validation and business rules |
| Bug triage | 20 min | 12 min | 8 min (40%) | Useful investigation steps; inspect actual code/logs before changing anything |
| Customer table | 25 min | 14 min | 11 min (44%) | Covers common states; accessibility and UX need a browser review |
| **Total** | **135 min** | **74 min** | **61 min (45%)** | **Illustrative only; not measured results** |

**Quality assessment:** The controlled demo is consistent and useful for exercising the workflow, but too generic to count as high-quality task completion. A live model may produce task-specific drafts, but still needs repository context and human fact-checking. No real AI error rate or quality score can be claimed from these demo runs.

## 8. Human verification process

1. Check that the response follows the prompt and flags missing information.
2. Verify framework APIs, file paths, database assumptions, and security guidance against the actual project and official documentation.
3. Check authorization, validation, privacy, migrations, failure cases, and destructive actions.
4. Implement changes in a branch; inspect the diff.
5. Run relevant automated checks and manual browser/API checks. Record exactly what passed; never infer tests from an AI statement.
6. A developer approves changes before merge or deployment.

Humans must own requirements clarification, architecture decisions, security/privacy review, data migrations, client commitments, production changes, and final approval.

## 9. Limitations and errors observed

- Demo mode is a deterministic template. It does not reason about the prompt, inspect a repository, or create genuinely task-specific results.
- Live mode receives only the selected task type and supplied text; it has no repository/file access and cannot execute code.
- AI can invent APIs, schema fields, assumptions, and file paths or overlook business rules, security issues, accessibility, and version-specific details.
- Latency, availability, and cost depend on provider/model/account. The recorded duration covers the server-side generation path only.
- Saved runs include requirements and output. Avoid secrets, credentials, and personal/client data; apply suitable retention/access controls before team use.
- The five examples and timings above are not evidence of five real jobs or measured productivity improvement.

## 10. Future plan

1. Run five genuine, varied development tasks in live mode and preserve prompt/output evidence with sensitive details removed.
2. Time both workflows with a stopwatch and score accuracy, completeness, and edit effort using the same rubric.
3. Add repository-aware context retrieval with explicit file citations and size limits.
4. Add structured output, task-specific rubrics, retry/error handling, and user feedback on drafts.
5. Add authenticated per-user run history and retention controls before storing team/client work.
6. Keep code execution, destructive operations, merges, and deployments behind explicit human review.

## Reproduce the demo

From `devpilot-fixed/`, follow `README.md`, keep `AI_EMPLOYEE_DEMO_MODE=true`, and use the five prompts above. The dashboard stores runs and shows their mode and server duration. The live-mode behavior requires a valid API key and an account-enabled model; no live API results are included in this submission.
