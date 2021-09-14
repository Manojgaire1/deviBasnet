@extends('admin.layouts.master')
@section('page_title','Page Detail lists')
@section('page_specific_css')
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
                                    <h2>Page</h2>
                                </div>
                                <div class="col-md-5">
                                    <div class="add-new-vehicle">
                                        <a href="#" class="btn-green border-radius-30 add-new-make">add Page Detail</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-block">
                            <div class="table-responsive dt-responsive">
                                <table class="table table-striped table-bordered data-table page_detail_table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Page</th>
                                            <th>Meta Key</th>
                                            <th>Meta Value</th>
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
    <div class="modal-dialog modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Page Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="pageDetailForm" name="pageDetailForm">
                @csrf
                <div class="modal-body page_detail_add_body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="page">Page</label>
                                <select name="page" id="page" class="form-control">


                                </select>
                            </div>


                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="meta_key">Meta Key</label>
                                <input type="text" class="form-control" name="meta_key" id="meta_key" placeholder="">
                            </div>


                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="meta_value">Meta Value</label>
                                <textarea class="form-control" name="meta_value" id="meta_value"></textarea>
                            </div>
                        </div>

                    </div>

                </div>
                <input type="hidden" name="page_detail_id" id="page_detail_id" value="" />
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
<script src="https://cdn.tiny.cloud/1/htwjojrmzrtocohmg23pftvkzb8dn907vrzqzfeju23jhzf6/tinymce/5/tinymce.min.js"
    referrerpolicy="origin"></script>
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
            var form = document.getElementById('pageDetailForm');
            //intialize the tinymce editor
            initTinyMce();
            //render the data in the datatable based on the fetched results
            makeTable = $('.page_detail_table').DataTable({
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
                    searchPlaceholder     : "Search page detail"
                },
                ajax                  : {
                    url :"{{route('admin.cms.page.detail.index')}}",
                    type : "GET",

                },
                columns:[
                    {
                        "data": "id",
                        render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }
                    },
                   
                    {"data": "page", "name": "pages.title"},
                    {"data": "meta_key", "name": "page_details.meta_key"},
                    {"data": "meta_value", "name": "page_details.meta_value"},
                    
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
                    page: {
                        validators: {
                            notEmpty: {
                                message: 'The page is required'
                            },
                        }
                    },
                    meta_key: {
                        validators: {
                            notEmpty: {
                                message: 'The meta key is required'
                            },
                        }
                    },
                    meta_value: {
                        validators: {
                            notEmpty: {
                                message: 'The meta value is required'
                            },
                        }
                    },
                    
                    
                    
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
                tinyMCE.triggerSave();
                makeId = $("#page_detail_id").val();
                if (save_method == 'update') {
                    make_url = "{{route('admin.cms.page.detail.update',':make')}}";
                    make_url = make_url.replace(":make",makeId);
                } else {
                    make_url = "{{route('admin.cms.page.detail.store')}}";
                }
                // get the input values
                result = new FormData($("#pageDetailForm")[0]);
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
                            console.log('There is server error adding the new menu, please try again');
                        }
                    }

                });
            });
            //add new menu
            $('body').on('click', '.add-new-make', function () {
                save_method = "add";
                $('#page').empty();
                $("#page").prepend("<option value='' selected='selected'>Please select page</option>");
                loadPage();
                $("h5.modal-title").html('Create new page detail')
                $("#page_detail_id").val('');
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
                makeId = $(this).data('page-detail-id');
                $("#page_detail_id").val(makeId);
                menu_url   = "{{url('/admin/cms/page/details')}}" + "/" + makeId + "/edit";
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

           
            //delete the menu
            $("body").on('click','.delete-btn', function(e){
                e.preventDefault();
                makeId=$(this).attr('data-page-detail-id');
                make_url  = "{{url('/admin/cms/page/details')}}" + "/" + makeId;
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover page!",
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
                fv.resetForm(true);
                tinymce.EditorManager.editors = []; 
                // $("#description").text('');
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
            $("h5.modal-title").html('Update page detail')

            // load all page
            $('#page').empty();
            loadPage()
            //populate the individual field
            $("#meta_key").val(response.page_detail.meta_key);
            $("#page").val(response.page_detail.page_id);
            //set the content in the tinymce
            if(response.page_detail.meta_value != null)
            tinymce.get('meta_value').setContent(response.page_detail.meta_value);

            // selected page
            var page = $("select[name='page'] > option")
            page.each((index,value) =>{
                
                if(response.page_detail.page_id == value.value){
                    $("select[name='page']").val(response.page_detail.page_id)
                }
            })
            
        }
        // loading page
        function loadPage()
        {
            
            $.get("{{ URL::to('/admin/cms/pages/all') }}",function (data) {
                if (data.status == "success") {
                    $.each(data.result, function (key, value) {
                        $('#page').append($('<option>', {
                            value: value.id,
                            text: value.title,
                        }));
                    });
                }
            });
        }


        

</script>
@endsection