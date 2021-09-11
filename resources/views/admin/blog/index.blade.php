@extends('admin.layouts.master')
@section('page_title','Blogs lists')
@section('page_specific_css')
<link href="{{ asset('/admin-assets/formvalidation/dist/css/formValidation.min.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="pcoded-content vehicle">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">

                    <!-- end card for Breadcrumb -->
                	<div class="card card-white">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-7">
                                <h2>Blogs</h2>
                            </div>
                            <div class="col-md-5">
                                <div class="add-new-vehicle">
                                    <a href="#" class="btn-green border-radius-30 add-new-make">add New</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-block">
                    <div class="table-responsive dt-responsive">
                        <table class="table table-striped table-bordered data-table activity_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>

                        </table>
                    </div>
                    </div>
					</div>


                </div>
                <!-- end page -->
            </div>

        </div>
    </div>
</div>
<!-- end single-page -->

<div class="modal fade" id="add-new-make-modal">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New Activity</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

            <form id="blogForm" name="blogForm">
                @csrf
				<div class="modal-body category_add_body">
                     <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="NRNA visit">
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select name="category" class="form-control">
                                    <option value="" selected="selected" disabled>Select category</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" selected="selected">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="external_link">External link</label>
                                <input type="text" class="form-control" name="external_link" id="external_link" placeholder="https://www.facebook.com/156218744417668/videos/915074156011822/">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Upload Image</label>
                                <div class="file-upload">
                                    <div class="image-upload-wrap"  style="background: url({{asset('/admin-assets/images/user-profile/2012_Councelling_Roka_2.png')}});background-size: contain;">
                                        <img src="{{asset('/admin-assets/images/user-profile/2012_Councelling_Roka_2.png')}}" class="img-fluid image-preview-single">
                                        <input class="file-upload-input" type="file" name="category_image_path" onchange="previewFile(this);" accept="image/*">
                                        <div class="drag-text">
                                            <div class="icon">+</div>
                                        </div>
                                    </div>
                                    <div class="file-upload-content">
                                        <img class="file-upload-image img-fluid" src="#" alt="your image">
                                        <div class="image-title-wrap">
                                            <button type="button" onclick="removeUpload()" class="remove-image btn-blue">Remove Image<span class="image-title">Uploaded Image</span></button>
                                        </div>
                                    </div>
                                </div>
                                <button class="file-upload-btn  btn-blue" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Select Image
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="blog_id" id="blog_id" value=""/>
                <div class="modal-footer">
                    <button type="submit" name="btnSubmit" class="btn btn-green">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
			</form>
		</div>
	</div>
