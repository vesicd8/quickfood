<section id="section-1">
    <div class="indent_title_in">
        <h3>Create product</h3>
    </div>

    <div class="wrapper_indent">
        <div class="form-group">
            <label>Category</label>
            <select id="ddProductCategory" name="category" class="form-control">
                <option value="0"> -- Select category -- </option>
                @foreach($categories as $c)
                    {{ $parent = $c->parent_id == null ? 0 : $c->parent_id }}
                    <option value="{{ $c->id }}" data-name="{{ $c->name }}" data-parent="{{ $parent }}"> {{ $c->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="menu-item-section clearfix">
            <h4>Product info</h4>
        </div>

        <div class="strip_menu_items">
            <div class="row">
                <div class="col-md-3">
                    <div class="menu-item-pic">
                        <input name="file" id="fProductImage" type="file"/>
{{--                        <div class="dz-default dz-message"><span>Click or Drop<br>Images Here</span>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="tbProductName" name="menu_item_title" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" id="numProductPrice" name="menu_item_title_price" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" id="tbProductDescription" name="menu_item_description" class="form-control"/>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Value</label>
                                <input type="number" id="numProductUnitValue" name="menu_item_title" class="form-control"/>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Unit</label>
                                <select id="ddProductUnit" class="form-control">
                                    <option value="0"> -- Select unit -- </option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}"> {{ $unit->unit }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Label</label>
                                <select id="ddProductLabel" class="form-control">
                                    @foreach($labels as $label)
                                        <option value="{{ $label->id }}"> {{ $label->label }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>URL</label>
                                <input type="text" class="form-control" id="tbProductUrl"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Additions</label>
                        <div class="table-responsive">
                            <table class="table table-striped edit-options">
                                <tbody id="ingredientsTable">
                                <?php $count = 1 ?>
                                    @foreach($ingredients as $ingredient)
                                        @if($count == 1)
                                            <tr>
                                        @endif
                                            <td style="width:25%">
                                                <div class="col-12 d-flex align-items-center">
                                                    <div class="col-3">
                                                        <input type="checkbox" class="form-control ing ingredient" data-id="{{ $ingredient->id }}" name="ingredient"/>
                                                    </div>
                                                    <div class="col-6">
                                                        {{ $ingredient->ingredient }}
                                                    </div>
                                                </div>
                                            </td>
                                        @if($count++ == 3)
                                            <?php $count = 1 ?>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <input type="button" id="btnCreateProduct" class="btn_1" value="Create New Product"/>
        </div>
    </div>

    <hr class="styled_2">

    <div class="indent_title_in">
        <h3>Edit product</h3>
    </div>

    <div class="wrapper_indent mb-5">
        <div class="container-fluid px-0 d-flex justify-content-between">
            <div class="col-md-3 px-0">
                <input type="text" id="tbSearchProductName" class="form-control" placeholder="Ex. Search"/>
            </div>
            <div class="col-md-3 px-0">
                <select id="ddSearchProductCategory" class="form-control mr-0">
                    <option value="0"> -- Select category -- </option>
                        @foreach($categories as $c)
                        {{ $parent = $c->parent_id == null ? 0 : $c->parent_id }}
                        <option value="{{ $c->id }}" data-name="{{ $c->name }}" data-parent="{{ $parent }}"> {{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2 sm-4 px-0">
                <input type="button" class="btn_1 form-control btn-search" id="btnSearchProduct" value="Search"/>
            </div>
            <div class="col-md-3 px-0">
                <select id="ddProductsSearch" class="form-control mr-0">
                    <option value="0">-- Select product --</option>
                </select>
            </div>
        </div>
    </div>

    <hr class="styled_2">

    <div id="edit-product-box" class="d-none">
        <div class="wrapper_indent">
            <div class="form-group">
                <label>Category</label>
                <select id="ddEditProductCategory" name="category" class="form-control">
                    <option value="0"> -- Select category -- </option>
                    @foreach($categories as $c)
                        {{ $parent = $c->parent_id == null ? 0 : $c->parent_id }}
                        <option value="{{ $c->id }}" data-name="{{ $c->name }}" data-parent="{{ $parent }}"> {{ $c->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="menu-item-section clearfix">
                <h4>Product info</h4>
            </div>

            <div class="strip_menu_items">
                <div class="row">
                    <div class="col-md-3">
                        <div class="menu-item-pic mb-3">
                            <img id="imgCurrentCover" src="" alt="current" style="width: 240px;"/>
                        </div>
                        <input id="fNewProductImage" name="file" type="file"/>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" id="tbNewProductName" name="menu_item_title" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="number" id="numNewProductPrice" name="menu_item_title_price" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" id="tbNewDescription" name="menu_item_description" class="form-control">
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Value</label>
                                    <input type="number" id="numEditProductUnitValue" name="menu_item_title" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Unit</label>
                                    <select id="ddEditProductUnit" class="form-control">
                                        <option value="0"> -- Select unit -- </option>
                                        @foreach($units as $unit)
                                            <option value="{{ $unit->id }}"> {{ $unit->unit }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Label</label>
                                    <select id="ddEditProductLabel" class="form-control">
                                        @foreach($labels as $label)
                                            <option value="{{ $label->id }}"> {{ $label->label }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" class="form-control" id="tbEditProductUrl"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Additions</label>
                            <div class="table-responsive">
                                <table class="table table-striped edit-options">
                                    <tbody id="editProductIngredientsTable">
                                    <?php $count = 1 ?>
                                    @foreach($ingredients as $ingredient)
                                        @if($count == 1)
                                            <tr>
                                                @endif
                                                <td style="width:25%">
                                                    <div class="col-12 d-flex align-items-center">
                                                        <div class="col-3">
                                                            <input type="checkbox" class="form-control ing ingredient-edit" data-id="{{ $ingredient->id }}" name="ingredient"/>
                                                        </div>
                                                        <div class="col-6">
                                                            {{ $ingredient->ingredient }}
                                                        </div>
                                                    </div>
                                                </td>
                                        @if($count++ == 3)
                                            <?php $count = 1 ?>
                                            </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid d-flex justify-content-between pr-0 pl-0">
                    <input type="button" id="btnSaveProductEdit" class="btn_1" value="Save changes"/>
                    <input type="button" id="btnDeleteProduct" class="btn_1 btn-alert" value="Delete product"/>
                </div>
            </div>
        </div>
    </div>
</section>
