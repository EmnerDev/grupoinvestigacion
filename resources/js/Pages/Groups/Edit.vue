<template>
    <Head title="Editar Grupos Investigacion" />

    <AuthenticatedLayout>
        <template #header>
            Editar Grupos de Investigación
        </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div class="p-6 border-b border-gray-200" style="background-color: #1027d4; text-align: center;">
                    <label class="" style="color: #fff; font-weight: bold;">Antes de guardar la edición verificar que los campos obligatorios(<span style="color: #e53e3e;"> * </span>) esten con datos</label>
                </div>
                <v-form @submit.prevent="update">
                    <div class="pt-6 grid gap-6 mb-6 md:grid-cols-3">
                        <div >
                            <InputLabel for="name" value="Nombre del Grupo" /><span style="color: #e53e3e;"> *</span>
                            <v-text-field id="name" name="name" type="text" class="mt-1" :rules="grupoRules" v-model="form.name" placeholder="Nombre del Grupo" variant="solo"></v-text-field>
                        </div>
                        <div >
                            <InputLabel for="name" value="Facultad" /><span style="color: #e53e3e;"> *</span>
                            <v-select
                                v-model="form.id_facultad"
                                :items="facultades"
                                :rules="facultadRules"
                                item-value="id"
                                item-title = "name"
                                placeholder="Seleccione su Facultad"
                                variant="solo"
                                @input="updateEscuelas"
                            ></v-select>
                        </div>
                        <div>
                            <InputLabel for="name" value="Escuela" /><span style="color: #e53e3e;"> *</span>
                            <v-select
                                v-model="form.id_escuela"
                                name="id_escuela"
                                id="id_escuela"
                                :items="escuelasfilter"
                                :rules="escuelaRules"
                                item-value="id"
                                item-title = "name"
                                variant="solo"
                                placeholder="Seleccione la Escuela"
                            ></v-select>
                        </div>
                    </div>
                    <!-- <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div >
                            <InputLabel for="name" value="Area de Investigación" /><span style="color: #e53e3e;"> *</span>
                            <v-select
                                v-model="form.id_area"
                                name="id_area"
                                id="id_area"
                                :items="areas"
                                item-value="id"
                                item-title = "name"
                                variant="solo"
                                placeholder="Seleccione el Área"
                                @input="updatelineas"
                            ></v-select>
                            <InputError class="mt-2" :message="errors.id_area" />
                        </div>
                        <div>
                            <InputLabel for="name" value="Linea" /><span style="color: #e53e3e;"> *</span>
                            <v-select
                                v-model="form.id_linea"
                                name="id_linea"
                                id="id_linea"
                                :items="lineafiltered"
                                item-value="id"
                                item-title = "name"
                                variant="solo"
                                placeholder="Seleccione la Linea"
                                @input="updateSublineas"
                            ></v-select>
                            <InputError class="mt-2" :message="errors.id_linea" />
                        </div>
                        <div>
                            <InputLabel for="name" value="Sublinea" /><span style="color: #e53e3e;"> *</span>
                            <v-select
                                v-model="form.id_sublinea"
                                name="id_sublinea"
                                id="id_sublinea"
                                :items="sublineasFiltered"
                                item-value="id"
                                item-title = "name"
                                variant="solo"
                                placeholder="Seleccione la SubLinea"
                            ></v-select>
                            <InputError class="mt-2" :message="errors.id_sublinea" />
                        </div>
                    </div> -->

                    <div class="grid mt-5 gap-6 mb-6 md:grid-cols-1">
                        <div v-role="'Administrador'">
                                <InputLabel for="name" value="Responsable" /><span style="color: #e53e3e;"> *</span>
                                <v-autocomplete
                                v-model="form.id_persona"
                                name="id_persona"
                                id="id_persona"
                                :items="fullNameOptions"
                                :rules="responsableRules"
                                item-value="id"
                                item-title = "name"
                                placeholder="Seleccione Responsable"
                                variant="solo-filled"
                                ></v-autocomplete>
                                
                        </div>
                        <!-- <div v-role="'Coordinador'" class="flex-initial ml-6">
                                <InputLabel for="name" value="Responsable" /><span style="color: #e53e3e;"> *</span>
                                <input type="hidden" name="id_person" v-model="form.id_persona" />
                                <span  class="mt-1 block w-full">
                                {{ $page.props.auth.user.persona.name }} {{ $page.props.auth.user.persona.first_name }} {{ $page.props.auth.user.persona.last_name }}
                                </span>
                                <InputError class="mt-2" />
                        </div> -->
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div>
                            <InputLabel for="name" value="Presentacion del grupo" /><span style="color: #e53e3e;"> *</span>
                            <v-textarea name="pre_group_inv" id="pre_group_inv" cols="20" rows="5" class="w-full" :rules="presentacionRules" v-model="form.pre_group_inv" placeholder="Que describa el propósito del GI y la relevancia de su constitución en cuanto a la generación de nuevos conocimientos y como es que contribuye la(s) línea(s) de investigacion en las que trabaja."></v-textarea>
                        </div>
                        <div>
                            <InputLabel for="name" value="objetivos" /><span style="color: #e53e3e;"> *</span>
                            <v-textarea name="objective" id="objective" cols="20" rows="5" class="w-full" :rules="objetivosRules" v-model="form.objective" placeholder="Incluir por lo menos tres objetivos que prioricen: (I) La producción de nuevo conocimiento (Ejemplo: Publicaciones en revistas científicas, libros o capítulo de libros y/o patentes registradas) (II) La formación de investigadores (Ejemplo: Asesoría de tesis y/o proyectos de investigacion) y (III) La difusión del nuevo conocimiento (Ejemplo: Organización de congresos y/o ponencias en eventos). (máximo 200 palabras)"></v-textarea>
                        </div>
                        <div>
                            <InputLabel for="name" value="Objetivo desarrollo sostenible" /><span style="color: #e53e3e;"> *</span>
                            <v-textarea name="obj_desa_soste_l_i" id="obj_desa_soste_l_i" cols="20" rows="5" class="w-full" :rules="objsosteRepitRules"  v-model="form.obj_desa_soste_l_i" placeholder="Objetivo de Desarrollo Sostenible con el cual contribuye a través de las líneas de investigacion (máximo 2 ODS)"></v-textarea>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div>
                            <InputLabel for="name" value="Servicios" /><span style="color: #e53e3e;"> *</span>
                            <v-textarea name="services" id="services" cols="20" rows="5" class="w-full" :rules="serviciosRules" v-model="form.services" placeholder="Servicios que realiza o puede realizar (máximo 100 palabras)"></v-textarea>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div>
                            <InputLabel for="name" value="Laboratorio" /><span style="color: #e53e3e;"> *</span>
                            <v-textarea name="laboratory" id="laboratory" cols="20" rows="5" class="w-full" :rules="laboratorioRules" v-model="form.laboratory" placeholder="Indicar el nombre y código de laboratorio(s) en los cuales el GI desarrolla sus actividades, responsables de los mismos. Incluir documento Sustentatorio de asignación de ambiente (en caso corresponda). (máximo 200 palabras)" ></v-textarea>
                        </div>
                        <div >
                            <InputLabel for="name" value="Espacio de Investigación" /><span style="color: #e53e3e;"> *</span>
                            <v-textarea name="space_inves" id="space_inves" cols="20" rows="5" class="w-full" :rules="espacioRules" v-model="form.space_inves" placeholder="Describa los ambientes físicos del GI (máximo 100 palabras)"></v-textarea>
                        </div>
                        <div >
                            <InputLabel for="name" value="Equipamiento de  laboratorio" /><span style="color: #e53e3e;"> *</span>
                            <v-textarea name="labora_equip" id="labora_equip" cols="20" rows="5" class="w-full" :rules="equipamientoRules" v-model="form.labora_equip" placeholder="Enumerar el equipamiento de laboratorio/gabinete (máximo 100 pablaras)"></v-textarea>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div >
                            <InputLabel for="plan_trabajo" value="Plan de Trabajo" /><span style="color: #e53e3e;"> *</span>
                            <label class="block mt-3">
                                <input name="plan_trabajo" id="plan_trabajo" type="file"  class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700
                                hover:file:bg-blue-100
                                "
                                @change="archive.handleImageSelected" :key="archive.key" />
                            </label>
                            <p v-if="fileError" style="color: #b91d1d;font-size: 12px;">{{ fileError }}</p>
                        </div>
                        <div >
                            <InputLabel for="anexo" value="Anexo" /><span style="color: #e53e3e;"> *</span>
                            <label class="block mt-3">
                                <input name="anexo" id="anexo" type="file"
                                class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-blue-50 file:text-blue-700
                                hover:file:bg-blue-100"
                                @change="archiveAnexo.handleImageSelected" :key="archiveAnexo.key" />
                            </label>
                            <p v-if="fileError" style="color: #b91d1d;font-size: 12px;">{{ fileError }}</p>
                        </div>
                    </div>
                    <div class="text-center mb-8 mt-3">
                        <h1 class="text-3xl font-bold text-gray-800">CONTACTOS</h1>
                    </div>
                    <div class="grid mt-10 gap-6 mb-6 md:grid-cols-2">
                        <div >
                            <InputLabel for="name" value="Pagina Web" />
                            <v-text-field id="pagina" name="pagina" type="text" class="mt-1" v-model="form.pagina"/>
                            <InputError class="mt-2" />
                        </div>
                        <div >
                            <InputLabel for="name" value="Oficina" />
                            <v-text-field id="office" name="office" type="text" class="mt-1" v-model="form.office"/>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div >
                            <InputLabel for="name" value="Telefono" />
                            <v-text-field id="phone" name="phone" type="text" class="mt-1" v-model="form.phone"/>
                            <InputError class="mt-2" />
                        </div>
                        <div >
                            <InputLabel for="name" value="anexo" />
                            <v-text-field id="annexed" name="annexed" type="text" class="mt-1" v-model="form.annexed"/>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="mt-8 flex justify-center gap-4">
                        <PrimaryButton
                            class="px-10"
                        >
                            Guardar
                        <div v-if="cargando"><i class="fas fa-spinner fa-spin"></i></div>
                        </PrimaryButton>
                        <DangerButton class="px-10">
                            Cancelar
                        </DangerButton>
                            <a :href="route('grupos.index')" class="rounded-md bg-blue-700 px-4 py-2 text-center text-sm text-white hover:bg-blue-500">
                                <i class="fa-solid fa-right-from-bracket rotate-180"></i>
                                    Regresar
                            </a>
                    </div>
                </v-form>
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
import { Head, useForm, usePage, router } from "@inertiajs/vue3";

