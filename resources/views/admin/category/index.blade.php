@extends('layouts.app')
@section('title', 'Category')
@section('content')
    <div class="block-product">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-3">
                    <i class="fa fa-plus me-3" aria-hidden="true"></i>Add category
                </a>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category['id'] }}</td>
                            <td>{{ $category['name'] }}</td>
                            <td>{{ $category['created_at'] }}</td>
                            <td>{{ $category['updated_at'] }}</td>
                            <td>
                                <form action="{{ route('admin.category.destroy',$category->id) }}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('admin.category.edit',$category->id) }}">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
<script>

</script>
