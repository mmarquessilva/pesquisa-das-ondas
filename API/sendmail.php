<?php
use acwaves\ReadJson;
use acwaves\Finals;


$template = '<table border="0" cellspacing="0" cellpadding="0" width="600" style="border-collapse:collapse">
   <tbody>
     <tr>
       <td><img src="http://www.anacouto.com.br/ondas/front/src/imgs/header.jpg" width="600" height="153"></td>
     </tr>
     <tr>
       <td>
        <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
            <tr>
              <td style="padding:6.75pt 20pt 6.75pt 20pt;">
                <span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,sans-serif;color:#212529">
                  <br><br>
                  <h2>RESULTADO PARA A MARCA {marca}</h1>
                  <hr>
                  <p>
                    <span style="font-size:14pt;">NOTAS POR ONDAS</span><br>
                    <span style="color: #FF2C00; font-size:10pt;">1 a 5 RUIM</span> &nbsp;&nbsp;
                    <span style="color: #D3E503; font-size:10pt;">6 A 10 MÉDIO</span> &nbsp;&nbsp;
                    <span style="color: #02D36F; font-size:10pt;">11 A 15 BOM</span>
                  </p>
                  <br>
                  <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
                    <tr>
                      <td width="33%" align="center" style="text-align:center;"  valign="top">
                        {onda1}
                      </td>
                      <td width="33%" align="center" style="text-align:center;"  valign="top">
                        {onda2}
                      </td>
                      <td width="33%" align="center" style="text-align:center;"  valign="top">
                        {onda3}
                      </td>
                    </tr>
                  </table>
                  <br>
                  <br>
                  <p>
                    <span style="font-size:14pt;">PERFORMANCE NAS ONDAS</span><br>
                    <p>{resultado}</p>
                  </p>
                  <br>
                  <p>
                    <span style="font-size:14pt;">DECODIFICANDO O VALOR</span>
                  </p>
                  <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
                    <tr>
                      <td width="33%" align="center" style="text-align:left; padding: 0px 7px 0px 0px;"  valign="top">
                        {valor1}
                      </td>
                      <td width="33%" align="center" style="text-align:left; padding: 0px 7px 0px 7px;"  valign="top">
                        {valor2}
                      </td>
                      <td width="33%" align="center" style="text-align:left; padding: 0px 0px 0px 7px;"  valign="top">
                        {valor3}
                      </td>
                    </tr>
                  </table>
                  <br><br><br><br>
                </span>
              </td>
            </tr>
        </table>
       </td>
     </tr>
      <tr>
         <td valign="top" style="background:transparent;padding:0cm 0cm 0cm 0cm">
            <div align="center">
               <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;background:white;border-collapse:collapse">
                  <tbody>
                     <tr>
                        <td valign="top" style="padding:0cm 0cm 0cm 0cm">
                           <table border="0" cellspacing="0" cellpadding="0" align="left" width="600" style="width:450.0pt;border-collapse:collapse">
                              <tbody>
                                 <tr>
                                    <td valign="top" style="padding:0cm 0cm 0cm 0cm">
                                       <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%">
                                          <tbody>
                                             <tr>
                                                <td style="background:black;padding:6.75pt 13.5pt 6.75pt 13.5pt; text-align:center;" align="center">
                                                      <span style="font-size:10.0pt;font-family:&quot;Tahoma&quot;,sans-serif;color:white">SIGA A ANA COUTO NAS REDES SOCIAIS :)</span>
                                                      <span style="font-size:10.0pt;font-family:&quot;arial black&quot;,sans-serif;color:white">
                                                        <br>
                                                        <br>
                                                      </span>
                                                      <span style="color:white">
                                                        <a href="https://www.facebook.com/anacouto.ag" title="&quot;Facebook&quot; t " target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.facebook.com/anacouto.ag&amp;source=gmail&amp;ust=1618975322695000&amp;usg=AFQjCNFc-7qvT2XhDxWSNB06LkydwKH_3w"><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,sans-serif;color:black;text-decoration:none">
                                                          <img border="0" width="30" height="32" style="width:.3125in;height:.3333in" id="m_-630656231746486721Imagem_x0020_5" src="http://www.anacouto.com.br/ondas/front/src/imgs/ico-facebook.jpg" data-image-whitelisted="" class="CToWUd"></a>
                                                      </span>
                                                      <span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,sans-serif;color:black">
                                                        &nbsp;
                                                        &nbsp;
                                                      </span>
                                                      <span style="color:white">
                                                        <a href="https://www.linkedin.com/company/anacouto-ag/" title="&quot;Linkedin&quot; t " target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.linkedin.com/company/anacouto-ag/&amp;source=gmail&amp;ust=1618975322695000&amp;usg=AFQjCNGnuqm52IghbrrMRDR0xB8YwcNSyg"><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,sans-serif;color:black;text-decoration:none">
                                                          <img border="0" width="30" height="32" style="width:.3125in;height:.3333in" id="m_-630656231746486721Imagem_x0020_4" src="http://www.anacouto.com.br/ondas/front/src/imgs/ico-linkedin.jpg" data-image-whitelisted="" class="CToWUd"></a>
                                                      </span>
                                                      <span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,sans-serif;color:black">
                                                        &nbsp;
                                                        &nbsp;</span>
                                                      <span style="color:white">
                                                        <a href="https://www.instagram.com/anacouto.ag" title="&quot;Instagram&quot; t " target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.instagram.com/anacouto.ag&amp;source=gmail&amp;ust=1618975322695000&amp;usg=AFQjCNH5WOQJxBdbtL8J3oaDVjC4XQbOxg"><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,sans-serif;color:black;text-decoration:none">
                                                          <img border="0" width="30" height="32" style="width:.3125in;height:.3333in" id="m_-630656231746486721Imagem_x0020_3" src="http://www.anacouto.com.br/ondas/front/src/imgs/ico-instagram.jpg" data-image-whitelisted="" class="CToWUd"></a>
                                                      </span>
                                                      <span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,sans-serif;color:black">
                                                        &nbsp;
                                                        &nbsp;
                                                      </span>
                                                      <span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,sans-serif;color:#666666">
                                                        <a href="https://www.youtube.com/channel/UCPWnE2DKZt4I9q_-zC3B5pg" title="YouTube" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://www.youtube.com/channel/UCPWnE2DKZt4I9q_-zC3B5pg&amp;source=gmail&amp;ust=1618975322696000&amp;usg=AFQjCNHVYU56p9sHDLQ0-kwIA300o7k_xQ"><span style="color:black;text-decoration:none">
                                                          <img border="0" width="30" height="32" style="width:.3125in;height:.3333in" id="m_-630656231746486721Imagem_x0020_2" src="http://www.anacouto.com.br/ondas/front/src/imgs/ico-youtube.jpg" data-image-whitelisted="" class="CToWUd"></a>
                                                      </span>
                                                      <span style="font-size:12.0pt;font-family:Helvetica;color:#666666"><u></u><u></u></span>
                                                      <span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,sans-serif;color:black">
                                                        <br><br>
                                                      </span>
                                                      <span style="color:white"><a href="http://www.anacouto.com.br/" title="&quot;Ana Couto&quot; t " target="_blank" data-saferedirecturl="https://www.google.com/url?q=http://www.anacouto.com.br/&amp;source=gmail&amp;ust=1618975322696000&amp;usg=AFQjCNF4p_kq-939onYjVpH0MgeL8oEQdg"><span style="font-size:12.0pt;font-family:&quot;Tahoma&quot;,sans-serif;text-decoration:none">
                                                        <img border="0" width="31" height="44" style="width:.3229in;height:.4583in" id="m_-630656231746486721Imagem_x0020_1" src="http://www.anacouto.com.br/ondas/front/src/imgs/ico-coutomon.jpg" data-image-whitelisted="" class="CToWUd"></a>
                                                      </span>
                                                      <span style="font-size:12.0pt;font-family:Helvetica;color:#666666">&nbsp;<u></u><u></u></span>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
      </tr>
      <tr>
         <td valign="top" style="background:transparent;padding:0cm 0cm 0cm 0cm">
            <div align="center">
               <table border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100.0%;border-collapse:collapse; background:#e4e4e4;">
                  <tbody>
                     <tr>
                        <td valign="top" style="padding:0cm 0cm 0cm 0cm">
                           <table border="0" cellspacing="0" cellpadding="0" align="left" width="600" style="width:450.0pt;border-collapse:collapse">
                              <tbody>
                                 <tr>
                                    <td valign="top" style="padding:0cm 0cm 0cm 0cm">
                                       <table border="0" cellspacing="0" cellpadding="0" align="left" width="600" style="width:450.0pt;border-collapse:collapse">
                                          <tbody>
                                             <tr>
                                                <td valign="top" style="padding:6.75pt 6.75pt 6.75pt 6.75pt" align="center">
                                                   <span style="font-size:8.5pt;font-family:Helvetica;color:#888888; text-align:center;">
                                                     Enviado por&nbsp;<b>Ana Couto</b><br>
                                                     Praça Santos Dumont, 80 - Gávea - Rio de Janeiro, RJ, Brasil<br>
                                                     Se deseja não receber mais mensagens como esta,&nbsp;<a href="https://app.rdstation.email/descadastrar/*UUID*" target="_blank" data-saferedirecturl="https://www.google.com/url?q=https://app.rdstation.email/descadastrar/*UUID*&amp;source=gmail&amp;ust=1618975322696000&amp;usg=AFQjCNHtXfxADyxYCPHFf1GCpc8r2T631Q"><span style="color:#333333">clique aqui</span></a>.
                                                   </span>
                                                </td>
                                             </tr>
                                          </tbody>
                                       </table>
                                    </td>
                                 </tr>
                              </tbody>
                           </table>
                        </td>
                     </tr>
                  </tbody>
               </table>
            </div>
         </td>
      </tr>
   </tbody>
