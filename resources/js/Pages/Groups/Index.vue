<template>
    <Head title="Grupos Investigacion" />

    <AuthenticatedLayout>
        <template #header>
            Grupos de Investigación
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <form action="">
                    <div class="flex">
                        <div class="flex-initial w-64 ml-6">
                            <InputLabel for="name" value="Nombre del Grupo" />
                            <TextInput id="name" type="text" class="mt-1"/>
                            <InputError class="mt-2" />
                        </div>
                        <div class=" flex-initial w-64 ml-6">
                            <InputLabel for="name" value="Facultad" />
                            <select name="" id="" class="mt-1 block w-full">
                                <option value="">asda</option>
                            </select>
                        </div>
                        <div class="flex-initial w-64 ml-6">
                            <InputLabel for="name" value="Escuela" />
                            <select name="" id="" class="mt-1 block w-full">
                                <option value="">asda</option>
                            </select>
                        </div>
                        <div class="flex-initial w-64 ml-6">
                            <InputLabel for="name" value="Linea de Investigación" />
                            <select name="" id="" class="mt-1 block w-full">
                                <option value="">asda</option>
                            </select>
                        </div>

                    </div>

                    <div class="mt-4 flex flex-col">
                        <InputLabel for="name" value="Integrantes" />                       
                        <PrimaryButton class="">
                            Agregar Integrantes
                        </PrimaryButton>
                        <table class="mt-4">
                            <thead>
                                <tr>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>condicion</th>
                                    <th>Orcid</th>
                                    <th>Cti Vitae</th>
                                    <th>google Scholar</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Dropdown from '@/Components/Dropdown.vue';

import { Head, Link, useForm } from '@inertiajs/vue3';
</script>