import Swal from "sweetalert2";
import '@fortawesome/fontawesome-free/css/all.css';
import { nextTick } from "vue";
import { onMounted, ref, computed, watch, reactive } from "vue";
import Paginator from "@/Components/Paginator.vue";

import { useImageUpload } from "@/Composables/useImageUpload"

const archive = ref(useImageUpload());
archive.value.allowedExtensions = ['pdf','doc','docx'];

const archiveAnexo = ref(useImageUpload());
archiveAnexo.value.allowedExtensions = ['pdf','doc','docx'];

const id = ref('');
const selectedFacultadId = ref(null);
const selectedAreaId = ref(0);
const selectedlineaId = ref(0);

let lineafiltered = [];
let sublineasFiltered = [];
let escuelasfilter = [];

const gruposIntegra = ref([]);
const errors = ref({});


const fileError =ref(null);
const cargando = ref(false);

const grupoRules = [
  value => !!value || 'El Nombre del grupo es requerido.',
];

const facultadRules =[
value => !!value || 'Por favor seleccione una opcion.',
];

const escuelaRules =[
value => !!value || 'Por favor seleccione una opcion.',
];

const areaRules =[
value => !!value || 'Por favor seleccione una opcion.',
];

const lineaRules =[
value => !!value || 'Por favor seleccione una opcion.',
];

