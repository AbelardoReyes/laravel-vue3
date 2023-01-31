<script setup>
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';
defineProps({
    categorias: Object,
    errors: Object,
});
</script>
<script>
import BarraNavegacion from '@/Components/BarraNavegacion.vue';

export default {
    // Using shorthand syntax...
    layout: BarraNavegacion,
}
console.log('TablaCategorias');
</script>


<template>
    <div class="container grid grid-cols-1 pl-5">
        <!--Div para crear la tabla-->
        <div class="">
            <table class="table-auto text-center  border-separate border border-slate-500">
                <thead class="bg-indigo-00">
                    <tr class="">
                        <th class="pl-1 pr-1  border border-slate-600">ID</th>
                        <th class="pl-5 pr-5 border border-slate-600 ">Categoria</th>
                        <th class="pl-10 pr-10 border border-slate-600">Descripcion</th>
                        <th class="pl-5 pr-5 border border-slate-600">Nuevo Calzado</th>
                        <th class="pl-5 pr-5 border border-slate-600">Edit</th>
                        <th class="pl-5 pr-5 border border-slate-600">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="categoria in categorias" :key="categoria.nombre">
                        <td>{{ categoria.id }}</td>
                        <td>{{ categoria.nombre }}</td>
                        <td>{{ categoria.descripcion }}</td>
                        <td>
                            <Link :href="categoria.viewCalzado" method="get" as="button">
                            <svg class="h-8 w-8 text-green-500" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="9" y1="12" x2="15" y2="12" />
                                <line x1="12" y1="9" x2="12" y2="15" />
                                <path
                                    d="M4 6v-1a1 1 0 0 1 1 -1h1m5 0h2m5 0h1a1 1 0 0 1 1 1v1m0 5v2m0 5v1a1 1 0 0 1 -1 1h-1m-5 0h-2m-5 0h-1a1 1 0 0 1 -1 -1v-1m0 -5v-2m0 -5" />
                            </svg>
                            </Link>
                        </td>
                        <td>
                            <Link :href="categoria.viewEdit" method="get" as="button">
                            <svg class="h-7 w-7 text-teal-500" width="24" height="24" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 20h9" />
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                            </svg>
                            </Link>
                        </td>
                        <td>
                            <Link :href="categoria.viewDelete" method="get" as="button"><svg
                                class="h-7 w-7 text-red-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="4" y1="7" x2="20" y2="7" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg>
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</template>