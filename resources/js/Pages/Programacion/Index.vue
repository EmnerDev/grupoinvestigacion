<template>
    <Head title="Users" />

    <AuthenticatedLayout>
        <template #header> Usuarios </template>

        <div
            class="mb-4 inline-flex w-full overflow-hidden rounded-lg bg-white shadow-md"
        >
            <div class="flex w-12 items-center justify-center bg-blue-500">
                <svg
                    class="h-6 w-6 fill-current text-white"
                    viewBox="0 0 40 40"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z"
                    ></path>
                </svg>
            </div>

            <div class="-mx-3 px-4 py-2">
                <div class="mx-3">
                    <span class="font-semibold text-blue-500">Info</span>
                    <p class="text-sm text-gray-600">Programacion para la inscripción de grupos de investigación</p>
                </div>
            </div>
        </div>

        <div v-role="'Administrador'" class="flex justify-center mb-6">
            <PrimaryButton @click="openModal(1)" class="">
                <i class="fa-solid fa-plus-circle"></i>
                Agregar Programacion
                
            </PrimaryButton>
        </div>
       
        <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
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
                            Año
                        </th>
                        <th
                            class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                        >
                            Tipo de Programacion
                        </th>
                        <th
                            class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                        >
                            Fecha de Inicio
                        </th>
                        <th
                            class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                        >
                            Fecha de Fin
                        </th>
                        <th
                            class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                        >
                            Descripción
                        </th>
                        <th
                            class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                        >
                            Estado
                        </th>
                        <th
                            class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                        >
                            Accion
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <template v-for="progra,i in programacions.data" :key="progra.id">
                            <tr
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
                                       {{ progra.year }}
                                    </p>
                                </td>
                                <td
                                    class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                >
                                    <p class="text-gray-900 whitespace-no-wrap">
                                       {{ progra.programin_type }}
                                    </p>
                                </td>
                                <td
                                    class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                >
                                    <p class="text-gray-900 whitespace-no-wrap">
                                       {{ progra.start_date }}
                                    </p>
                                </td>
                                <td
                                    class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                >
                                    <p class="text-gray-900 whitespace-no-wrap">
                                       {{ progra.end_date }}
                                    </p>
                                </td>
                                <td
                                    class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                >
                                    <p class="text-gray-900 whitespace-no-wrap">
                                       {{ progra.description }}
                                    </p>
                                </td>
                                <td
                                    class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                >
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        <div :class="{'bg-green-500 text-white text-center font-bold rounded-md': progra.status, 'bg-red-500 text-center text-white font-bold rounded-md': !progra.status}">
                                       
                                        {{ progra.status == 1 ? 'Activo' : 'Inactivo' }}
                                    </div>
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
                                                progra.year,
                                                progra.programin_type,
                                                progra.start_date,
                                                progra.end_date,
                                                progra.description,
                                                progra.status,
                                                progra.id
                                            )
                                        "
                                    >
                                        <i class="fa-solid fa-edit"></i>
                                    </WarningButton>
                                    <DangerButton
                                        @click="
                                            deleteUser(progra.id
                                            )
                                        "
                                        ><i class="fa-solid fa-trash"></i
                                    ></DangerButton>
                                </td>
                            </tr>
                        <!-- </template> -->
                    </template>
                </tbody>
            </table>

            <div
                class="flex flex-col items-center border-t bg-white px-5 py-5 xs:flex-row xs:justify-between"
            >
                <pagination :links="programacions.links" />
            </div>
        </div>
        <Modal :show="modal" @close="closeModal">
            <h2 class="p-3 bg-blue-700 text-white text-lg font-medium text-gray-900">{{ title }}</h2>
            
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="p-3">
                    <InputLabel for="year" value="Año:"></InputLabel>
                    <TextInput
                        id="year"
                        ref="nameImput"
                        v-model="form.year"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Año"
                    ></TextInput>
                </div>
                <div class="p-3">
                    <InputLabel for="programin_type" value="Tipo de programacion:"></InputLabel>
                    <v-select
                        name="programin_type"
                        id="programin_type"
                        class="mt-1"
                        :items="condicionesOptions"
                        v-model="form.programin_type"
                        item-value="id"
                        item-title = "name"
                        placeholder="Seleccione Categoria"
                        variant="outlined"
                    >
                
                    </v-select>
                    <!-- <select
                        name="programin_type"
                        id="programin_type"
                        class="mt-1 block w-full rounded-md"
                        v-model="form.programin_type"
                    >
                        <option
                            v-for="(label, value) in condiciones"
                            :key="value"
                            :value="value"
                        >
                            {{ label }}
                        </option>
                    </select>                     -->
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="p-3">
                    <InputLabel
                        for="first_name"
                        value="Fecha de Inicio:"
                    ></InputLabel>
                    <TextInput
                        id="first_name"
                        v-model="form.start_date"
                        type="date"
                        class="mt-1 block w-3/4"
                    ></TextInput>
                </div>
                <div class="p-3">
                    <InputLabel
                        for="end_date"
                        value="Fecha de Fin:"
                    ></InputLabel>
                    <TextInput
                        id="end_date"
                        v-model="form.end_date"
                        type="date"
                        class="mt-1 block w-3/4"
                    ></TextInput>
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">                
                <div class="p-3">
                    <InputLabel for="description" value="Descripcion:"></InputLabel>
                    <textarea
                        id="email"
                        v-model="form.description"
                        type="text"
                        class="w-full rounded-md"
                        placeholder="Descripcion"
                    >
                    </textarea>
                </div>
                <div class="p-3">
                    <InputLabel class="flex items-center" for="status" value="Estado: " />
                    <div class="flex mt-5">
                        <label class="flex items-center">
                        <input
                            type="radio"
                            v-model="form.status"
                            :value="true"
                            class="form-radio h-5 w-5 text-indigo-600"
                        />
                        <span class="ml-2 text-gray-700">Activo</span>
                    </label>
                    <label class="flex items-center ml-4">
                        <input
                            type="radio"
                            v-model="form.status"
                            :value="false"
                            class="form-radio h-5 w-5 text-red-500"
                        />
                        <span class="ml-2 text-gray-700">Inactivo</span>
                    </label>
                    </div>
                    <InputError class="mt-2" :message="form.errors.status" />
                </div>
            </div>
            <div class="flex justify-center">
                <div class="p-3 mt-6">
                    <PrimaryButton :disabled="form.processing" @click="submit">
                        <i class="fa-solid fa save"></i>Guardar
                    </PrimaryButton>
                </div>
                <div class="p-3 mt-6">
                    <SecondaryButton
                        class="ml-3"
                        :disabled="form.processing"
                        @click="closeModal"
                    >
                        Cancelar
                    </SecondaryButton>
                </div>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import LinkPrimaryButton from "@/Components/LinkPrimaryButton.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import DangerButton from "@/Components/DangerButton.vue";
