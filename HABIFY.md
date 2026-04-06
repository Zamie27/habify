# Habify - Professional Habit Tracker

## Overview
Habify is a modern web application designed for users to build and maintain healthy habits through consistent tracking and data visualization. Built on the Laravel 13 framework, it leverages Vue 3 and Vuetify to provide a seamless, premium user experience.

## Target Audience
- **Personal Users**: Individuals tracking their own daily routines.
- **Platform Community**: Users who want to share their progress or join shared habit challenges (planned).

## Core Concepts
1. **Habits**: Long-term goals (e.g., "Read 30 mins", "Exercise", "Meditation").
2. **Agendas**: Daily checklists tailored to each user based on their active habits and frequencies.
3. **Daily Tracking**: The act of documenting progress, notes, and values for a habit entry.
4. **Insights**: Visual representation of progress using ApexCharts to show streaks and consistency.

## Tech Stack
- **Backend**: Laravel 13, PHP 8.4
- **Database**: MySQL 8.0
- **Frontend**: Vue 3, Vuetify 3, Pinia (Local State)
- **Visualization**: ApexCharts
- **Integration**: Inertia.js (Inertia Laravel v3)
- **State Management**: Pinia

## Getting Started
- Run `composer install` and `npm install`.
- Set up `.env` with MySQL credentials.
- Run `php artisan migrate`.
- Run `npm run dev` to start the frontend.
