<template>
    <app-layout>
        <div class="w-full">
            <h1 class="text-2xl font-bold">Crée un épisode pour la formation</h1>
            <div class="w-full flex items-center justify-center">
                <form @submit.prevent="submit" class="mt-4 w-11/12 sm:w-8/12 items-center">
                    <!-- Name input -->
                    <label for="title" class="block mb-1">Titre:</label>
                    <input type="text" id="title" name="title" class="mb-4 input" placeholder="Episode..."
                        v-model="this.form.title" required autofocus>
                    <!-- Email input -->
                    <label for="discription" class="block mb-1">Discription:</label>
                    <textarea id="discription" name="discription" class="mb-4 input" placeholder="Dans cette épisode..."
                        v-model="this.form.discription" required rows='6'></textarea>
                    <!-- Name input -->
                    <label for="url" class="block mb-1">Url de la video:</label>
                    <input type="url" id="url" name="url" class="mb-4 input" placeholder="Http://..."
                        v-model="this.form.video_url" required autofocus>
                    <!-- Button -->
                    <input type="submit"
                        class="cursor-pointer bg-green-500 text-white mt-4 px-4 py-2 rounded hover:bg-green-600 float-right"
                        value="Crée l'épisode">
                </form>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import { Inertia } from '@inertiajs/inertia'

    export default {
        components: {
            AppLayout,
        },
        props:{
            idC : Number
        },
        data() {
            return {
                form: {
                    title: '',
                    discription: '',
                    video_url:'',
                    cours_id: this.idC
                }
            }
        },
        methods:{
            submit(){
                Inertia.post(route('episodes.store',{'cour':this.idC}), this.form)
            }
        }
    }

</script>
