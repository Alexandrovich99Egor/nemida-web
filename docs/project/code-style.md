# Code Style

## Core Principles

Code should be modern, strict, and easy to reason about.

Important priorities:

- Use strict typing wherever PHP allows it.
- Keep logic simple and explicit.
- Follow SOLID principles pragmatically.
- Prefer clear service classes for business workflows.
- Use repositories when query logic becomes repeated, complex, or domain-specific.
- Use DTOs for structured inputs and outputs between layers.
- Keep Filament classes focused on UI configuration and admin actions.

## PHP Style

- Use typed parameters and return types.
- Use constructor property promotion where appropriate.
- Prefer small methods with descriptive names.
- Avoid large controller, resource, or action methods.
- Keep Eloquent models focused on relationships, casts, scopes, and simple domain helpers.
- Use Laravel conventions before inventing custom architecture.

## Comments

Short `//` comments are preferred when a comment is useful.

Comments should explain why something exists or clarify non-obvious logic. Avoid comments that simply repeat the code.

Good comment style:

```php
// Normalize platform timestamps before comparing event order.
```

Avoid:

```php
// Set the variable to true.
```

## Services

Services should represent application use cases or domain operations.

Examples:

- `TrackSocialAccountChanges`
- `NormalizeSocialEvent`
- `BuildSubjectTimeline`
- `ResolveAccountOrigin`

Services should not become generic utility bags. Each service should have a clear responsibility.

## Repositories

Repositories are useful when read/write logic becomes complex enough to deserve a stable API.

Use repositories for:

- Complex filters.
- Reused dashboard queries.
- Timeline queries.
- Cross-table lookup logic.
- Platform-specific lookup rules.

Do not create a repository for every model by default.

## DTOs

DTOs should be used for structured data crossing boundaries.

Good DTO candidates:

- Incoming social event payloads.
- Normalized account metadata.
- Timeline filter input.
- External platform profile snapshots.
- Report generation parameters.

DTOs should be immutable when practical.

## Testing

Every meaningful code change should have a focused Pest test.

Prefer feature tests for user-facing and admin workflows. Use unit tests for isolated services, DTO behavior, normalization rules, and query helpers.
