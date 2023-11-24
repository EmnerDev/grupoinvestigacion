import { usePage } from '@inertiajs/vue3'
export default {
    install: (app) => {
        app.mixin({
            mounted(){
                let authRoles = usePage().props.auth.user;
                //console.log('authROles', authRoles.roles)
                let authPermissions;
                if(authRoles !== null){
                    authRoles = usePage().props.auth.user.roles;
                    authPermissions = usePage().props.auth.user.permissions;
                    this.$gates.setRoles(authRoles);
                    this.$gates.setPermissions(authPermissions);
                }
            }
        })
    }
}