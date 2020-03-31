<template>

    <div>

        <v-layout row wrap mb40>
            <v-flex md10 mb20>
                <h2>Add Zone</h2>
            </v-flex>
            <v-flex md1>
                <v-btn fab :to="{ name: 'admin.zones.index' }" ><v-icon>arrow_back</v-icon></v-btn>
            </v-flex>
        </v-layout>

        <zone-form :zone="blankZone"></zone-form>

    </div>

</template>

<script>
    import ZoneForm from './Form'
    export default {
        components: { ZoneForm },
        created () {
        },
        data () {
            return {
                blankZone: {
                    name: '',
                    description:'',
                    type:false,
                }
            }
        }
    }
</script>

<style scoped>
</style>
