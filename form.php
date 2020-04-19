<html>
  <head>
    <style>
.error {
  border: 2px solid red;
}
.content{
  text-align: center;
padding: 5px;
margin-top: 50px;
background-color: #20B2AA;
}
    </style>
  </head>
  <body class="content">

<?php
if (!empty($messages)) {
  print('<div id="messages">');
  // Выводим все сообщения.
  foreach ($messages as $message) {
    print($message);
  }
  print('</div>');
}
?>

    <form action="" method="POST">
      <p>Имя:</p>
        <input name="fio" <?php if ($errors['fio']) {print 'class="error"';} ?> value="<?php print $values['fio']; ?>" />
      <p>Email:</p>
        <input name="email" <?php if ($errors['email']) {print 'class="error"';} ?> value="<?php print $values['email']; ?>" />
      <p>Год рождения:</p>
        <select name="year">
          <?php for($i = 1900; $i < 2020; $i++) { ?>
            <option value="<?php print $i; ?>"<?= $i == $values['year'] ? 'selected' : ""?>><?= $i; ?></option>
          <?php } ?>
          <?php if ($errors['year']) {print 'class="error"';}?>
        </select>
      <p>Пол:</p>
        <p> <input type="radio" name="sex" value="1" checked <?php echo $values['sex'] == "1" ? 'checked="checked"' :""?>>Мужской</p>
        <p> <input type="radio" name="sex" value="2" <?php echo $values['sex'] == "2" ? 'checked="checked"' :""?>>Женский</p>
      <p>Конечности:</p>
        <p><input type="radio" name="limbs" value="1" checked <?php echo $values['limbs'] == "1" ? 'checked="checked"' :""?>>1</p>
        <p><input type="radio" name="limbs" value="2" <?php echo $values['limbs'] == "2" ? 'checked="checked"' :""?>>2</p>
        <p><input type="radio" name="limbs" value="3" <?php echo $values['limbs'] == "3" ? 'checked="checked"' :""?>>3</p>
        <p><input type="radio" name="limbs" value="4" <?php echo $values['limbs'] == "4" ? 'checked="checked"' :""?>>4</p>
      <p>Способности:</p>
        <select name="abilities[]" multiple <?php if ($errors['abilities']) {print 'class="error"';}?>>
        <?php
        foreach ($ability_labels as $key => $value) {
          ?>
          <option value="<? $key; ?>"><?= $value; ?></option>
        <?php } ?>
        </select>
      <p>Биография</p>
        <textarea rows="5" cols="30" name="bio" <?php if ($errors['bio']) {print 'class="error"';}?>><?php print $values['bio'];?></textarea><br>
      <p <?php if ($errors['contract']) {print 'class="error"';} ?>><input type="checkbox" name="contract"<?=$values['contract']=="on"? 'checked="checked"':"";?>>С контрактом ознакомлен</p>
      <p><input type="submit" value="ok" /></p>
    </form>
  </body>
</html>
