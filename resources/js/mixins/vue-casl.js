import { usePage } from "@inertiajs/vue3";
import ability from "@/Plugins/CaslAbiltity";

export default {
    mounted(){
        const authData = usePage().props.auth;
        console.log('sada', authData)
        if(authData !== undefined && authData.user !== undefined && authData.user.roles !== undefined){
            const authRoles = authData.user.roles;

            ability.update((can, cannot) => {
                
                    if(authRoles[0] === 'Administrador'){
                        can('permissions');
                    }else if(authRoles[0] === 'Investigador'){
                        can('dashboard');
                    }

            });
            this.$gates = ability;
        }
    }
}