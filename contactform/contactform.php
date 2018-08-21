<?php
  
  header('Content-Type: application/json');
  date_default_timezone_set('Etc/UTC');

  require '../phpmailer/PHPMailerAutoload.php';
  $mail = new PHPMailer;

  $mail->isSMTP();

  $mail->SMTPDebug = 0;

  $mail->Debugoutput = 'html';
  
  $mail->Host = "securemail.myhosting.com";//grupois.com
  
  $mail->Port = 25;
  
  $mail->SMTPAuth = true;
  
  $mail->Username = "info@grupois.com";
  
  $mail->Password = "socrates701";

  $mail->setFrom('info@grupois.com', 'Grupo IS');

  if(isset($_SERVER["HTTP_REFERER"])){

    $correo = $_POST['email'];
    $message = $_POST['message'];
    $nombre = $_POST['name'];
    $asunto = utf8_decode($_POST['subject']);

    $mensaje = "<!DOCTYPE html><html lang='es' xmlns='http://www.w3.org/1999/xhtml' xmlns:v='urn:schemas-microsoft-com:vml' xmlns:o='urn:schemas-microsoft-com:office:office'><head><base href='https://raw.githubusercontent.com/TedGoas/Cerberus/master/cerberus-fluid.html'><meta charset='utf-8'><meta name='viewport' content='width=device-width, initial-scale=1.0' /><style type='text/css'>* {-ms-text-size-adjust:100%;-webkit-text-size-adjust:none;-webkit-text-resize:100%;text-resize:100%;}a{outline:none;color:#40aceb;text-decoration:underline;}a:hover{text-decoration:none !important;}.nav a:hover{text-decoration:underline !important;}.title a:hover{text-decoration:underline !important;}.title-2 a:hover{text-decoration:underline !important;}.btn:hover{opacity:0.8;}.btn a:hover{text-decoration:none !important;}.btn{-webkit-transition:all 0.3s ease;-moz-transition:all 0.3s ease;-ms-transition:all 0.3s ease;transition:all 0.3s ease;}table td {border-collapse: collapse !important;}.ExternalClass, .ExternalClass a, .ExternalClass span, .ExternalClass b, .ExternalClass br, .ExternalClass p, .ExternalClass div{line-height:inherit;}@media only screen and (max-width:500px) {table[class='flexible']{width:100% !important;}table[class='center']{float:none !important;margin:0 auto !important;}*[class='hide']{display:none !important;width:0 !important;height:0 !important;padding:0 !important;font-size:0 !important;line-height:0 !important;}td[class='img-flex'] img{width:100% !important;height:auto !important;}td[class='aligncenter']{text-align:center !important;}th[class='flex']{display:block !important;width:100% !important;}td[class='wrapper']{padding:0 !important;}td[class='holder']{padding:30px 15px 20px !important;}td[class='nav']{padding:20px 0 0 !important;text-align:center !important;}td[class='h-auto']{height:auto !important;}td[class='description']{padding:30px 20px !important;}td[class='i-120'] img{width:120px !important;height:auto !important;}td[class='footer']{padding:5px 20px 20px !important;}td[class='footer'] td[class='aligncenter']{line-height:25px !important;padding:20px 0 0 !important;}tr[class='table-holder']{display:table !important;width:100% !important;}th[class='thead']{display:table-header-group !important; width:100% !important;}th[class='tfoot']{display:table-footer-group !important; width:100% !important;}}</style></head><body style='margin:0; padding:0;' bgcolor='#eaeced'><table style='min-width:320px;' width='100%' cellspacing='0' cellpadding='0' bgcolor='#eaeced'><!-- fix for gmail --><tr><td class='hide'><table width='600' cellpadding='0' cellspacing='0' style='width:600px !important;'><tr><td style='min-width:600px; font-size:0; line-height:0;'>&nbsp;</td></tr></table></td></tr><tr><td class='wrapper' style='padding:0 10px;'><!-- module 1 --><table data-module='module-1' data-thumb='thumbnails/01.png' width='100%' cellpadding='0' cellspacing='0'><tr><td data-bgcolor='bg-module' bgcolor='#eaeced'><table class='flexible' width='600' align='center' style='margin:0 auto;' cellpadding='0' cellspacing='0'><tr><td style='padding:29px 0 30px;'><table width='100%' cellpadding='0' cellspacing='0'><tr><th class='flex' width='113' align='left' style='padding:0;'><table class='center' cellpadding='0' cellspacing='0'><tr><td style='line-height:0;'><a target='_blank' style='text-decoration:none;' href='http://www.grupois.com.mx//'><img src='http://grupois.com/img//logo.png' border='0' style='font:bold 12px/12px Arial, Helvetica, sans-serif; color:#606060;' align='left' vspace='0' hspace='0' width='24' height='24' alt='GrupoIS' /></a></td></tr></table></th><th class='flex' align='left' style='padding:0;'><table width='100%' cellpadding='0' cellspacing='0'><tr><td data-color='text' data-size='size navigation' data-min='10' data-max='22' data-link-style='text-decoration:none; color:#888;' class='nav' align='right' style='font:bold 13px/15px Arial, Helvetica, sans-serif; color:#888;'><a target='_blank' style='text-decoration:none; color:#888;' href='http://www.grupois.com/'>Inicio</a> &nbsp; &nbsp; <a target='_blank' style='text-decoration:none; color:#888;' href='http://www.grupois.com/index.html#facts'>Conócenos</a> &nbsp; &nbsp; <a target='_blank' style='text-decoration:none; color:#888;' href='http://www.grupois.com/index.html#services'>Servicios</a> &nbsp; &nbsp; <a target='_blank' style='text-decoration:none; color:#888;' href='http://www.grupois.com/index.html#contact'>Contáctanos</a></td></tr></table></th></tr></table></td></tr></table></td></tr></table><!-- module 2 --><table data-module='module-2' data-thumb='thumbnails/02.png' width='100%' cellpadding='0' cellspacing='0'><tr><td data-bgcolor='bg-module' bgcolor='#eaeced'><table class='flexible' width='600' align='center' style='margin:0 auto;' cellpadding='0' cellspacing='0'><tr><td class='img-flex'><img src='http://grupois.com/img//pexels-photo-1043506.jpeg' style='vertical-align:top;' width='600' height='306' alt='' /></td></tr><tr><td data-bgcolor='bg-block' class='holder' style='padding:58px 60px 52px;' bgcolor='#f9f9f9'><table width='100%' cellpadding='0' cellspacing='0'><tr><td data-color='title' data-size='size title' data-min='25' data-max='45' data-link-color='link title color' data-link-style='text-decoration:none; color:#292c34;' class='title' align='center' style='font:35px/38px Arial, Helvetica, sans-serif; color:#292c34; padding:0 0 24px;'>¡Gracias por tus comentarios!</td></tr><tr><td data-color='text' data-size='size text' data-min='10' data-max='26' data-link-color='link text color' data-link-style='font-weight:bold; text-decoration:underline; color:#40aceb;' align='center' style='font:bold 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;'>Hola $nombre, recibimos tus comentarios. En Grupo IS, nos interesan tus opiniones, en breve nos pondremos en contacto contigo.</td></tr><tr><td data-color='text' data-size='size text' data-min='10' data-max='26' data-link-color='link text color' data-link-style='font-weight:bold; text-decoration:underline; color:#40aceb;' align='center' style='font:bold 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;'>Tus datos de contacto son:<br><br>Nombre: <b>$nombre</b><br>Correo: <b>$correo</b></td></tr><tr><td data-color='text' data-size='size text' data-min='10' data-max='26' data-link-color='link text color' data-link-style='font-weight:bold; text-decoration:underline; color:#40aceb;' align='justify' style='font:bold 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;'>Comentarios: $message</td></tr><tr><td style='padding:0 0 20px;'><table width='134' align='center' style='margin:0 auto;' cellpadding='0' cellspacing='0'><tr><td data-bgcolor='bg-button' data-size='size button' data-min='10' data-max='16' class='btn' align='center' style='font:12px/14px Arial, Helvetica, sans-serif; color:#f8f9fb; text-transform:uppercase; mso-padding-alt:12px 10px 10px; border-radius:2px;' bgcolor='#7bb84f'><a target='_blank' style='text-decoration:none; color:#f8f9fb; display:block; padding:12px 10px 10px;' href='http://www.grupois.com/'>Grupo IS</a></td></tr></table></td></tr></table></td></tr><tr><td height='28'></td></tr></table></td></tr></table><table data-module='module-7' data-thumb='thumbnails/07.png' width='100%' cellpadding='0' cellspacing='0'><tr><td data-bgcolor='bg-module' bgcolor='#eaeced'><table class='flexible' width='600' align='center' style='margin:0 auto;' cellpadding='0' cellspacing='0'><tr><td class='footer' style='padding:0 0 10px;'><table width='100%' cellpadding='0' cellspacing='0'><tr class='table-holder'><th class='tfoot' width='400' align='left' style='vertical-align:top; padding:0;'><table width='100%' cellpadding='0' cellspacing='0'><tr><td data-color='text' data-link-color='link text color' data-link-style='text-decoration:underline; color:#797c82;' class='aligncenter' style='text-align: center; font:12px/16px Arial, Helvetica, sans-serif; color:#797c82; padding:0 0 10px;'>Grupo IS, 2018. &nbsp; Todos los derechos reservados. <a target='_blank' style='text-decoration:underline; color:#797c82;' href='http://www.grupois.com/'>Ir al sitio.</a></td></tr></table></th></tr></table></td></tr></table></td></tr></table></td></tr><!-- fix for gmail --><tr><td style='line-height:0;'><div style='display:none; white-space:nowrap; font:15px/1px courier;'>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div></td></tr></table></body></html>";

    $mensaje = utf8_decode($mensaje);

    $mail->addAddress($correo, $nombre);
    $mail->addAddress('info@grupois.com', 'Grupo IS');
      
    $mail->Subject = $asunto;
    $mail->msgHTML($mensaje);
    $mail->AltBody = $asunto;

    if (!$mail->send()) {

      $info[] = array (
          'id' => 0,
          'success' => false,
          'message' => '¡Error al enviar. Intentalo de nuevo!',
          "Mailer Error: " . $mail->ErrorInfo
        );
    } else {

      $info[] = array (
          'id' => 1,
          'success' => true,
          'message' => '¡Exito!'
        );
     
    } 

    echo json_encode(array('info' => $info));  
    die();


  }

?>
