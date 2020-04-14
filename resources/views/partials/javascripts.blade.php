<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.min.js"></script>
<script src="{{ asset('js/messages_es.js') }}"></script>
<!-- <script src="js/popper.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-datepicker.es.min.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-show-password.min.js') }}"></script>
<script src="{{ asset('js/clipboard.min.js') }}"></script>
<script src="https://unpkg.com/vue@2.5.17/dist/vue.js"></script>

<script>
    window._token = '{{ csrf_token() }}';
    function checkEmail(){
        $('#invoicemodal').modal('show');
        $("#email_save").validate();
        $( '#invoicemodal #save-btn' ).click( function(){
            if($("#email_save").valid()){
                $('#correo_dest').val($("#email_save input").val());
                $('#invoicemodal').modal('hide');
                $('#formFacturaSubmit').click();
            }
        } );
    }
    function enviaEmail(id){
            $( '#invoicemodal #save-btn' ).click( function(){
                //$( '#form-sent-email' ).submit();
                $( '#form-sent-email-submit').click();
            } );

            var html = '<form class="form-horizontal form_validate" action="/admin/invoices/'+ id +'/generate" method="GET" id="form-sent-email">';
                html += '<div class="form-group"><label class="control-label mb-1">Correo electrónico destinatario</label>';
                html += '<input type="email" name="correo_dest" class="form-control" required="required" placeholder="ejemplo@gmail.com" >';
                html += '</div>';
                html += '<input type="submit" id="form-sent-email-submit" style="display:none;">';
                html += '</form>';

        // Add input for email recipient
        $('#invoicemodal .modal-body').html(html);

        $('#invoicemodal').modal('show');
        $(".form_validate").validate();
    }
    $(function(){
        if($(".form_validate").length>0){
            $(".form_validate").validate();
        }
        if($(".share_pdf").length>0){
            var clipboard = new ClipboardJS('.share_pdf');
            clipboard.on('success', function(e) {
                swal("url copiada!");
            });
        }
        if($(".input_password").length>0){
            $(".input_password").password({
                eyeClass: 'fa',
                eyeOpenClass: 'fa-eye',
                eyeCloseClass: 'fa-eye-slash'
            });
        }
        if($(".date-picker").length>0){
            window.setTimeout( function() {
                $('.date-picker').datepicker({
                    language: "es",
                    format: "dd/mm/yyyy",
                    autoclose: true,
                    weekStart: 0,
                    todayHighlight: true,
                });
            }, 600 )
        }
    });
</script>

@yield('javascript')