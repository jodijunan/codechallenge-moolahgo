(function () {

    angular.module('myCode', ['ngStorage'])
        .controller('myCtrl', ['$scope', 'myModel', '$localStorage', function ($scope, myModel, $localStorage) {
            $scope.percentage = 0;
            $scope.finalvalue = '';
            $scope.lists = '';


            $scope.showFinal = function () {
                $scope.finalvalue = $scope.amount + ($scope.amount * ($scope.percentage / 100));
            };

            //todo: to use without database using localStorage
            var lists = [];
            if (localStorage.getItem('lists')) {
                $scope.lists = JSON.parse(localStorage.getItem('lists'));
                lists = JSON.parse(localStorage.getItem('lists'));
            }
            $scope.saveData = function () {
                var fees = $scope.finalvalue * 0.05;

                var id = 1;
                if (lists.length > 0) {
                    id = lists.length + 1;
                }
                var data = {
                    id: id,
                    amount: $scope.amount,
                    finalValue: $scope.finalvalue,
                    percentage: $scope.percentage,
                    mydate: $scope.mydate,
                    fees: fees
                };
                lists.push(data);
                localStorage.setItem('lists', JSON.stringify(lists));
                $scope.lists = JSON.parse(localStorage.getItem('lists'));
                $scope.mydate = ''; $scope.amount='';$scope.percentage='';$scope.finalvalue='';
            };
            $scope.clear = function () {
                if (localStorage.getItem('lists')) { delete localStorage.lists; $scope.lists=''}
            };


            //todo: to use with database, if you want to test this, comment the above localStorage Version
            // myModel.getList().then(function (res) {
            //     if (res.data.length > 0) {
            //         $scope.lists = res.data;
            //     }
            // });
            //
            // $scope.saveData = function () {
            //     var data = {
            //         amount: $scope.amount,
            //         finalValue: $scope.finalvalue,
            //         percentage: $scope.percentage,
            //         mydate: $scope.mydate,
            //         fees: ''
            //     };
            //     myModel.calculate(data)
            //         .then(function (result) {
            //             myModel.getList().then(function (res) {
            //                 $scope.lists = res.data;
            //             });
            //         });
            //     $scope.mydate = ''; $scope.amount='';$scope.percentage='';$scope.finalvalue='';
            // };


        }])
        //todo: myModel is to use with database
        .factory('myModel', ['$http', function ($http) {
            var myService = {};

            myService.calculate = function (data) {
                data.fees = data.finalValue * 0.05;

                //todo: to use with db version
                return $http.post("rest_api.php", {
                    'request': 'save',
                    'data': JSON.stringify(data)
                }).then(function (res) {
                    if (res.data.id !== undefined) {
                        return res;
                    } else {
                        return false;
                    }
                });
            };

            myService.getList = function () {

                //todo: to use with db version
                return $http.post("rest_api.php", {
                    'request': 'all'
                }).then(function (res) {
                    console.log(res);
                    return res;
                })

            };

            return myService;
        }]);

})();