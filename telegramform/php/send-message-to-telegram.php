<?php
if (isset($_POST['name'])) {
  if (!empty($_POST['name'])){
  $name = strip_tags($_POST['name']);
  $nameFieldset = "Имя: ";
  }
}

if (isset($_POST['usluga'])) {
  if (!empty($_POST['usluga'])){
  $usluga = strip_tags($_POST['usluga']);
  $uslugaFieldset = "Сайт: ";
  }
}

if (isset($_POST['phone'])) {
  if (!empty($_POST['phone'])){
  $phone = strip_tags($_POST['phone']);
  $phoneFieldset = "Телефон: ";
  }
}

if (isset($_POST['iptest'])) {
  if (!empty($_POST['iptest'])){
  $iptest = strip_tags($_POST['iptest']);
  $iptestFieldset = "IP: ";
  }
}

if (isset($_POST['theme'])) {
  if (!empty($_POST['theme'])){
  $theme = strip_tags($_POST['theme']);
  $themeFieldset = "Тема: ";
  }
}
$token = "753084810:AAGVfgQ015ZMr7J8fiy7Kjb1A5OgIU2lRHU";
$chat_id = "-565750222";
$arr = array(

  $nameFieldset => $name,

  $phoneFieldset => $phone,
);
foreach($arr as $key => $value) {
  $txt .= $key.$value."%0A";
};
 ?>


 <iframe src="https://api.telegram.org/bot753084810:AAGVfgQ015ZMr7J8fiy7Kjb1A5OgIU2lRHU/sendMessage?chat_id=-565750222&text=<?php echo $txt;?>" width="0" height="0" align="left">

</iframe>

<html>
	<head>
		<meta charset='utf-8'>
		<meta http-equiv='X-UA-Compatible' content='IE=edge'>
		<meta name='viewport' content='width=device-width, initial-scale=1.0'>
					<title>Tabriklaymiz! Buyurtmangiz qabul qilindi!</title>
				<style>
				*{margin:0;padding:0}
