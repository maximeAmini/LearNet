<template>
    <div class="w-full font-bold bg-gray-100 dark:bg-gray-800">
        <div class="text-white text-center bg-green-600 dark:bg-green-800 p-1" :style='"width:"+this.pourc'>
            {{this.pourc}}
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            episodes: Object,
            watched: Object,
        },
        data(){
            return{
                wat: this.watched
            }
        },
        computed: {
            pourc() {
                let filter = this.episodes.filter( E=> {
                    return this.wat.find(W=>{
                        return W.id===E.id
                    })
                })
                return Math.ceil((filter.length * 100) / this.episodes.length)+'%'
            }
        }
    }

</script>
