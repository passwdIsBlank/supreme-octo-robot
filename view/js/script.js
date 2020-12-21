const myApp = angular.module("app", []);

myApp.controller("tienda", function ($scope, $http) {
    $scope.productos = [];
    $scope.carrito = [];

    $scope.action = 0;

    $scope.imagePath = 'https://aliceasmartialarts.com/wp-content/uploads/2017/04/default-image.jpg';

    $scope.currency = '€';
    $scope.precioFinal = 0;

    $http({
        url: '../controlador/getAllProductos.php',
        method: 'GET',
        contentType: 'application/json',
        dataType: 'json'
    })
        .then(response => {
            $scope.productos = response.data.answer
        })

    $scope.delete = (index) => {
        $http({
            url: '../controlador/deleteProducto.php',
            method: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify({id: $scope.productos[index].id})
        })
            .then(response => {
                alert(response.data.answer);
                location.reload();
            })
    }

    //INSERT RELATED METHODS
    $scope.getFile = ( self ) => {

        const file = self.files[0];
        const reader  = new FileReader();

        reader.onload = function(e)  {
            const image = document.querySelector('#insert .card-img');
            image.src = e.target.result;
        }
    }

    // SHOPPING CART RELATED METHODS

    $scope.addToCart = (index) => {
        let found = false;
        $scope.carrito.some(item => {
            if (item.id === $scope.productos[index].id) {
                found = true;

                item.cantidad < item.unidades ? item.cantidad++ : alert('Error: No hay suficientes unidades');
            }
        })

        if (!found) {
            const producto = $scope.productos[index];
            producto.cantidad = 1;
            $scope.carrito.push(producto);
        }
        $scope.updateTotal();
    }

    $scope.changeQuantity = (operation, index) => {
        const producto = $scope.carrito[index];
        switch (operation) {
            case "sum":
                producto.unidades > producto.cantidad ? producto.cantidad++ : alert('No hay suficientes unidades!');
                break;
            case "substract":
                producto.cantidad > 0 ? producto.cantidad-- : alert('Mínimo de unidades alcanzado!');
                break;
        }
        $scope.updateTotal();
    }

    $scope.removeFromCart = (index) => {
        $scope.carrito.splice(index, 1);
        $scope.updateTotal();
    }

    $scope.updateTotal = () => {
        $scope.precioFinal = 0;
        $scope.carrito.forEach(producto => {
            $scope.precioFinal = $scope.precioFinal + (producto.cantidad * producto.precio);
        })
    }

    $scope.pay = () => {
        let toDeduce = [];

        $scope.carrito.forEach( producto => {
            toDeduce.push( {
                id: producto.id,
                nombre: producto.nombre,
                unidades: producto.unidades,
                cantidad: producto.cantidad
            } )
        } )

        $http({
            url: '../controlador/buy.php',
            method: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify( toDeduce )
        })
            .then(response => {
                console.log( response.data )
                if ( response.data.error ) {
                    let message = `${response.data.answer}\r\r`;

                    for ( productId in response.data.error ) {
                        message += `- ${response.data.error[productId]}\r`;
                    }

                    alert( message );
                } else {
                    alert(response.data.answer);
                    location.reload();
                }

            })
    }

    // STYLES
    $scope.imgPreview = {
        backgroundImage: `url(${$scope.imagePath})`
    }
})