const sublineasRules =[
value => !!value || 'Por favor seleccione una opcion.',
];

const responsableRules =[
value => !!value || 'Por favor seleccione una opcion.',
];

const presentacionRules =[
value => !!value || 'Este campo es requerido.',
];

const objetivosRules =[
value => !!value || 'Este campo es requerido.',
];

const objsosteRules =[
value => !!value || 'Este campo es requerido.',
];

const serviciosRules =[
value => !!value || 'Este campo es requerido.',
];

const objsosteRepitRules =[
value => !!value || 'Este campo es requerido.',
];

const laboratorioRules =[
value => !!value || 'Este campo es requerido.',
];

const espacioRules =[
value => !!value || 'Este campo es requerido.',
];

const equipamientoRules =[
value => !!value || 'Este campo es requerido.',
];

const anexoRules =[
value => !!value || 'Este campo es requerido.',
];

const planTrabajoRules =[
value => !!value || 'Este campo es requerido.',
];

const props = defineProps({
    grupos: Object,
    facultades: Array,
    escuelas: Array,
    areas: Object,
    lineas: Object,
    sublineas: Object,
    personas: Object,
    tipos: Object,
    integrante: Object,
    users:Object,
    file: Object
});

console.log('prueba', props.grupos);
const form = useForm({
    name: props.grupos.name,
    space_inves:props.grupos.space_inves,
    pre_group_inv:props.grupos.pre_group_inv,
    objective:props.grupos.objective,
    obj_desa_soste_l_i:props.grupos.obj_desa_soste_l_i,
    services:props.grupos.services,
    laboratory:props.grupos.laboratory,
    phisical_environment:props.grupos.phisical_environment,
    labora_equip:props.grupos.labora_equip,
    pagina:props.grupos.pagina,
    office:props.grupos.office,
    annexed:props.grupos.annexed,
    phone:props.grupos ? props.grupos.phone: '',
    // id_area:props.grupos.id_area,
    // id_linea:props.grupos.id_linea,
    // id_sublinea:props.grupos.id_sublinea,
    id_facultad:props.grupos.id_facultad,
    id_escuela:props.grupos.id_escuela,
    plan_trabajo:null,
    anexo:null,
    id_persona:props.integrante?.id_persona,
    //id_person: props.users.persona.id,
});


