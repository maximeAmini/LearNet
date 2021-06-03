<template>
    <table class="border-collapse border border-gray-200 table-auto shadow-xl mt-2">
        <thead>
            <tr>
                <th class="border border-gray-200 p-3">Cours</th>
                <th class="border border-gray-200 p-3">Progression</th>
                <th class="border border-gray-200 p-3">Nombre d'épisode étudié</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="cour in this.cours" v-bind:key="cour.id">
                <td class="border border-gray-200 p-3">
                    <inertia-link :href="route('cours.show',{'cour':cour.id})" class="text-blue-500 hover:text-blue-400">
                        {{cour.title}}
                    </inertia-link>
                </td>
                <td class="border border-gray-200 p-3 text-center">
                    {{Math.ceil(cour.nbR * 100 / cour.nbE)}}%
                    <div class="bg-gray-200">
                        <div class="p-2 bg-green-600" :style='"width:"+Math.ceil(cour.nbR * 100 / cour.nbE)+"%"'></div>
                    </div>
                </td>
                <td class="border border-gray-200 p-3 text-red-700 text-center">{{cour.nbR}}/{{cour.nbE}} terminé</td>
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
            pourc(nbR, nbE) {
                return Math.ceil(nbR * 100 / nbE)
            }
        }
    }

</script>
