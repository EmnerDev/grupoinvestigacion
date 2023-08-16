<template>
    <Head title="Grupos Investigacion" />

    <AuthenticatedLayout>
        <template #header>
            Grupos de Investigación
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <form @submit.prevent="submit">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Nombre del Grupo" />
                            <TextInput id="name" name="name" type="text" class="mt-1" v-model="form.name"/>
                            <InputError class="mt-2" />
                        </div>
                        <div class=" flex-initial ml-6">
                            <InputLabel for="name" value="Facultad" />
                            <select name="id_facultad" id="id_facultad" class="mt-1 block w-full" v-model="form.id_facultad"  @change="updateEscuelas">
                                <option value="0">Seleccione su Facultad</option>
                                <option v-for="fac in facultades" :key="fac.id" :value="fac.id">{{ fac.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial  ml-6">
                            <InputLabel for="name" value="Escuela" />
                            <select  name="id_escuela" id="id_escuela" class="mt-1 block w-full" v-model="form.id_escuela">
                                <option value="0">Seleccione la Escuela</option>
                                <option v-for="esc in escuelasfilter" :key="esc.id" :value="esc.id">{{ esc.name }}</option>
                            </select>
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Area de Investigación" />
                            <select name="id_area" id="id_area" class="mt-1 block w-full" v-model="form.id_area" @change="updatelineas">
                                <option value="0">Seleccione el Area</option>
                                <option v-for="ar in areas" :key="ar.id" :value="ar.id">{{ ar.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Linea" />
                            <select  name="id_linea" id="id_linea" class="mt-1 block w-full" v-model="form.id_linea" @change="updateSublineas">
                                <option value="0">Seleccione la Linea</option>
                                <option v-for="li in lineasfiltered" :key="li.id" :value="li.id">{{ li.name }}</option>
                            </select>
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Sublinea" />
                            <select name="id_sublinea" id="id_sublinea" class="mt-1 block w-full" v-model="form.id_sublinea">
                                <option value="0">Seleccione la Sublinea</option>
                                <option v-for="su in sublineasFiltered" :key="su.id" :value="su.id">{{ su.name }}</option>
                            </select>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-1">
                        <div class="flex-initial ml-6">
                                <InputLabel for="name" value="Responsable" />
                                <select name="id_persona" id="id_persona" class="mt-1 block w-full" v-model="form.id_persona">
                                    <option value="0">Seleccione Responsable</option>
                                    <option v-for="per in personas" :key="per.id" :value="per.id">{{ per.name }} {{ per.first_name }} {{ per.last_name }} - {{ per.tipo.name }}</option>
                                </select>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Espacio de Investigación" />
                            <textarea name="space_inves" id="space_inves" cols="20" rows="5" class="w-full" v-model="form.space_inves"></textarea>
                            <InputError class="mt-2" />
                        </div>
                        <div class=" flex-initial ml-6">
                            <InputLabel for="name" value="Presentacion del grupo" />
                            <textarea name="pre_group_inv" id="pre_group_inv" cols="20" rows="5" class="w-full" v-model="form.pre_group_inv"></textarea>
                            <InputError class="mt-2" />
                        </div>
                        <div class=" flex-initial ml-6">
                            <InputLabel for="name" value="objetivos" />
                            <textarea name="objective" id="objective" cols="20" rows="5" class="w-full" v-model="form.objective"></textarea>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Objetivo desarrollo sostenible" />
                            <textarea name="obj_desa_soste_l_i" id="obj_desa_soste_l_i" cols="20" rows="5" class="w-full" v-model="form.obj_desa_soste_l_i"></textarea>
                            <InputError class="mt-2" />
                        </div>
                        <div class=" flex-initial ml-6">
                            <InputLabel for="name" value="Servicios" />
                            <textarea name="services" id="services" cols="20" rows="5" class="w-full" v-model="form.services"></textarea>
                            <InputError class="mt-2" />
                        </div>
                        <div class=" flex-initial ml-6">
                            <InputLabel for="name" value="Laboratorio" />
                            <textarea name="laboratory" id="laboratory" cols="20" rows="5" class="w-full" v-model="form.laboratory"></textarea>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-1">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Equipamiento de  laboratorio" />
                            <textarea name="labora_equip" id="labora_equip" cols="20" rows="5" class="w-full" v-model="form.labora_equip"></textarea>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Pagina Web" />
                            <TextInput id="pagina" name="pagina" type="text" class="mt-1" v-model="form.pagina"/>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Oficina" />
                            <TextInput id="office" name="office" type="text" class="mt-1" v-model="form.office"/>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Telefono" />
                            <TextInput id="phone" name="phone" type="text" class="mt-1" v-model="form.phone"/>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="anexo" />
                            <TextInput id="annexed" name="annexed" type="text" class="mt-1" v-model="form.annexed"/>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="mt-8 flex justify-center gap-4">
                        <PrimaryButton
                            class="px-10"
                        >
                            Guardar
                        </PrimaryButton>
                        <DangerButton class="px-10">
                            Cancelar
                        </DangerButton>
                    </div>                   
                </form>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
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
import { watch, reactive } from "vue";
import Paginator from "@/Components/Paginator.vue";


const selectedFacultadId = ref(0);
const selectedAreaId = ref(0);
const selectedlineaId = ref(0);

let escuelasfilter = [];
let lineasfiltered = [];
let sublineasFiltered = [];

const props = defineProps({
    facultades: Array,
    escuelas: Array,
    areas: Object,
    lineas: Object,
    sublineas: Object,
    personas: Object,
    tipos: Object,
});

const form = useForm({
    name:"",
    space_inves:"",
    pre_group_inv:"",
    objective:"",
    obj_desa_soste_l_i:"",
    services:"",
    laboratory:"",
    phisical_environment:"",
    labora_equip:"",
    pagina:"",
    office:"",
    annexed:"",
    phone:"",
    id_area:0,
    id_linea:0,
    id_sublinea:0,
    id_facultad:0,
    id_escuela:0,
    id_persona:0
});

watch(() => form.id_facultad, (newId, oldId) => {
    if(newId !== oldId) {
        selectedFacultadId.value = newId;
        updateEscuelas();
    }
})

const updateEscuelas = () => {
    const selectedFacultad = props.facultades.find(fac => fac.id === selectedFacultadId.value);
    escuelasfilter = selectedFacultad ? props.escuelas.filter(es => es.id_facultad === selectedFacultad.id) : [];
    console.log('escuela', escuelasfilter);
    console.log('facu', selectedFacultad);
    form.id_escuela = 0;
};

watch(() => form.id_area, (newId, oldId) =>{
    if(newId !== oldId) {
        selectedAreaId.value = newId;
        form.id_linea = 0;
        form.id_sublinea = 0;
        updatelineas();
    }
});

watch(() => form.id_linea, (newId, oldId) => {
    if(newId !== oldId){
        selectedlineaId.value = newId;
        form.id_sublinea = 0;
        updateSublineas();
    }
});

const updatelineas = () => {
    const selectedArea = props.areas.find(area => area.id === selectedAreaId.value);
    lineasfiltered = selectedArea ? props.lineas.filter(linea => linea.id_area === selectedArea.id) : [];
};

const updateSublineas = () => {
    const selectedLinea = props.lineas.find(linea => linea.id === selectedlineaId.value);
    sublineasFiltered = selectedLinea ? props.sublineas.filter(sublinea => sublinea.id_linea === selectedLinea.id) : [];
};


const submit = () => {
        form.post(route("registrar.grupo"),{
            onSuccess: () => {ok('Registro creado Correctamente')},
        });    
};
const ok = (msj) => {
    form.reset();
    Swal.fire({title:msj, icon:'success'});
}
</script>