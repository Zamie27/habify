<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { register } from '@/routes';
import { store } from '@/routes/login';
import { request } from '@/routes/password';
import { useTheme } from 'vuetify';

const theme = useTheme();

defineOptions({
    layout: {
        title: 'Log in to your account',
        description: 'Enter your email and password below to log in',
    },
});

defineProps<{
    status?: string;
    canResetPassword: boolean;
    canRegister: boolean;
}>();

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.post(store.form().action, {
        onFinish: () => form.reset('password'),
    });
};
</script>

<template>
    <Head title="Log in" />

    <v-alert
        v-if="status"
        type="success"
        variant="tonal"
        class="mb-6 rounded-lg text-body-2"
    >
        {{ status }}
    </v-alert>

    <v-form @submit.prevent="submit" class="d-flex flex-column gap-4">
        <div class="mb-4">
            <v-text-field
                v-model="form.email"
                label="Email address"
                type="email"
                placeholder="email@example.com"
                variant="outlined"
                color="primary"
                density="comfortable"
                rounded="lg"
                persistent-hint
                :error-messages="form.errors.email"
                prepend-inner-icon="mdi-email-outline"
                required
                autofocus
            />
        </div>

        <div class="mb-2">
            <div class="d-flex justify-space-between align-center mb-1">
                <label class="text-caption font-weight-bold opacity-70">Password</label>
                <Link 
                    v-if="canResetPassword" 
                    :href="request().url" 
                    class="text-caption text-primary text-decoration-none font-weight-bold"
                >
                    Lupa Password?
                </Link>
            </div>
            <v-text-field
                v-model="form.password"
                label="Password"
                type="password"
                variant="outlined"
                color="primary"
                density="comfortable"
                rounded="lg"
                :error-messages="form.errors.password"
                prepend-inner-icon="mdi-lock-outline"
                required
            />
        </div>

        <div class="mb-6">
            <v-checkbox
                v-model="form.remember"
                label="Ingat saya"
                color="primary"
                hide-details
                density="compact"
                class="mt-n2"
            />
        </div>

        <v-btn
            type="submit"
            color="primary"
            size="x-large"
            block
            rounded="pill"
            class="text-none font-weight-black py-4 mb-6"
            elevation="4"
            :loading="form.processing"
            :disabled="form.processing"
        >
            Masuk Sekarang
        </v-btn>

        <div v-if="canRegister" class="text-center">
            <span class="text-body-2 opacity-70">Belum punya akun? </span>
            <Link :href="register().url" class="text-body-2 text-primary text-decoration-none font-weight-bold">
                Daftar Gratis
            </Link>
        </div>
    </v-form>
</template>
