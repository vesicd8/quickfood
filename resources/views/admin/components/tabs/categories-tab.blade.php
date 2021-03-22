<section id="section-4">
    <div class="indent_title_in">
        <h3>Create new category</h3>
    </div>

    <div class="wrapper_indent">
        <div class="row">
            <div class="col-md-12">
                <div class="col-8 pl-0 d-flex">
                    <div class="col-10 px-0">
                        <div class="form-group">
                            <label>Category name</label>
                            <div class="col-12 px-0 d-flex align-items-center justify-content-between">
                                <div class="col-6 px-0">
                                    <input type="text" id="tbNewCategoryName" class="form-control" placeholder="Drink"/>
                                </div>
                                <div class="col-6 ml-3 px-0">
                                    <select name="" class="form-control" id="ddNewCategoryParent">
                                        <option value="0">--  Parent category (Optional) --</option>
                                        @foreach($categories as $c)
                                            {{ $parent = $c->parent_id == null ? 0 : $c->parent_id }}
                                            <option value="{{ $c->id }}" data-name="{{ $c->name }}" data-parent="{{ $parent }}"> {{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-2 px-0 ml-3">
                                    <input type="button" id="btnCreateNewCategory" class="btn_1" value="Create new category">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="styled_2">

    <div class="indent_title_in">
        <h3>Edit category</h3>
    </div>

    <div>
        <div class="wrapper_indent">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-8 pl-0 d-flex">
                        <div class="col-10 px-0">
                            <div class="form-group">
                                <label>Choose Category to edit</label>
                                <div class="col-12 px-0">
                                    <select name="" class="form-control" id="ddEditCategory">
                                        <option value="0">-- Choose category --</option>
                                        @foreach($categories as $c)
                                            {{ $parent = $c->parent_id == null ? 0 : $c->parent_id }}
                                            <option value="{{ $c->id }}" data-name="{{ $c->name }}" data-parent="{{ $parent }}"> {{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-none" id="edit-category-box">
                <div class="col-md-12">
                    <div class="col-8 pl-0 d-flex">
                        <div class="col-12 px-0">
                            <div class="form-group">
                                <label>New Category name</label>
                                <div class="col-12 px-0 d-flex">
                                    <div class="col-6 px-0">
                                        <input type="text" id="tbEditCategoryName" name="menu_item_title" class="form-control" placeholder="Ex. Ketchup">
                                    </div>
                                    <div class="col-4 ml-3 px-0">
                                        <select name="" class="form-control" id="ddEditCategoryParent">
                                            <option value="0">-- Parent category (Optional) --</option>
                                            @foreach($categories as $c)
                                                {{ $parent = $c->parent_id == null ? 0 : $c->parent_id }}
                                                <option value="{{ $c->id }}" data-name="{{ $c->name }}" data-parent="{{ $parent }}"> {{ $c->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid d-flex justify-content-between">
                    <input type="button" id="btnSaveCategoryEdit" class="btn_1" value="Save changes">
                    <input type="button" id="btnDeleteCategory" class="btn_1 btn-alert" value="Delete category">
                </div>
            </div>

        </div>
    </div>
</section>
