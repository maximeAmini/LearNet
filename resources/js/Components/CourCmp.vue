<template>
    <div
        class="w-full lg:w-5/12 m-4 p-4 border border-gray-600 shadow transform hover:scale-110 transition duration-500 ease-in-out">
        <div class="flex flex-wrap items-center justify-center">
            <h1 class="w-4/6 text-lg font-extrabold">{{this.cour.title}}</h1>
            <span class="w-2/6 text-xs font-extrabold text-gray-500 text-center">le {{this.date}}</span>
        </div>
        <p class="mt-8 text-sm">{{this.cour.discription.substr(0, 200)+"..."}}</p>
        <div class="flex flex-wrap items-center justify-center">
            <span class="text-green-800 mr-1">{{this.cour.episodes_count}} épisodes</span> |
            <span class="text-red-900 ml-1">{{this.cour.part}} participant</span>
            <inertia-link :href="route('cours.show',{'cour':this.cour.id})"
                class="transition duration-500 ease-in-out border border-blue-700 dark:text-white mt-4 px-4 py-2 hover:bg-blue-800 hover:text-white ml-auto">
                Voir le cours
            </inertia-link>
        </div>
        <span v-if="this.cour.update.allowed" class="w-2/6 text-xs text-right">
            <inertia-link :href="route('cours.edit',{'cour':this.cour.id})"
                class="cursor-pointer text-green-500 hover:text-green-600 text-right">
                Modifier
            </inertia-link> |
            <a @click="supp" class="cursor-pointer text-red-500 hover:text-red-600 text-right">Supprimé</a>
        </span>
        <p v-else class="w-2/6 text-xs font-extrabold text-gray-700">
            Par:
            <inertia-link :href="route('user.show', {id:this.cour.user.id})">{{this.cour.user.name}}</inertia-link>
        </p>
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
            }
        },
        methods: {
            supp() {
                console.log('ok ptn')
                this.$inertia.delete(route('cours.destroy', {
                    'id': this.cour.id
                }));
            }
        }
    }

</script>