</table>';

$ondas = array();
foreach($results['WAVE'] as $key => $_wave){
  if(!isset($_wave['TOTAL'])){continue;}
  $grd = "FF2C00";
  if($_wave['TOTAL'] > 5 ){
    $grd = "D3E503";
  }
  if($_wave['TOTAL'] > 10 ){
    $grd = "02D36F";
  }
  $ondas[] = '<span style="color: #'.$grd.'; font-size:30pt;"><b>'.(($_wave['TOTAL'] < 10) ? number_format(floatval($_wave['TOTAL']),"0") : $_wave['TOTAL'] ).'</b></span><br><span style="font-size:8pt;">ONDA '.$key.'</span><br><span style="font-size:8pt;">'.ReadJson::onlyWave($key)->name.'</span>';
}

$finals = array();
foreach($result_finals as $end){
  $finals[] = '<span style="font-size:12pt;"><b>'.$end->name.'</b></span><br><span style="font-size:8pt;">'.$end->desc.'</span><br><br><span style="font-size:10pt;">'.$end->result.'</span><br>';
}
$wave = str_replace('*',' ',$wave);
$mail = str_replace(
  array('{marca}','{onda1}','{onda2}','{onda3}','{resultado}','{valor1}','{valor2}','{valor3}'),
  array(mb_strtoupper($marca),$ondas[0],$ondas[1],$ondas[2],$wave,$finals[0],$finals[1],$finals[2]),
  $template
);

$subject = "Resultado do seu teste nas Ondas de Branding";
$from = "Agência Ana Couto <contato@anacouto.com.br>";
$email_reply = $from;
$email_destinatario = $email;
$email_headers = implode ( "\n",array ( "From: $from", "Reply-To: $email_reply", "Subject: $subject","Return-Path: $from","MIME-Version: 1.0","X-Priority: 3","Content-Type: text/html; charset=UTF-8" ) );
@mail ($email_destinatario, $subject, $mail, $email_headers);
