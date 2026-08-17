# Technical Structure

## Current Stack

The current project baseline is:

- Laravel as the application framework.
- Filament as the internal admin panel.
- Reverb for WebSocket infrastructure.
- Livewire through Filament.
- Pest for tests.
- Tailwind and Vite for frontend assets where needed.

## Current Product Shape

The application is currently a bare Filament-first Laravel project.

The primary route is:

- `/admin` for the Filament panel.

The root route should remain a simple entry point and can redirect to `/admin` until a public website exists.

## Suggested Domain Areas

As the product grows, the backend should be organized around clear domain concepts:

- Subjects: people or entities being monitored.
- SocialAccounts: platform-specific accounts connected to a subject.
- Sources: where data or signals came from.
- SocialEvents: normalized events such as follow, unfollow, like, comment, profile update, or metadata change.
- Snapshots: stored point-in-time profile or relationship states.
- Investigations: operator-created groupings of subjects, accounts, and events.
- Reports: exported or summarized findings.

## Suggested Application Layers

Prefer explicit layers when they reduce complexity:

- Filament Resources for admin CRUD and operational workflows.
- Services for business use cases and orchestration.
- Repositories for query-heavy persistence access when Eloquent queries become complex or reused.
- DTOs for structured data moving between services, integrations, jobs, and UI actions.
- Jobs for async collection, normalization, enrichment, and notification workflows.
- Events for internal state changes that other parts of the system should react to.

## Reverb Usage

Reverb should remain available for real-time workflows such as:

- Live collection status.
- New signal notifications.
- Investigation activity updates.
- Background job progress.
- Operator alerts.

The current Echo client should stay generic until concrete channels and events are defined.
