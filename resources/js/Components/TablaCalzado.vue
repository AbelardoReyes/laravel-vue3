<script setup>
import { Link } from '@inertiajs/vue3'
import { defineProps } from 'vue';

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
                    <tr v-for="calzado in calzados" :key="calzado.id">
                        <td>{{ calzado.id }}</td>
                        <td>{{ calzado.marca }}</td>
                        <td>{{ calzado.color }}</td>
                        <td>{{ calzado.modelo }}</td>
                        <td>{{ calzado.existencia }}</td>
                        <td>{{ calzado.precio }}</td>
                        <td>{{ calzado.categoria }}</td>
                        <td>
                            <Link :href="calzado.viewEdit" method="get" >Edit</Link>
                        </td>
                        <td>
                            <Link :href="calzado.viewDelete" method="get" :data="{calzado:calzado}">Delete</Link>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</template>