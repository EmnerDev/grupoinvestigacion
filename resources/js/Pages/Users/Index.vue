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
                    <p class="text-sm text-gray-600">Sample table page</p>
                </div>
            </div>
        </div>

        <div v-role="'Administrador'" class="flex justify-center mb-6">
            <PrimaryButton @click="openModal(1)" class="">
                <i class="fa-solid fa-plus-circle"></i>
                Agregar Usuario
                
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
                            Usuario
                        </th>
                        <th
                            class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                        >
                            Email
                        </th>
                        <th
                            class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                        >
                            Rol
                        </th>
                        <th
                            class="border-b-2 border-gray-200 bg-gray-100 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-600"
                        >
                            Accion
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <template v-for="user in users.data" :key="user.id">
                        <!-- <template v-for=" person in user.persona" :key="person.id"> -->
                            <tr
                                v-for="r in user.roles"
                                :key="r.id"
                                class="text-gray-700"
                            >
                                <td
                                    class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                >
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ user.persona.name }} {{ user.persona.first_name }} {{ user.persona.last_name }}
                                    </p>
                                </td>
                                <td
                                    class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                >
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ user.email }}
                                    </p>
                                </td>
                                <td
                                    class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                >
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ r.name }}
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
                                                r.id,
                                                user.name,
                                                user.persona.name,
                                                user.persona.first_name,
                                                user.persona.last_name,
                                                user.persona.email,
                                                user.password,
                                                user.password_confirmation,
                                                user.id,
                                                user.persona.id
                                            )
                                        "
                                    >
                                        <i class="fa-solid fa-edit"></i>
                                    </WarningButton>
                                    <DangerButton
                                        @click="
                                            deleteUser(
                                                user.id,
                                                user.persona.name,
                                                user.persona.first_name,
                                                user.persona.last_name
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
                <pagination :links="users.links" />
            </div>
        </div>
        <Modal :show="modal" @close="closeModal">
            <h2 class="p-3 text-lg font-medium text-gray-900">{{ title }}</h2>
            <!-- <TextInput
                type="hidden"
                name="id_grupo"
                v-model="form.id_grupo"
            ></TextInput> -->
            <!-- <div v-if="integrante_existente" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                {{ integrante_existente }}
            </div> -->
            <div
                class="p-6 border-b border-gray-200"
                style="background-color: #1027d4; text-align: center"
            >
                <label class="" style="color: #fff; font-weight: bold"
                    > Digite el DNI para rellenar automaticamente los campos si es que la persona ya se encuentra registrado en la  base de datos. Antes de guardar asegurarse de
                    asignar el rol</label
                >
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-1">
                <!-- <div class="p-3">
                    <InputLabel for="coordinador" value="Coordinadores: " />
                    <select
                        name="coordinador"
                        id="coordinador"
                        class="mt-1 block w-full"
                        v-model="form.coordinador"
                    >
                        <option value="0" disabled selected>
                            Selecciona un coordinador
                        </option>
                        <option
                            v-for="(integrante, value) in integrantes"
                            :key="integrante.id"
                            :value="integrante"
                        >
                            {{ integrante.persona.dni }} -
                            {{ integrante.persona.name }}
                            {{ integrante.persona.first_name }}
                            {{ integrante.persona.last_name }}
                        </option>
                    </select>
                </div> -->
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="p-3">
                    <InputLabel for="nameu" value="Dni:"></InputLabel>
                    <TextInput
                        id="nameu"
                        ref="nameImput"
                        v-model="form.nameu"
                        @input="searchUserVue"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Dni"
                    ></TextInput>
                </div>
                <div class="p-3">
                    <InputLabel for="name" value="Nombres:"></InputLabel>
                    <TextInput
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Nombre"
                        ref="nameImput"
                    ></TextInput>
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="p-3">
                    <InputLabel
                        for="first_name"
                        value="Apellido Paterno:"
                    ></InputLabel>
                    <TextInput
                        id="first_name"
                        v-model="form.first_name"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Apellido Paterno"
                    ></TextInput>
                </div>
                <div class="p-3">
                    <InputLabel
                        for="last_name"
                        value="Apellido Materno:"
                    ></InputLabel>
                    <TextInput
                        id="last_name"
                        v-model="form.last_name"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Apellido Materno"
                    ></TextInput>
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="p-3">
                    <InputLabel for="roles" value="Asignar Rol:"></InputLabel>
                    <select
                        name="roles"
                        id="roles"
                        class="mt-1 block w-full"
                        v-model="form.roles"
                    >
                        <option value="0" disabled selected>
                            Seleccione el Rol 
                        </option>
                        <option
                            v-for="(rol, value) in roles"
                            :key="rol.id"
                            :value="rol.id"
                        >
                            {{ rol.name }}
                        </option>
                    </select>
                </div>
                <div class="p-3">
                    <InputLabel for="email" value="Email:"></InputLabel>
                    <TextInput
                        id="email"
                        v-model="form.email"
                        type="text"
                        class="mt-1 block w-3/4"
                        placeholder="Correo Electrónico"
                    >
                    </TextInput>
                </div>
            </div>
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div class="p-3">
                    <InputLabel for="password" value="Contraseña" />
                    <TextInput
                        id="password"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.nameu"
                        required
                        autocomplete="new-password"
                    />
                    <InputError class="mt-2" :message="form.errors.password" />
                </div>

                <div class="p-3">
                    <InputLabel
                        for="password_confirmation"
                        value="Confirmar Contraseña"
                    />
                    <TextInput
                        id="password_confirmation"
                        type="password"
                        class="mt-1 block w-full"
                        v-model="form.nameu"
                        required
                        autocomplete="new-password"
                    />
                    <InputError
                        class="mt-2"
                        :message="form.errors.password_confirmation"
                    />
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
import { nextTick, ref, onMounted, reactive } from "vue";
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

const intePerson = ref([]);
const userInte = ref([]);
const rolIntegra= ref([]);

const props = defineProps({
    users: Object,
    personas: Object,
    roles: Object,
});


const form = useForm({
    roles: 0,
    nameu: "",
    name: "",
    first_name: "",
    last_name: "",
    email: "",
    password: "",
    password_confirmation: "",
});


const openModal = (
    op,
    roles,
    nameu,
    name,
    first_name,
    last_name,
    email,
    password,
    password_confirmation,
    user,
    person_id
) => {
    modal.value = true;
    nextTick(() => nameInput.value.focus());
    operation.value = op;
    id.value = user;
    if (op == 1) {
        title.value = "Agregar Usuarios";
    } else {
        title.value = "Editar Usuarios";
        form.id = user;
        form.person_id = person_id;
        form.roles = roles;
        form.nameu = nameu;
        form.name = name;
        form.first_name = first_name;
        form.last_name = last_name;
        form.email = email;
        form.password = password;
        form.password_confirmation = password_confirmation;
    }
};



const searchUserVue = () => {
    axios
        .get(`/search-user/${form.nameu}`)
        .then((response) => {
            const persona = response.data;
            if (persona) {
                form.name = persona.name;
                form.first_name = persona.first_name;
                form.last_name = persona.last_name;
                //form.phone = persona.phone;
                form.email = persona.email;
            } else {
                form.name = "";
                form.first_name = "";
                form.last_name = "";
                //form.phone = "";
                form.email = "";
            }
        })
        .catch((error) => {
            console.error(error);
        });
};

const closeModal = () => {
    modal.value = false;
    form.reset();
};

onMounted(() => {
    userInte.value = props.users;
});

console.log('probando',userInte)
const submit = async () => {
    try {
        if (operation.value === 1) {
            // Guardar (POST)
            const response = await axios.post(route("user.store"), form);
            handleSuccess(response, "Registrado Correctamente");
        } else {
            // Actualizar (PUT)
            const response = await axios.put(route("actualizar.usuario", id.value), form);
            handleSuccess(response, "Registrado Actualizado Correctamente");
        }
    } catch (error) {
        handleError(error);
    }
};

const handleSuccess = (response, successMessage) => {
    console.log(response.data);

    const {data} = response.data;
    userInte.value = data;
    closeModal();
    toast.toast("Exito", successMessage, "success");
};

const handleError = (error) => {
    console.error(error);
    if (error.response && error.response.status == 422) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "El rol de coordinador solo se puede asignar a docentes nombrados. Por favor, verifique los datos",
        });
    }
    // Agregar manejo de otros errores según sea necesario
};

const ok = (msj) => {
    form.reset();
    closeModal();
    Swal.fire({ title: msj, icon: "success" });
};

const deleteUser = (id, name, first_name, last_name) => {
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
            form.delete(route('eliminar.usuario', id),{
                onSuccess: () => {toast.toast("Exito", "Usuario Eliminado Correctamente", "danger");}
            });
        }
    });
}

</script>
