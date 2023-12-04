@extends('Admin.layouts.app')

@section('content')




<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3>{{ $product->name }}</h3>
                </div>
                <div class="card-body">
                    <p><strong>Description:</strong> {{ $product->description }}</p>
                    <p><strong>Regular Price:</strong> ${{ $product->regular_price }}</p>
                    @if($product->sale_price)
                        <p><strong>Sale Price:</strong> ${{ $product->sale_price }}</p>
                    @endif
                    <p><strong>Category:</strong> {{ optional($product->category)->name }}</p>

                    <!-- Display Images -->
                    @if($product->images)
                        <p><strong>Images:</strong></p>
                        <div class="row">
                            {{-- @foreach(json_decode($product->images) as $image)
                                <div class="col-md-4">
                                    <img src="{{ asset('path/to/your/images/' . $image) }}" alt="{{ $product->name }}" class="img-fluid">
                                </div>
                            @endforeach
                        </div> --}}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
    </div><!-- .animated -->
</div><!-- .content -->


<div class="clearfix"></div>

<footer class="site-footer">
    <div class="footer-inner bg-white">
        <div class="row">
            <div class="col-sm-6">
                Copyright &copy; 2018 Ela Admin
            </div>
            <div class="col-sm-6 text-right">
                Designed by <a href="https://colorlib.com">Colorlib</a>
            </div>
        </div>
    </div>
</footer>

</div><!-- /#right-panel -->

<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
<script src="assets/js/main.js"></script>


<script src="assets/js/lib/data-table/datatables.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="assets/js/lib/data-table/jszip.min.js"></script>
<script src="assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="assets/js/init/datatables-init.js"></script>


<script type="text/javascript">
$(document).ready(function() {
  $('#bootstrap-data-table-export').DataTable();
} );
</script>


</body>
</html>

@endsection