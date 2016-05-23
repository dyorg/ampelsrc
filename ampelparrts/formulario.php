<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<form id="main-contact-form1" name="contact-form" action="enviar.php" method="post">
    <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="col-sm-6">
        <div class="form-group">
          <input type="text" name="name" class="form-control" placeholder="Nome" required="required">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <input type="email" name="email" class="form-control" placeholder="E-mail" required="required">
        </div>
      </div>
    </div>
    <div class="form-group">
      <input type="text" name="subject" class="form-control" placeholder="Assunto" required="required">
    </div>
    <div class="form-group">
      <textarea name="message" id="message" class="form-control" rows="4" placeholder="Escreva sua Mensagem" required="required"></textarea>
    </div>                        
    <div class="form-group">
      <button type="submit" class="btn-submit">Enviar</button>
    </div>
</form>   

</body>
</html>