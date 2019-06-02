<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        .dropdown-content {
            max-height: 300px !important;
            overflow-y: auto !important;
            backface-visibility: hidden !important;
        }
    </style>

    <!-- Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <title>MoolahGo | Coding Challenge</title>
</head>

<body>
    <nav>
        <div class="nav-wrapper blue accent-4">
            <a href="index" class="brand-logo center">MoolahGo</a>
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="left hide-on-med-and-down">
                <li><a href="index">Home</a></li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li><a href="logout"><i class="material-icons right">exit_to_app</i><span>Logout</span></a></li>
            </ul>

        </div>
    </nav>

    <ul id="slide-out" class="sidenav">
        <li><a href="index">Summary</a></li>
        <li><a href="logout"><i class="material-icons right">exit_to_app</i><span>Logout</span></a></li>
    </ul>

    <div class="container">
        <div class="section">
            <div class="row">
                <div class="input-field col s6">
                    <input id="date" type="text" class="datepicker" name="date">
                    <label for="date">Date</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <!-- <input id="amount" type="number" name="amount" onkeyup="displayButton()"> -->
                    <input id="amount" type="number" name="amount">
                    <label for="amount">Arbitrary Amount</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3 left-align">
                    <select id="percentage" name="percentage" type="text">
                        <?php for ($i = -10 ; $i <= 10; $i++):?>
                        <?php if ($i == 0): ?>
                        <option value="<?php echo $i?>" selected>
                            <?php echo $i?> %
                        </option>
                        <?php else: ?>
                        <option value="<?php echo $i?>">
                            <?php echo $i?> %
                        </option>
                        <?php endif; ?>
                        <?php endfor;?>
                    </select>
                    <label for="percentage">Percentage</label>
                </div>
            </div>
            <div class="row">
                <div class="col m3 l3">
                    <button id="calculate-button" class="btn waves-effect blue accent-4" name="submit"
                        disabled>Calculate<i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
            <div class="row">
                <div class="col m3 l3">
                    <label id="result-label" for="result" hidden>Result</label>
                    <input id="result" type="text" name="result" hidden>
                </div>
            </div>
            <div class="row">
                <div class="col m6 l6">
                    <table id="history-table" class="responsive-table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Date</th>
                                <th>Arbitrary Amount</th>
                                <th>Percentage</th>
                                <th>Fee</th>
                                <th>Total Amount</th>
                            </tr>
                        <tbody>
                        </tbody>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col m3 l3">
                    <button id="clear-button" class="btn waves-effect blue accent-4" name="submit">Clear</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="js/materializeInit.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

</body>

</html>