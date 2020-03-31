<template>

    <div>

        <v-layout row wrap mb40>
            <v-flex md10 mb20>
                <h2>Add Journal Type</h2>
            </v-flex>
            <v-flex md1>
                <v-btn fab :to="{ name: 'admin.journaltypes.index' }" ><v-icon>arrow_back</v-icon></v-btn>
            </v-flex>
        </v-layout>

        <journal-type-form :journaltype="blankJournalType"></journal-type-form>

    </div>

</template>

<script>
    import JournalTypeForm from './Form'
    export default {
        components: { JournalTypeForm },
        created () {
        },
        data () {
            return {
                blankJournalType: {
                    type: '',
                    description:'',
                }
            }
        }
    }
</script>

<style scoped>
</style>
