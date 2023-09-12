<template>
    <Head title="Evaluacion de Grupos de Investigacion" />

    <AuthenticatedLayout>
        <template #header>
            Evaluacion de Grupos de Investigacion
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div class="overflow-x-auto rounded-lg shadow mt-6">
                        <div class="mb-4">
                            <InputLabel for="name" value="Integrantes: " />
                            <div class="flex justify-center mb-6">
                                <PrimaryButton @click="openModal(1)" class="">
                                    <i class="fa-solid fa-plus-circle"></i>
                                    Agregar Evaluacion
                                </PrimaryButton>
                            </div>
                            <table class="w-full table-auto">
                                <thead>
                                    <tr>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            N°
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            Grupos
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            Integrantes
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            condicion
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            Orcid
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            Cti Vitae
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            google Scholar
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="(inte, i) in intePerson"
                                        :key="inte.id" :value="inte.id"
                                    >
                                        <td
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            <p
                                                class="text-gray-900 whitespace-no-wrap"
                                            >
                                                {{ i + 1 }}
                                            </p>
                                        </td>
                                        <td
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            <p
                                                class="text-gray-900 whitespace-no-wrap"
                                            >
                                                {{ inte.persona.name }}
                                            </p>
                                        </td>
                                        <td
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            <p
                                                class="text-gray-900 whitespace-no-wrap"
                                            >
                                                {{ inte.persona.first_name }}
                                                {{ inte.persona.last_name }}
                                            </p>
                                        </td>
                                        <td
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            <p
                                                class="text-gray-900 whitespace-no-wrap"
                                            >
                                                {{ inte.condition }}
                                            </p>
                                        </td>
                                        <td
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            <p
                                                class="text-gray-900 whitespace-no-wrap"
                                            >
                                                {{ inte.orcid }}
                                            </p>
                                        </td>
                                        <td
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            <p
                                                class="text-gray-900 whitespace-no-wrap"
                                            >
                                                {{ inte.cti_vitae }}
                                            </p>
                                        </td>
                                        <td
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            <p
                                                class="text-gray-900 whitespace-no-wrap"
                                            >
                                                {{ inte.google_scholar }}
                                            </p>
                                        </td>
                                        <td
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            <WarningButton
                                                class="mr-1"
                                                @click="
                                                    openModal(
                                                        2,
                                                        inte.persona.dni,
                                                        inte.persona.name,
                                                        inte.persona.first_name,
                                                        inte.persona.last_name,
                                                        inte.persona.phone,
                                                        inte.persona.email,
                                                        inte.condition,
                                                        inte.orcid,
                                                        inte.cti_vitae,
                                                        inte.google_scholar,
                                                        inte.id_grupo,
                                                        inte.id_persona,
                                                        inte.id
                                                    )
                                                "
                                            >
                                                <i class="fa-solid fa-edit"></i>
                                            </WarningButton>
                                            <DangerButton
                                                ><i
                                                    class="fa-solid fa-trash"
                                                ></i
                                            ></DangerButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue'
import { Head } from '@inertiajs/vue3';
</script>
