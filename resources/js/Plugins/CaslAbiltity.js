import { defineAbility } from "@casl/ability";

const ability = defineAbility((can,cannot) =>{
    can('manage', 'all');
});

export default ability;