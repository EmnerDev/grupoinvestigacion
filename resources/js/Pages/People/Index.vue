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
                    class="overflow-x-auto rounded-lg shadow mt-6"
                >
                <div class="mb-2">
                            <input
                                    type="text"
                                    v-model="search"
                                    placeholder="Buscar..."   
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-60 p-2.5 "
                                />
                        </div>
                    <table class="w-full table-auto">
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
                                    <WarningButton @click="openModal(2, persona.dni,persona.name,persona.first_name,persona.last_name,persona.id_tipo,persona.phone,persona.email, persona.id)" class="mr-1">
                                        <i class="fa-solid fa-edit"></i>
                                    </WarningButton>
                                    <DangerButton @click="deletePersona(persona.id, persona.name, persona.first_name, persona.last_name)"><i class="fa-solid fa-trash"></i></DangerButton>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div
                        class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between"
                    >
                        <paginator class="mt-3" :paginator="personas" />
                    </div>
                </div>
            </div>
        </div>
        <Modal :show="modal" @close="closeModal">
            <h2 class="p-3 text-lg font.medium text-gray-900">{{ title }}</h2>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="p-3">
                    <InputLabel for="dni" value="Dni:"></InputLabel>
                    <TextInput id="dni" ref="nameImput" v-model="form.dni" type="text" class="mt-1 block w-3/4"
                    placeholder="Dni"></TextInput>
                </div>
                <div class="p-3">
                    <InputLabel for="name" value="Nombres:"></InputLabel>
                    <TextInput id="name" v-model="form.name" type="text" class="mt-1 block w-3/4"
                    placeholder="Nombre" ref="nameImput"></TextInput>
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="p-3">
                    <InputLabel for="first_name" value="Apellido Paterno:"></InputLabel>
                    <TextInput id="first_name" v-model="form.first_name" type="text" class="mt-1 block w-3/4"
                    placeholder="Apellido Paterno"></TextInput>
                </div>
                <div class="p-3">
                    <InputLabel for="last_name" value="Apellido Materno:"></InputLabel>
                    <TextInput id="last_name" v-model="form.last_name" type="text" class="mt-1 block w-3/4"
                    placeholder="Apellido Materno"></TextInput>
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="p-3">
                    <InputLabel for="id_tipo" value="Tipo de Persona:"></InputLabel>
                    <SelectInput id="id_tipo" :options="tipos"
                    v-model="form.id_tipo" type="text" class="mt-1 block w-full">
                    </SelectInput>
                </div>
                <div class="p-3">
                    <InputLabel for="phone" value="Telefono:"></InputLabel>
                    <TextInput id="phone" v-model="form.phone" type="text" class="mt-1 block w-3/4"
                    placeholder="Telefono"></TextInput>
                </div>
            </div>
            <div class="p-3">
                <InputLabel for="email" value="Email:"></InputLabel>
                <TextInput id="email" v-model="form.email" type="text" class="mt-1 block w-3/4"
                placeholder="Correo Electrónico">
                </TextInput>
            </div>
            <div class="flex justify-center">
                <div class="p-3 mt-6">
                    <PrimaryButton :disabled="form.processing" @click="update">
                        <i class="fa-solid fa save"></i>Guardar
                    </PrimaryButton>
                </div>
                <div class="p-3 mt-6">
                    <SecondaryButton class="ml-3" :disabled="form.processing" @click="closeModal">
                        Cancelar
                    </SecondaryButton>
                </div>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import WarningButton from "@/Components/WarningButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Pagination from '@/Components/Pagination.vue'
import SelectInput from "@/Components/SelectInput.vue";
import Modal from "@/Components/Modal.vue";
import { Head, useForm, router } from "@inertiajs/vue3";

import Swal from "sweetalert2";
import '@fortawesome/fontawesome-free/css/all.css';
import { nextTick, ref } from "vue";
import { watch } from "vue";
import Paginator from "@/Components/Paginator.vue";

const  nameInput = ref(null);
const  modal = ref(false);
const title = ref('');
const operation = ref(1);
const id = ref('');

const props = defineProps({
    personas: {
        type: Object,
        default: () => ({}),
    },
    tipos: {
        type: Object},
    filters: {
        type: Object,
        default: () => ({}),
    },
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

const openModal = (op,dni, name, first_name, last_name, tipo, phone, email, persona) => {
    modal.value = true;
    nextTick( () => nameInput.value.focus());
    operation.value = op;
    id.value = persona;
    if (op == 2){
        title.value = 'Editar persona';
        form.dni =dni;
        form.name=name;
        form.first_name=first_name;
        form.last_name=last_name;
        form.id_tipo=tipo;
        form.phone=phone;
        form.email = email;
    }
}

const closeModal = () => {
    modal.value = false;
    form.reset();
}

let search = ref(props.filters.search);
watch(search, (value) => {
    router.get(
        "/personas",
        { search: value },
        {
            preserveState: true,
            replace: true,
        }
    );
});

const submit = () => {
        form.post(route("registrar.persona"),{
            onSuccess: () => {ok('Registro creado Correctamente')},
        });    
};
const update = () => {
    console.log('asdad',id.value)
    form.put(route('actualizar.persona', id.value),{
            onSuccess: () => {ok('Registro Actualizado Correctamente')},
        
        });   
};

const ok = (msj) => {
    form.reset();
    closeModal();
    Swal.fire({title:msj, icon:'success'});
}

const deletePersona = (id, name, first_name, last_name) => {
    const alerta = Swal.mixin({
        buttonsStyling:true
    });
    alerta.fire({
        title:'Estas seguro de eliminar a '+name+' '+first_name+' '+last_name+'?',
        icon: 'question', showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"></i> Si, eliminar',
        cancelButtonText:'<i class="fa-solid fa-ban"></i> Cancelar'
    }).then((result) => {
        if(result.isConfirmed) {
            form.delete(route('eliminar.persona', id),{
                onSuccess: () => {ok('Registro Eliminado Correctamente')}
            });
        }
    });
}
</script>
