<template>
    <div id="root">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="#">Brand</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
        <div role="main" class="container">
            <div class="starter-template text-center">
                <h1>Bootstrap starter template</h1>
                <p class="lead">Use this document as a way to quickly start any new project.<br> All you get is this text and a mostly barebones HTML document.</p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <CalculatorForm></CalculatorForm>
                    </div>
                    <div class="col-sm-6">
                    </div>
                </div>
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