'use strict';

app.controller('mainController', ['$scope' , 'indexService', function($scope , indexService){
	
	$scope.showEdit = false;
	getUsers();

	indexService.getNameLoging().then(function(data){
		var getData = angular.extend(data);
		if (getData.data.status === 'success') {
			$scope.name = getData.data.data.Username;
			//console.log(getData);
			
		}
		
	});

	function getUsers(){
		indexService.getAllUsers().then(function(data){
			var getData = angular.extend(data);
			if (getData.data.status === 'success') {
				$scope.users = getData.data.data;
				//console.log(getData);				
			}		
		});
	}
	

	function editForm(index) {
		$("#input_tel_" + index).toggle();
		$("#input_email_" + index).toggle();
		$(".text_" + index).toggle();

		$("#btn_save_" + index).toggle();
	}


	$scope.edit_user = function(getId, index){
		editForm(index);
		
	}

	$scope.save_user = function(getId, index){
		bootbox.confirm("Do you want to change infomation?", function(result){
			if(result === true){
				indexService.updateUsers(getId).then(function(data){
					var getData = angular.extend(data);
					//console.log(getData);
					if (getData.data.status === 'success') {
						$("#success").show();
						setTimeout(function(){
							$("#success").hide();
						},3000)
						editForm(index);
					}
				});
				//console.log(getId);
			}
		});
	}

	$scope.change_group = function(getId, value){
		bootbox.confirm("Do you want to change infomation?", function(result){
			if(result === true){
				indexService.updateGroup({id:getId, group:value}).then(function(data){
					var getData = angular.extend(data);
					console.log(getData);
					if (getData.data.status === 'success') {
						getUsers();
						$("#success").show();
						setTimeout(function(){
							$("#success").hide();
						},3000)
					} 
				});
			} else{
				getUsers();
			}
		});
	}

}]);