<template>
    <div>
        <v-layout row wrap mb40>
            <v-flex md10 mb20>
                <h2>Edit Location</h2>
            </v-flex>
            <v-flex md1>
                <v-btn fab :to="{ name: 'admin.locations.index' }" ><v-icon>arrow_back</v-icon></v-btn>
            </v-flex>

        </v-layout>
    <location-form :location="location"></location-form>
    </div>
</template>

<script>
    import LocationApi from './../../../../api/Location'
    import LocationForm from './Form'
    export default {
        components: { LocationForm },
        created () {
            LocationApi.findById(this.$route.params.id).then((response) => {
                this.location = response.body
            })
        },
        watch: {
            '$route' (to, from) {
                this.created()
            }
        },
        data () {
            return {
                location: {},
            }
        },
    }
</script>

<style scoped>
</style>
