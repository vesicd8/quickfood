<section id="section-3">
    <div class="indent_title_in">
        <h3>Create ingredient</h3>
    </div>

    <div class="wrapper_indent">
        <div class="row">
            <div class="col-md-12">
                <div class="col-8 pl-0 d-flex">
                    <div class="col-10 px-0">
                        <div class="form-group">
                            <label>Ingredient name</label>
                            <div class="col-12 px-0 d-flex align-items-center">
                                <div class="col-10 px-0">
                                    <input type="text" id="tbIngredientName" name="menu_item_title" class="form-control" placeholder="Ex. Ketchup"/>
                                </div>
                                <div class="col-2 px-0 ml-2">
                                    <input type="button" id="btnCreateNewIngredient" class="btn_1" value="Create ingredient">
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
        <h3>Edit ingredient</h3>
    </div>

    <div class="wrapper_indent">
        <div class="row">
            <div class="col-md-12">
                <div class="col-8 pl-0 d-flex">
                    <div class="col-10 px-0">
                        <div class="form-group">
                            <label>Ingredient</label>
                            <div class="col-12 px-0 d-flex align-items-center">
                                <div class="col-10 px-0">
                                    <select id="ddIngredients" class="form-control">
                                        <option value="0">-- Select ingredient --</option>
                                        @foreach($ingredients as $ingredient)
                                            <option value="{{ $ingredient->id }}" data-name="{{ $ingredient->ingredient }}"> {{ $ingredient->ingredient }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-none" id="edit-ingredient-box">
            <div class="col-md-12">
                <div class="col-8 pl-0 d-flex">
                    <div class="col-10 px-0">
                        <div class="form-group">
                            <label>Ingredient info</label>
                            <div class="col-12 px-0 d-flex align-items-center">
                                <div class="col-12 px-0">
                                    <input type="text" id="tbEditIngredientName" class="form-control" placeholder="Ingredient name"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid d-flex justify-content-between">
                <input type="button" id="btnEditIngredient" class="btn_1" value="Save changes">
                <input type="button" id="btnDeleteIngredient" class="btn_1 btn-alert" value="Delete ingredient">
            </div>
        </div>
    </div>
</section>
