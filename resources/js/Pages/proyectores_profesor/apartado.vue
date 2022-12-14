<template>
    <div
        class="z-10 fixed top-0 h-full w-full text-center overflow-auto"
        style="background-color:rgba(50,50,50,0.5)"
    >
        <div class="mx-auto text-center overflow-auto">
            <div class="p-5 rounded-md mt-5 mx-auto w-4/5 bg-sky-100 shadow-lg">
                <div class="m-7 uppercase font-semibold">
                    Seleecione el horario de su reserva
                </div>
                <div>
                    <section class="inline-block" v-for="(horario, indice) in horarios_disponibles" :key="indice">
                        <article 
                            @click="assingValue(horario)" 
                            class="p-3 border-2 border-black cursor-pointer hover:bg-stone-100"
                            :class="(selected == horario) ? 'bg-stone-100':'bg-stone-200'"
                        >
                            <p :class=" (horario[0] == '-') ? 'text-red-400':''">
                                {{ (horario[0] == '-') ? horario.substr(1,horario.length):horario }}
                            </p>
                        </article>
                    </section>
                </div>
                <span 
                    @click="guardarFormulario()" 
                    class="px-1 py-2 mr-10 mt-10 inline-block cursor-pointer rounded-md bg-white border-2 border-black hover:bg-stone-200"
                >
                    Guardar
                </span>
                <span 
                    @click="emitCierraComponenteBoton()" 
                    class="px-3 py-2 ml-10 mt-10 inline-block cursor-pointer rounded-md bg-white border-2 border-black hover:bg-stone-200"
                >
                    Cerrar
                </span>
            </div>
        </div>
    </div>
</template>
<script>
    import { defineComponent } from 'vue'
    import AppLayout from '@/Layouts/AppLayout.vue'
    import {Head, Link} from '@inertiajs/inertia-vue3'
    import axios from 'axios'

    export default {
        props:{
            id_elemento : Number,
        },
        data(){
            return{
                horarios_apartados: [],
                horarios_disponibles: [
                    '7:00 - 8:29',
                    '8:29 - 9:59',
                    '10:00 - 11:29',
                    '11:30 - 12:59',
                    '13:00 - 14:29',
                    '14:30 - 15:59',
                    '16:00 - 17:29',
                    '17:30 - 18:59',
                    '19:00 - 20:29',
                    '20:30 - 22:00'
                ],
                selected: '',
                msg: {
                    estado:true,
                    msg:'',
                    boton:'',
                }
            }
        },
        components:{
            AppLayout,
            Head,
            Link,
        },
        mounted(){
            this.getReservas();
        },
        methods: {
            prueba(){
                console.log(this.horarios_disponibles.indexOf('Hola mundo'));
            },
            async getReservas(){
                const api =`get-reservas/${this.id_elemento}`;
                const data = await axios.get(api);
                this.horarios_apartados = data.data;
                if(this.horarios_apartados.length > 0){
                    this.comprobarDisponibilidad();
                }
            },
            comprobarDisponibilidad(){
                this.horarios_apartados.forEach(key => {
                    let i = this.horarios_disponibles.indexOf(key.horario);
                    this.horarios_disponibles[i] = '-' + this.horarios_disponibles[i];
                });
            },
            async guardarFormulario(){
                const data = {
                    proyector_id:this.id_elemento,
                    horario:this.selected,
                };
                const response = await axios.post('proyectores',data);
                console.log(response);
                this.emitCierraComponente()
            },
            assingValue(value){
                this.selected = value;
            },
            emitCierraComponenteBoton(){
                this.msg = {
                    estado: true,
                    boton:'error',
                    msg:'Operacion cancelada',
                }
                this.emitCierraComponente();
            },
            emitCierraComponente(){
                this.$emit('cierraModal',this.msg)
            }
        }
    }
</script>