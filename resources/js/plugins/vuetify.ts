import '@mdi/font/css/materialdesignicons.css';
import { createVuetify } from 'vuetify';
import * as components from 'vuetify/components';
import * as directives from 'vuetify/directives';
import 'vuetify/styles';

const light = {
  dark: false,
  colors: {
    background: '#F1F5F9',
    surface: '#FFFFFF',
    primary: '#38BDF8',
    'primary-focus': '#0EA5E9',
    secondary: '#64748B',
    'secondary-content': '#FFFFFF',
    accent: '#FACC15',
    neutral: '#0F172A',
    info: '#3abff8',
    success: '#36d399',
    warning: '#fbbd23',
    error: '#f87272',
    'on-background': '#0F172A',
    'on-surface': '#0F172A',
  },
};

const dark = {
  dark: true,
  colors: {
    background: '#0F172A',
    surface: '#1E293B',
    primary: '#38BDF8',
    'primary-focus': '#0EA5E9',
    secondary: '#64748B',
    'secondary-content': '#FFFFFF',
    accent: '#2dd4bf',
    neutral: '#0F172A',
    info: '#3abff8',
    success: '#36d399',
    warning: '#fbbd23',
    error: '#f87272',
    'on-background': '#FFFFFF',
    'on-surface': '#FFFFFF',
  },
};

export default createVuetify({
  components,
  directives,
  theme: {
    defaultTheme: 'light',
    themes: {
      light,
      dark,
    },
  },
});
