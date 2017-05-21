'use strict';

app.service('indexService' , function($http){

	//login
	this.loginService = function(data){
		var formData = data;
		var promise = $http({
			method: 'POST',
			url: baseurl + 'loginq.php',
			data: formData
		});
		return promise;
	};

	//register
	this.registerService = function(data){
		var formData = data;
		var promise = $http({
			method: 'POST',
			url: baseurl + 'registerq.php',
			data: formData
		});
		return promise;
	};
	this.checkUsers = function(data){
		var formData = data;
		var promise = $http({
			method: 'POST',
			url: baseurl + 'checkUsersq.php',
			data: formData
		});
		return promise;
	};

	this.getNameLoging = function(){
		var promise = $http({
			method: 'POST',
			url: baseurl + 'getUsersq.php',
		});
		return promise;
	};

	//member
	this.getAllUsers = function(){
		var promise = $http({
			method: 'POST',
			url: baseurl + 'getAllUsersq.php',
		});
		return promise;
	};
	this.updateUsers = function(data){
		var formData = data;
		var promise = $http({
			method: 'POST',
			url: baseurl + 'updateUsersq.php',
			data: formData
		});
		return promise;
	};
	this.updateGroup = function(data){
		var formData = data;
		var promise = $http({
			method: 'POST',
			url: baseurl + 'updateGroupq.php',
			data: formData
		});
		return promise;
	};

	//profile
	this.updateProfile = function(data){
		var formData = data;
		var promise = $http({
			method: 'POST',
			url: baseurl + 'updateProfileq.php',
			data: formData
		});
		return promise;
	};

	//promotion
	this.updatePromotions = function(data){
		var formData = data;
		var promise = $http({
			method: 'POST',
			url: baseurl + 'updatePromosq.php',
			data: formData
		});
		return promise;
	};
	this.getAllPromos = function(){
		var promise = $http({
			method: 'POST',
			url: baseurl + 'getAllPromosq.php',
		});
		return promise;
	};
	this.deletePromotions = function(data){
		var formData = data;
		var promise = $http({
			method: 'POST',
			url: baseurl + 'deletePromosq.php',
			data: formData
		});
		return promise;
	};
	this.addPromotion = function(data){
		var formData = data;
		var promise = $http({
			method: 'POST',
			url: baseurl + 'promotionq.php',
			data: formData
		});
		return promise;
	};
	this.checkPromotions = function(data){
		var formData = data;
		var promise = $http({
			method: 'POST',
			url: baseurl + 'checkPromoq.php',
			data: formData
		});
		return promise;
	};

	this.getPaymentOrder = function(){
		var promise = $http({
			method: 'POST',
			url: baseurl + 'paymentq.php',
		});
		return promise;
	};
	this.checkDiscount = function(data){
		var formData = data;
		var promise = $http({
			method: 'POST',
			url: baseurl + 'checkDiscountq.php',
			data: formData
		});
		return promise;
	};
	
})