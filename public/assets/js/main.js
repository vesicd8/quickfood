const baseUrl = "http://localhost/quickfood/public/";
const token = $('meta[name="csrf-token"]').attr('content');

window.addEventListener('load', () =>{
    /* Categories */
    $('#btnCreateNewCategory').click(insertCategory);
    $('#btnDeleteCategory').click(deleteCategory);
    $('#btnSaveCategoryEdit').click(updateCategory);
    $(document).on('change', '#ddEditCategory', toggleCategoryEdit);

    /* Ingredients */
    $('#btnCreateNewIngredient').click(insertIngredient);
    $('#btnDeleteIngredient').click(deleteIngredient);
    $('#btnEditIngredient').click(updateIngredient);
    $(document).on('change', '#ddIngredients', toggleIngredientEdit);

    /* Labels */
    $('#btnCreateLabel').click(insertLabel);
    $('#btnDeleteLabel').click(deleteLabel);
    $('#btnEditLabel').click(updateLabel);
    $(document).on('change', '#ddLabels', toggleLabelEdit);

    /*Products*/
    $('#btnCreateProduct').click(insertProduct);
    $('#btnDeleteProduct').click(deleteProduct);
    $('#btnSaveProductEdit').click(updateProduct);
    $(document).on('change', '#ddProductsSearch', toggleProductEdit);
    $(document).on('click', '#btnSearchProduct', searchProducts);

});

/* AJAX */
function ajax(url, method, data, success, error, dataType = "json", contentType = "application/x-www-form-urlencoded; charset=UTF-8", processData = true) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });

    $.ajax({
        url: baseUrl + url,
        method: method,
        data: data,
        dataType: dataType,
        success: success,
        error: error,
        contentType: contentType,
        processData: processData
    });
}

/*Categories*/
function insertCategory(){
    let formData = new FormData();
    formData.set("categoryName", $("#tbNewCategoryName").val());
    formData.set("parentCategory", $("#ddNewCategoryParent").val());
    formData.set('_token', token);

    ajax(
        "categories",
        "POST",
        formData,
        function (data){
            refreshCategories(data.categories);
            $('#infoMessages').html(`<p class="text-success"> ${data.message} </p>`);
            $('#notificationsModal').modal('toggle');
        },
        function (xhr){
            console.log(xhr);
        },
        "json",
        false,
        false
    );
}

function deleteCategory(){
    let formData = new FormData();
    let id = $("#ddEditCategory").val();
    formData.set("id", id);
    formData.set('_token', token);

    ajax(
        `categories/${id}`,
        "DELETE",
        formData,
        function (data){
            refreshCategories(data.categories);
            let notification = "";
            for(let message of data.messages){
                notification += `<p class="text-success"> ${message} </p>`;
            }
            $('#infoMessages').html(notification);
            $('#notificationsModal').modal('toggle');
        },
        function (xhr){
            console.log(xhr);
        },
        "json",
        false,
        false
    );
}

function updateCategory(){
    let formData = new FormData();
    let id = $("#ddEditCategory").val();
    formData.set("categoryName", $("#tbEditCategoryName").val());
    formData.set("parentCategory", $("#ddEditCategoryParent").val());
    formData.set('_token', token);
    formData.set('_method', 'PUT');

    ajax(
        `categories/${id}`,
        "POST",
        formData,
        function (data){
            refreshCategories(data.categories);
            $('#infoMessages').html(`<p class="text-success"> ${data.message} </p>`);
            $('#notificationsModal').modal('toggle');
        },
        function (xhr){
            let notification = "";
            for(let message of xhr.responseJSON.messages){
                notification += `<p class="text-danger"> ${message} </p>`;
            }
            $('#infoMessages').html(notification);
            $('#notificationsModal').modal('toggle');
        },
        "json",
        false,
        false
    );
}

function categoryOptions(data, withParent = false){
    let str = `<option value="0">-- Choose category --</option>`;
    if(withParent){
        str = `<option value="0">-- Parent category (Optional) --</option>`;
    }
    for(let d of data){
        str+= `<option data-name="${d.name}" data-parent="${d.parent_id}" value="${d.id}">${d.name}</option>`;
    }
    return str;
}

function refreshCategories(data) {
    $('#ddNewCategoryParent').html(categoryOptions(data), true);
    $('#ddNewCategoryParent').val(0);
    $('#ddEditCategory').html(categoryOptions(data));
    $('#ddEditCategory').val(0);
    $('#ddEditCategoryParent').html(categoryOptions(data), true);
    $('#ddEditCategoryParent').val(0);
    $('#tbNewCategoryName').val("");
    $('#tbEditCategoryName').val("");
    toggleCategoryEdit();
    $('#ddProductCategory').html(categoryOptions(data));
    $('#ddProductCategory').val(0);
    $('#ddEditProductCategory').html(categoryOptions(data));
    $('#ddEditProductCategory').val(0);
    $('#ddSearchProductCategory').html(categoryOptions(data));
    $('#ddSearchProductCategory').val(0);
    $('#ddEditProductCategory').html(categoryOptions(data));
    $('#ddEditProductCategory').val(0);

}

