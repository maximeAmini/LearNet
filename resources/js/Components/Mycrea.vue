<template>
    <table class="border-collapse border border-gray-200 table-auto shadow-xl mt-2">
        <thead>
            <tr>
                <th class="border border-gray-200 p-3">Cours crée</th>
                <th class="border border-gray-200 p-3">Nombre de participants</th>
                <th class="border border-gray-200 p-3">Nombre d'épisode publié</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="cour in this.cours" v-bind:key="cour.id">
                <td class="border border-gray-200 p-3">
                    <inertia-link :href="route('cours.show',{'cour':cour.id})"
                        class="text-blue-500 hover:text-blue-400">
                        {{cour.title}}
                    </inertia-link>
                    <br>
                    <span v-if="cour.update.allowed" class="w-2/6 text-xs text-right">
                        <inertia-link :href="route('cours.edit',{'cour':cour.id})"
                            class="cursor-pointer text-green-500 hover:text-green-600 text-right">
                            Modifier
                        </inertia-link> |
                        <a @click="supp(cour.id)" class="cursor-pointer text-red-500 hover:text-red-600 text-right">Supprimé</a>
                    </span>
                </td>
                <td class="border border-gray-200 p-3 text-center text-green-500">{{cour.part}}</td>
                <td class="border border-gray-200 p-3 text-center">{{cour.episodes_count}}</td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        props: {
            'cours': Object
        },
        methods: {
            supp(idC) {
                this.$inertia.delete(route('cours.destroy', {
                    'cour': idC
                }));
            }
        }
    }

</script>
