<template>
    <jet-dropdown-link @click="toDark" class="block px-4 py-4 leading-5 text-gray-700 focus:outline-none transition cursor-pointer text-right text-lg border-t border-gray-200">
        <span class="bg-gray-800 p-2 text-white rounded-full">
            <i class="fa fa-sun" :class=" this.getCookie('theme')!='dark' ? 'text-yellow-400': ''"> </i> 
            <i class="pl-4 fa fa-moon" :class=" this.getCookie('theme')=='dark' ? 'text-yellow-400': ''"> </i> 
        </span>
    </jet-dropdown-link>
</template>

<script>
    export default {
        data(){
            return{
                dark: this.getCookie('theme')
            }
        },
        methods: {
            toDark(){
                if(this.dark=='light'){
                    this.setCookie('theme', 'dark')
                }else{
                    this.setCookie('theme', 'light')
                }
                document.location.reload(false)
            },
            getCookie(cname) {
                var theme = cname + "=";
                var decodedCookie = decodeURIComponent(document.cookie);
                var ca = decodedCookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ') {
                        c = c.substring(1);
                    }

                    if (c.indexOf(theme) == 0) {
                        return c.substring(theme.length, c.length);
                    }
                }
                return "";
            },
            setCookie(name, value){
                var d = new Date();
                d.setTime(d.getTime() + (365 * 24 * 60 * 60 * 1000));
                var expires = "expires=" + d.toUTCString();
                console.log(expires)
                document.cookie = name + "=" + value + ";" + expires + ";path=/";
                console.log(document.cookie)
            }
        }
    }

</script>
