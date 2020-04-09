<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>SISTEMA DE FACTURACIÓN - mail</title>
        <style type="text/css">
            @import url(http://fonts.googleapis.com/css?family=Lato:400);
            /* Take care of image borders and formatting */
        </style>

        <style type="text/css" media="screen">
            @media screen {
                /* Thanks Outlook 2013! http://goo.gl/XLxpyl*/
                td, h1, h2, h3 {
                    font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;
                }
            }
        </style>


    </head>
    <body class="body" style="padding: 0;margin: 0;display: block;background: #ffffff;-webkit-text-size-adjust: none;-webkit-font-smoothing: antialiased;width: 100%;height: 100%;color: #37302d;" bgcolor="#ffffff">
        <table align="center" cellpadding="0" cellspacing="0" width="100%" height="100%" style="border-collapse: collapse !important;">
            <tr>
                <td align="center" valign="top" bgcolor="#ffffff" width="100%" style="font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;">
                    <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse !important;">
                        <tr>
                            <td width="100%" style="font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;">
                                <center>
                                    <table cellspacing="0" cellpadding="0" width="500" class="w320" style="border-collapse: collapse !important;">
                                        <tr>
                                            <td valign="top" style="padding: 10px 0;text-align: center;font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;" class="mobile-center">
                                                <img src="{{ url('img').'/logo-macondoart.png' }}" alt="" width="400">
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                            </td>
                        </tr>

                        <tr>
                            <td style="font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;">
                                <center>
                                    <table cellspacing="0" cellpadding="0" width="500" style="margin-bottom: 5px;border-collapse: collapse !important;">
                                        <tr>
                                            <td class="mobile-border" style="background-color: #1ABB9C;color: #ffffff;padding: 5px;border-right: 3px solid #ffffff;text-align: center;font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;">
                                                RECUPERACIÓN DE CONTRASEÑA
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                            </td>
                        </tr>

                        <tr>

                            <td background="{{ url('img').'/banner.png' }}" bgcolor="#8b8284" valign="top" style="background: url({{ url('img').'/banner.png' }}) no-repeat center;background-color: #8b8284;background-position: center;font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;">
                                <!--[if gte mso 9]>
                                <v:rect xmlns:v="urn:schemas-microsoft-com:vml" fill="true" stroke="false" style="mso-width-percent:1000;height:303px;">
                                  <v:fill type="tile" src="https://www.filepicker.io/api/file/kmlo6MonRpWsVuuM47EG" color="#8b8284" />
                                  <v:textbox inset="0,0,0,0">
                                <![endif]-->
                                <div>
                                    <center>
                                        <table cellspacing="0" cellpadding="0" width="530" height="303" class="w320" style="border-collapse: collapse !important;">
                                            <tr>
                                                <td valign="middle" style="vertical-align: middle;padding-right: 15px;padding-left: 15px;text-align: left;font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;" height="303">

                                                </td>
                                            </tr>
                                        </table>
                                    </center>
                                </div>
                                <!--[if gte mso 9]>
                                  </v:textbox>
                                </v:rect>
                                <![endif]-->
                            </td>
                        </tr>
                        <tr class="force-full-width" style="width: 100% !important;">
                            <td valign="top" class="force-full-width" style="font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;width: 100% !important;">
                                <center>
                                    <table cellspacing="0" cellpadding="0" width="500" class="w320" style="border-collapse: collapse !important;">
                                        <tr>
                                            <td valign="top" style="border-bottom: 1px solid #a1a1a1;font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;">

                                                <table cellspacing="0" cellpadding="0" class="force-full-width" style="border-collapse: collapse !important;width: 100% !important;">
                                                    <tr>
                                                        <td style="padding: 30px 0;font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;" class="mobile-padding">
                                                            Estás recibiendo este email porque se ha solicitado un cambio de contraseña para tu cuenta.

                                                            <table cellspacing="0" cellpadding="0" width="100%" style="margin-top: 25px;border-collapse: collapse !important;">
                                                                <tr>
                                                                    <td style="width: 33%;font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;" class=" ">
                                                                        &nbsp;
                                                                    </td>
                                                                    <td style="width: 33%;height: 33px;font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;">
                                                                        <div>
                                                                            <a href="{{ route('password.reset',['token'=>$token]) }}" style="background-color: #00bc9e;border-radius: 4px;color: #ffffff;display: block;font-family: sans-serif;font-size: 13px;font-weight: bold;line-height: 40px;text-align: center;text-decoration: none;-webkit-text-size-adjust: none;border: 0;outline: none;">RECUPERAR</a>
                                                                        </div>
                                                                    </td>
                                                                    <td style="width: 33%;font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;" class=" ">
                                                                        &nbsp;
                                                                    </td>

                                                                </tr>
                                                            </table>

                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-bottom: 30px;font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;" class="mobile-padding">

                                                            <table class="force-full-width" cellspacing="0" cellpadding="0" style="border-collapse: collapse !important;width: 100% !important;">
                                                                <tr>

                                                                    <td class="mobile-block" style="font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;">
                                                                        <table cellspacing="0" cellpadding="0" class="force-full-width" style="border-collapse: collapse !important;width: 100% !important;">

                                                                            <tr>
                                                                                <td style="background-color: #ebebeb;padding: 8px;border-top: 3px solid #ffffff;text-align: left;font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;">
                                                                                    Si no has solicitado un cambio de contraseña, simplemente elimina este email.
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>

                                                                </tr>
                                                            </table>
                                                            <br />
                                                            Si tienes problemas haciendo click en el botón "Reestablecer contraseña", copia y pega la URL siguiente en tu navegador:<br/>
                                                            <a href="{{ route('password.reset',['token'=>$token]) }}">{{ route('password.reset',['token'=>$token]) }}</a>
                                                        </td>
                                                    </tr>
                                                </table>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;">

                                                <table cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse !important;">
                                                    <tr>
                                                        <td class="mobile-padding" style="text-align: left;font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;">
                                                            <br />
                                                            Gracias por usuar nuestros servicios. Por favor <a style="color: #1ABB9C;text-decoration: none;border: 0;outline: none;" href="{{ $contactEmail }}"> contactanos </a> para cualquier consulta, le haremos seguimiento y responderemos a la brevedad posible.
                                                            <br />
                                                            <br />
                                                            - <br />
                                                            Equipo de comunicación - SISTEMA DE FACTURACIÓN
                                                            <br />
                                                            <br />
                                                            <br />

                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td style="background-color: #c2c2c2;font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;">
                                <center>
                                    <table cellspacing="0" cellpadding="0" width="500" class="w320" style="border-collapse: collapse !important;">
                                        <tr>
                                            <td style="font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;">

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;">
                                                <center>
                                                    <table style="margin: 0 auto;border-collapse: collapse !important;" cellspacing="0" cellpadding="5" width="100%">
                                                        <tr>
                                                            <td style="text-align: center;margin: 0 auto;font-family: 'Lato', 'Helvetica Neue', 'Arial', 'sans-serif' !important;font-weight: 400;" width="100%">
                                                                <a href="#" style="text-align: center;text-decoration: none;border: 0;outline: none;">
                                                                    <img src="logo-m.png" alt="" style="border: none;">
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </center>
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>
</html>