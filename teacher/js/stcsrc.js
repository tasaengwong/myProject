var app = angular.module('myApp', []);
app.controller('Ctrl', function ($scope, $http, $log) {
    $scope.$log = $log;
    $scope.Reg = {};
    $scope.x = {};
    $scope.record = {};
    $scope.show_message = "";

    $scope.selecttest = function () {
        $http({
            method: "post",
            url: "select.php",
            data: { "Reg": '' },
            headers: { 'Content-type': 'application/x-www-form-urlencoded' }
        }).then(
            function mySuccess(response) {
                $scope.record = response.data;
                $scope.Reg = {};
                
            }
            , function myError(response) { i }
        );

    }//selecttest
    
    $scope.selectshow = function (select_id){

        $http({
            method:"post",
            url:"show.php",
            data: {"Reg":select_id},
            headers: {'Content-type':'application/x-www-form-urlencoded'}
        }).then (
            function mySuccess(response){
                $scope.Reg.Reg = response.data[0].Reg;
                $scope.Reg.Id_students = response.data[0].Id_students;
                $scope.Reg.titlename = response.data[0].titlename;
                $scope.Reg.name = response.data[0].name;
                $scope.Reg.lastname = response.data[0].lastname;
                $scope.Reg.major = response.data[0].major;
                $scope.Reg.year = response.data[0].year;
                $scope.Reg.address = response.data[0].address;
                $scope.Reg.province = response.data[0].province;
                $scope.Reg.amphures = response.data[0].amphures;
                $scope.Reg.district = response.data[0].district;
                $scope.Reg.zipcode = response.data[0].zipcode;
                $scope.Reg.phone = response.data[0].phone;
                $scope.Reg.mail = response.data[0].mail;
                $scope.Reg.Job = response.data[0].Job;
                $scope.Reg.description = response.data[0].description;

                $scope.Reg.contract_name =  response.data[0].contract_name;
                $scope.Reg.contract_position = response.data[0].contract_position;
                $scope.Reg.comp_name = response.data[0].comp_name;
                $scope.Reg.comp_address = response.data[0].comp_address;
                $scope.Reg.subdis = response.data[0].subdis;
                $scope.Reg.amphure = response.data[0].amphure;
                $scope.Reg.comp_province = response.data[0].comp_province;
                $scope.Reg.comp_zipcode = response.data[0].comp_zipcode;
                $scope.Reg.comp_phone = response.data[0].comp_phone;
                $scope.Reg.comp_mail = response.data[0].comp_mail;
                $scope.Reg.comp_FAx = response.data[0].comp_FAx;
                $scope.Reg.study = response.data[0].study;
               
            },
    
            function myError(response){
            }
        );
        
    
    }//reccordedit

    

    
}
);
// const searchButton = document.getElementById('search-button');
// const searchInput = document.getElementById('search-input');
// searchButton.addEventListener('click', () => {
//   const inputValue = searchInput.value;
//   alert(inputValue);
// });


