import { usePage } from '@inertiajs/vue3';

export const GatesMixin = {
  mounted() {
    const pageProps = usePage().props.value;

    if (pageProps && pageProps.auth) {
      const { roles, permissions } = pageProps.auth;

      if (roles && permissions) {
          console.log('roles:', roles);
          console.log('permissions:', permissions);
        this.$gates.setRoles(roles);
        this.$gates.setPermissions(permissions);

      }
    }
  },
};