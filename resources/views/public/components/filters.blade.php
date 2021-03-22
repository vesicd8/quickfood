<div id="filters_col">
    <a data-toggle="collapse" href="#collapseFilters" aria-expanded="false" aria-controls="collapseFilters" id="filters_col_bt">
        Filteri <i class="fas fa-angle-down float-right"></i>
    </a>
    <div class="collapse show" id="collapseFilters">
        <form action="{{ route('menu') }}" method="GET">
            <div class="filter_type">
                <h6>Naziv produkta</h6>
                <input type="text" name="productKeyword" class="form-control" value="{{ request()->has('productKeyword') ? request()->get('productKeyword') : ""}}"/>
            </div>
            <div class="filter_type">
                <h6>Stanje</h6>
                <ul>
                    @foreach($labels as $label)
                        <li><label><input type="checkbox" name="label[]" value="{{ $label->label }}" class="icheck" {{ request()->has('label') && in_array($label->label, request()->get('label')) ? 'checked' : ""}}>{{ $label->label }}</label></li>
                    @endforeach
                </ul>
            </div>
            <div class="filter_type">
                <h6>Kategorije</h6>
                <ul>
                    @foreach($categories as $category)
                        <li><label><input type="checkbox" name="productCategory[]" value="{{ $category->name }}" class="icheck" {{ request()->has('productCategory') && in_array($category->name, request()->get('productCategory')) ? 'checked' : ""}}>{{ $category->name }}</label></li>
                    @endforeach
                </ul>
            </div>
            <div class="filter_type">
                <h6>Sortiraj</h6>
                <select class="form-control" name="sortBy">
                    @foreach($sort as $key => $val)
                        <option value="{{ $val }}" {{ request()->get('sortBy') && request()->get('sortBy') == $val ? "selected" : "" }}> {{ $key }} </option>
                    @endforeach
                </select>
            </div>
            <input type="submit" class="btn_full mt-5" value="Primeni"/>
        </form>
    </div>
</div>