function toggleCategoryEdit(){
    if($('#ddEditCategory').val() != 0){
        let parent = $('#ddEditCategory').find(":selected").attr('data-parent') == ( "" || "null" ) ? 0 : $('#ddEditCategory').find(":selected").attr('data-parent');
        let name = $('#ddEditCategory').find(":selected").attr('data-name');
        $('#edit-category-box').removeClass("d-none");
        console.log(parent);
        console.log(typeof(parent));
        $('#ddEditCategoryParent').val(parent);
        $('#tbEditCategoryName').val(name);
    }else{
        $('#edit-category-box').addClass("d-none");
    }
}

/*Ingredients*/
function insertIngredient(){
    let formData = new FormData();
    formData.set('ingredient', $('#tbIngredientName').val());
    formData.set('_token', token);

    ajax(
        "ingredients",
        "POST",
        formData,
        function (data){
            refreshIngredients(data.ingredients);
            $('#infoMessages').html(`<p class="text-success"> ${data.message} </p>`);
            $('#notificationsModal').modal('toggle');
        },
        function (xhr){
            console.log(xhr);
        },
        "json",
        false,
        false
    );
}

function deleteIngredient(){
    let formData = new FormData();
    let id = $("#ddIngredients").val();
    formData.set("id", id);
    formData.set('_token', token);

    ajax(
        `ingredients/${id}`,
        "DELETE",
        formData,
        function (data){
            refreshIngredients(data.ingredients);
            $('#infoMessages').html(`<p class="text-success"> ${data.message} </p>`);
            $('#notificationsModal').modal('toggle');
        },
        function (xhr){
            console.log(xhr);
        },
        "json",
        false,
        false
    );
}

function updateIngredient(){
    let formData = new FormData();
    let id = $("#ddIngredients").val();
    formData.set("ingredientName", $("#tbEditIngredientName").val());
    formData.set('_token', token);
    formData.set('_method', 'PUT');

    ajax(
        `ingredients/${id}`,
        "POST",
        formData,
        function (data){
            refreshIngredients(data.ingredients);
            $('#infoMessages').html(`<p class="text-success"> ${data.message} </p>`);
            $('#notificationsModal').modal('toggle');
        },
        function (xhr){
            let notification = "";
            for(let message of xhr.responseJSON.messages){
                notification += `<p class="text-danger"> ${message} </p>`;
            }
            $('#infoMessages').html(notification);
            $('#notificationsModal').modal('toggle');
        },
        "json",
        false,
        false
    );
}

function toggleIngredientEdit(){
    let name = $('#ddIngredients').find(":selected").attr('data-name');
    if($('#ddIngredients').val() != 0){
        $('#tbEditIngredientName').val(name);
        $('#edit-ingredient-box').removeClass('d-none');
    }else{
        $('#edit-ingredient-box').addClass('d-none');
    }
}

function ingredientOptions(data){
    let str = `<option value="0">-- Select ingredient --</option>`;
    for(let d of data){
        str+= `<option value="${d.id}" data-name="${d.ingredient}">${d.ingredient}</option>`
    }
    return str;
}

function refreshIngredients(data){
    $('#ddIngredients').html(ingredientOptions(data));
    $('#ddIngredients').val(0);
    $('#tbIngredientName').val("");
    toggleIngredientEdit();
    $('#ingredientsTable').html(ingredientsTable(data));
    $('#editProductIngredientsTable').html(ingredientsTable(data, true));
}

function ingredientsTable(data, edit=false){
    let count = 1, str = "", addEdit = edit ? "-edit" : "";
    for (let d of data){
        if(count == 1){
            str += "<tr>"
        }
        str += `
            <td style="width:25%">
                <div class="col-12 d-flex align-items-center">
                    <div class="col-3">
                        <input type="checkbox" class="form-control ing ingredient${addEdit}" data-id="${d.id}" name="addition" value="ketchup"/>
                    </div>
                    <div class="col-6">
                       ${d.ingredient}
                    </div>
                </div>
            </td>`;
        if(count++ == 3){
            count = 1;
            str += "</tr>"
        }
    }
    return str;
}

