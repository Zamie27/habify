<script setup lang="ts">
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import { update } from '@/routes/password';
import { useTheme } from 'vuetify';

const theme = useTheme();

defineOptions({
    layout: {
        title: 'Reset password',
        description: 'Please enter your new password below',
    },
});

const props = defineProps<{
    token: string;
    email: string;
}>();

const inputEmail = ref(props.email);

const form = useForm({
    token: props.token,
    email: props.email,
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(update.form().action, {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<template>
    <Head title="Reset Password" />

    <v-form @submit.prevent="submit" class="d-flex flex-column gap-3">
        <v-text-field
            v-model="inputEmail"
            label="Email"
            type="email"
            variant="outlined"
            color="primary"
            density="comfortable"
            rounded="lg"
            readonly
            disabled
            :error-messages="form.errors.email"
            prepend-inner-icon="mdi-email-outline"
        />

        <v-text-field
            v-model="form.password"
            label="Password Baru"
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

        <v-text-field
            v-model="form.password_confirmation"
            label="Konfirmasi Password Baru"
            type="password"
            variant="outlined"
            color="primary"
            density="comfortable"
            rounded="lg"
            :error-messages="form.errors.password_confirmation"
            prepend-inner-icon="mdi-lock-check-outline"
            required
        />

        <v-btn
            type="submit"
            color="primary"
            size="x-large"
            block
            rounded="pill"
            class="text-none font-weight-black py-4 mt-4"
            elevation="4"
            :loading="form.processing"
            :disabled="form.processing"
        >
            Reset Password
        </v-btn>
    </v-form>
</template>