// console.log('Valor de id_persona:', props.integrante.id_persona);
// console.log('Valor inicial de form.id_persona:', form.id_persona);
onMounted(() =>{
    //setTimeout(() => {
        gruposIntegra.value = props.grupos;
        selectedFacultadId.value=form.id_facultad;
    updateEscuelas();

   // }, 3000);
});

console.log('props.grupos.name', props.grupos.name)
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
    //console.log('facu', selectedFacultad);
    form.id_escuela = 'Seleccione la Escuela ';
    //form.id_escuela = props.grupos.id_escuela;
};


watch(() => form.id_area, (newId, oldId) =>{
    if(newId !== oldId) {
        selectedAreaId.value = newId;
        updatelineas();
    }
});

watch(() => form.id_linea, (newId, oldId) => {
    if(newId !== oldId){
        selectedlineaId.value = newId;
        updateSublineas();
    }
});

const updatelineas = () => {
    const selectedArea = props.areas.find(area => area.id === selectedAreaId.value);
    lineafiltered = selectedArea ? props.lineas.filter(linea => linea.id_area === selectedArea.id) : [];
    form.id_linea = 'Seleccione la Linea';
    form.id_sublinea = 'Seleccione la SubLinea';
};

const updateSublineas = () => {
    const selectedLinea = props.lineas.find(linea => linea.id === selectedlineaId.value);
    sublineasFiltered = selectedLinea ? props.sublineas.filter(sublinea => sublinea.id_linea === selectedLinea.id) : [];
    form.id_sublinea = 'Seleccione la SubLinea';
};

watch(() => props.integrante.id_persona, (newValue) => {
  form.id_persona = newValue;
});

const update = () => {
        cargando.value = true;
        form.plan_trabajo = archive.value.imageFile;
        form.anexo = archiveAnexo.value.imageFile;
        const formData = new FormData();
        for (const key in form) {
            formData.append(key, form[key]);
        }
        formData.append('grupo_id', props.grupos.id)
        if(!archiveAnexo.value.imageFile && !archive.value.imageFile){
        fileError.value = "Por favor, Selecciona un archivo"
        return true;
        }else{
            fileError.value = ""
        }
        axios
            //.post(route("actualizar.grupo",props.grupos.id),formData)
            .post(route("actualizar.grupo"),formData)
            .then((res) => {
                // Manejar la respuesta exitosa aquí
                console.log(res.data.data);
                // Puedes acceder a los datos de la respuesta
                gruposIntegra.value = res.data.data;
                if(res.data.code == 200) {
                    form.reset();
                    ok(res.data);

                }
            })
            .catch((error) => {
                // Manejar el error aquí
                console.error(error);
                if (error.response && error.response.status == 422) {
                    //alert("El usuario ya esta registrado en otro grupo");
                    errors.value = error.response.data.errors;

                    if(error.response.data.error){
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'El Coordinador ya esta Registrado en otro Grupo',
                        })
                    }

                }else{


                }
            })
            .finally(() => {
      // Restablece el estado de carga después de la solicitud (ya sea éxito o error)
      cargando.value = false;
    });
};

const ok = (obj) => {
    form.reset();
    //Swal.fire({title:obj.msj, icon:'success'});
    Swal.fire({
            title: obj.msj,
            icon: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ok'
            }).then((result) => {
            if (result.isConfirmed) {
                window.location.href='/grupos/ver/'+obj.id
            }
            })
}


const fullNameOptions = computed(() => {
  return props.personas.map(per => ({
    id: per.id,
    name: `${per.name} ${per.first_name} ${per.last_name} - ${per.tipo.name}`
  }));
});

</script>