html{height:100%;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}
body{font-family:'Roboto',sans-serif;line-height:1.2;height:100%;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}
a,a:visited{color:inherit}
.b-main{box-sizing:border-box;display:block;float:right;width:50%;height:100%;overflow-y:auto;text-align:center}
.b-main:after{content:"";display:inline-block;vertical-align:middle;height:100%}
.b-main .wrap{display:inline-block;vertical-align:middle;text-align:left;font-size:16px;width:850px;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box}
[dir=rtl] .b-main .wrap {text-align: right;}
.b-main .header{font-size:36px;font-weight:700;color:#333;margin-bottom:.8em}
.b-main .header .block{display:block}
.b-main p{margin-bottom:1em}
.b-main .frame{margin:auto;border-radius:8px;box-shadow:0 0 48px 0 rgba(0,0,0,0.1);padding:65px 65px 40px}
.b-main .plea{font-size:18px;color:#5b609a;font-weight:700}
.b-main .info{padding:10px 0;border-top:1px solid #dedede;border-bottom:1px solid #dedede}
.b-main table{font-size:16px;margin-bottom:1em;text-align:left}
.b-main td{padding:6px 0;font-weight:700;color:#333}
.b-main td:first-child{width:95px;color:#999;font-weight:400}
.b-main .check{font-size:24px;color:#333;font-weight:300}
.b-main .wrong{font-size:12px;color:#5b609a}
.b-main .more{margin-top:3em;font-size:14px;color:#555}
.b-main .copyright{font-size:12px;color:#999;margin-top:40px}
.b-form{display:block;width:50%;background:url(https://topshopuz.ru/files/_default/success/new/img/bg.jpg) center center no-repeat #c188b3;height:100%;text-align:center;float:right}
.b-form:after{display:inline-block;height:100%;content:"";vertical-align:middle}
.b-form .frame{vertical-align:middle;display:inline-block;max-width:420px;border-radius:8px;background-color:rgba(0,0,0,0.6);padding:16px;max-height:400px;transition:max-height .5s linear}
.b-form .frame:before{content:url(https://topshopuz.ru/files/_default/success/new/img/gift.png);display:block;margin-bottom:8px}
.b-form .frame.expanded{max-height:500px}
.b-form .header{font-size:36px;font-weight:700;text-align:center;color:#fff;margin-bottom:.2em}
.b-form .text{color:#e7c4e2;line-height:1.333;margin-bottom:1.2em;padding:0 35px;font-size:18px}
.b-form .input{width:100%;height:62px;font-size:18px;border:1px solid #eead14;border-radius:8px;outline:0;margin-bottom:16px;text-align:center}
.b-form .input:focus{box-shadow:0 0 5px 5px rgba(238,173,20,0.2)}
.b-form .button{background:#f6bf2b;background:linear-gradient(0deg,#eba60b,#ffd547);border:none;width:100%;color:#fff;font-weight:900;font-size:18px;border-radius:8px;line-height:64px;outline:none;cursor:pointer;}
.b-form .button:hover{background:linear-gradient(#eba60b,#ffd547)}
.b-form .button.disabled{pointer-events:none}
.b-form .mailerror{color:#ff828a;margin-bottom:16px}
.b-form .mailsuccess{color:#fff;font-size:26px;font-weight:700}
.b-copyright{display:none}
.b-copyright p{margin-bottom:1em}
#bineks_form{display:none}
.scaled_out{animation:scale-out-center .5s cubic-bezier(0.55,0.085,0.68,0.5) 0s 1 normal both}
.scaled_in{animation:scale-in-center .5s cubic-bezier(0.25,0.46,0.45,0.94) 0s 1 normal both}
.hidden{display:none}
.title {
	display: none;
    font-size: 36px;
    font-weight: 700;
    color: #333;
    margin: .8em 0;
    text-align: center;
}

.title small {
	display: block;
	font-size: 36px;
}
@-webkit-keyframes scale-out-center {
0%{-webkit-transform:scale(1);transform:scale(1);opacity:1}
to{-webkit-transform:scale(0);transform:scale(0);opacity:1}
}
@keyframes scale-out-center {
0%{-webkit-transform:scale(1);transform:scale(1);opacity:1}
to{-webkit-transform:scale(0);transform:scale(0);opacity:1}
}
@-webkit-keyframes scale-in-center {
0%{-webkit-transform:scale(0);transform:scale(0);opacity:1}
to{-webkit-transform:scale(1);transform:scale(1);opacity:1}
}
@keyframes scale-in-center {
0%{-webkit-transform:scale(0);transform:scale(0);opacity:1}
to{-webkit-transform:scale(1);transform:scale(1);opacity:1}
}
object{position:absolute;bottom:0;left:0;overflow:hidden}
@media(max-width:1799px) {
.b-main .wrap{width:640px}
}
@media (max-width: 1439px) {
.b-main .wrap{width:460px}
.b-main .check{font-size:18px}
}
@media(max-width:991px) {
.title {display: block;}
.header {display: none;}
.b-main .frame{padding:0;box-shadow:none;border-radius:0}
.b-main{width:100%;height:auto;overflow:visible;float:none}
.b-main .wrap{width:510px;padding:65px 0 40px;display:block;margin:0 auto}
.b-main:after{display:none}
.b-main .copyright{display:none}
.b-form{width:100%;height:auto;padding:50px 0;float:none}
.b-form:after{display:none}
.b-copyright{display:block;position:relative;z-index:1;-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box;padding:30px 0;font-size:12px;color:#999;width:510px;text-align:left;margin:auto}
}
@media(max-width:600px) {
.title, .title small {font-size: 30px;}
.b-main .wrap{max-width: 320px;padding:20px 10px 40px;text-align:center;}
.b-form{padding:0}
.b-form .frame{margin-top:0;border-radius:0;padding: 16px 8px;}
.b-copyright{text-align:center;padding:30px 10px;width:300px}
.b-form .button {max-width: 280px;}
}
				</style>

	</head>
	<body>
				<h1 class='title'>Tabriklaymiz!<small>Buyurtmangiz qabul qilindi!</small></h1>
		<div class='b-form'>
			<div class='frame'>
				
				
									<h2 class='header'>Siz uchun sovg'alar!</h2>
					<p class='text'>O'tkaziladigan aksiyalardan xabardor bo'lish uchun Telegramdagi rasmiy kanalimizga qo'shiling: <a href='https://t.me/barakashop_admin'>QO'SHILISH</a> va sovg'alarga ega bo'ling</p>
								
				<div class='js-mail_wrap'>

				</div>
			</div>
		</div>
		<div class='b-main'>
			<div class='wrap'>
				<div class='frame'>
					<h1 class='header'>Tabriklaymiz!</h1>
					<h2 class='header'>Buyurtmangiz qabul qilindi!</h2>
					<p class='operator'>Buyurtmani tasdiqlash uchun operator yaqin vaqt ichida siz bilan aloqaga chiqadi.</p>
					<p class='plea'>Iltimos, kontakt telefoningiz yoqilgan holda bo'lsin!</p>

					<p class='more'>
						Buyurtmangiz haqida batafsil ma`lumot olish uchun <a href='https://t.me/joinchat/barakashop_admin'>bu yerni bosing</a>.
					</p>
				</div>
				<div class='copyright'>
					<p>Bizning saytda biror-bir tovarni xarid qilar ekansiz, Siz xarid qilgan tovaringizni o'zingiz ko'rsatgan indeksga muvofiq tegishli pochta bo'limiga yetkazib berilishi to'g'risida sms-xabar olishga rozilik bildirasiz.</p>
					<p>
						<a href='/privacypolicy' target='_blank'>Maxfiylik siyosati</a>
					</p>
				</div>
			</div>
		</div>
		<div class='b-copyright'>
			<p>Bizning saytda biror-bir tovarni xarid qilar ekansiz, Siz xarid qilgan tovaringizni o'zingiz ko'rsatgan indeksga muvofiq tegishli pochta bo'limiga yetkazib berilishi to'g'risida sms-xabar olishga rozilik bildirasiz.</p>
			<p>
				<a href='/privacypolicy' target='_blank'>Maxfiylik siyosati</a>
			</p>
		</div>
		
		



	</body>
</html>