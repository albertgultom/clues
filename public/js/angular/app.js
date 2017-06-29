var purchasing = angular.module('barangdetail', [], function($interpolateProvider) {
	$interpolateProvider.startSymbol('[');
	$interpolateProvider.endSymbol(']');
});

purchasing.controller('inController', function($scope, $http) {

	// console.log($scope.number);

	$scope.init = function(a) {
		$http.get('/transaksimasuk/' + a).
		success(function(data, status, headers, config) {
			$scope.dataIn = data;
			$scope.loading = false;
			// console.log(data);
		});
	}
	// $scope.init();

	$scope.product = function(param) {
		if (param == 'add') {
			adddata = {
				number : $scope.barang.number,
				product_id : $scope.barang.product_id,
				quantity : $scope.barang.quantity
			}
		}else{
			adddata = {
				number : $scope.edit.number,
				product_id : $scope.edit.product_id,
				quantity : $scope.edit.quantity
			}
		}
		
		// console.log(adddata);
		$http.post('/transaksimasuk/add', adddata)
		.success(function(data, status, headers, config) {
			$scope.init(data);
			$scope.barang.quantity = '';
			$scope.barang.product_id = '';
		});
	};

	$scope.editProduct = function(id, number) {

		$http.get('/transaksimasuk/' + id + '/edit').
		success(function(data, status, headers, config) {
			// console.log(data.product_id)
			$scope.edit.quantity = data.quantity;
			$scope.edit.product_id = data.product_id;
			$scope.edit.number = data.number;
		});
	};

	$scope.deleteProduct = function(id, number) {

		$http.get('/transaksimasuk/' + id +'/delete' )
		.success(function() {
			$scope.init(number);
		});
	};

});


purchasing.controller('outController', function($scope, $http) {

	// console.log($scope.number);

	$scope.init = function(a) {
		$http.get('/transaksikeluar/' + a).
		success(function(data, status, headers, config) {
			$scope.dataIn = data;
			$scope.loading = false;
			// console.log(data);
		});
	}
	// $scope.init();

	$scope.product = function(param) {
		if (param == 'add') {
			adddata = {
				number : $scope.barang.number,
				product_id : $scope.barang.product_id,
				quantity : $scope.barang.quantity
			}
		}else{
			adddata = {
				number : $scope.edit.number,
				product_id : $scope.edit.product_id,
				quantity : $scope.edit.quantity
			}
		}
		
		// console.log(adddata);
		$http.post('/transaksikeluar/add', adddata)
		.success(function(data, status, headers, config) {
			$scope.init(data);
			$scope.barang.quantity = '';
			$scope.barang.product_id = '';
		});
	};

	$scope.editProduct = function(id, number) {

		$http.get('/transaksikeluar/' + id + '/edit').
		success(function(data, status, headers, config) {
			// console.log(data.product_id)
			$scope.edit.quantity = data.quantity;
			$scope.edit.product_id = data.product_id;
			$scope.edit.number = data.number;
		});
	};

	$scope.deleteProduct = function(id, number) {

		$http.get('/transaksikeluar/' + id +'/delete' )
		.success(function() {
			$scope.init(number);
		});
	};

});


purchasing.controller('returController', function($scope, $http) {

	// console.log($scope.number);

	$scope.init = function(a) {
		$http.get('/transaksirusak/' + a).
		success(function(data, status, headers, config) {
			$scope.dataIn = data;
			$scope.loading = false;
			// console.log(data);
		});
	}
	// $scope.init();

	$scope.product = function(param) {
		if (param == 'add') {
			adddata = {
				number : $scope.barang.number,
				product_id : $scope.barang.product_id,
				quantity : $scope.barang.quantity
			}
		}else{
			adddata = {
				number : $scope.edit.number,
				product_id : $scope.edit.product_id,
				quantity : $scope.edit.quantity
			}
		}
		
		// console.log(adddata);
		$http.post('/transaksirusak/add', adddata)
		.success(function(data, status, headers, config) {
			$scope.init(data);
			$scope.barang.quantity = '';
			$scope.barang.product_id = '';
		});
	};

	$scope.editProduct = function(id, number) {

		$http.get('/transaksirusak/' + id + '/edit').
		success(function(data, status, headers, config) {
			// console.log(data.product_id)
			$scope.edit.quantity = data.quantity;
			$scope.edit.product_id = data.product_id;
			$scope.edit.number = data.number;
		});
	};

	$scope.deleteProduct = function(id, number) {

		$http.get('/transaksirusak/' + id +'/delete' )
		.success(function() {
			$scope.init(number);
		});
	};

});











