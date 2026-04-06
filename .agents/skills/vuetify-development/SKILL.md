---
name: vuetify-development
description: Use this skill for building responsive UI components and layouts with Vuetify 3 in the Habify project. Activate when the user mentions Vuetify, UI, styling, cards, dialogs, forms, or data tables.
---

# Vuetify Development Skill

This skill provides instructions for developing high-quality, responsive interfaces using Vuetify 3 with Vue 3 and Inertia.js.

## Core Principles
1. **Component-First**: Always prefer Vuetify components over raw HTML/CSS.
2. **Responsive Design**: Use Vuetify's grid system (`v-container`, `v-row`, `v-col`) and breakpoint-specific props (e.g., `cols="12" md="6"`).
3. **Theming**: Use the project's theme colors (`primary`, `secondary`, `accent`, `error`, `info`, `success`, `warning`).

## Key Components for Habify
- **v-card**: For habit summaries, agenda items, and dashboard widgets.
- **v-list**: For daily habit checklists.
- **v-dialog**: For creating/editing habits and viewing habit details.
- **v-form**: For habit creation and tracking inputs.
- **v-data-table**: For habit history and logs.
- **v-btn**: Use variants like `tonal`, `flat`, or `outlined` for modern aesthetics.

## Best Practices
- **V-Model**: Bind inputs directly to Pinia store refs or local reactive state.
- **Icons**: Use Google Material Icons (MDI) via `v-icon`.
- **Spacing**: Use Vuetify's spacing helper classes (e.g., `ma-4`, `px-2`, `mt-n2`).
- **Inertia Link**: Wrap `v-btn` with Inertia `<Link>` or use `@click="router.visit(...)"`.

## Example Snippet (Habit Card)
```vue
<v-card class="mx-auto" max-width="400" border>
  <v-card-item title="Drink Water">
    <template #subtitle>
      Daily Goal: 2L
    </template>
  </v-card-item>
  <v-card-text>
    Track your daily hydration progress.
  </v-card-text>
  <v-card-actions>
    <v-btn color="primary" variant="tonal" @click="track">Track Now</v-btn>
  </v-card-actions>
</v-card>
```
