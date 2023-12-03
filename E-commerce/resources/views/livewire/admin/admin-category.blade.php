<div>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a> <span></span> All Categories
                </div>
            </div>
        </div>

        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">All Categories</div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <?php $i=1;?>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Image</th>
                                            <th>Created At</th>
                                            <th>Updated At</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($category as $category)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                @if($category->img)
                                                    <img src="{{ asset($category->img) }}" alt="Category Image" style="max-width: 50px;">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $category->created_at }}</td>
                                            <td>{{ $category->updated_at }}</td>
                                            <td>
                                                <button wire:click="edit({{ $category->id }})" class="btn btn-sm btn-primary">Edit</button>
                                                <button wire:click="delete({{ $category->id }})" class="btn btn-sm btn-danger">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>
