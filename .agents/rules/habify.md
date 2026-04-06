# Habify Project Rules

## Project Scope
Habify is a professional-grade habit tracker application built with Laravel 13, Vue 3, and Vuetify. It supports both personal tracking and public user registration.

## Tech Stack Constraints
- **Backend**: Laravel 13 (PHP 8.4)
- **Frontend**: Vue 3 with Vuetify 3 (UI Framework)
- **State Management**: Pinia
- **Visualization**: ApexCharts.js
- **Rendering**: Inertia.js (Inertia Laravel v3)
- **Styling**: Vuetify components for UI structure, Tailwind CSS v4 for utility-first micro-adjustments if needed.

## Key Features Logic
### Habit Management
- Users can create habits with specific frequencies (daily, weekly, custom).
- Habits can have goal values (e.g., "Drink 2L of water").

### Agenda & Tracking
- A daily agenda displays habits due for the current day.
- Tracking requires documenting the "completed" status and optional daily notes/progress.

### Documentation
- Each habit entry can have rich text or simple notes for daily progress documentation.

## Coding Standards
- **Vuetify**: Use built-in Vuetify components (`v-card`, `v-btn`, `v-data-table`) for consistency. Avoid custom CSS where Vuetify props suffice.
- **Pinia**: Use Store-per-module (e.g., `habitStore`, `agendaStore`). Prefer "Setup Stores" (`defineStore('id', () => { ... })`).
- **Laravel**: Follow `laravel-best-practices`. Use Eloquent resources for API responses.
- **ApexCharts**: Data should be pre-formatted on the backend or in a dedicated frontend store before being passed to the chart component.

## Database Pattern
- Users Table (Laravel default)
- Habits Table (user_id, title, description, frequency, start_date)
- HabitTracks Table (habit_id, date, status, value, note)
- Agendas Table (user_id, date, habit_id)