/*Labels*/
function insertLabel(){
    let formData = new FormData();
    formData.set('label', $('#tbLabelName').val());
    formData.set('_token', token);

    ajax(
        "labels",
        "POST",
        formData,
        function (data){
            refreshLabels(data.labels);
            $('#infoMessages').html(`<p class="text-success"> ${data.message} </p>`);
            $('#notificationsModal').modal('toggle');
        },
        function (xhr){
            $('#infoMessages').html(printErrors(xhr.responseJSON.errors));
            $('#notificationsModal').modal('toggle');
        },
        "json",
        false,
        false
    );
}

function deleteLabel(){

    let formData = new FormData();
    let id = $("#ddLabels").val();
    formData.set("id", id);
    formData.set('_token', token);

    ajax(
        `labels/${id}`,
        "DELETE",
        formData,
        function (data){
            refreshLabels(data.labels);
            $('#infoMessages').html(`<p class="text-success"> ${data.message} </p>`);
            $('#notificationsModal').modal('toggle');
        },
        function (xhr){
            $('#infoMessages').html(`<p class="text-danger"> ${xhr.responseJSON.message} </p>`);
            $('#notificationsModal').modal('toggle');
        },
        "json",
        false,
        false
    );
}

function updateLabel(){
    let formData = new FormData();
    let id = $("#ddLabels").val();
    formData.set("labelName", $("#tbEditLabelName").val());
    formData.set('_token', token);
    formData.set('_method', 'PUT');

    ajax(
        `labels/${id}`,
        "POST",
        formData,
        function (data){
            refreshLabels(data.labels);
            $('#infoMessages').html(`<p class="text-success"> ${data.message} </p>`);
            $('#notificationsModal').modal('toggle');
        },
        function (xhr){
            let notification = "";
            for(let message of xhr.responseJSON.messages){
                notification += `<p class="text-danger"> ${message} </p>`;
            }
            $('#infoMessages').html(notification);
            $('#notificationsModal').modal('toggle');
        },
        "json",
        false,
        false
    );
}

function toggleLabelEdit(){
    let id = $('#ddLabels').val();
    let name = $('#ddLabels').find(":selected").attr('data-name');
    if(id != 0){
        $('#tbEditLabelName').val(name);
        $('#edit-label-box').removeClass('d-none');
    }else{
        $('#edit-label-box').addClass('d-none');
    }
}

function refreshLabels(data){
    $('#tbLabelName').val("");
    $('#ddLabels').html(labelOptions(data, true));
    $('#ddProductLabel').html(labelOptions(data));
    $('#ddEditProductLabel').html(labelOptions(data));
    $('#ddLabels').val(0);
    toggleLabelEdit();
}

function labelOptions(data, withSelect = false){
    let str = withSelect ? `<option value="0">-- Select label --</option>` : "";
    for(let d of data){
        str+= `<option value="${d.id}" data-name="${d.label}">${d.label}</option>`
    }
    return str;
}

/*Products*/
function insertProduct(){
    let formData = new FormData();

    $('.ingredient:checkbox:checked').each(function (i){
        let x = parseInt($(this).attr('data-id'));
        formData.append(`productIngredients[${i}]`, x);
    });

    formData.append('productName', $('#tbProductName').val());
    formData.append('productCategory', $('#ddProductCategory').val());
    formData.append('productPrice', $('#numProductPrice').val());
    formData.append('productDescription', $('#tbProductDescription').val());
    formData.append('productUnitValue', $('#numProductUnitValue').val());
    formData.append('productUnit', $('#ddProductUnit').val());
    formData.append('productLabel', $('#ddProductLabel').val());
    formData.append('productUrl', $('#tbProductUrl').val());
    formData.append('productImage', $('#fProductImage').prop('files')[0] ? $('#fProductImage').prop('files')[0] : null);
    formData.append('_token', token);

    ajax(
        "products",
        "POST",
        formData,
        function (data){
            $('#infoMessages').html(`<p class="text-success"> ${data.message} </p>`);
            $('#notificationsModal').modal('toggle');
            refreshProducts();
        },
        function (xhr){
            $('#infoMessages').html(printErrors(xhr.responseJSON.errors));
            $('#notificationsModal').modal('toggle');
            console.log(xhr.responseJSON);
        },
        "json",
        false,
        false
    );
}

function deleteProduct(){
    let formData = new FormData();
    let id = $("#ddProductsSearch").val();
    formData.set("id", id);
    formData.set('_token', token);

    ajax(
        `products/${id}`,
        "DELETE",
        formData,
        function (data){
            $('#infoMessages').html(`<p class="text-success"> ${data.message} </p>`);
            $('#notificationsModal').modal('toggle');
            refreshProducts();
        },
        function (xhr){
            console.log(xhr);
        },
        "json",
        false,
        false
    );
}

