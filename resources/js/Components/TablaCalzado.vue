<script setup>
import { defineProps } from 'vue';
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'
import { Link } from '@inertiajs/vue3'

const form = reactive({
    filtro: null
})

function submit() {
    router.get('/zapateria/calzado/index', form)
}
defineProps({
    calzados: Object,
    categorias: Object,
    rutas: Object,
    errors: Object,
});
</script>
<template>
    <div class="container grid grid-cols-1">
        <!--Div para crear la tabla-->
        <div class="">
            <form @submit.prevent="submit">
                <label for="filtro" class="text-lg">Buscar por:</label>
                <select name="filtro" id="filtro" v-model="form.filtro" class="border border-slate-600">
                    <option :value="categoria.id" v-for="categoria in categorias" :key="categoria.id">{{
                        categoria.nombre }}
                    </option>
                </select>
                <button type="submit" class="bg-gray-700 hover:bg-gray-600 text-white p-2 rounded-lg">Buscar</button>
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
                        <th class="pl-3 pr-3 border border-slate-600">Editar</th>
                        <th class="pl-3 pr-3 border border-slate-600">Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="calzado in calzados" :key="calzado.marca">
                        <td>{{ calzado.id }}</td>
                        <td>{{ calzado.marca }}</td>
                        <td>{{ calzado.color }}</td>
                        <td>{{ calzado.modelo }}</td>
                        <td>{{ calzado.existencia }}</td>
                        <td>${{ calzado.precio }}</td>
                        <td>{{ calzado.categoria }}</td>
                        <td></td>
                        <td>
                            <Link :href="calzado.vistaEliminar">Eliminar
                            </Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    {{ rutas.vistaEliminar }}
</template>