<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header> Dashboard </template>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 border-b border-gray-200">
                <div class="flex flex-nowrap">
                    <div
                    class="relative flex  overflow-hidden bg-white py-6 sm:py-12"
                >
                    <div
                        class="mx-auto max-w-4xl rounded-3xl bg-[#092540] p-10 text-center"
                    >
                        <h2 class="text-3xl font-bold leading-tight text-white">
                            Registrar Usuario
                        </h2>
                        <div
                            class="mt-6 flex items-center justify-center gap-4"
                        >
                            <button
                                class="flex items-center justify-center gap-2 rounded-full bg-violet-500 px-5 py-3 text-lg font-medium text-white"
                            >
                                <span>Ingresar</span>                                
                            </button>                            
                        </div>
                    </div>
                </div>
                </div>
                <div class="flex flex-nowrap">
                    <div
                    class="relative flex overflow-hidden bg-white py-6 sm:py-12"
                >
                    <div
                        class="mx-auto max-w-4xl rounded-3xl bg-[#092540] p-10 text-center"
                    >
                        <h2 class="text-3xl font-bold leading-tight text-white">
                            Registrar Usuario
                        </h2>
                        <div
                            class="mt-6 flex items-center justify-center gap-4"
                        >
                            <button
                                class="flex items-center justify-center gap-2 rounded-full bg-violet-500 px-5 py-3 text-lg font-medium text-white"
                            >
                                <span>Ingresar</span>                                
                            </button>                            
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>