function updateProduct(){
    let formData = new FormData();
    let id = $('#ddProductsSearch').val();
    $('.ingredient-edit:checkbox:checked').each(function (i){
        let x = parseInt($(this).attr('data-id'));
        formData.append(`productIngredients[${i}]`, x);
    });

    formData.append('productName', $('#tbNewProductName').val());
    formData.append('productCategory', $('#ddEditProductCategory').val());
    formData.append('productPrice', $('#numNewProductPrice').val());
    formData.append('productDescription', $('#tbNewDescription').val());
    formData.append('productUnitValue', $('#numEditProductUnitValue').val());
    formData.append('productUnit', $('#ddEditProductUnit').val());
    formData.append('productLabel', $('#ddEditProductLabel').val());
    formData.append('productUrl', $('#tbEditProductUrl').val());
    formData.append('productImage', $('#fNewProductImage').prop('files')[0] ? $('#fNewProductImage  ').prop('files')[0] : null);
    formData.append('_token', token);
    formData.append("_method", "PUT");

    ajax(
        `products/${id}`,
        "POST",
        formData,
        function (data){
            $('#infoMessages').html(`<p class="text-success"> ${data.message} </p>`);
            $('#notificationsModal').modal('toggle');
            refreshProducts();
        },
        function (xhr){
            console.log(xhr.responseJSON);
            $('#infoMessages').html(printErrors(xhr.responseJSON.errors));
            $('#notificationsModal').modal('toggle');
        },
        "json",
        false,
        false
    );
}

function searchProducts(){
    let formData = new FormData();
    let name = $('#tbSearchProductName').val();
    let category = $('#ddSearchProductCategory').val();
    formData.set('_token', token);
    let url = "products/search";

    if(name !=""){
        url += "?name=" + name;
    }

    if(category != 0){
        if(url.endsWith("?name=" + name)){
            url += "&category=" + category;
        }else{
            url += "?category=" + category;
        }
    }

    ajax(
        url,
        "GET",
        formData,
        function (data){
            if(data.products.length == 0){
                $('#infoMessages').html('<p class="text-info"> Nije pronadjen nijedan rezultat. </p>');
                $('#notificationsModal').modal('toggle');
            }else{
                $('#ddProductsSearch').html(foundProducts(data.products));
            }

        },
        function (xhr){
            console.log(xhr);
        },
        "json",
        false,
        false
    );
}

function printErrors(errors){
    let str = "";
    for (let [key, val] of Object.entries(errors)){
        for (let v of val){
            str+= `<p class="text-danger">${v}</p>`
        }
    }
    return str;
}

function refreshProducts(){
    $('#ddProductCategory').val(0);
    $('#ddSearchProductCategory').val(0);
    $('#fProductImage').val("");
    $('#tbProductName').val("");
    $('#numProductPrice').val("");
    $('#tbProductDescription').val("");
    $('#tbSearchProductName').val("");
    $('#numProductUnitValue').val("");
    $('#numProductUnit').val(0);
    $('#ddProductsSearch').html('<option value="0">-- Select product --</option>');
    $('#ddProductsSearch').val(0);
    $('#fNewProductImage').val("");
    toggleProductEdit();
    $('input:checkbox').attr('checked', false);
}

function toggleProductEdit(){
    let id = $('#ddProductsSearch').val();
    console.log(id);
    if(id != 0){
        displayProduct(id);
        $('#edit-product-box').removeClass('d-none');
    }else{
        $('#edit-product-box').addClass('d-none');
    }
}

function displayProduct($id){
    ajax(
        `products/${$id}`,
        "GET",
        null,
        function (data){
            $('input:checkbox').attr('checked', false);

            $('#ddEditProductCategory').val(data.item.category.id);
            $('#imgCurrentCover').attr('src', baseUrl + "assets/img/products/" + data.item.src);
            $('#tbNewProductName').val(data.item.name);
            $('#numNewProductPrice').val(data.item.prices[0].unit_price);
            $('#tbNewDescription').val(data.item.description);
            $('#numEditProductUnitValue').val(data.item.unit_value);
            $('#ddEditProductUnit').val(data.item.unit_id);
            $('#ddEditProductLabel').val(data.item.label_id);
            $('#tbEditProductUrl').val(data.item.url);

            let ingredients = $('.ingredient-edit');
            for(let item of data.item.ingredients){
                for (let i of ingredients){
                    if($(i).attr('data-id') == item.id){
                        $(i).attr('checked', true);
                    }
                }
            }
        },
        function (xhr){
        },
        "json",
        false,
        false
    );
}

function foundProducts(products){
    let str = '<option value="0">-- Select product --</option>';
    for (let p of products){
        str += `<option value="${p.id}">${p.name}</option>`;
    }
    return str;
}
