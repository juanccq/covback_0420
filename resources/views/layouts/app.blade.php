<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.head')
    </head>
    <body>
        @include('partials.sidebar')
        <!-- Right Panel -->
        <div id="right-panel" class="right-panel">
            @include('partials.topbar')
            <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            @if (Session::has('message'))
                            <div class="note note-info">
                                <p>{{ Session::get('message') }}</p>
                            </div>
                            @endif
                            @if ($errors->count() > 0)
                            <div class="note note-danger">
                                <ul class="list-unstyled">
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            @yield('content')
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade mt-3" id="invoicemodal" tabindex="-1" role="dialog" aria-labelledby="smallmodalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="smallmodalLabel">Email de destino</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="email_save" action="" method="post" class="form_validate" >
                                    <div class="form-group">
                                        <label class="control-label mb-1">Correo electrónico destinatario</label>
                                        <input type="email" class="form-control" required="required" placeholder="ejemplo@gmail.com" >
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-brand" id="save-btn"> <i class="fa fa-send"></i> Enviar factura</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-ban"></i> Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div> <!-- .modal --> 
            </div> <!-- .content --> 
            <!-- footer-->
            <footer id="footer" class="footer fixed-bottom">
                <div class="col-md-6 col-sm-12">
                    &copy; 2020 | <a href="#" target="_blank">Sistema</a> - Todos los derechos reservados   
                </div>

                <div class="col-md-6 col-sm-12">
                    <div class="alisa-footer-copy pull-right">
                    </div>    
                </div>

                <div class="clearfix"></div>    
            </footer>
        </div><!-- /#right-panel -->
        <!-- Right Panel -->

        @include('partials.javascripts')

        <script type="text/javascript">
            var vueFac;
            $(function () {
                if ($('#facturaForm').length > 0) {
                    vueFac = new Vue({
                        el: '#facturaForm',
                        mounted() {
                            this.sumaTotal();
                        },
                        data: {
                            qty: 0,
                            unit_price: 0,
                            total: 0,
                            concepto: '',
                            sub_total: 0,
                            details: []
                        },
                        methods: {
                            addRow() {
                                console.log(typeof this.sub_total)
                                this.qty = 0 + parseFloat(this.qty);
                                this.unit_price = 0 + parseFloat(this.unit_price);
                                this.sub_total = 0 + parseFloat(this.sub_total);
                                this.concepto = this.concepto.trim();
                                //if(this.sub_total>0 && this.concepto.length>0){
                                if (1) {
                                    this.details.push({
                                        id: '', 
                                        concepto: this.concepto, 
                                        qty: this.qty, 
                                        unit_price: this.unit_price, 
                                        total: this.sub_total});
                                    this.concepto = '';
                                    this.sub_total = 0;
                                    this.sumaTotal();
                                    
                                }
                            },
                            delRow(index) {
                                Vue.delete(this.details, index);
                                this.sumaTotal();
                            },
                            delLastRow() {
                                if (this.details.length) {
                                    var index = this.details.length - 1;
                                    Vue.delete(this.details, index);
                                    this.sumaTotal();
                                }
                            },
                            sumaSubTotal(index) {
                                let total = 0;
                                total=parseFloat(parseFloat(this.details[index]['unit_price'])*parseFloat(this.details[index]['qty']));
                                this.details[index]['total']=total.toFixed(2);
                                this.sumaTotal();
                            },
                            sumaTotal() {
                                let total = 0;
                                for (var i = 0, _len = this.details.length; i < _len; i++) {
                                    if (this.details[i].concepto.trim().length > 0) {
                                        total += parseFloat(this.details[i]['total']);
                                    }
                                }
//                                this.total=total.toFixed(2);
                                total = total || 0;
                                this.total = total.toFixed(2);
                            }
                        }
                    });
                    $(".form_validate").validate({
                        errorPlacement: function(error, element) {
                            $(element).parent('div').append(error)
                        },
                    });
                }
            });
        </script>
        <style type="text/css">
            .error{
                display:block;
                color:red;
                width:100%;
            }

        </style>
        @yield('javascripts_extra')
    </body>
</html>
