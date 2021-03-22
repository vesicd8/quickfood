<section id="section-9">
    <div class="indent_title_in">
        <h3>Create label</h3>
    </div>

    <div class="wrapper_indent">
        <div class="row">
            <div class="col-md-12">
                <div class="col-8 pl-0 d-flex">
                    <div class="col-10 px-0">
                        <div class="form-group">
                            <label>Label name</label>
                            <div class="col-12 px-0 d-flex align-items-center">
                                <div class="col-10 px-0">
                                    <input type="text" id="tbLabelName" name="menu_item_title" class="form-control" placeholder="npr. Akcija"/>
                                </div>
                                <div class="col-2 px-0 ml-2">
                                    <input type="button" id="btnCreateLabel" class="btn_1" value="Create label">
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
        <h3>Edit label</h3>
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
                                    <select id="ddLabels" class="form-control">
                                        <option value="0">-- Select label --</option>
                                        @foreach($labels as $label)
                                            <option value="{{ $label->id }}" data-name="{{ $label->label }}"> {{ $label->label }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row d-none" id="edit-label-box">
            <div class="col-md-12">
                <div class="col-8 pl-0 d-flex">
                    <div class="col-10 px-0">
                        <div class="form-group">
                            <label>Label info</label>
                            <div class="col-12 px-0 d-flex align-items-center">
                                <div class="col-12 px-0">
                                    <input type="text" id="tbEditLabelName" class="form-control" placeholder="Label name"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid d-flex justify-content-between">
                <input type="button" id="btnEditLabel" class="btn_1" value="Save changes">
                <input type="button" id="btnDeleteLabel" class="btn_1 btn-alert" value="Delete label">
            </div>
        </div>
    </div>
</section>
