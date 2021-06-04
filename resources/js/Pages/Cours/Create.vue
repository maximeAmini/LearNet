<template>
    <app-layout>
        <div class="w-full">
            <h1 class="text-2xl font-bold">Crée une formation</h1>
            <div class="w-full flex items-center justify-center">
                <form @submit.prevent="submit" class="mt-4 w-11/12 sm:w-8/12 items-center">
                    <!-- Name input -->
                    <label for="title" class="block mb-1">Titre:</label>
                    <input type="text" id="title" name="title" class="mb-4 input" placeholder="Apprendre le..."
                        v-model="this.form.title" required autofocus>
                    <!-- Email input -->
                    <label for="discription" class="block mb-1">Discription:</label>
                    <textarea id="discription" name="discription" class="mb-4 input"
                        placeholder="Dans cette formation..." v-model="this.form.discription" required
                        rows='8'></textarea>
                    <!-- Button -->
                    <input type="submit"
                        class="cursor-pointer bg-green-500 text-white mt-4 px-4 py-2 rounded hover:bg-green-600 float-right"
                        value="Crée la formation">
                    <!--  <div v-if="$page.errors.title">{{$page.errors.title[0]}}</div> -->
                </form>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import {
        Inertia
    } from '@inertiajs/inertia'

    export default {
        components: {
            AppLayout,
        },
        data() {
            return {
                form: {
                    title: '',
                    discription: '',
                }
            }
        },
        methods: {
            submit() {
                Inertia.post(route('cours.store'), this.form)
            }
        }
    }

</script>
