# Project Goal

## Product Idea

dox.sh is a social intelligence and monitoring platform focused on tracking public and authorized changes around a person's social media presence.

The system should help operators understand what changed, when it changed, and how accounts are connected. Examples of tracked signals may include:

- Follow and unfollow events.
- Likes, reactions, comments, and engagement changes.
- Account origin signals and profile metadata changes.
- Relationship timelines between accounts.
- Historical snapshots of visible profile state.
- Source attribution for where a signal was observed.

## Legal Positioning

The product must be built for legal, ethical, and authorized monitoring workflows.

It should not be designed as a tool for unauthorized access, credential theft, private data extraction, evasion, or platform abuse. The aesthetic can borrow from dark cybersecurity and investigation interfaces, but the functionality must stay within legitimate research, compliance, marketing, and public/authorized data analysis.

## Initial Scope

The first version is a simple internal admin panel powered by Filament.

The admin panel should support early back-office workflows first:

- Managing monitored subjects.
- Managing connected social accounts.
- Viewing collected events.
- Reviewing timelines and changes.
- Tagging, filtering, and investigating signals.
- Preparing future dashboards and reports.

## Future Direction

The project may later expand into a public or client-facing web application. The current backend and admin architecture should avoid assumptions that would make a future web product difficult.
