<template>

    <div>

        <v-layout row wrap mb40>
            <v-flex md10 mb20>
                <h2>Add Location</h2>
            </v-flex>
            <v-flex md1>
                <v-btn fab :to="{ name: 'admin.locations.index' }" ><v-icon>arrow_back</v-icon></v-btn>
            </v-flex>
        </v-layout>

        <location-form :location="blankLocation"></location-form>

    </div>

</template>

<script>
    import LocationForm from './Form'
    export default {
        components: { LocationForm },
        created () {
        },
        data () {
            return {
                blankLocation: {
                    location: '',
                    description:'',
                }
            }
        }
    }
</script>

<style scoped>
</style>