</div>
@endsection
@section('page_specific_js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/4.4.0/bootbox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/es6-shim/0.35.3/es6-shim.min.js"></script>
    <script src="{{asset('admin-assets/formvalidation/dist/js/FormValidation.min.js')}}"></script>
    <script src="{{asset('admin-assets/formvalidation/dist/js/plugins/Bootstrap.min.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/htwjojrmzrtocohmg23pftvkzb8dn907vrzqzfeju23jhzf6/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $(document).ready(function () {
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            //intialize the variables
            var save_method = "add";
            var make_url;
            var makeTable;
            var categoryId;
            var form = document.getElementById('blogForm');
            //intialize the tinymce editor
            initTinyMce();
            //render the data in the datatable based on the fetched results
            makeTable = $('.activity_table').DataTable({
                dom: 'Blfrtip',
                buttons: [],
                order: [[0,'desc']],
                autoWidth: false,
                order: [[0, "asc"]],
                searching:true,
                pageLength: "10",
                destroy: true,
                processing: true,
                serverSide: true,
                language              : {
                    searchPlaceholder     : "Search blogs"
                },
                ajax                  : {
                    url :"{{route('admin.blog.index')}}",
                    type : "GET",

                },
                columns:[
                    {
                        "data": "id",
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                    {'render'  :function(data, type, JsonResultRow, meta)
                        {
                            return "<img src='"+ JsonResultRow.image_path + "' height='50px' width='100px'>";
                        }
                    },
                    {"data": "blog_title", "name": "blogs.title"},
                    {"data": "title", "name": "categories.title"},
                    {
                        data: 'status',
                        name: 'status',
                        render: function (data, type, full, meta) {
                            return data == "1" ? "Active" : "Inactive";
                        }
                    },
                    {"data": "action", "name": "action"},

                ],
                "fnInitComplete": function(oSettings, json) {
                    /*tool_tip();*/
                }

            });
            //end of the datatable data rendering
            const fv = FormValidation.formValidation(
            form,
            {
                fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'The blog name is required'
                            },
                        }
                    },
                    status: {
                        validateField: {}

                    },
                    category: {
                        validators: {
                            notEmpty: {
                                message: 'The blog category is required'
                            },
                        }

                    },
                    external_link:{
                        validateField:{}
                    },
                    description: {
                        validateField: {}
                    },
                    category_image_path: {
                        validators: {
                            file: {
                                extension: 'jpeg,jpg,png',
                                type: 'image/jpeg,image/png',
                                maxSize: 2097152,   // 2048 * 1024
                                message: 'You cannot upload the image that is greater than 2MB size'
                            }
                        }
                    }
                },
                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    //defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                    // Support the form made in Bootstrap 4
                    bootstrap: new FormValidation.plugins.Bootstrap(),
                    // Show the feedback icons taken from FontAwesome
                    icon: new FormValidation.plugins.Icon({
                        valid: 'fa fa-check',
                        invalid: 'fa fa-times',
                        validating: 'fa fa-refresh',
                    }),
                },

            }).on('core.form.valid', function () {
                blogId = $("#blog_id").val();
                if (save_method == 'update') {
                    make_url = "{{route('admin.blog.update',':make')}}";
                    make_url = make_url.replace(":make",blogId);
                } else {
                    make_url = "{{route('admin.blog.store')}}";
                }
                // get the input values
                result = new FormData($("#blogForm")[0]);
                $.ajax({
                    url: make_url,
                    data:result,
                    dataType: "Json",
                    contentType: false,
                    processData: false,
                    cache:false,
                    type: "POST",
                    success: function (data) {
                        if(data.status == "success"){
                            $('#add-new-make-modal').modal('hide');
                            swal({
                                title: data.title,
                                text: data.message,
                                icon: "success",
                                button: "OK",
                            }).then(function () {
                                makeTable.ajax.reload();
                            });
                        }else{
                            swal({
                                title: data.title,
                                text: data.message,
                                icon: "error",
                                button: "OK"
                            })
                        }

                    },
                    error: function (jqXHR,textStatus,errorThrown) {
                        if(jqXHR.status == 500){
                            console.log('There is server error adding the new blog, please try again');
                        }
                    }

                });
            });
            //add new menu
            $('body').on('click', '.add-new-make', function () {
                save_method = "add";
                $("h5.modal-title").html('Create new blog')
                $("#blog_id").val('');
                initTinyMce();
                $('#add-new-make-modal').modal('show');
            });

            //edit menu button click
            $('body').on('click','.edit-btn',function(e){
                //prevent the default action
                e.preventDefault();
                //make the save method
                save_method="update";
                //need to pouplate the data in the field by fetching the data from the server
                blogId = $(this).data('blog-id');
                $("#blog_id").val(blogId);
                menu_url   = "{{url('/admin/blogs/')}}" + "/" + blogId + "/edit";
                $.get(menu_url ,function(response){
                    //call the function to populate the data
                    if(response.status == "success"){
                        initTinyMce();
                        populateModalData(response);
                        $("#add-new-make-modal").modal('show');
                    }else{
                        //show the swal message
                        swal('Not found!!', 'Menu not found in the server', 'error');
                    }
                });
            });

            //reset the validation when the image was removed
            $('body').on('click','.remove-image',function(e){
                e.preventDefault();
                //reset the form validation field
                fv.resetField('make_image_path');
            });
            //delete the menu
            $("body").on('click','.delete-btn', function(e){
                e.preventDefault();
                blogId=$(this).attr('data-blog-id');
                make_url  = "{{url('/admin/blogs/')}}" + "/" + blogId;
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover blog!",
                    icon: "warning",
                    buttons: {
                        cancel: "Cancel",
                        catch: {
                            text: "Delete",
                            value: "catch",
                        },
                    },
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                }).then(function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: make_url,
                            type: "DELETE",
                            dataType: "Json",
                            context:this,
                            data: {_token: "{{csrf_token()}}"},
                            success: function (data) {
                                if (data.status == "success") {
                                    swal(data.title, data.message, "success").then(function () {
                                        makeTable.ajax.reload();

                                    });
                                } else {
                                    swal('Not allowed!!', data.message, 'error');
                                }
                            },
                            error: function (jqXHR, textStatus, errorThrown) {
                                if (jqXHR.status == '404') {
                                    swal('Not found in server', 'The make does not exists', 'error');
                                } else if (jqXHR.status == '201') {
                                    swal('Not allowed!!', 'The make cannot be deleted. Please try again later', 'error');
                                }
                            }
                        });
                    }
                });
            });
            $('.modal').on('hidden.bs.modal', function(){
                //reset the form, form validation and the editor
                $(form)[0].reset();
                removeUpload();
                fv.resetForm(true);
                tinymce.EditorManager.editors = []; 
                $("#description").text('');
                showDefaultImage();
            });
            $.fn.dataTable.ext.errMode = 'none';
        });


        // function re reinitialize the tinymce while destoryed when the modal close
        function initTinyMce(){
            tinymce.init({
                    selector: 'textarea',
                    plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
                    toolbar: 'insert undo redo formatselect bold italic backcolor  alignleft aligncenter alignright alignjustify bullist numlist outdent indent removeformat help',
                    toolbar_mode: 'floating',
                    tinycomments_mode: 'embedded',
                    tinycomments_author: 'Author name',
            });

        }


        //function to populate the modal data while the modal open in case of the edit menu option
        function populateModalData(response,has_set_menu_image){
            //change the modal heading
            $("h5.modal-title").html('Update ' + response.blog.title + ' blog')
            //populate the individual field
            $("#name").val(response.blog.title);
            $("#external_link").val(response.blog.external_link);
            //loop through each 
            var blog_status = $("select[name='status'] > option")
            blog_status.each((index,value) =>{
                if(response.blog.status == value.value){
                    $("select[name='status']").val(response.blog.status)
                }
            })

            var blog_category = $("select[name='category'] > option")
            blog_category.each((index,value) =>{
                if(response.blog.category_id == value.value){
                    $("select[name='category']").val(response.blog.category_id)
                }
            })

            //set the content in the tinymce
            if(response.blog.content != null)
                tinymce.get('description').setContent(response.blog.content);
            //set the if provided
            if(response.blog.featured_image != null){
                var image_directory = "{{asset('storage/uploads/blogs/large')}}";
                $(".image-preview-single").attr('src',image_directory + "/" + response.blog.featured_image);
            }
        }


        function showDefaultImage(){
            var default_image_path = "{{asset('/admin-assets/images/user-profile/2012_Councelling_Roka_2.png')}}";
            $('.image-preview-single').attr('src',default_image_path);
        }

</script>
@endsection