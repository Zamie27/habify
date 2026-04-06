<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { login } from '@/routes';
import { email } from '@/routes/password';
import { useTheme } from 'vuetify';

const theme = useTheme();

defineOptions({
    layout: {
        title: 'Forgot password',
        description: 'Enter your email to receive a password reset link',
    },
});

defineProps<{
    status?: string;
}>();

const form = useForm({
    email: '',
});

const submit = () => {
    form.post(email.form().action);
};
</script>

<template>
    <Head title="Lupa Password" />

    <v-alert
        v-if="status"
        type="success"
        variant="tonal"
        class="mb-6 rounded-lg text-body-2"
    >
        {{ status }}
    </v-alert>

    <v-form @submit.prevent="submit" class="d-flex flex-column gap-4">
        <v-text-field
            v-model="form.email"
            label="Alamat Email"
            type="email"
            placeholder="email@example.com"
            variant="outlined"
            color="primary"
            density="comfortable"
            rounded="lg"
            :error-messages="form.errors.email"
            prepend-inner-icon="mdi-email-outline"
            required
            autofocus
        />

        <v-btn
            type="submit"
            color="primary"
            size="x-large"
            block
            rounded="pill"
            class="text-none font-weight-black py-4 mt-2"
            elevation="4"
            :loading="form.processing"
            :disabled="form.processing"
        >
            Kirim Link Reset
        </v-btn>

        <div class="text-center mt-6">
            <span class="text-body-2 opacity-70">Ingat password Anda? </span>
            <Link :href="login().url" class="text-body-2 text-primary text-decoration-none font-weight-bold">
                Kembali ke Login
            </Link>
        </div>
    </v-form>
</template>
