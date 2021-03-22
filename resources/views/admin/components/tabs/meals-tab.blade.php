<section id="section-2">
    <div class="indent_title_in">
        <h3>Create meal</h3>
    </div>

    <div class="wrapper_indent">

        <div class="menu-item-section clearfix">
            <h4>Meal info</h4>
            <!-- <div><a href="#0"><i class="icon_plus_alt"></i></a><a href="#0"><i class="icon_minus_alt"></i></a>
            </div> -->
        </div>

        <div class="strip_menu_items">
            <div class="row">
                <div class="col-md-3">
                    <div class="menu-item-pic dropzone">
                        <input name="file" type="file">
                        <div class="dz-default dz-message"><span>Click or Drop<br>Image Here</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Meal Name</label>
                                <input type="text" name="menu_item_title" class="form-control" placeholder="Ex. Happy Meal"/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Price</label>
                                <input type="text" name="menu_item_title_price" class="form-control"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" name="menu_item_description" class="form-control"/>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Items included:</label>
                        <div class="table-responsive">
                            <table class="table table-striped edit-options">
                                <tbody>
                                <tr>
                                    <td style="width:25%">
                                        <div>
                                            <a href="#"><i class="icon_minus_alt"></i></a>
                                            <span class="quantity">1</span>
                                            <a href="#"><i class="icon_plus_alt"></i></a>
                                        </div>
                                    </td>
                                    <td style="width:75%" class="text-right">
                                        Burger Extra Large
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:25%">
                                        <div>
                                            <a href="#"><i class="icon_minus_alt"></i></a>
                                            <span class="quantity">3</span>
                                            <a href="#"><i class="icon_plus_alt"></i></a>
                                        </div>
                                    </td>
                                    <td style="width:75%" class="text-right">
                                        Coca Cola 0.5
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="form-group">
                            <label>Initial price:</label>
                            <div id="initial-price">
                                560.00 din.
                            </div>
                            <input class="btn_1 mt-5" type="button" value="Create new meal">
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Search for items</label>
                                <input type="text" name="menu_item_title_price" class="form-control"/>
                            </div>
                            <input type="submit" class="btn_1 btn-search" value="Search"/>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Choose item to add:</label>
                                <select class="form-control" name="" id="">
                                    <option value="0"> -- Choose item to add -- </option>
                                </select>
                            </div>
                            <input type="button" class="btn_1" value="Add item"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr class="styled_2">

    <div class="indent_title_in">
        <h3>Edit meal</h3>
    </div>

    <div class="wrapper_indent mb-5">
        <div class="container-fluid pr-0 pl-0 d-flex">
            <div class="col-md-6 pl-0">
                <input type="text" name="menu_item_title" class="form-control" placeholder="Search">
            </div>
            <div class="col-md-2 sm-4"> <input type="button" class="btn_1 form-control btn-search" id="search-meal" value="Search"> </div>
            <div class="col-md-4 pr-0">
                <select name="" class="form-control mr-0">
                    <option>Meal 1</option>
                </select>
            </div>
        </div>
    </div>

    <div id="edit-meal-box">
        <div class="wrapper_indent">

            <div class="menu-item-section clearfix">
                <h4>Meal info</h4>
            </div>

            <div class="strip_menu_items">
                <div class="row">
                    <div class="col-md-3">
                        <div class="menu-item-pic mb-3 dz-clickable">
                            <img src="img/thumb_restaurant.jpg" alt="thumb">
                        </div>
                        <div class="menu-item-pic dropzone dz-clickable">
                            <input name="file" type="file">
                            <div class="dz-default dz-message"><span>Click or Drop<br>Image Here</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>Meal Name</label>
                                    <input type="text" name="menu_item_title" class="form-control" placeholder="Ex. Happy Meal">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Price</label>
                                    <input type="text" name="menu_item_title_price" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text" name="menu_item_description" class="form-control">
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Items included:</label>
                            <div class="table-responsive">
                                <table class="table table-striped edit-options">
                                    <tbody>
                                    <tr>
                                        <td style="width:25%">
                                            <div>
                                                <a href="#"><i class="icon_minus_alt"></i></a>
                                                <span class="quantity">1</span>
                                                <a href="#"><i class="icon_plus_alt"></i></a>
                                            </div>
                                        </td>
                                        <td style="width:75%" class="text-right">
                                            Burger Extra Large
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width:25%">
                                            <div>
                                                <a href="#"><i class="icon_minus_alt"></i></a>
                                                <span class="quantity">3</span>
                                                <a href="#"><i class="icon_plus_alt"></i></a>
                                            </div>
                                        </td>
                                        <td style="width:75%" class="text-right">
                                            Coca Cola 0.5
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-group">
                                <label>Initial price:</label>
                                <div id="initial-price">
                                    560.00 din.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Search for items</label>
                                    <input type="text" name="menu_item_title_price" class="form-control">
                                </div>
                                <input type="submit" class="btn_1 btn-search" value="Search">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Choose item to add:</label>
                                    <select class="form-control" name="" id="">
                                        <option value="0"> -- Choose item to add -- </option>
                                    </select>
                                </div>
                                <input type="button" class="btn_1" value="Add item">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container-fluid d-flex justify-content-between mt-3 pr-0 pl-0">
                    <input type="submit" class="btn_1" value="Save changes">
                    <input type="submit" class="btn_1 btn-alert" value="Delete meal">
                </div>
            </div>
        </div>
    </div>

</section>
