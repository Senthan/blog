@extends('layouts.app')
@section('content')
    <section class="content" ng-controller="BlogController">
        <div class="ui segments">
            <div class="ui segment">
                @can('create', new \App\Blog())
                <a href="{{ route('blog.create') }}" class="ui small green labeled icon button"><i class="plus icon"></i> Create</a>
                @endcan
                @can('edit', new \App\Blog())
                <a data-ng-show="selected" ng-href="@{{ edit_url }}" class="ui small primary labeled icon button"><i class="write icon"></i> Edit</a>
                @endcan
                @can('delete', new \App\Blog())
                <a data-ng-show="selected" ng-href="@{{ delete_url }}" class="ui small red labeled icon button"><i class="minus icon"></i> Delete</a>
                @endcan
            </div>
            <div class="ui black segment">
                <table class="ui compact celled definition table">
                    <thead class="full-width">
                        <tr>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody ng-cloak>
                        <tr ng-repeat="blog in blogs track by $index" ng-click="setSelected();" ng-class="{'bg-info lt': blog.id === selected.id}">
                            <td>@{{ blog.name }}</td>
                            <td>@{{ blog.category.name }}</td>
                            <td>@{{ blog.description }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        app.controller('BlogController', ['$scope', '$http', function ($scope, $http) {
            $scope.moduleUrl = "{{ route('blog.index') }}";

            $scope.setSelected = function() {
                if($scope.selected && $scope.selected.id == this.blog.id) {
                    $scope.selected = null;
                } else {
                    $scope.selected = this.blog;
                    $scope.edit_url = $scope.moduleUrl + '/' + $scope.selected.id + '/edit';
                    $scope.delete_url = $scope.moduleUrl + '/' + $scope.selected.id + '/delete';
                    $scope.show_url = $scope.moduleUrl + '/' + $scope.selected.id;
                }
            };

            $http.get($scope.moduleUrl + '?ajax=true').then(function (response) {
                $scope.blogs = response.data;
                console.log(response);
            });

        }]);
    </script>
@endsection

