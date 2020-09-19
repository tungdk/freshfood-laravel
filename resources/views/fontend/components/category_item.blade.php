<div id="responsive-nav">
    <!-- category nav -->
    <div class="category-nav show-on-click">
        <span class="category-header"> <i class="fa fa-bars"></i> Danh mục</span>
        <ul class="category-list">
            @foreach($categories as $lsp)
            @if(count($lsp->subcategories)>0)
            <li class="dropdown side-dropdown aaaa">
                <a class="itemHover" href="{{ url('san-pham')."?category=".$lsp->id}}"  ><i class="{{$lsp->icon}}" style="margin-top: 3px;float:left;width: 20px;"></i> {{$lsp->name}}<i class="fa fa-angle-right"></i></a>
                <!-- data-toggle="dropdown" aria-expanded="true" -->
                <div class="custom-menu">
                    <div class="row">
                        <div class="col-12">
                            <ul class="list-links">

                                @foreach($lsp->subcategories   as $dm)
                                    <li><a href="{{ url('san-pham')."?subcategory=".$dm->id}}">{{$dm->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            @else
                <li>
                    <a class="itemHover" href="{{ url('san-pham')."?category=".$lsp->id}}"  ><i class="{{$lsp->icon}}" style="margin-top: 3px;float:left;width: 20px;"></i> {{$lsp->name}}</i></a>
                </li>
            @endif
            @endforeach
        </ul>
    </div>
</div>
