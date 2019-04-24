<template>
    <div id="root">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <div class="container">
                <div class="navbar-brand" href="#">Fee Calculator</div>
            </div>
        </nav>
        <div role="main" class="container">
            <div class="text-center">
                <h1>Fee Calculator</h1>
                <p class="lead">Just your simple fee calculator</p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <CalculatorForm></CalculatorForm>
                    </div>
                    <div class="col-lg-6">
                        <RecordList></RecordList>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div class="container">
                <span class="text-muted">Just something to foot on.</span>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
    import Flash from './helpers/flash'

    export default {
        data() {
            return {
                flash : Flash.state,
                isProcessing : false
            }
        },
    }
</script>