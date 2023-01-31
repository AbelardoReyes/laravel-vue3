<script setup>
import { Link } from '@inertiajs/vue3'
import { defineProps } from 'vue';
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'

const form = reactive({
    filtro: null
})

function submit() {
    router.get('/zapateria/calzado/index', form)
}
defineProps({
    calzados: Object,
    rutas: Object,
    categorias: Object,
});
</script>
<template>
    <div class="container grid grid-cols-1 ">
        <!--Div para crear la tabla-->
        <div class="">
            <form @submit.prevent="submit" class="flex">
                <label for="filtro">Mostrar por:</label>
                <select name="filtro" id="filtro" v-model="form.filtro"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2 dark:bg-white dark:border-white dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option v-for="categoria in categorias" :key="categoria.id" :value="categoria.id">{{ categoria.nombre }}</option>
                </select>
                <button type="submit" class="bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-2 px-4 rounded transition ease-in-out duration-300 hover:-translate-y-1 hover:scale-110 ">Mostrar</button>
            </form>
            <table class="table-auto text-center  border-separate border border-slate-500">
                <thead class="bg-indigo-00">
                    <tr class="">
                        <th class="pl-1 pr-1  border border-slate-600">ID</th>
                        <th class="pl-5 pr-5 border border-slate-600 ">Marca</th>
                        <th class="pl-5 pr-5 border border-slate-600">Color</th>
                        <th class="pl-1 pr-1 border border-slate-600">Modelo</th>
                        <th class="pl-1 pr-1 border border-slate-600">Existencia</th>
                        <th class="pl-1 pr-1 border border-slate-600">Precio</th>
                        <th class="pl-1 pr-1 border border-slate-600">Categoria</th>
                        <th class="pl-2 pr-2 border border-slate-600">Edit</th>
                        <th class="pl-2 pr-2 border border-slate-600">Del</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="calzado in calzados" :key="calzado.id">
                        <td>{{ calzado.id }}</td>
                        <td>{{ calzado.marca }}</td>
                        <td>{{ calzado.color }}</td>
                        <td>{{ calzado.modelo }}</td>
                        <td>{{ calzado.existencia }}</td>
                        <td>{{ calzado.precio }}</td>
                        <td>{{ calzado.categoria }}</td>
                        <td>
                            <Link :href="calzado.viewEdit" method="get">
                            <svg class="h-7 w-7 text-teal-500" width="24" height="24" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 20h9" />
                                <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z" />
                            </svg>
                            </Link>
                        </td>
                        <td>
                            <Link :href="calzado.viewDelete" method="get" :data="{ calzado: calzado }"><svg
                                class="h-7 w-7 text-red-500" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" />
                                <line x1="4" y1="7" x2="20" y2="7" />
                                <line x1="10" y1="11" x2="10" y2="17" />
                                <line x1="14" y1="11" x2="14" y2="17" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg></Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</template>