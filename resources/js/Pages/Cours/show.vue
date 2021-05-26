<template>
    <app-layout>
        <div class="w-full border border-gray-600 shadow">
            <div class="p-4">
                <div class="flex flex-wrap items-center justify-center">
                    <h1 class="w-4/6 text-lg font-extrabold">{{this.cour.title}}</h1>
                    <span class="w-2/6 text-xs font-extrabold text-gray-500 text-right">le {{this.date}}</span>
                </div>

                <p class="mt-8 text-sm">{{this.cour.discription}}</p>

                <div class="mt-4 flex flex-wrap items-center justify-center">
                    <span class="text-red-900 ml-1">20 participant</span>
                    <p class="w-2/6 text-xs font-extrabold text-gray-700  ml-auto text-right">Par: {{this.cour.user.name}}</p>
                </div>
            </div>
            <div>
                <Episode v-for="ep in this.cour.episodes" v-bind:key="ep.id" :episode='ep' />
            </div>
            <div>

            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Episode from '@/Components/EpisodesCmp'
    export default {
        components: {
            AppLayout,
            Episode
        },
        props: {
            'cour': Object
        },
        computed: {
            date() {
                const date = new Date(this.cour.created_at)
                return date.toLocaleString()
            }
        }
    }

</script>
