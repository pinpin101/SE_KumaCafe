'use strict';

app.controller('paymentController', ['$scope' , 'indexService', function($scope , indexService){
	$scope.showEdit = false;
	getUsers();
	getOrders();

	indexService.getNameLoging().then(function(data){
		var getData = angular.extend(data);
		if (getData.data.status === 'success') {
			$scope.name = getData.data.data.Username;
			//console.log(getData);
			//console.log($scope.name);			
		}
		
	});

	function getUsers(){
		indexService.getNameLoging().then(function(data){
			var getData = angular.extend(data);
			if (getData.data.status === 'success') {
				$scope.payment = getData.data.data;
				//console.log(getData);
				//console.log($scope.form);				
			}		
		});
	}

	function getOrders(){
		indexService.getPaymentOrder().then(function(data){
			var getData = angular.extend(data);
			console.log(getData);
			if (getData.data.status === 'success') {
				$scope.orders = getData.data.data;			
			}		
		});
	}

	$scope.getTotal = function(){
		var total = 0;
		for(var i = 0; i < $scope.orders.length; i++) {
			var product = $scope.orders[i];
			total += order.order_price;
		}
		return total;
	}
	
	$scope.checkDiscount = function(value) {
		indexService.checkDiscount({discount:value}).then(function(data){
			var getData = angular.extend(data);
			if(getData.data.status === 'discount'){
				$scope.discounts = getData.data.data.promotion_discount;
			} else {
				$scope.discounts = null;
			}
		});
	}

}]);