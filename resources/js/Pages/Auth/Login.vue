<template>
    <Head title="Log in" />

    <GuestLayout>
        <Link href="/" class="flex items-center justify-center">
            <ApplicationLogo class="h-20 w-20 fill-current text-gray-500" />
        </Link>

        <div v-if="status" class="mb-4 text-sm font-medium text-green-600">
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <InputLabel for="name" value="Usuario" />
                <v-text-field id="name" type="text" class="mt-1 block w-full"  variant="outlined" v-model="form.name" required autofocus autocomplete="username" />
                <InputError class="mt-2" :message="form.errors.name" />
            </div>

            <div class="mt-3">
                <InputLabel for="password" value="Contraseña" />
                <v-text-field id="password" type="password" class="mt-1 block w-full" variant="outlined"  v-model="form.password" required autocomplete="current-password" />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <!-- <div class="mt-4 flex justify-between">
                <label class="inline-flex items-center">
                    <Checkbox name="remember" v-model:checked="form.remember" />
                    <span class="mx-2 text-sm text-gray-600">Remember me</span> </label>

                <Link v-if="canResetPassword" :href="route('password.request')" class="text-sm text-gray-600 underline hover:text-gray-900">
                    Forgot your password?
                </Link>
            </div> -->

            <div v-if="cargando" class="text-center"><i class="fas fa-spinner fa-spin" style="color: blue; font-size: 35px;"></i></div>
            <div class="mt-6">
                <PrimaryButton class="w-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Ingresar
                </PrimaryButton>
            </div>
        </form>
    </GuestLayout>
</template>

<script setup>
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from "vue";
const cargando = ref(false);

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    name: '',
    password: '',
    remember: false
});

const submit = () => {
    cargando.value = true;
    form.post(route('login'), {
        onFinish: () => {
            form.reset('password');
            cargando.value = false;
        },
    });
};
</script>
