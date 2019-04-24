<template>
    <form @submit.prevent="addRecord">
        <div class="form-group row" :class="{ 'is-invalid' : error.date }">
            <label for="date" class="col-sm-3 col-form-label">Date</label>
            <!-- <input type="text" class="form-control" id="date" placeholder="Enter date"> -->
            <div class="col-sm-9">
                <input type="text" v-model="form.date" v-on:change="onDateChange" :class="{ 'is-invalid' : error.date, 'form-control': true }" id="date" placeholder="Enter date (MM/DD/YYYY)">
            </div>
        </div>
        <div class="form-group row" :class="{ 'is-invalid' : error.amount }">
            <label for="amount" class="col-sm-3 col-form-label">Amount</label>
            <div class="col-sm-9">
                <input type="text" v-model.number="form.amount" v-on:change="onAmountChange" :class="{ 'is-invalid' : error.amount, 'form-control': true }" id="amount" placeholder="Enter amount">
            </div>
        </div>
        <div class="form-group row">
            <label for="percentage" class="col-sm-3 col-form-label">Percentage (%)</label>
            <div class="col-sm-9">
                <input type="text" v-model.number="form.percentage" v-on:change="onPercentageChange" :class="{ 'is-invalid' : error.percentage, 'form-control': true }" id="percentage" placeholder="Enter percentage (%)">
            </div>
        </div>
        <div class="form-group row">
            <label for="total-amount" class="col-sm-3 col-form-label">Final Amount</label>
            <div class="col-sm-9">
                <input type="text" v-model="finalAmount" :disabled="true" :class="{ 'is-invalid' : error.total_amount, 'form-control': true }" id="total-amount" placeholder="Total Amount">
            </div>
        </div>
        <div class="form-group row">
            <button type="submit" class="btn btn-primary" :disabled="isProcessing || hasErrors">Add Record</button>
        </div>
    </form>
</template>

<script type="text/javascript">
    import { post } from '../helpers/api'
    import { isValidDate } from '../helpers/date'

    export default {
        data() {
            return {
                form : {
                    date: null,
                    amount: null,
                    percentage: null
                },
                error : {},
                isProcessing: false,
                hasErrors: false
            }
        },
        created() {
            this.onValidateForm()
        },
        watch: {
            error: function(val, oldVal) {
                this.hasErrors = !!Object.keys(val).length;
            }
        },
        methods : {
            onValidateForm () {
                this.validateAmount()
                this.validateDate()
                this.validatePercentage()
            },
            validateDate () {
                if (!this.form.date) {
                    this.$set(this.error, 'date', 'Date is required');
                    return false;
                }

                if (!isValidDate(this.form.date)) {
                    this.$set(this.error, 'date', 'Date is invalid');
                    return false;
                }

                if (typeof this.error['date'] !== 'undefined') {
                   this.$delete(this.error, 'date')
                }

                return true;
            },
            validateAmount () {
                if (!this.form.amount) {
                    this.$set(this.error, 'amount', 'Amount is required');
                    return false;
                }

                if (isNaN(this.form.amount)) {
                    this.$set(this.error, 'amount', 'Amount is not a number');
                    return false;
                }

                if (typeof this.error['amount'] !== 'undefined') {
                   this.$delete(this.error, 'amount')
                }

                return true;
            },
            validatePercentage () {
                if (this.form.percentage && !(this.form.percentage >= -10 && this.form.percentage <= 10)) {
                    this.$set(this.error, 'percentage', 'Percentage must be between -10 and 10');
                    return false;
                }

                if (this.form.percentage && isNaN(this.form.percentage)) {
                    this.$set(this.error, 'percentage', 'Percentage is not a number');
                    return false;
                }

                if (typeof this.error['percentage'] !== 'undefined') {
                    this.$delete(this.error, 'percentage')
                }

                return true;
            },
            clearForm () {
                this.$set(this.form, 'amount', null);
                this.$set(this.form, 'date', null);
                this.$set(this.form, 'percentage', null);
            },
            onDateChange (event) {
                this.onValidateForm()
            },
            onAmountChange (event) {
                this.onValidateForm()
            },
            onPercentageChange (event) {
                this.onValidateForm()
            },
            addRecord() {
                this.isProcessing = true
                this.onValidateForm()
                if (this.hasErrors) {
                    this.isProcessing = false
                    return
                }
                this.error = {}
                post('/ajax/addRecord', this.form)
                    .then((response) => {
                        let data = response.data;
                        if (typeof data['error'] !== 'undefined') {
                            this.error = data['error'];
                        } else {
                            this.clearForm();
                            this.onValidateForm();
                            this.$root.$emit('add-record', data);
                        }
                        this.isProcessing = false;
                    })
                    .catch((err) => {
                        this.isProcessing = false;
                    })
            }
        },
        computed: {
            finalAmount: {
                get () {
                    if (!this.validateAmount()) {
                        return 'Amount invalid or out of range';
                    }

                    if (!this.validatePercentage()) {
                        return 'Percentage invalid or out of range';
                    }

                    let percentage = this.form.percentage;
                    if (!percentage) {
                        percentage = 0;
                    }

                    let percentageTotal = (this.form.amount * percentage) / 100 // To avoid float issues
                    let total = this.form.amount + percentageTotal

                    return '$' + Number(total.toFixed(2)).toLocaleString();
                }
            }
        }
    }
</script>
