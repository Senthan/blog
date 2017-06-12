@extends('layouts.app')
@section('content')
{!! breadcrumb($breadcrumb) !!}

<section class="content" data-ng-controller="UserController">
    <div class="panel panel-default">
        <div class="panel-heading">
            @can('create', new \App\User())
            <a href="{{ route('user.create') }}" class="move-top ui small green labeled icon button"><i class="plus icon"></i>Create</a>
            @endcan
            @can('edit', new \App\User())
            <a data-ng-show="selected && selected.read_only != 'Yes'" data-ng-href="@{{ edit_url }}" class="ui small blue labeled icon button" data-ng-cloak><i class="write icon"></i>Edit</a>
            @endcan
            @can('destory', new \App\User())
            <a data-ng-show="selected && selected.read_only != 'Yes'" data-ng-href="@{{ delete_url }}" class="ui small red labeled icon button" data-ng-cloak><i class="minus icon"></i> Delete</a>
            @endcan
        </div>
        <div class="panel-body">
            <div>
                <div data-ui-grid="gridOptions" data-ui-grid-pagination data-ui-grid-selection class="grid"></div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script')
<script>
    app.controller('UserController', ['$scope', '$http', function ($scope, $http) {
        $scope.moduleUrl = "{{ route('user.index') }}/";
        $scope.users = [];
        var columnDefs = [
            { displayName: 'Name', field: 'name'},
            { displayName: 'Email', field: 'email'},
            { displayName: 'Role', field: 'role'}
        ];
        gridOptions.columnDefs = columnDefs;
        gridOptions.onRegisterApi = function (gridApi) {
            $scope.gridApi = gridApi;
            gridApi.selection.on.rowSelectionChanged($scope,function(rows){
                $scope.setSelection(gridApi);
            });
            gridApi.selection.on.rowSelectionChangedBatch($scope,function(rows){
                $scope.setSelection(gridApi);
            });
        };
        $scope.gridOptions = gridOptions;

        $http.get($scope.moduleUrl + '?ajax=true').success(function (items) {
            $scope.users = items.data;
            $scope.gridOptions.data =  items.data;
        });
        $scope.setSelection = function(gridApi) {
            $scope.mySelections = gridApi.selection.getSelectedRows();
            if($scope.mySelections.length == 1) {
                $scope.selected = $scope.mySelections[0];
                $scope.show_url = $scope.moduleUrl + $scope.selected.id + '/policy-category/1/policy';
                $scope.edit_url = $scope.moduleUrl + $scope.selected.id + '/edit';
                $scope.delete_url = $scope.moduleUrl + $scope.selected.id + '/delete';
            } else {
                $scope.selected = null;
            }
        };
    }]);
</script>
@endsection