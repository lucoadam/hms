<template>
    <div>
        <v-layout row wrap mb40>
            <v-flex md10 mb20>
                <h2>Edit Zone</h2>
            </v-flex>
            <v-flex md1>
                <v-btn fab :to="{ name: 'admin.zones.index' }" ><v-icon>arrow_back</v-icon></v-btn>
            </v-flex>

        </v-layout>
    <zone-form :zone="zone"></zone-form>
    </div>
</template>

<script>
    import ZoneApi from './../../../../api/Zone'
    import ZoneForm from './Form'
    export default {
        components: { ZoneForm },
        created () {
            ZoneApi.findById(this.$route.params.id).then((response) => {
                this.zone = response.body
            })
        },
        watch: {
            '$route' (to, from) {
                this.created()
            }
        },
        data () {
            return {
                zone: {},
            }
        },
    }
</script>

<style scoped>
</style>
