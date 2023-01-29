<script setup>
import { Link } from '@inertiajs/vue3';
import { defineProps } from 'vue';
import { reactive } from 'vue'
import { router } from '@inertiajs/vue3'
const props = defineProps({
    categoria: Array,
    rutas: Array,
    errors: Object,
});

const form = reactive({
    id: props.categoria.id,
    nombre: props.categoria.nombre,
    descripcion: props.categoria.descripcion,
})

function submit() {
    router.put(props.categoria.edit, form)
}

</script>


<template>
    {{ categoria }}
    <div class="container">
        <div class="grid grid-cols-3 pt-10 pl-20">
            <div class>
            </div>

            <div
                class="items-center w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow-2xl sm:p-6 md:p-8 dark:bg-gray-100 dark:border-gray-700">

                <form @submit.prevent="submit">
                    <h1 class="text-center">Modificar Categoria</h1>
                    <input id="nombre" v-model="form.nombre"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder="Nombre de la categoria"/>
                    <br>
                    <label for="descripcion">Descripcion:</label>
                    <textarea name="" id="descripcion" cols="30" rows="3" v-model="form.descripcion"
                        class=" p-2.5 w-full text-sm text-black bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-white dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Calzado especial para..."></textarea>
                    <br>
                    <button type="submit"
                        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Guardar</button>
                        <button class="pr-10"></button>
                    <Link :href="rutas.index">Regresar</Link>
                </form>
            </div>

            <div></div>
        </div>
    </div>
</template>