 
<?php 
// echo"Kdsub ".$uniqid;
// echo"Bidang ".$kdbidang;
?>
              
              <div class="card-body">
             <form method="POST" id="formUpload" enctype="multipart/form-data" class="form-horizontal">
                 @csrf
                 <div class="form-group row">
                       <label for="inputName" class="col-sm-2 col-form-label">ID </label>
                       <div class="col-sm-5">
                         <input type="text" class="form-control form-control-sm" id="uniqid" name="uniqid" value="{{$uniqid}}" readonly>
                         
                       </div>
                   </div> 
                   <div class="form-group row">
                     <label for="inputName" class="col-sm-2 col-form-label">Jenis Label </label>
                     <div class="col-sm-5">
                       <input type="text" class="form-control form-control-sm" id="label" name="label" value="{{ $label }}" readonly>
                       
                     </div>
                 </div> 
                 
                   
                   <hr>
                   <div class="form-group row">
                   <label for="inputName" class="col-sm-2 col-form-label">Pilih File</label>
                     <div class="col-md-5">
                         <input type="file" name="select_file" id="select_file" class="form-control" /> 
                          

                     </div>    
                     <div class="col-md-2"> 
                         <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload">
                     </div> 
                      
                 </div>
             </form>
           </div>
           <div class="alert" id="message" style="display: none"></div>
           <div class="progress" style="display:none">
             <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="">
                 <span class="sr-only"></span>
             </div>
         </div>
           <div class="card-body">
                  
                 <span id="uploaded_file"> </span>  
                 <span id="label_file"> </span>  
           </div> 


<script type="text/javascript">
 $(document).on('ajaxComplete ajaxReady', function () {
     
     $('#formUpload').on("submit", function (e) {
         $(".progress").show();
         var formData = new FormData(this);
         var formURL = $("#formUpload").attr("action");
         $.ajax(
                 {
                     url:"{{ route('admin.uploadactionwl') }}",
                     type: "POST",
                     data: formData,
                     contentType: false,
                     processData: false,
                     success: function (data, textStatus, jqXHR)
                     {
                         
                         //window.location.href = data.url;
                         $('#message').css('display', 'block');
                         $('#message').html(data.message);
                         $('#message').addClass(data.class_name);
                         $('#uploaded_image').html(data.uploaded_image);
                         $('#uploaded_file').html(data.uploaded_file);
                         $('#label_file').html(data.label_file);

                         var data = jqXHR.responseJSON;
                         var namafile = $("#uploadfile").val(); 
                         var label = $("#labelfile").val(); 
                         //console_log();
                         getBACK(namafile,label); 
                         // if(label=="cover"){
                         //     return getBACKCOVER(namafile); 
                         // }else{
                         //     return getBACKPDF(namafile); 
                         // }
                        
                     },
                     error: function (jqXHR, textStatus, errorThrown)
                     {
                         var data = jqXHR.responseJSON;
                         errorsHtml = '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><ul>';

                         $.each(data, function (key, value) {
                             errorsHtml += '<li>' + value[0] + '</li>';
                         });
                         errorsHtml += '</ul></di>';

                         $(".modalError").html(errorsHtml);
                     },
                     xhr: function () {
                         var xhr = $.ajaxSettings.xhr();
                         xhr.upload.onprogress = function (e) {
                             $(".progress-bar").attr("style", "width:" + Math.floor(e.loaded / e.total * 100) + "%");
                             $(".progress-bar").html(Math.floor(e.loaded / e.total * 100) + "%");
                         };
                         return xhr;
                     },
                 });
         e.preventDefault();
         //e.unbind();
     });
 });
</script>                                    
                      
             