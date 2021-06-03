<template>
    <app-layout>
        <div class="w-full border border-gray-600 shadow">
            <div class="p-4">
                <div class="flex flex-wrap items-center justify-center">
                    <h1 class="w-4/6 text-lg font-extrabold">{{this.cour.title}}</h1>
                    <span v-if="this.cour.update.allowed" class="w-2/6 text-xs text-right">
                        <inertia-link :href="route('cours.edit',{'id':this.cour.id})"
                            class="cursor-pointer text-green-500 hover:text-green-600 text-right">
                            Modifier
                        </inertia-link> |
                        <a @click="supp" class="cursor-pointer text-red-500 hover:text-red-600 text-right">Supprimé</a>
                    </span>
                    <span v-else class="w-2/6 text-xs font-extrabold text-gray-500 text-right">le {{this.date}}</span>
                </div>

                <p class="mt-8 text-sm">{{this.cour.discription}}</p>

                <div class="mt-4 flex flex-wrap items-center justify-center">
                    <span class="text-red-900 ml-1">{{this.cour.part}} participant</span>
                    <p class="w-2/6 text-xs font-extrabold text-gray-700  ml-auto text-right">Par:
                        {{this.cour.user.name}}</p>
                </div>
            </div>
            <Prog-bar v-if="this.cour.episodes.length!=0" :episodes="this.cour.episodes" :watched="this.watched" />
            <div>
                <Episode v-for="(ep,index) in this.cour.episodes" v-bind:key="ep.id" :episode='ep'
                    :idUser="this.cour.user_id" :watched="this.watched" :index="index"
                    :allowed="this.cour.update.allowed" />
            </div>
        </div>
        <div class="my-4" v-if="this.cour.update.allowed">
            <inertia-link :href="route('episode.add',{'id':this.cour.id})"
                class="transition duration-500 ease-in-out border border-green-700 dark:text-white px-4 py-2 hover:bg-green-800 hover:text-white float-right">
                Ajouter un épisode
            </inertia-link>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Episode from '@/Components/EpisodesCmp'
    import ProgBar from '@/Components/ProgBar'
    export default {
        components: {
            AppLayout,
            Episode,
            ProgBar
        },
        props: {
            'cour': Object,
            'watched': Object
        },
        computed: {
            date() {
                const date = new Date(this.cour.created_at)
                return date.toLocaleString()
            }
        },
        methods: {
            supp() {
                this.$inertia.delete(route('cours.delete', {
                    'id': this.cour.id
                }));
            }
        }
    }

</script>
