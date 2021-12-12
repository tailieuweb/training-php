<div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <form class="form-filter" method="appends($_GET)">
                                        <span>Sort by </span>
                                        <select id="basic" class="selectpicker show-tick form-control filter" data-placeholder="$ USD" onchange=" location = this.value">
                                            <option {{ Request::get('filter') == '0' ? 'selected' : '' }} value="{{ request()->fullUrlWithQuery(['filter' => '0']) }}">Nothing</option>
                                            <option {{ Request::get('filter') == '1' ? 'selected' : '' }} value="{{ request()->fullUrlWithQuery(['filter' => '1']) }}">From A -> Z</option>
                                            <option {{ Request::get('filter') == '2' ? 'selected' : '' }} value="{{ request()->fullUrlWithQuery(['filter' => '2']) }}">From Z -> A</option>
                                            <option {{ Request::get('filter') == '3' ? 'selected' : '' }} value="{{ request()->fullUrlWithQuery(['filter' => '3']) }}">High Price -> Low Price</option>
                                            <option {{ Request::get('filter') == '4' ? 'selected' : '' }} value="{{ request()->fullUrlWithQuery(['filter' => '4']) }}">Low Price -> High Price</option>                                 
                                        </select>
                                    </form>
                                </div>
                                <p>Showing all {{ $count }} results</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>