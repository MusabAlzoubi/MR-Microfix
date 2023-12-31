    <div class="main-categori-wrap mobile-header-border">
        <a class="categori-button-active-2" href="#">
            <span class="fi-rs-apps"></span> Browse Categories
        </a>
        <div class="categori-dropdown-wrap categori-dropdown-active-small">
            <ul>
                @foreach($category as $cat)
                    <li><a href="{{route('product.category',['slug'=>$cat->slug])}}">{{$cat->name}}</a></li></li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- ... (rest of the code) ... -->
