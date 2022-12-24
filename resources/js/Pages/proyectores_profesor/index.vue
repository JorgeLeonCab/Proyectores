<template>
    <app-layout>
        <Apartado
            v-if="mostrar_componente_apartar"
            :id_elemento="id_elemento"
            @cierraModal="cerrandoModal"
        />
        <div class="mx-auto text-center">
            <div class="p-5 rounded-md mt-5 mx-auto w-3/4 bg-sky-100 shadow-lg">
                <span 
                    class="p-3 m-3 inline-block border-2 border-green-500 rounded-lg bg-green-300 cursor-pointer hover:bg-green-200"
                    @click="mostrar_input = !mostrar_input"
                >
                    Convertirme en administrador
                </span>
                <br/>
                <div class="border-2 inline-block border-black bg-sky-200" v-show="mostrar_input">
                    <label class="m-2" for="password">Ingrese la contraseña para ser administrador: </label>
                    <input class="rounded-lg" type="text" v-model="password" name="password" value="password">
                    <span
                        class="py-2 px-3 m-2 inline-block border-2 border-green-500 rounded-lg bg-green-300 cursor-pointer hover:bg-green-200"
                        @click="putAdmin()"
                    >
                        Aceptar
                    </span>
                    <span
                        class="py-2 px-3 m-2 inline-block border-2 border-red-500 rounded-lg bg-red-300 cursor-pointer hover:bg-red-200"
                        @click="mostrar_input = false"
                    >
                        Cancelar
                    </span>
                </div>
                <div v-if="proyectores.length != 0">
                    <h1 class="mb-2 pb-4 font-bold">Proyectores</h1>
                    <section class="w-4/5 mx-auto grid grid-cols-3">
                        <article class="px-14 pb-3 uppercase bg-black text-white font-semibold border-2 border-white">
                            <p>
                                Numero de serie
                            </p>
                        </article>
                        <article class="px-14 pb-3 uppercase bg-black text-white font-semibold border-2 border-white">
                            <p>
                                Modelo
                            </p>
                        </article>
                        <article class="px-14 pb-3 uppercase bg-black text-white font-semibold border-2 border-white">
                            <p>
                                Opciones
                            </p>
                        </article>
                    </section>
                    <section class="w-4/5 mx-auto grid grid-cols-3" v-for="(proyector, indice) in proyectores" :key="indice">
                        <article class="px-14 py-3 border-2 border-white" :class = "(indice%2 == 0)?'bg-stone-300' :'bg-stone-100'">
                            <p>
                                {{ proyector.numero_serie }}
                            </p>
                        </article>
                        <article class="px-14 py-3 border-2 border-white" :class = "(indice%2 == 0)?'bg-stone-300' :'bg-stone-100'">
                            <p>
                                {{ proyector.name }}
                            </p>
                        </article>
                        <article class="px-14 py-3 border-2 border-white" :class = "(indice%2 == 0)?'bg-stone-300' :'bg-stone-100'">
                            <span 
                                @click="componenteApartar(proyector.id)"
                                class="px-6 py-2 rounded-md bg-stone-900 text-white font-semibold border-2 border-white cursor-pointer hover:bg-stone-700"
                            >
                                Apartar este proyector
                            </span>
                        </article>
                    </section>
                </div>
                <div v-else>
                    <h1 class="uppercase font-bold py-5">
                        no hay proyectores disponibles
                    </h1>
                </div>
            </div>
        </div>
    </app-layout>
</template>
<script>
import { defineComponent } from 'vue'
import AppLayout from '@/Layouts/AppLayout.vue'
import {Head, Link} from '@inertiajs/inertia-vue3'
import axios from 'axios'
import Apartado from './apartado.vue'

export default {
    data(){
        return {
            proyectores: [''],
            mostrar_componente_apartar: false,
            id_elemento: 0,
            mostrar_input: false,
            password: '',
        }
    },
    components:{
        AppLayout,
        Head,
        Link,
        Apartado
    },
    mounted(){
        this.getProyectores();
    },
    methods:{
        async getProyectores(){
            const api = `get-proyectores`;
            const data = await axios.get(api);
            this.proyectores = data.data;
        },
        async putAdmin(){
            const api = `put-admin/${ this.password }`;
            const response = await axios.get(api);
            console.log(response.data);
            if(response.data != "error"){
                window.location.href = "http://proyectores.test/proyectores";
            }
            this.mostrar_input = false;
        },
        componenteApartar(id){
            this.mostrar_componente_apartar = true;
            this.id_elemento = id;
        },
        cerrandoModal(e){
            this.mostrar_componente_apartar = false;
            this.getProyectores
        },
    }
}
</script>