import WarningButton from "@/Components/WarningButton.vue";
import LinkWarningButton from "@/Components/LinkWarningButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Pagination from "@/Components/Pagination.vue";

import Modal from "@/Components/Modal.vue";
import Swal from "sweetalert2";
import "@fortawesome/fontawesome-free/css/all.css";
import { nextTick, ref, onMounted, reactive, computed } from "vue";
import axios from "axios";
import { Head, useForm, usePage } from "@inertiajs/vue3";

//uso del Toast
import { Toast } from "@/Composables/Toast.js";
import { watch } from "vue";


const toast = Toast();

const nameInput = ref(null);
const modal = ref(false);
const title = ref("");
const operation = ref(1);
const id = ref(0);


const props = defineProps({
    programacions: Object,
    condiciones:{
        type:Object,
        default: () =>({
            'INSCRIPCION': 'INSCRIPCION',
            'REVALIDACION' : 'REVALIDACION',
        }),
    },
});


const form = useForm({
    year: "",
    programin_type: "INSCRIPCION",
    start_date: "",
    end_date: "",
    description: "",
    status: true,
});


const openModal = (
    op,
    year,
    programin_type,
    start_date,
    end_date,
    description,
    status,
    programacion,
) => {
    modal.value = true;
    nextTick(() => {
    if (nameInput.value) {
        nameInput.value.focus()
        }
    });
    operation.value = op;
    id.value = programacion;
    if (op === 1) {
        title.value = "Agregar Programacion";
    } else {
        title.value = "Editar Programacion";
        form.year = year;
        form.programin_type = programin_type;
        form.start_date = start_date;
        form.end_date = end_date;
        form.description = description;
        form.status = Boolean(status);
        
        // Añade esta línea para verificar el valor de form.status
        console.log('Valor de form.status al abrir modal:', form.status);
    }
};



// const searchUserVue = () => {
//     axios
//         .get(`/search-user/${form.nameu}`)
//         .then((response) => {
//             const persona = response.data;
//             if (persona) {
//                 form.name = persona.name;
//                 form.first_name = persona.first_name;
//                 form.last_name = persona.last_name;
//                 //form.phone = persona.phone;
//                 form.email = persona.email;
//             } else {
//                 form.name = "";
//                 form.first_name = "";
//                 form.last_name = "";
//                 //form.phone = "";
//                 form.email = "";
//             }
//         })
//         .catch((error) => {
//             console.error(error);
//         });
// };

const closeModal = () => {
    modal.value = false;
    form.reset();
};

const submit =  () => {
 
        if (operation.value === 1) {
            form.post(route("guardar.programacion"),{
            onSuccess: () => { 
                form.reset();
                closeModal();
                //ok("Registro Creado Correctamente");
                toast.toast('Exito', 'Registrado Correctamente','success');},
        }); 
        } else {
            // Actualizar (PUT)
            form.put(route("actualizar.programacion", id.value),{
            onSuccess: () => {
                form.reset();
                closeModal();
                toast.toast('Exito', 'Actualizado Correctamente','success');
            },
        }); 
        }
  
};

const ok = (msj) => {
    form.reset();
    closeModal();
    Swal.fire({ title: msj, icon: "success" });
};

const deleteUser = (id) => {
    const alerta = Swal.mixin({
        buttonsStyling:true
    });
    alerta.fire({
        title:'Estas seguro de eliminar esta programación',
        icon: 'question', showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"></i> Si, eliminar',
        cancelButtonText:'<i class="fa-solid fa-ban"></i> Cancelar'
    }).then((result) => {
        if(result.isConfirmed) {
            form.delete(route('eliminar.programacion', id),{
                onSuccess: () => {
                    form.reset();
                    closeModal();
                    toast.toast("Exito", "Eliminado Correctamente", "danger");
                },
            });
        }
    });
}

const condicionesOptions = computed(() => {
  return Object.entries(props.condiciones).map(([id, name]) => ({ id, name }));
});


</script>
