<?php
//---Кодировка
  mb_internal_encoding('UTF-8');
  mb_http_output('UTF-8');
  mb_http_input('UTF-8');
  mb_regex_encoding('UTF-8');
//---Кодировка

  $arr = array('Россия', 'Франция', 'Италия');
  $country = $arr[rand(0,count($arr))]."";
  $news =  simplexml_load_file('https://ru.wikipedia.org/w/api.php?action=query&prop=revisions&rvprop=content&format=xml&titles='.$country.'&rvsection=0');
  foreach($news->query->pages->page->revisions as $item) {
        $capital = $item->rev."";
        // or die("Тыкни на кнопку еще раз");
        //И тут разболелась голова и мне было в падлу ебаться с регулярными выражениями!
        $capital = stristr($capital, '|Столица');
        $capital = stristr($capital, '}}', true);
        if(iconv_strlen($capital, 'UTF-8')>1){
          $capital = stristr($capital, 'Флагификация|');
          $capital = stristr($capital, '|'); 
        }
  }
?>
<?php
        if( isset( $_POST['action'] ) )
          {
        echo $capital;
        } 
?>
<title>Один хуй угадаешь страну :D</title>
<h4>Страна: </h4><h2><?php echo $country; ?><h2>
<form method="POST">
<input type="submit" name="action" value="Ответ" />
</form>
<!--#Маты by http://www.tema.ru/main.html -->