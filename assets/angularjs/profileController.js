'use strict';

app.controller('profileController', ['$scope' , 'indexService', function($scope , indexService){

	getUsers();
	indexService.getNameLoging().then(function(data){
		var getData = angular.extend(data);
		if (getData.data.status === 'success') {
			$scope.name = getData.data.data.Username;
			//console.log(getData);
			
		}
		
	});

	function getUsers(){
		indexService.getNameLoging().then(function(data){
			var getData = angular.extend(data);
			if (getData.data.status === 'success') {
				$scope.form = getData.data.data;
				console.log(getData);
				//console.log($scope.form);				
			}		
		});
	}

	$scope.updateProfile = function(data){
		bootbox.confirm("Do you want to change infomation?", function(result){
			if(result === true){
				if ($scope.form.conpass != undefined) {
					indexService.updateProfile(data).then(function (data) {
						var getData = angular.extend(data);
						if (getData.data.status === 'success') {
							$scope.form.conpass = '';
							$scope.form.pass = '';
							$("#success").show()
							setTimeout(function () {
								$("#success").hide();
							},3000);
						} else if (getData.data.status === 'nopass') {
							$("#error_nopass").show()
							setTimeout(function () {
								$("#error_nopass").hide();
							},3000);
						} else {

						}
						console.log(getData);
					});
				} else {
					$("#error_conpass").show()
					setTimeout(function () {
						$("#error_conpass").hide();
					},3000);
				}
			}
		});	
		
	}

}]);