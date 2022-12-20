<template>
    <app-layout>
        <Create
            v-if="mostrar_componente_crear"
            @cierraModal="cerrandoModal"
        />
        <div class="mx-auto text-center">
            <div class="p-5 rounded-md mt-5 mx-auto w-3/4 bg-sky-100 shadow-lg">
                <div
                    v-if="apartados.length != 0"
                >
                    <h1 class="mb-2 pb-4 font-bold">Apartados</h1>
                    <div class="mx-auto mb-50 bg-sky-100 my-3 p-4 text-right">
                        <span
                        class="border-2 border-black rounded-md cursor-pointer py-2 px-4 bg-white hover:bg-stone-100"
                        @click="componenteCrear()"
                        >
                            <i>Agregar proyectores</i>
                        </span>
                    </div>
                    <section class="w-11/12 mx-auto grid grid-cols-5 text-center">
                        <article class="px-14 pb-3 uppercase bg-black text-white font-semibold border-2 border-white">
                            <p class="flex-auto">
                                Numero de empleado
                            </p>
                        </article>
                        <article class="px-14 pb-3 uppercase bg-black text-white font-semibold border-2 border-white">
                            <p class="flex-auto">
                                Profesor
                            </p>
                        </article>
                        <article class="px-14 pb-3 uppercase bg-black text-white font-semibold border-2 border-white">
                            <p class="flex-auto">
                                Horario
                            </p>
                        </article>
                        <article class="px-14 pb-3 uppercase bg-black text-white font-semibold border-2 border-white">
                            <p class="flex-auto">
                                Proyector reservado
                            </p>
                        </article>
                        <article class="px-14 pb-3 uppercase bg-black text-white font-semibold border-2 border-white">
                            <p class="flex-auto">
                                Opciones
                            </p>
                        </article>
                    </section>
                    <section class="w-11/12 mx-auto grid grid-cols-5 text-center" v-for="(apartado, indice) in apartados" :key="indice">
                        <article class="px-10 py-3 border-2 border-white" :class = "(indice%2 == 0)?'bg-stone-300' :'bg-stone-100'">
                            <p class="flex-auto">
                                {{ apartado.user.username }}
                            </p>
                        </article>
                        <article class="px-10 py-3 border-2 border-white" :class = "(indice%2 == 0)?'bg-stone-300' :'bg-stone-100'">
                            <p class="flex-auto">
                                {{ apartado.user.name }}
                            </p>
                        </article>
                        <article class="px-10 py-3 border-2 border-white" :class = "(indice%2 == 0)?'bg-stone-300' :'bg-stone-100'">
                            <p class="flex-auto">
                                {{ apartado.horario }}
                            </p>
                        </article>
                        <article class="px-10 py-3 border-2 border-white" :class = "(indice%2 == 0)?'bg-stone-300' :'bg-stone-100'">
                            <p class="flex-auto">
                                {{ apartado.proyector.numero_serie }} - {{ apartado.proyector.name }}
                            </p>
                        </article>
                        <article class="px-10 py-3 border-2 border-white" :class = "(indice%2 == 0)?'bg-stone-300' :'bg-stone-100'">
                            <p>
                                <input
                                    class="inline-block rounded cursor-pointer hover:bg-gray-300"
                                    type="checkbox"
                                    :value="apartado.id"
                                    :id="apartado.id"
                                    v-model="no_recogido[indice]"
                                    @click="assingValue(1,apartado.id,indice)"
                                >
                                &nbsp;
                                <label :for=1 class="inline-block">
                                    No recogido
                                </label>
                            </p>
                            <p>
                                <input
                                    class="inline-block rounded cursor-pointer hover:bg-gray-300"
                                    type="checkbox"
                                    :value="apartado.id"
                                    :id="apartado.id"
                                    v-model="recogido[indice]"
                                    @click="assingValue(2,apartado.id,indice)"
                                >
                                &nbsp;
                                <label :for=2 class="inline-block">
                                    Recogido
                                </label>
                            </p>
                            <p>
                                <input
                                    class="inline-block rounded cursor-pointer hover:bg-gray-300"
                                    type="checkbox"
                                    :value="apartado.id"
                                    :id="apartado.id"
                                    v-model="devuelto[indice]"
                                    @click="assingValue(3,apartado.id,indice)"
                                >
                                &nbsp;
                                <label :for=3 class="inline-block">
                                    Devuelto
                                </label>
                            </p>
                        </article>
                    </section>
                </div>
                <div v-else>
                    <h1 class="uppercase font-bold py-5">
                        no hay ninguna reserva en este momento
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
import Create from './create.vue'

export default {
    data(){
        return {
            apartados: [''],
            mostrar_componente_crear: false,
            no_recogido: [],
            recogido: [],
            devuelto: [],
        }
    },
    components:{
        Create,
        AppLayout,
        Head,
        Link,
    },
    mounted(){
        this.getApartados();

    },
    methods:{
        async getApartados(){
            const api = `get-apartados`;
            const data = await axios.get(api);
            this.apartados = data.data;
            for (let i = 0; i < this.apartados.length; i++) {
                this.no_recogido.push((this.apartados[i].estado == 1) ? true:false);
                this.recogido.push((this.apartados[i].estado == 2) ? true:false);
                this.devuelto.push((this.apartados[i].estado == 3) ? true:false);
            }
        },
        async cambiarEstado(id,indice){
            const data = (this.no_recogido[indice] == true) ? 1:(this.recogido[indice] == true) ? 2:3;
            const api = `cambiar-estado/${id}/${data}`;
            const response = await axios.put(api);
        },
        assingValue(ctrl,id,indice){
            if(ctrl == 1){
                this.no_recogido[indice] = true;
                this.recogido[indice] = false;
                this.devuelto[indice] = false;
            }else if(ctrl == 2){
                this.no_recogido[indice] = false;
                this.recogido[indice] = true;
                this.devuelto[indice] = false;
            }else if(ctrl == 3){
                this.no_recogido[indice] = false;
                this.recogido[indice] = false;
                this.devuelto[indice] = true;
            }
            this.cambiarEstado(id,indice);
        },
        componenteCrear(){
            this.mostrar_componente_crear = true;
        },
        cerrandoModal(e){
            this.mostrar_componente_crear = false;
            this.getApartados();
        },
    }
}
</script>