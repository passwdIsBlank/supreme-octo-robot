var myApp = angular.module("app", []);

myApp.controller("alumnos", function ($scope, $http) {
    $scope.lista = [];

    $http( {
        url: '../data.json',
        method: 'GET',
        contentType: 'application/json',
        dataType: 'json'
    } )
        .then( response => $scope.lista = response.data )
    $scope.seleccion = [];
    $scope.action = 0;

    $scope.toggleSeleccion = ( id ) => {
        const index = $scope.seleccion.indexOf( id );
        $scope.seleccion.includes( id )? $scope.seleccion.splice( index, 1 ) : $scope.seleccion.push( id );
    }

    $scope.showForm = () => {
        $scope.action =  1;
        $scope.studentId = parseInt($scope.lista[ $scope.lista.length - 1 ].id) + 1;
    }

    $scope.addStudent = () => {
        const form = document.querySelector('#addStudentForm');
        if ( verify( form ) ) {
            $scope.lista.push({
                id: $scope.studentId,
                nombre: $scope.name,
                apellido1: $scope.surname,
                apellido2: $scope.surname2,
                ciclo: $scope.ciclo,
                curso: $scope.curso,
                seleccionado: false
            });

            form.reset();
        } else alert('Rellena todos los campos');

        $scope.action = 0;
    }

    $scope.clean = () => {
        $scope.lista = [];
    }
    $scope.remove = () => {

        $scope.lista.forEach( (student, index) => {
            if ( student.seleccionado ) $scope.lista.splice( index, 1 )
        } )
    }
})

function verify( form ) {

    const inputs = form.querySelectorAll('input');
    let valid = true;

    Array.from(inputs).some( input => {
        if ( input.value.length === 0 ) {
            valid = false;
            return true;
        }
    } )

    return valid;
}