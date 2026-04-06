---
name: apexcharts-development
description: Use this skill for visualizing habit tracking data and streaks with ApexCharts.js. Activate when the user mentions habits visualization, heatmap, line charts, or streaks.
---

# ApexCharts.js Development Skill

This skill provides instructions for building interactive charts and heatmaps to visualize habit progress using `vue3-apexcharts`.

## Core Chart Types for Habify
- **Heatmap**: For yearly habit consistency tracking (similar to GitHub contributions).
- **RadialBar**: For daily goal progress (e.g., 75% of water intake).
- **Line/Area**: For streak consistency over time.
- **Bar**: For comparing different habits in a given week.

## Formatting Data
- **Habit Series**: Transform Laravel collections (e.g., `count()` grouped by `date`) into ApexCharts-ready JSON.
```javascript
const habitData = {
  series: [{
    name: 'Habit Name',
    data: [ { x: '2024-03-01', y: 1 }, { x: '2024-03-02', y: 0 } ]
  }],
  chartOptions: {
    chart: { type: 'heatmap' },
    xaxis: { type: 'datetime' }
  }
};
```

## Styling
- Use **Habify's Primary Color** (`#1867C0` or custom) for progress.
- Customize **Tooltips** for detailed daily notes.
- Use **Markers** for significant habit milestones.

## Performance
- Pre-calculate chart data on the backend (Laravel) or in a Pinia action before rendering.
- Avoid large data sets in the browser; use monthly/weekly summaries.
