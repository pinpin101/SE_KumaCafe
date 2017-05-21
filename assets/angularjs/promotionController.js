'use strict';

app.controller('promotionController', ['$scope' , 'indexService', function($scope , indexService){
	$scope.showEdit = false;
	$scope.cooldown = false;
	getPromos();

	indexService.getNameLoging().then(function(data){
		var getData = angular.extend(data);
		if (getData.data.status === 'success') {
			$scope.name = getData.data.data.Username;
			console.log(getData);			
		}
		
	});

	function getPromos(){
		indexService.getAllPromos().then(function(data){
			var getData = angular.extend(data);
			console.log(getData);
			if (getData.data.status === 'success') {
				$scope.promos = getData.data.data;
				//console.log(getData);				
			}		
		});
	}
	

	function editForm(index) {
		$("#input_discount_" + index).toggle();
		$("#input_startdate_" + index).toggle();
		$("#input_enddate_" + index).toggle();
		$(".text_" + index).toggle();

		$("#btn_save_" + index).toggle();
		$("#btn_del_" + index).toggle();
	}


	$scope.edit_promo = function(getId, index){
		editForm(index);		
	}

	$scope.save_promo = function(getId, index){
		bootbox.confirm("Do you want to change infomation?", function(result){
			if(result === true){
				indexService.updatePromotions(getId).then(function(data){
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

	$scope.delete_promo = function(getId, index){
		bootbox.confirm("Do you want to delete this promotion?", function(result){
			if (result === true) {
				indexService.deletePromotions(getId).then(function(data){
					var getData = angular.extend(data);
					//console.log(getData);
					if (getData.data.status === 'success') {
						$("#success2").show();
						setTimeout(function(){
							$("#success2").hide();
						},3000)
						getPromos();
					}
				});
			}
		});
	}

	$scope.checkPromos = function(value) {
		indexService.checkPromotions({promotion_code:value}).then(function(data){
			var getData = angular.extend(data);
			if(getData.data.status === 'error'){
				$scope.promoError = true;
			} else {
				$scope.promoError = false;
			}
		});
	}

	function addPromotion(){
		$("#input_code").toggle();
		$("#input_discount").toggle();
		$("#input_startdate").toggle();
		$("#input_enddate").toggle();

		$("#btn_save").toggle();
	}

	$scope.add_promo = function(){
		addPromotion();
	}

	$scope.insert_promo = function(){
		if ($scope.promoError === false) {
			if ($scope.cooldown === false) {
				$scope.cooldown = true;
				indexService.addPromotion($scope.promo).then(function(data){
					var getData = angular.extend(data);
					//console.log(getData);
					if(getData.data.status === 'success'){
						$("#success3").show();
						setTimeout(function(){
							$("#success3").hide();
						},5000);
						addPromotion();
						getPromos();
					} else {
						$("#error").show();
						setTimeout(function(){
							$("#error").hide();
						},2000);
					}
				});
				setTimeout(function(){
					$scope.cooldown = false;
				},5000);
			} else{
				console.log('cooldown');
			}
		}
	}

}]);