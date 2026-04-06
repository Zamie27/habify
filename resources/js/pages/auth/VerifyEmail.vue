<script setup lang="ts">
import { Head, Link, useForm } from '@inertiajs/vue3';
import { logout } from '@/routes';
import { send } from '@/routes/verification';
import { useTheme } from 'vuetify';

const theme = useTheme();

defineOptions({
    layout: {
        title: 'Verify email',
        description: 'Please verify your email address by clicking on the link we just emailed to you.',
    },
});

defineProps<{
    status?: string;
}>();

const form = useForm({});

const submit = () => {
    form.post(send.form().action);
};
</script>

<template>
    <Head title="Verifikasi Email" />

    <v-alert
        v-if="status === 'verification-link-sent'"
        type="success"
        variant="tonal"
        class="mb-6 rounded-lg text-body-2"
    >
        Link verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.
    </v-alert>

    <div class="text-body-2 opacity-80 mb-8 text-center leading-relaxed">
        Terima kasih telah mendaftar! Sebelum memulai, harap verifikasi alamat email Anda dengan mengeklik tautan yang baru saja kami kirimkan. Jika Anda tidak menerima email tersebut, kami dengan senang hati akan mengirimkan yang baru.
    </div>

    <v-form @submit.prevent="submit" class="d-flex flex-column gap-4">
        <v-btn
            type="submit"
            color="primary"
            size="x-large"
            block
            rounded="pill"
            class="text-none font-weight-black py-4"
            elevation="4"
            :loading="form.processing"
            :disabled="form.processing"
        >
            Kirim Ulang Email Verifikasi
        </v-btn>

        <v-btn
            :href="logout().url"
            tag="a"
            variant="text"
            block
            rounded="pill"
            class="text-none font-weight-bold opacity-70 mt-2"
        >
            Keluar
        </v-btn>
    </v-form>
</template>
