---
name: pinia-development
description: Use this skill for managing reactive state in the Habify project using Pinia. Activate when the user mentions stores, global state, persistence, or habit/agenda synchronization.
---

# Pinia State Management Skill

This skill provides instructions for managing centralized state in the Habify project using Pinia v2.

## Store Architecture
- **Setup Stores**: Always prefer "Setup Stores" for better script setup compatibility.
```javascript
export const useHabitStore = defineStore('habit', () => {
  const habits = ref([]);
  const activeHabit = computed(() => habits.value.find(h => h.id === activeId.value));
  
  async function fetchHabits() {
    habits.value = await get(habitsPath());
  }

  return { habits, activeHabit, fetchHabits };
});
```

## State Conventions
- **Habits Store**: For CRUD operations on habits.
- **Agenda Store**: For daily habit checklists and tracking status.
- **User Store**: For current authentication status and preferences.

## Best Practices
- **Reactivity**: Destructure stores with `storeToRefs` to maintain reactivity.
- **Actions**: Keep API calls within the store actions.
- **Persistence**: Use the Pinia Persistence Plugin if needed for offline-first capabilities.
- **Naming**: Suffix your stores with `Store` (e.g., `habitStore`).

## Habit Tracker Integration
- Synchronize local state with Inertia props or use standalone API requests (`useHttp`).
- Use computed properties for streaks and progress percentages.
