<template>
    <div
        class="w-full lg:w-3/12 mr-4 my-4 border border-gray-600 shadow transform hover:scale-110 transition duration-500 ease-in-out h-80 overflow-hidden">
        <div class="text-4xl font-extrabold overflow-hidden bg-green-600 text-green-200 p-4 flex flex-col flex-wrap items-center justify-center shadow-lg h-2/6">
            {{this.pourc}}%
            <span class="text-red-200 text-sm text-center">{{this.cour.nbR}}/{{this.cour.nbE}} épisodes etudié</span>
        </div>
        <div class="flex flex-wrap p-4">
            <h1 class="font-extrabold">{{this.cour.title}}</h1>
            <p class="mt-1 text-sm">{{this.cour.discription.substr(0, 100)+"..."}}</p>
            <inertia-link :href="route('cours.show',{'id':this.cour.id})"
                class="transition duration-500 ease-in-out border border-blue-700 dark:text-white mt-4 px-4 py-2 hover:bg-blue-800 hover:text-white ml-auto">
                Poursuivre le cours
            </inertia-link>
        </div>
    </div>
</template>

<script>
    import JetNavLink from '@/Jetstream/NavLink'
    export default {
        components: {
            JetNavLink,
        },
        props: {
            'cour': Object
        },
        computed: {
            date() {
                const date = new Date(this.cour.created_at)
                return date.toLocaleString()
            },
            pourc() {
                return this.cour.nbR * 100 / this.cour.nbE
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
