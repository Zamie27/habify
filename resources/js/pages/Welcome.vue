<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { login, register } from '@/routes';
import { useTheme } from 'vuetify';
import { onMounted } from 'vue';

const theme = useTheme();

const toggleTheme = () => {
    theme.global.name.value = theme.global.current.value.dark ? 'light' : 'dark';
};

const advantages = [
  {
    title: 'Daily Accountability',
    description: 'Our smart agenda ensures you never miss a habit. Personalized daily checklists keep you on track.',
    icon: 'mdi-check-decagram',
  },
  {
    title: 'Visual Progress',
    description: 'Stunning charts and heatmaps (powered by ApexCharts) show your consistency and streaks at a glance.',
    icon: 'mdi-chart-timeline-variant',
  },
  {
    title: 'Clean & Premium UI',
    description: 'Built with Vuetify 3, providing a seamless and high-quality experience across all your devices.',
    icon: 'mdi-palette',
  },
];

onMounted(() => {
    const isDark = document.documentElement.classList.contains('dark');
    theme.global.name.value = isDark ? 'dark' : 'light';
});
</script>

<template>
  <v-app :theme="theme.global.name.value">
    <Head title="Welcome to Habify" />

    <!-- Navigation -->
    <v-app-bar flat class="px-md-12 navbar-blur" border="0" style="z-index: 100;">
      <v-toolbar-title class="font-weight-black text-h5 ls-tight" :class="theme.global.current.value.dark ? 'text-white' : 'text-neutral'">
        Habify
      </v-toolbar-title>
      <v-spacer />
      <v-btn 
        :icon="theme.global.current.value.dark ? 'mdi-weather-sunny' : 'mdi-weather-night'" 
        variant="text" 
        @click="toggleTheme" 
        class="mr-2"
        :color="theme.global.current.value.dark ? 'white' : 'neutral'"
      />
      <Link :href="login()" class="text-decoration-none mr-4">
        <v-btn variant="text" class="text-none font-weight-bold" :color="theme.global.current.value.dark ? 'white' : 'neutral'">Log in</v-btn>
      </Link>
      <Link :href="register()" class="text-decoration-none">
        <v-btn color="primary" class="text-none px-6 font-weight-black" rounded="pill" elevation="0">Get Started</v-btn>
      </Link>
    </v-app-bar>

    <v-main class="pa-0">
      <!-- XXI Style Hero Section -->
      <section class="relative min-h-screen overflow-hidden d-flex flex-column">
        <!-- Background Logic -->
        <div class="absolute inset-0 z-0">
            <!-- Light Mode Background -->
            <div 
                class="absolute inset-0 bg-cover bg-center transition-opacity duration-500"
                :style="{ backgroundImage: `url('/image/bghero-light.jpg')`, opacity: theme.global.current.value.dark ? 0 : 1 }"
            >
                <div class="absolute inset-0 bg-white/40"></div>
            </div>

            <!-- Dark Mode Background -->
            <div 
                class="absolute inset-0 bg-cover bg-center transition-opacity duration-500"
                :style="{ backgroundImage: `url('/image/bghero-dark.jpg')`, opacity: theme.global.current.value.dark ? 1 : 0, filter: 'brightness(60%)' }"
            >
                <div class="absolute inset-0 bg-slate-900/60"></div>
            </div>
        </div>

        <!-- Content Container -->
        <v-container class="relative z-10 fill-height px-md-12 d-flex flex-column" style="min-height: 100vh;">
            <!-- Title Area: Centered vertically -->
            <div class="flex-grow-1 d-flex align-center">
                <v-row no-gutters class="w-full">
                    <v-col cols="12" md="8">
                        <h1 class="hero-title font-weight-regular tracking-tight" :class="theme.global.current.value.dark ? 'text-white' : 'text-neutral'">
                            Saat Tantangan Datang,<br /> 
                            Kami Hadir untuk Membantu<br />
                            Kebiasaanmu dan Masa Depanmu
                        </h1>
                    </v-col>
                </v-row>
            </div>
            
            <!-- Description Area: Pushed to bottom right -->
            <div class="d-flex justify-end align-end pb-12 pb-md-24 w-full">
                <div class="text-right max-w-sm">
                    <p class="text-body-1 leading-relaxed opacity-80 mb-8" :class="theme.global.current.value.dark ? 'text-white' : 'text-neutral'">
                        Habify Solusi digital profesional yang dirancang khusus untuk mengakselerasi pertumbuhan dirimu dengan pendekatan yang terukur dan hasil yang nyata.
                    </p>
                    
                </div>
            </div>
        </v-container>
      </section>

      <!-- Sections below the hero... -->
      <div :class="theme.global.current.value.dark ? 'bg-background' : 'bg-white'">
          <!-- Advantages Section -->
          <v-container class="py-16 px-md-12 mt-16">
             <div class="mb-12">
                 <h2 class="text-h3 font-weight-black ls-tight mb-2">Kenapa Habify?</h2>
                 <div class="bg-primary" style="height: 4px; width: 60px; border-radius: 2px;"></div>
             </div>
            <v-row>
              <v-col v-for="adv in advantages" :key="adv.title" cols="12" md="4">
                <v-card class="advantage-card pa-8 border-0" rounded="xl" flat :color="theme.global.current.value.dark ? 'surface' : 'grey-lighten-4'">
                  <v-icon :icon="adv.icon" color="primary" size="48" class="mb-6" />
                  <h3 class="text-h5 font-weight-black mb-4">{{ adv.title }}</h3>
                  <p class="text-body-1 opacity-70 leading-loose">{{ adv.description }}</p>
                </v-card>
              </v-col>
            </v-row>
          </v-container>

          <!-- Transparency Section -->
          <v-container class="py-16 px-md-12 mb-16 rounded-3xl" :class="theme.global.current.value.dark ? 'bg-slate-900 shadow-xl' : 'bg-grey-lighten-5'">
            <v-row align="center">
                <v-col cols="12" md="6">
                    <h2 class="text-h2 font-weight-black ls-tight mb-4 text-gradient">Terbuka & Jujur.</h2>
                    <p class="text-h6 opacity-70 font-weight-regular max-w-500">
                        Kami percaya transparansi adalah kunci disiplin. Habify masih dalam tahap pengembangan aktif untuk memberikan pengalaman terbaik bagimu.
                    </p>
                </v-col>
                <v-col cols="12" md="6">
                    <v-row>
                        <v-col cols="12" sm="6">
                            <v-card class="pa-6 border-0" rounded="xl" flat :color="theme.global.current.value.dark ? 'surface' : 'white'">
                                <v-icon icon="mdi-alert-circle-outline" color="warning" class="mb-4" />
                                <h4 class="font-weight-bold mb-2">Early Access</h4>
                                <p class="text-caption opacity-60">Beberapa fitur sosial sedang dalam pengerjaan.</p>
                            </v-card>
                        </v-col>
                        <v-col cols="12" sm="6">
                            <v-card class="pa-6 border-0" rounded="xl" flat :color="theme.global.current.value.dark ? 'surface' : 'white'">
                                <v-icon icon="mdi-cellphone-off" color="primary" class="mb-4" />
                                <h4 class="font-weight-bold mb-2">Web Only</h4>
                                <p class="text-caption opacity-60">Aplikasi mobile native sedang dipersiapkan.</p>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-col>
            </v-row>
          </v-container>

          <!-- Aesthetic Footer -->
          <footer class="py-16 px-md-12 bg-neutral text-white">
            <v-container>
              <v-row>
                <v-col cols="12" md="4">
                  <h2 class="text-h4 font-weight-black mb-6">Habify</h2>
                  <p class="text-body-2 text-grey-lighten-1 max-w-300">
                    Membangun disiplin, satu kebiasaan pada satu waktu. Platform habit tracker modern untuk masa depanmu.
                  </p>
                </v-col>
                <v-col cols="12" md="4" class="d-flex flex-column gap-2 text-grey-lighten-2">
                    <h4 class="font-weight-bold text-white mb-4">Navigasi</h4>
                    <span>Home</span>
                    <span>Tentang Habify</span>
                    <span>Fitur</span>
                </v-col>
                <v-col cols="12" md="4">
                    <h4 class="font-weight-bold mb-4">Branding</h4>
                    <p class="text-body-2 text-grey-lighten-2">Part of the <strong>Kuukok</strong> Ecosystem.</p>
                    <div class="d-flex gap-4 mt-6">
                        <v-btn icon="mdi-facebook" variant="tonal" size="small" />
                        <v-btn icon="mdi-twitter" variant="tonal" size="small" />
                        <v-btn icon="mdi-instagram" variant="tonal" size="small" />
                    </div>
                </v-col>
              </v-row>
              <v-divider class="my-12 opacity-10" />
              <p class="text-center text-caption text-grey-lighten-2 opacity-50">
                &copy; 2026 Habify by Kuukok. Semua hak dilindungi.
              </p>
            </v-container>
          </footer>
      </div>
    </v-main>
  </v-app>
