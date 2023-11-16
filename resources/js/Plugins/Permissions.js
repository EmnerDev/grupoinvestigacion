import { usePage } from '@inertiajs/vue3'
export default {
    install: (app) => {
        app.mixin({
            mounted(){
                const pageProps = usePage().props.value;

    if (pageProps && pageProps.auth) {
      const { roles, permissions } = pageProps.auth;

      if (roles && permissions) {
        this.$gates.setRoles(roles);
        this.$gates.setPermissions(permissions);

        console.log('roles:', roles);
        console.log('permissions:', permissions);
            }
        }
    }
})
    },
};