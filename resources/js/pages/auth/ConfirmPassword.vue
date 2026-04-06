<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import { store } from '@/routes/password/confirm';
import { useTheme } from 'vuetify';

const theme = useTheme();

defineOptions({
    layout: {
        title: 'Confirm your password',
        description: 'This is a secure area of the application. Please confirm your password before continuing.',
    },
});

const form = useForm({
    password: '',
});

const submit = () => {
    form.post(store.form().action, {
        onFinish: () => form.reset(),
    });
};
</script>

<template>
    <Head title="Konfirmasi Password" />

    <div class="text-body-2 opacity-80 mb-8 text-center leading-relaxed">
        Ini adalah area aman aplikasi. Harap konfirmasikan kata sandi Anda sebelum melanjutkan ke tahap berikutnya.
    </div>

    <v-form @submit.prevent="submit" class="d-flex flex-column gap-4">
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
            Konfirmasi Password
        </v-btn>
        
        <v-btn
            href="/"
            tag="a"
            variant="text"
            block
            rounded="pill"
            class="text-none font-weight-bold opacity-70 mt-2"
        >
            Batalkan
        </v-btn>
    </v-form>
</template>
