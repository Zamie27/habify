<script setup lang="ts">
import { Head, router } from '@inertiajs/vue3';
import { logout } from '@/routes';
import { useTheme } from 'vuetify';
import type { Auth } from '@/types';

const theme = useTheme();

defineProps<{
    auth: Auth;
}>();

defineOptions({
    layout: null, // Standalone for verification
});

const handleLogout = () => {
    router.post(logout().url);
};

const toggleTheme = () => {
    theme.global.name.value = theme.global.current.value.dark ? 'light' : 'dark';
};
</script>

<template>
    <v-app :theme="theme.global.name.value">
        <Head title="Dashboard" />

        <!-- Header -->
        <v-app-bar flat border="b" class="px-md-10">
            <v-toolbar-title class="font-weight-black text-h5 ls-tight">
                Habify
            </v-toolbar-title>

            <v-spacer></v-spacer>

            <v-btn icon @click="toggleTheme" class="mr-2">
                <v-icon>{{ theme.global.current.value.dark ? 'mdi-white-balance-sunny' : 'mdi-moon-waning-crescent' }}</v-icon>
            </v-btn>

            <v-menu min-width="200px" rounded>
                <template v-slot:activator="{ props }">
                    <v-btn icon v-bind="props">
                        <v-avatar color="primary" size="small">
                            <span class="text-caption">{{ auth.user.name.charAt(0) }}</span>
                        </v-avatar>
                    </v-btn>
                </template>
                <v-card>
                    <v-card-text>
                        <div class="mx-auto text-center">
                            <v-avatar color="primary" class="mb-2">
                                <span class="text-h6">{{ auth.user.name.charAt(0) }}</span>
                            </v-avatar>
                            <h3>{{ auth.user.name }}</h3>
                            <p class="text-caption mt-1">
                                {{ auth.user.email }}
                            </p>
                            <v-divider class="my-3"></v-divider>
                            <v-btn
                                variant="text"
                                rounded
                                block
                                class="text-none"
                                @click="handleLogout"
                                color="error"
                                prepend-icon="mdi-logout"
                            >
                                Keluar
                            </v-btn>
                        </div>
                    </v-card-text>
                </v-card>
            </v-menu>
        </v-app-bar>

        <v-main class="bg-background">
            <v-container class="py-10">
                <v-row>
                    <v-col cols="12">
                        <h1 class="text-h3 font-weight-black mb-2">Halo, {{ auth.user.name }}! 👋</h1>
                        <p class="text-h6 opacity-60 font-weight-regular">Selamat datang di dashboard Habify.</p>
                    </v-col>
                </v-row>

                <v-row class="mt-6">
                    <v-col cols="12" md="4">
                        <v-card rounded="xl" class="pa-6" elevation="2">
                            <v-icon color="primary" size="large" class="mb-4">mdi-calendar-check</v-icon>
                            <div class="text-h5 font-weight-bold">0 Habits</div>
                            <div class="text-caption opacity-60">Aktif hari ini</div>
                        </v-card>
                    </v-col>
                    <v-col cols="12" md="4">
                        <v-card rounded="xl" class="pa-6" elevation="2">
                            <v-icon color="info" size="large" class="mb-4">mdi-fire</v-icon>
                            <div class="text-h5 font-weight-bold">0 Days</div>
                            <div class="text-caption opacity-60">Streak terlama</div>
                        </v-card>
                    </v-col>
                    <v-col cols="12" md="4">
                        <v-card rounded="xl" class="pa-6" elevation="2">
                            <v-icon color="success" size="large" class="mb-4">mdi-trophy-outline</v-icon>
                            <div class="text-h5 font-weight-bold">Level 1</div>
                            <div class="text-caption opacity-60">Pencapaian baru</div>
                        </v-card>
                    </v-col>
                </v-row>

                <v-row class="mt-8">
                    <v-col cols="12">
                        <v-card rounded="xl" variant="outlined" class="pa-12 text-center border-dashed">
                            <v-icon size="64" color="grey-lighten-1" class="mb-4">mdi-playlist-plus</v-icon>
                            <h2 class="text-h5 font-weight-bold mb-2">Mulai Membangun Disiplin</h2>
                            <p class="text-body-1 opacity-60 mb-6">Anda belum memiliki habit apa pun. Tambahkan yang pertama sekarang!</p>
                            <v-btn color="primary" size="large" rounded="pill" class="text-none font-weight-bold px-8">
                                Tambah Habit Pertama
                            </v-btn>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-main>
    </v-app>
</template>

<style scoped>
.ls-tight { letter-spacing: -0.02em !important; }
.border-dashed { border-style: dashed !important; border-width: 2px !important; }
</style>
