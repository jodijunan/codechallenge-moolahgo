<template>
    <form @submit.prevent="addRecord">
        <div class="form-group row" :class="{ 'has-error' : error.date }">
            <label for="date" class="col-sm-2 col-form-label">Date</label>
            <!-- <input type="text" class="form-control" id="date" placeholder="Enter date"> -->
            <div class="col-sm-10">
                <date-picker v-model="form.date" v-on:change="onDateChange" lang="en"></date-picker>
            </div>
        </div>
        <div class="form-group row" :class="{ 'has-error' : error.amount }">
            <label for="amount" class="col-sm-2 col-form-label">Amount</label>
            <div class="col-sm-10">
                <input type="text" v-model.number="form.amount" v-on:change="onAmountChange" class="form-control" id="amount" placeholder="Enter amount">
            </div>
        </div>
        <div class="form-group row" :class="{ 'has-error' : error.percentage }">
            <label for="percentage" class="col-sm-2 col-form-label">Percentage (%)</label>
            <div class="col-sm-10">
                <input type="text" v-model.number="form.percentage" v-on:change="onPercentageChange" class="form-control" id="percentage" placeholder="Enter percentage (%)">
            </div>
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group row">
            <label for="total-amount" class="col-sm-2 col-form-label">Total Amount</label>
            <div class="col-sm-10">
                <input type="text" v-model="totalAmount" :disabled="true" class="form-control" id="total-amount" placeholder="Total Amount">
            </div>
        </div>
        <div class="form-group row">
            <button type="submit" class="btn btn-primary" :disabled="isProcessing">Add Record</button>
        </div>
    </form>
</template>

<script type="text/javascript">
    import DatePicker from 'vue2-datepicker'
    export default {
        components: { DatePicker },
        data() {
            return {
                form : {
                    date: null,
                    amount: 0,
                    percentage: 0
                },
                error : {},
                isProcessing: false,
                // For datepicker,
            }
        },
        methods : {
            onDateChange (event) {
                console.log('onDateChange', event);
            },
            onAmountChange (event) {
                console.log('onAmountChange', event);
            },
            onPercentageChange (event) {
                console.log('onPercentageChange', event);
            },
            addRecord() {
                this.isProcessing = true;
                this.error = {}
                setTimeout(() => {
                    this.isProcessing = false
                }, 1000);
                // post('/api/v1/posts/me', this.form)
                //     .then((response) => {
                //         if (response.data.result) {
                //             Flash.setType('success')
                //             Flash.setMessage(response.data.message)
                //             this.$router.push('/dashboard')
                //         }
                //     })
                //     .catch((err) => {
                //         console.log('Add post response',err);
                //         if (err.response.status === 422) {
                //             this.error = err.response.data
                //         }
                //         if (err.response.status === 401) {
                //             let response = err.response
                //             Flash.setType('danger')
                //             Flash.setMessage(response.data.message)
                //         }
                //         this.isProcessing = false;
                //     })
            }
        },
        computed: {
            totalAmount: {
                get () {
                    if (isNumber)
                    return this.form.amount * this.form.percentage;
                }
            }
        }
    }
</script>
