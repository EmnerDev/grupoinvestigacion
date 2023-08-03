<template>
    <Head title="Agregar personas" />

    <AuthenticatedLayout>
        <template #header> Agregar Personas </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="submit">
                    <div class="flex justify-around">
                        <div class="flex-initial w-64 ml-6">
                            <InputLabel for="name" value="DNI" />
                            <TextInput
                                name="dni"
                                id="dni"
                                type="text"
                                class="mt-1"
                                v-model="form.dni"
                            />
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial w-64 ml-6">
                            <InputLabel for="name" value="Nombre" />
                            <TextInput
                                name="name"
                                id="name"
                                type="text"
                                class="mt-1"
                                v-model="form.name"
                            />
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial w-64 ml-6">
                            <InputLabel for="name" value="Apellido Paterno" />
                            <TextInput
                                name="first_name"
                                id="first_name"
                                type="text"
                                class="mt-1"
                                v-model="form.first_name"
                            />
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial w-64 ml-6">
                            <InputLabel for="name" value="Apellido Materno" />
                            <TextInput
                                name="last_name"
                                id="last_name"
                                type="text"
                                class="mt-1"
                                v-model="form.last_name"
                            />
                            <InputError class="mt-2" />
                        </div>
                    </div>

                    <div class="flex justify-around mt-6">
                        <div class="flex-initial w-64 ml-6" id="app">
                            <InputLabel for="name" value="Tipo de Persona" />
                            <select
                                v-model="form.id_tipo"
                                name="id_tipo"
                                id="id_tipo"
                                class="mt-1 block w-full"
                            >
                            <option value="0">Elige una Opcion</option>
                                <option
                                    v-for="tipo in tipos"
                                    :key="tipo.id"
                                    :value="tipo.id"
                                >
                                    {{ tipo.name }}
                                </option>
                            </select>
                        </div>
                        <div class="flex-initial w-64 ml-6">
                            <InputLabel for="name" value="Telefono" />
                            <TextInput
                                name="phone"
                                id="phone"
                                type="number"
                                class="mt-1"
                                v-model="form.phone"
                            />
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial w-64 ml-6">
                            <InputLabel for="name" value="Email" />
                            <TextInput
                                name="email"
                                id="email"
                                type="email"
                                class="mt-1"
                                v-model="form.email"
                            />
                            <InputError class="mt-2" />
                        </div>
                    </div>

                    <div class="mt-8 flex justify-center gap-4">
                        <PrimaryButton
                            class="px-10"
                            :disabled="form.processing"
                        >
                            Guardar
                        </PrimaryButton>
                        <DangerButton class="px-10">
                            Cancelar
                        </DangerButton>
                    </div>
                </form>

                <div
                    class=" mt-6 inline-block min-w-full overflow-hidden rounded-lg shadow"
                >
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="border-b bg-gray-50 text-left text-xs font-semibold uppercase tracking-wide text-gray-500"
                            >
                                <th
                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                >
                                    N°
                                </th>
                                <th
                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                >
                                    Dni
                                </th>
                                <th
                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                >
                                    Nombre
                                </th>
                                <th
                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                >
                                    Apellidos
                                </th>
                                <th
                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                >
                                    Condicion
                                </th>
                                <th
                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                >
                                    Telefono
                                </th>
                                <th
                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                >
                                    Email
                                </th>
                                <th
                                    class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                                >
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="persona, i in personas.data"
                                :key="persona.id"
                                class="text-gray-700"
                            >
                                <td
                                    class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                >
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ i+1 }}
                                    </p>
                                </td>
                                <td
                                    class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                >
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ persona.dni }}
                                    </p>
                                </td>
                                <td
                                    class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                >
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ persona.name }}
                                    </p>
                                </td>
                                <td
                                    class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                >
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ persona.first_name }}
                                        {{ persona.last_name }}
                                    </p>
                                </td>
                                <td
                                    class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                >
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ persona.tipo.name }}
                                    </p>
                                </td>
                                <td
                                    class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                >
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ persona.phone }}
                                    </p>
                                </td>
                                <td
                                    class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                >
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ persona.email }}
                                    </p>
                                </td>
                                <td class="border-b border-gray-200 bg-white px-5 py-5 text-sm">
                                    <WarningButton class="mr-1"><i class="fa-solid fa-edit">Editar</i></WarningButton>
                                    <DangerButton><i class="fa-solid fa-trash">Eliminar</i></DangerButton>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div
                        class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between"
                    >
                        <pagination :links="personas.links" />
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import WarningButton from "@/Components/WarningButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Pagination from '@/Components/Pagination.vue'

import { Head, useForm } from "@inertiajs/vue3";


const props = defineProps({
    personas: Object,
    tipos: Object,
});

const form = useForm({
    dni: "",
    name: "",
    first_name: "",
    last_name: "",
    id_tipo: 0,
    phone: "",
    email: "",
});

const submit = () => {
    form.post(route("registrar.persona"), {
        onFinish: () => form.reset('dni', 'name','first_name','last_name','id_tipo','phone', 'email'),
    });
};
</script>
