<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
import { home } from '@/routes';
import { useTheme } from 'vuetify';

const theme = useTheme();

defineProps<{
    title?: string;
    description?: string;
}>();
</script>

<template>
    <v-app :theme="theme.global.name.value">
        <v-main class="auth-page d-flex align-center justify-center">
            <!-- Background Layering -->
            <div class="absolute inset-0 z-0">
                <div 
                    class="absolute inset-0 bg-cover bg-center transition-opacity duration-500"
                    :style="{ backgroundImage: `url('/image/bghero-light.jpg')`, opacity: theme.global.current.value.dark ? 0 : 1 }"
                >
                    <div class="absolute inset-0 bg-white/40"></div>
                </div>
                <div 
                    class="absolute inset-0 bg-cover bg-center transition-opacity duration-500"
                    :style="{ backgroundImage: `url('/image/bghero-dark.jpg')`, opacity: theme.global.current.value.dark ? 1 : 0, filter: 'brightness(60%)' }"
                >
                    <div class="absolute inset-0 bg-slate-900/60"></div>
                </div>
            </div>

            <v-container class="relative z-10 pa-4" style="max-width: 520px;">
                <v-card 
                    class="auth-card pa-8 pa-md-10" 
                    rounded="xl" 
                    elevation="24"
                >
                    <div class="text-center mb-8">
                        <Link :href="home().url" class="text-decoration-none">
                            <h2 class="text-h4 font-weight-black ls-tight mb-2" :class="theme.global.current.value.dark ? 'text-white' : 'text-neutral'">
                                Habify
                            </h2>
                        </Link>
                        <p class="text-body-1 opacity-70" v-if="description">{{ description }}</p>
                    </div>

                    <slot />
                </v-card>
                
                <div class="text-center mt-8 px-4 opacity-50">
                    <p class="text-caption text-grey">
                        &copy; 2026 Habify by Kuukok. Semua hak dilindungi.
                    </p>
                </div>
            </v-container>
        </v-main>
    </v-app>
</template>

<style scoped>
.auth-page {
    min-height: 100vh;
    position: relative;
}

.auth-card {
    backdrop-filter: blur(16px);
    background-color: rgba(var(--v-theme-surface), 0.8) !important;
    border: 1px solid rgba(var(--v-theme-primary), 0.1) !important;
}

.absolute { position: absolute; }
.inset-0 { top: 0; right: 0; bottom: 0; left: 0; }
.z-0 { z-index: 0; }
.z-10 { z-index: 10; }
.relative { position: relative; }
.bg-cover { background-size: cover; }
.bg-center { background-position: center; }
.transition-opacity { transition: opacity 0.5s ease-in-out; }
.ls-tight { letter-spacing: -0.02em !important; }

.v-theme--light .auth-card {
    background-color: rgba(255, 255, 255, 0.7) !important;
}

.v-theme--dark .auth-card {
    background-color: rgba(30, 41, 59, 0.7) !important;
}
</style>
