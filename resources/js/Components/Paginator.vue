<template>
    <div v-role="'Administrador'">

        <nav v-if="paginator!==undefined"
             class="flex items-center justify-between"
             role="navigation">
            <div class="flex justify-between flex-1 sm:hidden">
                <span v-if="onFirstPage"
                      class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-gray-100 border border-gray-300 cursor-default leading-5 rounded-md">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path clip-rule="evenodd"
                                          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                          fill-rule="evenodd"/>
                                </svg>
                    </span>
                <Link v-else :href="previousPageUrl"
                              class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path clip-rule="evenodd"
                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                              fill-rule="evenodd"/>
                    </svg>
                </Link>
    
                <Link v-if="hasMorePages" :href="nextPageUrl"
                              class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path clip-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              fill-rule="evenodd"/>
                    </svg>
                </Link>
                <span v-else
                      class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-gray-100 border border-gray-300 cursor-default leading-5 rounded-md">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path clip-rule="evenodd"
                              d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                              fill-rule="evenodd"/>
                    </svg>
                    </span>
            </div>
    
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between gap-44">
                <div>
                    <p class="text-sm text-gray-700 leading-5">
                        Mostrando del
                        <span class="font-medium" v-text="firstItem"></span>
                        al
                        <span class="font-medium" v-text="lastItem"></span>
                        de
                        <span class="font-medium" v-text="total"></span>
                        entradas
                    </p>
                </div>
    
                <div>
                    <span class="relative z-0 inline-flex shadow-sm rounded-md">
                            <span v-if="onFirstPage" aria-disabled="true"
                                  aria-hidden="true"
                                  class="relative inline-flex items-center px-3 py-3 mr-1 mb-1 text-sm leading-4 rounded border hover:bg-indigo-500 hover:text-white focus:border-indigo-500 focus:text-white">
                                    <svg class="w-5 h-5" fill="currentColor"
                                         viewBox="0 0 20 20">
                                        <path clip-rule="evenodd"
                                              d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                              fill-rule="evenodd"/>
                                    </svg>
                            </span>
                            <Link v-else :href="previousPageUrl"
                            class="relative inline-flex items-center px-3 py-3 mr-1 mb-1 text-sm leading-4 rounded border hover:bg-indigo-500 hover:text-white focus:border-indigo-500 focus:text-white"
                                          rel="prev">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path clip-rule="evenodd"
                                          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                          fill-rule="evenodd"/>
                                </svg>
                            </Link>
                        <div v-for="link in paginator.links" :key="index">
                            <Link v-if="!isFirstOrLastOrDots(index,paginator.links.length,link.label)"
                            class="relative inline-flex items-center px-3 py-3 mr-1 mb-1 text-sm leading-4 rounded border hover:bg-gray-500 hover:text-white focus:border-gray-500 focus:text-white" :class="{ 'text-white bg-gray-700': link.active }" :href="link.url"
                            ><span v-if="(link.label).length == 16">Anterior</span>
                            <span v-else-if="(link.label).length == 12">Siguiente</span>
                            <span v-else>{{ link.label }}</span>
                                <!-- {{ link.label }} -->
                            </Link>
                            <span v-else-if="link.label==='...'" aria-disabled="true"
                            class="relative inline-flex items-center px-2 py-1 mr-1 mb-1 text-sm leading-4 rounded border hover:bg-indigo-500 hover:text-white focus:border-indigo-500 focus:text-white">
                                    {{ link.label }}
                            </span>
                        </div>
                            <Link v-if="hasMorePages" :href="nextPageUrl"
                            class="relative inline-flex items-center px-3 py-3 mr-1 mb-1 text-sm leading-4 rounded border hover:bg-indigo-500 hover:text-white focus:border-indigo-500 focus:text-white">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path clip-rule="evenodd"
                                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                          fill-rule="evenodd"/>
                                </svg>
                            </Link>
                            <span v-else aria-disabled="true"
                                  aria-hidden="true"
                                  class="relative inline-flex items-center px-3 py-3 mr-1 mb-1 text-sm leading-4 rounded border hover:bg-indigo-500 hover:text-white focus:border-indigo-500 focus:text-white">
                                <svg class="w-5 h-5" fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path clip-rule="evenodd"
                                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                          fill-rule="evenodd"/>
                                </svg>
                            </span>
                    </span>
                </div>
            </div>
        </nav>
    </div>

</template>

<script>
import { Link } from '@inertiajs/vue3'
export default {
    name: "Paginator",
    components: { Link },
    props: {
        paginator: {
            current_page: Number,
            data: Array,
            first_page_url: String,
            from: Number,
            last_page: Number,
            last_page_url: String,
            links: Array,
            next_page_url: String,
            path: String,
            per_page: Number,
            prev_page_url: String,
            to: Number,
            total: Number,
        }
    },
    methods: {
        isFirstOrLastOrDots(index,links_length,label) {
            return index===0 || index===links_length-1 || label.includes('...')
        },
    },
    computed: {
        onFirstPage() {
            return this.paginator.current_page === 1;
        },
        hasMorePages() {
            return this.paginator.current_page < this.paginator.last_page;
        },
        nextPageUrl() {
            return this.paginator.next_page_url;
        },
        previousPageUrl() {
            return this.paginator.prev_page_url;
        },
        firstItem() {
            return this.paginator.from;
        },
        lastItem() {
            return this.paginator.to;
        },
        total() {
            return this.paginator.total;
        },
    }
}
</script>