'use strict';

app.controller('indexController', ['$scope' , 'indexService', function($scope , indexService){


	$scope.cooldown = false;

	$scope.loginpage = function(){		
		indexService.loginService($scope.login).then(function(data){
			var getData = angular.extend(data);
			console.log(getData.data);
			if (getData.data.status === 'success') {
				location.assign("index.php");
			} else if (getData.data.status === 'required') {
				$("#show_error").show();
				setTimeout(function(){
					$("#show_error").hide();
				},2000);
			} else if (getData.data.status === 'nouser') {
				$("#show_error3").show();
				setTimeout(function(){
					$("#show_error3").hide();
				},2000);
			} else {
				$("#show_error2").show();
				setTimeout(function(){
					$("#show_error2").hide();
				},2000);
			}
		});
	}

	$scope.checkUsers = function(value) {
		indexService.checkUsers({user:value}).then(function(data){
			var getData = angular.extend(data);
			if(getData.data.status === 'error'){
				$scope.userError = true;
			} else {
				$scope.userError = false;
			}
		});
	}

	$scope.registerpage = function(){
		if ($scope.userError === false) {
			if ($scope.cooldown === false) {
				$scope.cooldown = true;
				indexService.registerService($scope.regist).then(function(data){
					var getData = angular.extend(data);
					//console.log(getData);
					if(getData.data.status === 'success'){
						$("#show_success").show();
						setTimeout(function(){
							$("#show_success").hide();
						},5000);
						location.assign("index.php");
					} else {
						$("#show_error2").show();
						setTimeout(function(){
							$("#show_error2").hide();
						},2000);
					}
				});
				setTimeout(function(){
					$scope.cooldown = false;
				},5000);
			} else{
				console.log('cooldown');
			}
		} else {
			console.log('error user');
			$("#show_error").show();
			setTimeout(function(){
				$("#show_error").hide();
			},2000);
		}
	}

}]);