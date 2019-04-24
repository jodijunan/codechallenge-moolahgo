<template>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Percentage</th>
                <th scope="col">Fee</th>
                <th scope="col">Final Amount</th>
            </tr>
        </thead>
        <tbody>
            <tr v-if="isProcessing">
                <td colspan="5">Getting records...</td>
            </tr>
            <tr v-if="records.length" v-for="record in records">
                <td>{{ record.date }}</td>
                <td>{{ record.amount ? ('$' + Number(record.amount.toFixed(2)).toLocaleString()): null }}</td>
                <td>{{ record.percentage ? record.percentage + '%' : null }}</td>
                <td>{{ record.fee ? ('$' + Number(record.fee.toFixed(2)).toLocaleString()): null }}</td>
                <td>{{ record.final_amount ? ('$' + Number(record.final_amount.toFixed(2)).toLocaleString()): null }}</td>
            </tr>
            <tr v-else>
                <td colspan="5">No records found...</td>
            </tr>
        </tbody>
    </table>
</template>

<script type="text/javascript">
    import { get } from '../helpers/api'

    export default {
        data() {
            return {
                records : [],
                isProcessing : false,
            }
        },
        created() {
            this.getRecords()
        },
        mounted() {
            this.$root.$on('add-record', data => {
                console.log(data);
                this.records.unshift(data);
            });
        },
        methods : {
            getRecords() {
                this.isProcessing = true
                get('/ajax/getRecords')
                    .then((response) => {
                        this.records = response.data.data
                        this.isProcessing = false
                    })
            }
        }
    }
</script>