<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { login } from '@/routes';
import { store } from '@/routes/register';
import { useTheme } from 'vuetify';

const theme = useTheme();

defineOptions({
    layout: {
        title: 'Create an account',
        description: 'Enter your details below to create your account',
    },
});

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(store.form().action, {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Register" />

    <v-form @submit.prevent="submit" class="d-flex flex-column gap-3">
        <v-text-field
            v-model="form.name"
            label="Nama Lengkap"
            placeholder="Contoh: John Doe"
            variant="outlined"
            color="primary"
            density="comfortable"
            rounded="lg"
            :error-messages="form.errors.name"
            prepend-inner-icon="mdi-account-outline"
            required
            autofocus
        />

        <v-text-field
            v-model="form.email"
            label="Email address"
            type="email"
            placeholder="email@example.com"
            variant="outlined"
            color="primary"
            density="comfortable"
            rounded="lg"
            :error-messages="form.errors.email"
            prepend-inner-icon="mdi-email-outline"
            required
        />

        <v-row no-gutters class="gap-4 flex-nowrap d-none d-md-flex">
            <v-col>
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
            </v-col>
            <v-col>
                <v-text-field
                    v-model="form.password_confirmation"
                    label="Konfirmasi Password"
                    type="password"
                    variant="outlined"
                    color="primary"
                    density="comfortable"
                    rounded="lg"
                    :error-messages="form.errors.password_confirmation"
                    prepend-inner-icon="mdi-lock-check-outline"
                    required
                />
            </v-col>
        </v-row>

        <!-- Mobile version -->
        <div class="d-flex flex-column gap-3 d-md-none">
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
            <v-text-field
                v-model="form.password_confirmation"
                label="Konfirmasi Password"
                type="password"
                variant="outlined"
                color="primary"
                density="comfortable"
                rounded="lg"
                :error-messages="form.errors.password_confirmation"
                prepend-inner-icon="mdi-lock-check-outline"
                required
            />
        </div>

        <div class="text-caption opacity-60 mb-4">
            Dengan mendaftar, Anda menyetujui Ketentuan Layanan dan Kebijakan Privasi kami.
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
            Daftar Akun
        </v-btn>

        <div class="text-center">
            <span class="text-body-2 opacity-70">Sudah punya akun? </span>
            <Link :href="login().url" class="text-body-2 text-primary text-decoration-none font-weight-bold">
                Masuk di sini
            </Link>
        </div>
    </v-form>
</template>
