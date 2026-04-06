<script setup lang="ts">
import { Head, useForm, setLayoutProps } from '@inertiajs/vue3';
import { computed, ref, watchEffect } from 'vue';
import { store } from '@/routes/two-factor/login';
import type { TwoFactorConfigContent } from '@/types';
import { useTheme } from 'vuetify';

const theme = useTheme();

const authConfigContent = computed<TwoFactorConfigContent>(() => {
    if (showRecoveryInput.value) {
        return {
            title: 'Recovery code',
            description: 'Konfirmasi akses ke akun Anda dengan memasukkan salah satu kode pemulihan darurat Anda.',
            buttonText: 'Gunakan kode autentikasi',
        };
    }

    return {
        title: 'Authentication code',
        description: 'Masukkan kode autentikasi yang diberikan oleh aplikasi autentikator Anda.',
        buttonText: 'Gunakan kode pemulihan',
    };
});

watchEffect(() => {
    setLayoutProps({
        title: authConfigContent.value.title,
        description: authConfigContent.value.description,
    });
});

const showRecoveryInput = ref<boolean>(false);

const form = useForm({
    code: '',
    recovery_code: '',
});

const toggleRecoveryMode = (): void => {
    showRecoveryInput.value = !showRecoveryInput.value;
    form.clearErrors();
    form.code = '';
    form.recovery_code = '';
};

const submit = () => {
    form.post(store.form().action, {
        onFinish: () => {
            form.code = '';
            form.recovery_code = '';
        },
    });
};
</script>

<template>
    <Head title="Two-factor Authentication" />

    <v-form @submit.prevent="submit" class="d-flex flex-column align-center gap-6">
        <template v-if="!showRecoveryInput">
            <v-otp-input
                v-model="form.code"
                type="number"
                length="6"
                color="primary"
                :disabled="form.processing"
                autofocus
            />
            
            <v-alert
                v-if="form.errors.code"
                type="error"
                variant="tonal"
                class="w-100 text-caption py-2"
            >
                {{ form.errors.code }}
            </v-alert>

            <v-btn
                type="submit"
                color="primary"
                size="x-large"
                block
                rounded="pill"
                class="text-none font-weight-black py-4 mt-2"
                elevation="4"
                :loading="form.processing"
                :disabled="form.processing || form.code.length < 6"
            >
                Lanjutkan
            </v-btn>
        </template>

        <template v-else>
            <div class="w-100 d-flex flex-column gap-4">
                <v-text-field
                    v-model="form.recovery_code"
                    label="Kode Pemulihan"
                    placeholder="Masukkan kode pemulihan"
                    variant="outlined"
                    color="primary"
                    density="comfortable"
                    rounded="lg"
                    :error-messages="form.errors.recovery_code"
                    prepend-inner-icon="mdi-shield-key-outline"
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
                    Lanjutkan
                </v-btn>
            </div>
        </template>

        <v-btn
            variant="text"
            block
            rounded="pill"
            class="text-none font-weight-bold opacity-70"
            @click="toggleRecoveryMode"
        >
            {{ authConfigContent.buttonText }}
        </v-btn>
    </v-form>
</template>

<style scoped>
.w-100 { width: 100%; }
</style>
