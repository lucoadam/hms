<template>

    <div>

        <v-layout row wrap mb40>
            <v-flex md10 mb20>
                <h2>Add Institute</h2>
            </v-flex>
            <v-flex md1>
                <v-btn fab :to="{ name: 'admin.institutes.index' }" ><v-icon>arrow_back</v-icon></v-btn>
            </v-flex>
        </v-layout>

        <institute-form :institute="blankInstitute"></institute-form>

    </div>

</template>

<script>
    import InstituteForm from './Form'
    export default {
        components: { InstituteForm },
        created () {
        },
        data () {
            return {
                blankInstitute: {
                    name: '',
                    full_abbr:'',
                    abbr:''
                }
            }
        }
    }
</script>

<style scoped>
</style>
