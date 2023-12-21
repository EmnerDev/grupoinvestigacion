<template>
    <Head title="Grupos Investigacion" />

    <AuthenticatedLayout>
        <template #header>
            Grupo de Investigación - <span>{{ grupos.name }}</span>
        </template>
        <div class="flex justify-end mb-6">
            <a :href="route('grupos.index')" class="rounded-md bg-blue-700 px-4 py-2 text-center text-sm text-white hover:bg-blue-500">
                <i class="fa-solid fa-right-from-bracket rotate-180"></i>
                    Regresar
            </a>
        </div>
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div>                    
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Nombre del Grupo: " />
                            <span>{{ grupos.name }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Facultad: " />
                            <span>{{ grupos.facultad.name }}</span>
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Escuela: " />
                            <span>{{ grupos.escuela.name }}</span>
                        </div>
                        <!-- <div class="flex-initial ml-6">
                            <InputLabel
                                for="name"
                                value="Area de Investigación: "
                            />
                            <span>{{ grupos.area_investigacion.name }}</span>
                        </div> -->
                    </div>
                    <div>
                        <div class="text-left mb-8 mt-3">
                        <h1 class="text-2 font-bold text-gray-800">LÍNEA DE INVESTIGACIÓN</h1>
                        </div>                        
                        <div class="flex justify-center mb-6">
                            <PrimaryButton v-if="mostrarBoton" @click="openModalPivot(1)" :disabled="deshabilitarBotonAgregar()">
                                <i class="fa-solid fa-plus-circle"></i>
                                    Agregar Linea de Investigación
                            </PrimaryButton>
                        </div>
                    </div>
                    <div>
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
                                            Area
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            Linea
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            SubLinea
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
                                        v-for="pivot, i in pivotLineas" :key="pivot.id"
                                    >
                                        <td
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            <p
                                                class="text-gray-900 whitespace-no-wrap"
                                            >
                                                {{ i+1 }}
                                            </p>
                                        </td>
                                        <td
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            <p
                                                class="text-gray-900 whitespace-no-wrap"
                                            >
                                                {{ pivot.area_investigacion.name }}
                                            </p>
                                        </td>
                                        <td
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            <p
                                                class="text-gray-900 whitespace-no-wrap"
                                            >
                                               {{ pivot.linea.name }}
                                            </p>
                                        </td>
                                        <td
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            <p
                                                class="text-gray-900 whitespace-no-wrap"
                                            >
                                                {{ pivot.sublinea.name }}
                                            </p>
                                        </td>                                        
                                        <td
                                            class="border-b border-gray-200 bg-white px-5 py-5 text-sm"
                                        >
                                            <WarningButton
                                                class="mr-1"
                                                @click="
                                                    openModalPivot(
                                                        2,
                                                        pivot.area_investigacion.name,
                                                        pivot.linea.name,
                                                        pivot.sublinea.name,
                                                        pivot.id
                                                    )
                                                "
                                            >
                                                <i class="fa-solid fa-edit"></i>
                                            </WarningButton>
                                            <DangerButton v-role="'Administrador'" @click="deletePivotGrupoLinea(pivot.id)"
                                                ><i
                                                    class="fa-solid fa-trash"
                                                ></i
                                            ></DangerButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                    <!-- <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Linea: " />
                            <span>{{ grupos.linea.name }}</span>
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Sublinea: " />
                            <span>{{ grupos.sublinea.name }}</span>
                        </div>
                    </div> -->
                    <div class="overflow-x-auto rounded-lg shadow mt-6">
                        <div class="mb-4 mt-5">
                            <InputLabel for="name" value="Integrantes: " />
                            <div class="flex justify-center gap-5">
                                <div class="flex justify-center mb-6">
                                    <PrimaryButton v-if="mostrarBoton" @click="openModal(1)" class="">
                                        <i class="fa-solid fa-plus-circle"></i>
                                        Agregar Integrantes
                                    </PrimaryButton>
                                </div>                               
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
                                            Nombres
                                        </th>
                                        <th
                                            class="border-b-2 border-gray-200 bg-gray-700 px-5 py-3 text-left text-xs font-semibold uppercase tracking-wider text-white"
                                        >
                                            Apellidos
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
                                                class="mr-1" v-role="'Administrador'"
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
                                            <DangerButton v-role="'Administrador'" @click="deleteIntegrante(inte.id, inte.persona.name)"
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
                    <div class="grid gap-6 mb-6 mt-6 md:grid-cols-3">
                        <div class="flex-initial ml-6">
                            <InputLabel
                                for="name"
                                value="Espacio de Investigación: "
                            />
                            <span>{{ grupos.space_inves }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel
                                for="name"
                                value="Presentacion del grupo: "
                            />
                            <span>{{ grupos.pre_group_inv }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="objetivos: " />
                            <span>{{ grupos.objective }}</span>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div class="flex-initial ml-6">
                            <InputLabel
                                for="name"
                                value="Objetivo desarrollo sostenible: "
                            />
                            <span>{{ grupos.obj_desa_soste_l_i }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Servicios: " />
                            <span>{{ grupos.services }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Laboratorio: " />
                            <span>{{ grupos.laboratory }}</span>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-1">
                        <div class="flex-initial ml-6">
                            <InputLabel
                                for="name"
                                value="Equipamiento de  laboratorio: "
                            />
                            <span>{{ grupos.labora_equip }}</span>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Pagina Web: " />
                            <span>{{ grupos.pagina }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Oficina: " />
                            <span>{{ grupos.office }}</span>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="Telefono: " />
                            <span>{{ grupos.phone }}</span>
                            <InputError class="mt-2" />
                        </div>
                        <div class="flex-initial ml-6">
                            <InputLabel for="name" value="anexo: " />
                            <span>{{ grupos.annexed }}</span>
                            <InputError class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <div class="divide-y-4 divide-slate-400/25 ...">
                    <div class="text-center mb-8 mt-3">
                    <h1 class="text-2xl font-bold text-blue-800 mb-5">Archivos necesarios</h1>
                    </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div class="flex-initial ml-6">
                            <h2 class="text-lg font-semibold mb-5">Plan de Trabajo</h2>
                            <a class="bg-lime-600 text-white px-4 py-2 rounded hover:bg-lime-700" :href="file.plan_trabajo" target="_blank">Descargar</a>
                        </div>
                        <div class="flex-initial ml-6">
                            <h2 class="text-lg font-semibold mb-5">Anexo</h2>
                            <a class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-700" :href="file.anexo">Descargar</a>
                        </div>
                        <div v-if="(grupos?.revalidacion?.length > 0) ? true: false" class="flex flex-col ml-6">
                            <h2 class="text-lg font-semibold mb-5">Revalidación</h2>
                            <a :href="revalidacion?.file_revalidacion"
                                class="bg-cyan-400 text-white px-4 py-2 rounded hover:bg-cyan-500"
                            >
                                {{ revalidacion?.name_revalidacion }}
                            </a> 
                            <!-- <span v-else class="text-md font-semibold text-red-500 mb-5" >
                                archivo no cargado
                            </span>                        -->
                        </div>
                    </div>
                </div>
            </div>
          <div class="p-5" v-if="mostrarContenRevalidacion" >
            <div class="divide-y-4 divide-slate-400/25 ...">
                <div class="text-center mb-8 mt-3">
                        <h1 class="text-2xl font-bold text-blue-800 mb-5">Subir archivo para revalidación de grupo </h1>
                </div>
                    <div class="grid gap-6 mb-6 md:grid-cols-3">
                        <div >
                            <InputLabel for="file_revalidacion" value="Revalidacion de grupo" />
                            <label class="block mt-3">
                                <input name="file_revalidacion" id="file_revalidacion" type="file"  class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-blue-50 file:text-blue-700
                                    hover:file:bg-blue-100
                                    "
                                    @change="archiveRevalidacion.handleImageSelected" :key="archiveRevalidacion.key" required/>
                            </label>
                            <p v-if="fileError" style="color: #b91d1d; font-size: 12px;">{{ fileError }}</p>
                        </div>
                        <div class="mt-8 flex justify-center gap-4">
                            <button v-if="(grupos?.revalidacion?.length > 0) ? false: true " type="submit" @click="submitFile" 
                                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700"
                            >
                                Guardar
                            </button>
                            <button v-else @click ="updateFile" type="submit"
                                class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700"
                            >
                                Guardar Editar
                            </button>                      
                        </div>
                        <div class="mt-8 flex">
                            <a :href="revalidacion?.file_revalidacion" v-if="(grupos?.revalidacion?.length > 0) ? true: false"
                                class="bg-cyan-400 text-white px-4 py-2 rounded hover:bg-cyan-500"
                            >
                                {{ revalidacion?.name_revalidacion }}
                            </a> 
                            <span v-else class="text-md font-semibold text-red-500 mb-5">
                                archivo no cargado
                            </span>                       
                        </div>
                    </div>
            </div>
          </div>
        </div>
        <div>
            <div class="flex justify-end mt-6">
            <a :href="route('grupos.index')" class="rounded-md bg-blue-700 px-4 py-2 text-center text-sm text-white hover:bg-blue-500">
                <i class="fa-solid fa-right-from-bracket rotate-180"></i>
                    Regresar
            </a>
            </div>
        </div>
        <Modal :show="modal" @close="closeModal">
            <h2 class="p-3 text-lg font-medium text-gray-900">{{ title }}</h2>
            <TextInput
                type="hidden"
                name="id_grupo"
                v-model="form.id_grupo"
            ></TextInput>
            <!-- <div v-if="integrante_existente" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                {{ integrante_existente }}
            </div> -->
            <div  class="p-6 border-b border-gray-200" style="background-color: #1027d4; text-align: center;">
                    <label class="" style="color: #fff; font-weight: bold;">Digite DNI primero, para rellenar automaticamente los campos si el integrante ya se encuentra registrado en la base de datos</label>
                </div>
            <div class="grid gap-6 md:grid-cols-2">
                <div class="p-3">
                    <InputLabel for="dni" value="Dni:"></InputLabel>
                    <v-text-field
                        id="dni"
                        ref="nameImput"
                        v-model="form.dni"
                        @input="searchIntegranteVue"
                        type="text"
                        class="mt-1"
                        placeholder="Dni"
                        variant="outlined"
                    ></v-text-field>
                </div>
                <div class="p-3">
                    <InputLabel for="name" value="Nombres:"></InputLabel>
                    <v-text-field
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="mt-1"
                        placeholder="Nombre"
                        ref="nameImput"
                        variant="outlined"
                    ></v-text-field>
                </div>
            </div>
            <div class="grid gap-6 md:grid-cols-2">
                <div class="p-3">
                    <InputLabel
                        for="first_name"
                        value="Apellido Paterno:"
                    ></InputLabel>
                    <v-text-field
                        id="first_name"
                        v-model="form.first_name"
                        type="text"
                        class="mt-1"
                        placeholder="Apellido Paterno"
                        variant="outlined"
                    ></v-text-field>
                </div>
                <div class="p-3">
                    <InputLabel
                        for="last_name"
                        value="Apellido Materno:"
                    ></InputLabel>
                    <v-text-field
                        id="last_name"
                        v-model="form.last_name"
                        type="text"
                        class="mt-1"
                        placeholder="Apellido Materno"
                        variant="outlined"
                    ></v-text-field>
                </div>
            </div>
            <div class="grid gap-6 md:grid-cols-2">
                <div class="p-3">
                    <InputLabel for="phone" value="Telefono:"></InputLabel>
                    <v-text-field
                        id="phone"
                        v-model="form.phone"
                        type="text"
                        class="mt-1"
                        placeholder="Telefono"
                        variant="outlined"
                    ></v-text-field>
                </div>
                <div class="p-3">
                    <InputLabel for="email" value="Email:"></InputLabel>
                    <v-text-field
                        id="email"
                        v-model="form.email"
                        type="text"
                        class="mt-1"
                        placeholder="Correo Electrónico"
                        variant="outlined"
                    >
                    </v-text-field>
                </div>
            </div>
            <div class="grid gap-6 md:grid-cols-2">
                <div class="p-3">
                    <InputLabel for="condition" value="Condicion: " />
                    <v-select
                        name="condition"
                        id="condition"
                        class="mt-1"
                        :items="conditionOptions"
                        v-model="form.condition"
                        item-value="id"
                        item-title = "name"
                        placeholder="Seleccione Condicion"
                        variant="outlined"
                    >
                
                    </v-select>
                </div>
                <div class="p-3">
                    <InputLabel for="orcid" value="Orcid:"></InputLabel>
                    <v-text-field
                        id="orcid"
                        v-model="form.orcid"
                        type="text"
                        class="mt-1"
                        placeholder="orcid"
                        variant="outlined"
                    >
                    </v-text-field>
                </div>
            </div>
            <div class="grid md:grid-cols-2">
                <div class="p-3">
                    <InputLabel for="cti_vitae" value="CTI VItae: " />
                    <v-text-field
                        id="cti_vitae"
                        v-model="form.cti_vitae"
                        type="text"
                        class="mt-1"
                        placeholder="cti vitae"
                        variant="outlined"
                    >
                    </v-text-field>
                </div>
                <div class="p-3">
                    <InputLabel
                        for="google_scholar"
                        value="Google Scholar:"
                    ></InputLabel>
                    <v-text-field
                        id="google_scholar"
                        v-model="form.google_scholar"
                        type="text"
                        class="mt-1"
                        placeholder="Google Scholar"
                        variant="outlined"
                    >
                    </v-text-field>
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
        <Modal :show="modalPivot" @close="closeModalPivot">
                    <h2 class="p-3 text-lg font-medium text-gray-900">{{ titlePivot }}</h2>
                    <TextInput
                        type="hidden"
                        name="id_grupo"
                        v-model="formLinea.id_grupo"
                    ></TextInput>
                    <div class="p-5 grid gap-6 mb-6 md:grid-cols-1">
                        <div >
                            <InputLabel for="name" value="Area de Investigación" /><span style="color: #e53e3e;"> *</span>
                            <v-select
                                v-model="formLinea.id_area"
                                name="id_area" 
                                id="id_area"
                                :items="areas"
                                item-value="id"
                                item-title = "name"
                                variant="solo"
                                placeholder="Seleccione el Área"
                                @input="updatelineas"                             
                            ></v-select>
                        </div>
                        <div>
                            <InputLabel for="name" value="Linea" /><span style="color: #e53e3e;"> *</span>
                            <v-select
                                v-model="formLinea.id_linea"
                                name="id_linea" 
                                id="id_linea"
                                :items="lineafiltered"
                                item-value="id"
                                item-title = "name"
                                variant="solo"
                                placeholder="Seleccione la Linea"   
                                @input="updateSublineas"                         
                            ></v-select>
                        </div>
                        <div>
                            <InputLabel for="name" value="Sublinea" /><span style="color: #e53e3e;"> *</span>
                            <v-select
                                v-model="formLinea.id_sublinea"
                                name="id_sublinea" 
                                id="id_sublinea"
                                :items="sublineasFiltered"
                                item-value="id"
                                item-title = "name"
                                variant="solo"
                                placeholder="Seleccione la SubLinea"                           
                            ></v-select>
                        </div>
                    </div>
                    <div v-if="$page.props.alert">                        
                        <InputError class="mt-2" :message="$page.props.alert" />
                    </div>
                    <div class="flex justify-center">
                        <div class="p-3 mt-6">
                            <PrimaryButton :disabled="formLinea.processing" @click="submitForm">
                                <i class="fa-solid fa save"></i>Guardar
                            </PrimaryButton>
                        </div>
                        <div class="p-3 mt-6">
                            <SecondaryButton
                                class="ml-3"
                                :disabled="formLinea.processing"
                                @click="closeModalPivot"
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
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import DangerButton from "@/Components/DangerButton.vue";
import WarningButton from "@/Components/WarningButton.vue";
import LinkButton from "@/Components/LinkButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import Modal from "@/Components/Modal.vue";
import { Head, useForm } from "@inertiajs/vue3";

import Swal from "sweetalert2";
import "@fortawesome/fontawesome-free/css/all.css";
import { nextTick, ref, computed, watch } from "vue";
import axios from "axios";
import { onMounted } from "vue";

import { useImageUpload } from "@/Composables/useImageUpload"

const archiveRevalidacion = ref(useImageUpload());
archiveRevalidacion.value.allowedExtensions = ['pdf','doc','docx'];



//uso del Toast
import { Toast } from "@/Composables/Toast.js";
const toast = Toast();

const nameInput = ref(null);
const modal = ref(false);
const title = ref("");
const operation = ref(1);
const id = ref("");

const nameInputPivot = ref(null);
const modalPivot = ref(false);
const titlePivot = ref("");
const operationPivot = ref(1);
const idPivot = ref("");

const selectedAreaId = ref(0);
const selectedlineaId = ref(0);

let lineafiltered = [];
let sublineasFiltered = [];

const intePerson = ref([]);
const gruposIntegra = ref([]);
const programacion = ref(props.programacions);

const fileError =ref(null);

const props = defineProps({
    grupos: {
        type: Object,
        default: () => ({}),
    },
    integrantes: {
        type: Object,
        default: () => ({}),
    },
    personas: Object,
    condition: {
        type:Object,
        default: () =>({
            "Investigador Titular": "Investigador Titular",
            "Investigador Colaborador": "Investigador Colaborador",
            "Investigador En formacion": "Investigador En formacion",
            "Investigador Posdoctorado": "Investigador Posdoctorado",
            Coordinador: "Coordinador",
        }),
    },
    programacions: Object,
    pivotLineas:Object,
    areas: Array,
    lineas: Array,
    sublineas: Array,
    file: Object,
    revalidacion:Object
});

//console.log('props',$page.props)
onMounted(async() =>{
    intePerson.value = props.integrantes;
    gruposIntegra.value = props.grupos;
    //console.log('comenta', intePerson.value);

})

const formRevalidacion = useForm({
    id_grupo:props.grupos.id,
    file_revalidacion:null,
});


const formLinea = useForm({
    id_grupo:props.grupos.id,
    id_area:null,
    id_linea:null,
    id_sublinea:null,
});

const form = useForm({
    dni: "",
    name: "",
    first_name: "",
    last_name: "",
    phone: "",
    email: "",
    id_tipo: 4,
    user_id:444,
    condition: "Investigador Titular",
    orcid: "",
    cti_vitae: "",
    google_scholar: "",
    id_grupo: props.grupos.id,
    id_persona: "",
});
//  const formIntegrante = useForm({
//     condition:'inv. Titular',
//     orcid:'',
//     cti_vitae:'',
//     google_scholar:'',
//     id_grupo:'',
//     id_persona:'',
//  })

const openModal = (
    op,
    dni,
    name,
    first_name,
    last_name,
    phone,
    email,
    condition,
    orcid,
    cti_vitae,
    google_scholar,
    id_grupo,
    id_persona,
    integran
) => {
    modal.value = true;
    nextTick(() => {
    if (nameInput.value) {
        nameInput.value.focus()
        }
    });
    operation.value = op;
    id.value = integran;
    if (op == 1) {
        title.value = "Agregar Integrantes";
    } else {
        title.value = "Editar Integrantes";
        form.dni = dni;
        form.name = name;
        form.first_name = first_name;
        form.last_name = last_name;
        form.id_tipo = 4;
        form.user_id = 444;
        form.phone = phone;
        form.email = email;
        form.condition = condition;
        form.orcid = orcid;
        form.cti_vitae = cti_vitae;
        form.google_scholar = google_scholar;
        form.id_grupo = id_grupo;
        form.id_persona = id_persona;
    }
};

const searchIntegranteVue = () => {
    axios
        .get(`/search-integrante/${form.dni}`)
        .then((response) => {
            const persona = response.data;
            if (persona) {
                form.name = persona.name;
                form.first_name = persona.first_name;
                form.last_name = persona.last_name;
                form.phone = persona.phone;
                form.email = persona.email;
            } else {
                form.name = "";
                form.first_name = "";
                form.last_name = "";
                form.phone = "";
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

const submit = () => {
    if (operation.value === 1) {
        // Para una solicitud POST
        axios
            .post(route("grupo.registrar.integrante"), form)
            .then((res) => {
                // Manejar la respuesta exitosa aquí
                console.log(res.data);
                // Puedes acceder a los datos de la respuesta
                intePerson.value = res.data.data;
                gruposIntegra.value = res.data.data;
                form.reset();
                closeModal();
                //ok("Registro Creado Correctamente");
                toast.toast('Exito', 'Registrado Correctamente','success');
            })
            .catch((error) => {
                // Manejar el error aquí
                console.error(error);
                if (error.response && error.response.status == 422) {
                    //alert("El usuario ya esta registrado en otro grupo");
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'El Integrante ha alcanzado el numero máximo de grupos permitidos',
                    })
                } if(error.response && error.response.status == 422) {
                    //alert("El usuario ya esta registrado en otro grupo");
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'No puede a ver mas de un coordinador en un grupó. Por favor verifique los datos ingresados',
                    })
                }
            });
    } else {
        // Para una solicitud PUT
    //     form.put(route("grupo.actualizar.integrante", id.value), {
    //     onSuccess: () => {
    //         ok("Registro Actualizado Correctamente");
    //     },
    // });
    axios
        .put(route("grupo.actualizar.integrante", id.value), form)
        .then((updateRes) => {
            // Manejar la respuesta exitosa aquí
            console.log(updateRes.data);
            // Puedes acceder a los datos de la respuesta
            intePerson.value = updateRes.data.data;
            form.reset();
            closeModal();
            ok("Registro Actualizado Correctamente");
        })
        .catch((error) => {
            // Manejar el error aquí
            console.error(error);
        });
    }
};
const ok = (msj) => {
    form.reset();
    closeModal();
    Swal.fire({ title: msj, icon: "success" });
};

const deleteIntegrante = (id, name) => {
    const alerta = Swal.mixin({
        buttonsStyling:true
    });
    alerta.fire({
        title:'Estas seguro de eliminar al integrante ' +name+' del grupo ?',
        icon: 'question', showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"></i> Si, eliminar',
        cancelButtonText:'<i class="fa-solid fa-ban"></i> Cancelar'
    }).then((result) => {
        if(result.isConfirmed) {
            form.delete(route('grupo.eliminar.integrante', id),{
                onSuccess: () => {
                    ok('Registro Eliminado Correctamente');
                    intePerson.value = intePerson.value.filter((integrante) => integrante.id !== id);
            }
            });
        }
    });
}

const openModalPivot = (
    ope,
    id_area,
    id_linea,
    id_sublinea,
    pivot
) => {
    modalPivot.value = true;
    nextTick(() =>{ 
    if (nameInputPivot.value) {
    nameInputPivot.value.focus()
    }
});
    operationPivot.value = ope;
    id.value = pivot;
    if (ope == 1) {
        titlePivot.value = "Agregar Linea de Investigación";
    } else {
        titlePivot.value = "Editar Linea de Investigación";
        formLinea.id_area = id_area;
        formLinea.id_linea = id_linea;
        formLinea.id_sublinea = id_sublinea;
    }
};

const closeModalPivot = () => {
    modalPivot.value = false;
    formLinea.reset();
}
const submitForm =  () => {
 
 if (operationPivot.value === 1) {
    
    formLinea.post(route("registrar.pivot"),{
     onSuccess: () => { 
        formLinea.reset();
        closeModalPivot();
         //ok("Registro Creado Correctamente");
         toast.toast('Exito', 'Registrado Correctamente','success');
        },
        onError: (errors) => {
        if (errors.alert) {
          Swal.fire({
            icon: 'error',
            title: 'Atencion',
            text: errors.alert,
            showCancelButton: false,
            showConfirmButton: true,
            confirmButtonText: 'Entendido',
            footer: '<p style="color:blue">Por favor, revise los datos.</p>',
          });
        }
      },
 }); 
 } else {
     // Actualizar (PUT)
     formLinea.put(route("actualizar.pivot", id.value),{
     onSuccess: () => {
        formLinea.reset();
        closeModalPivot();
         toast.toast('Exito', 'Actualizado Correctamente','success');
     },
 }); 
 }

};


watch(() => formLinea.id_area, (newId, oldId) =>{
    if(newId !== oldId) {
        selectedAreaId.value = newId;
        formLinea.id_linea = 'Seleccione la Linea';
        formLinea.id_sublinea = 'Seleccione la SubLinea';
        updatelineas();
    }
});

watch(() => formLinea.id_linea, (newId, oldId) => {
    if(newId !== oldId){
        selectedlineaId.value = newId;
        formLinea.id_sublinea = 'Seleccione la SubLinea';
        updateSublineas();
    }
});

const updatelineas = () => {
    const selectedArea = props.areas.find(area => area.id === selectedAreaId.value);
    lineafiltered = selectedArea ? props.lineas.filter(linea => linea.id_area === selectedArea.id) : [];
};

const updateSublineas = () => {
    const selectedLinea = props.lineas.find(linea => linea.id === selectedlineaId.value);
    sublineasFiltered = selectedLinea ? props.sublineas.filter(sublinea => sublinea.id_linea === selectedLinea.id) : [];
};


const goBack = () => {
    window.history.back();
}

const mostrarBoton = computed(() => {
    const fechaActual = new Date();
    //console.log('fechaActual', fechaActual)

    for(const evento of programacion.value){
        const fechaInicio = new Date(evento.start_date);
       // console.log('fechaInicio', fechaInicio)
        const fechaFin = new Date(evento.end_date);
        const esActivo = evento.status === 1;
        const esTipo = evento.programin_type === 'INSCRIPCION';

        if(fechaActual >= fechaInicio && fechaActual <= fechaFin && esActivo && esTipo){
            return true;
        }
    }
    return false;
});

const conditionOptions = computed(() => {
  return Object.entries(props.condition).map(([id, name]) => ({ id, name }));
});

const deletePivotGrupoLinea = (id) => {
    const alerta = Swal.mixin({
        buttonsStyling:true
    });
    alerta.fire({
        title:'Estas seguro de eliminar la linea de investigación ?',
        icon: 'question', showCancelButton:true,
        confirmButtonText:'<i class="fa-solid fa-check"></i> Si, eliminar',
        cancelButtonText:'<i class="fa-solid fa-ban"></i> Cancelar'
    }).then((result) => {
        if(result.isConfirmed) {
            form.delete(route('eliminar.pivot', id),{
                onSuccess: () => {
                    ok('Registro Eliminado Correctamente');
                    props.pivotLineas = props.pivotLineas.filter((pivot) => pivot.id !== id);
            }
            });
        }
    });
}

const submitFile = () => {
        // Para una solicitud POST
        formRevalidacion.file_revalidacion = archiveRevalidacion.value.imageFile;
        const formData = new FormData();
        for (let key in formRevalidacion) {
            formData.append(key, formRevalidacion[key]);
        }
        if(!archiveRevalidacion.value.imageFile){
        fileError.value = "Por favor, Selecciona un archivo"
        return true;
        }else{
            fileError.value = ""
        }
        axios
            .post(route("registrar.revalidacion"),formData)
            .then((res) => {
                // Manejar la respuesta exitosa aquí
                console.log(res.data);
                // Puedes acceder a los datos de la respuesta
                props.revalidacion = res.data.data;
                if(res.data.code == 200) {
                    form.reset();
                    toast.toast('Exito', 'Archivo Subido Correctamente','success');

                }
            })
            .catch((error) => {
                // Manejar el error aquí
                console.error(error);
            });
};

const updateFile = () => {
        // Para una solicitud POST
        formRevalidacion.file_revalidacion = archiveRevalidacion.value.imageFile;
        const formData = new FormData();
        for (let key in formRevalidacion) {
            formData.append(key, formRevalidacion[key]);
        }
        formData.append('revalidacion_id', props.revalidacion.id)
        if(!archiveRevalidacion.value.imageFile){
        fileError.value = "Por favor, Selecciona un archivo"
        return true;
        }else{
            fileError.value = ""
        }
        axios
            .post(route("actualizar.revalidacion"),formData)
            .then((res) => {
                // Manejar la respuesta exitosa aquí
                console.log(res.data);
                // Puedes acceder a los datos de la respuesta
                props.revalidacion = {...res.data.data};                
                formRevalidacion.reset();
                toast.toast('Exito', 'Archivo Actualizado Correctamente','success');
                //window.location.reload();
                setTimeout(() => {
                window.location.reload();
            }, 2000);
                
            })
            .catch((error) => {
                // Manejar el error aquí
                console.error(error);
            });
};

const mostrarContenRevalidacion = computed(() => {
    const fechaActual = new Date();
    //console.log('fechaActual', fechaActual)

    for(const evento of programacion.value){
        const fechaInicio = new Date(evento.start_date);
       // console.log('fechaInicio', fechaInicio)
        const fechaFin = new Date(evento.end_date);
        const esActivo = evento.status === 1;
        const esTipo = evento.programin_type === 'REVALIDACION';

        if(fechaActual >= fechaInicio && fechaActual <= fechaFin && esActivo && esTipo){
            return true;
        }
    }
    return false;
});


const deshabilitarBotonAgregar = () => {
 
  if (gruposIntegra.value && gruposIntegra.value.pivot_grupo_linea) {
    return gruposIntegra.value.pivot_grupo_linea.length > 3;
  }
  return true;
};

</script>