</template>

<style scoped>
.hero-title {
    font-size: clamp(1.8rem, 5vw, 3.2rem);
    line-height: 1.25;
    letter-spacing: -0.01em !important;
}

.absolute { position: absolute; }
.inset-0 { top: 0; right: 0; bottom: 0; left: 0; }
.z-0 { z-index: 0; }
.z-10 { z-index: 10; }
.relative { position: relative; }
.bg-cover { background-size: cover; }
.bg-center { background-position: center; }
.transition-opacity { transition: opacity 0.5s ease-in-out; }
.duration-500 { transition-duration: 500ms; }
.opacity-0 { opacity: 0; }
.opacity-100 { opacity: 1; }
.bg-white\/40 { background-color: rgba(255, 255, 255, 0.4); }
.bg-slate-900\/60 { background-color: rgba(15, 23, 42, 0.6); }

.ls-tight {
    letter-spacing: -0.02em !important;
}

.max-w-xl { max-width: 36rem; }
.max-w-500 { max-width: 500px; }
.max-w-300 { max-width: 300px; }

.advantage-card {
    transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
}

.advantage-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px -15px rgba(0, 0, 0, 0.1) !important;
}

.text-gradient {
  background: linear-gradient(135deg, #38BDF8 0%, #0EA5E9 100%);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.bg-transparent {
    background-color: transparent !important;
}

.navbar-blur {
    backdrop-filter: blur(12px) !important;
    -webkit-backdrop-filter: blur(12px) !important;
    background-color: rgba(var(--v-theme-background), 0.7) !important;
}

.opacity-80 { opacity: 0.8; }
.opacity-70 { opacity: 0.7; }
.opacity-10 { opacity: 0.1; }

.w-full { width: 100%; }
.flex-grow-1 { flex-grow: 1; }
</style>
