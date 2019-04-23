<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title></title>
    <link rel="stylesheet" type="text/css" href="/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
      $(function() {
        $(".cvc-information").on('mousedown', function(){
          $(".cvc-info-popup").css("display", "block");
        })
        $("body").on('click', function(){
          $(".cvc-info-popup").css("display", "none");
        })

        $(".credit-radio").on('click', function(){
          $(".credit-use").css("display", "block");
          $(".invoice-use").css("display", "none");
        })
        $(".invoice-radio").on('click', function(){
          $(".credit-use").css("display", "none");
          $(".invoice-use").css("display", "block");
        })
      });
    </script>
</head>
<body>
<div class="entry-form-header">
    Next Marketing Summit 2019
</div>

<div class="process">
    <div class="action done"><span class="circle">1</span>パス種類の選択</div>
    <div class="action done"><span class="circle">2</span>参加者情報入力、希望セッション選択</div>
    <div class="action now"><span class="circle">3</span>確認、支払情報の入力</div>
    <div class="action"><span class="circle">4</span>申込み完了</div>
</div>

<div class="form-wrap">
    <?php echo form_open('/Marketing_summit/pay_complete'); ?>
    <?php echo form_hidden('pass', $_POST['pass']) ?>
        <article class="main-article cool-forms">
            <header>
                <h1 class="title page-title"><span>選択したパス</span></h1>
            </header>

            <div class="position-basic mb45">
                <table class="form01">
                    <!-- アプリプレミアムパスの場合 //-->
                    <?php if ($_POST['pass'] == 2) : ?>
                    <tr>
                        <td class="td-left">プレミアムパス</td>
                        <td class="td-right">14,800円</td>
                    </tr>
                    <!-- その他プレミアムパスの場合 //-->
                    <?php elseif ($_POST['pass'] == 4) : ?>
                    <tr>
                        <td class="td-left" style="padding-bottom:0;">プレミアムパス</td>
                        <td class="td-right" style="padding-bottom:0;">29,800円</td>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
        </article>

        <article class="main-article cool-forms">
            <header>
                <h1 class="title page-title"><span>参加者情報確認</span></h1>
            </header>
            <div class="position-basic">

                <h3>会社名</h3>
                <div class="single confirm">
                    <?php if ($_POST['company'] == "") : ?>
                    未入力
                    <?php else : ?>
                    <?php echo $_POST['company'] ?>
                    <?php endif; ?>
                </div>
                <?php echo form_hidden('company', $_POST['company']) ?>
                <h3>部署名</h3>
                <div class="single confirm">
                   <?php if ($_POST['department'] == "") : ?>
                    未入力
                    <?php else : ?>
                    <?php echo $_POST['department'] ?>
                    <?php endif; ?>
                </div>
                <?php echo form_hidden('department', $_POST['department']) ?>
                <h3>役職名</h3>
                <div class="single confirm">
                    <?php if ($_POST['position'] == "") : ?>
                    未入力
                    <?php else : ?>
                    <?php echo $_POST['position'] ?>
                    <?php endif; ?>
                </div>
                <?php echo form_hidden('position', $_POST['position']) ?>               
                <h3>ご利用者氏名</h3>
                <div class="double confirm">
                   <?php echo $_POST['first_name']." ".$_POST['last_name'] ?>
                </div>
                <?php echo form_hidden('first_name', $_POST['first_name']) ?>
                <?php echo form_hidden('last_name', $_POST['last_name']) ?>
                <h3>ご利用者氏名(よみ)</h3>
                <div class="double confirm">
                    <?php echo $_POST['first_name_hiragana']." ".$_POST['last_name_hiragana'] ?>
                </div>
                <?php echo form_hidden('first_name_hiragana', $_POST['first_name_hiragana']) ?>
                <?php echo form_hidden('last_name_hiragana', $_POST['last_name_hiragana']) ?>
                <h3>メールアドレス</h3>
                <div class="single confirm">
                     <?php echo $_POST['email'] ?>
                </div>
                <?php echo form_hidden('email', $_POST['email']) ?>
                <h3>電話番号</h3>
                <div class="single confirm">
                    <?php echo $_POST['tel']?>
                </div>
                <?php echo form_hidden('tel', $_POST['tel']) ?>
                <h3>属性</h3>
                <div class="single confirm singles-height mb20">
                    <?php echo $_POST['attribute']?>
                </div>
                <?php echo form_hidden('attribute', $_POST['attribute']) ?>
            </div>
            <?php echo form_hidden('session01', $_POST['session01']) ?>
            <?php echo form_hidden('session02', $_POST['session02']) ?>
            <?php echo form_hidden('session03', $_POST['session03']) ?>
            <header>
                <h1 class="title page-title"><span>選択したセッション</span></h1>
            </header>
            <div class="position-basic">
                <?php foreach ($sessions as $session) : ?>
                <h2><?php echo $session->time_id ?></h2>
                <div class="single singles-height mb45">
                <span class="confirm"><strong><?php echo $session->meeting_place ?></strong><?php echo $session->contents ?></span>
                </div>
                <?php if ($session->meeting_place == "A会場"): ?>
                    <span class="admission-fee">プレミアム</span>
                <?php endif; ?>
                <?php endforeach; ?>
                <div class="tc">
                    <a href="javascript:history.back()" class="submit">修正する</a>
                </div>

            </div>

            <header>
                <h1 class="title page-title"><span>支払情報</span></h1>
            </header>
            <div class="position-basic">
                <h2>お支払い方法</h2>
                <div class="single singles-height mb20">
                    <label><input type="radio" class="credit-radio" name="payment" value="クレジットカード" <?php if(set_value('payment') == "クレジットカード"){ print "checked";}?>> クレジットカード</label>  <img src="./img/viza.png" title="VISA" class="credit-icon-v-min" /><img src="./img/master.png" title="Mastercard" class="credit-icon-m-min" /><br />
                    <label><input type="radio" class="invoice-radio" name="payment" value="請求書" <?php if(set_value('payment') == "請求書"){ print "checked";}?>> 請求書</label><br />
                </div>

                <div class="credit-use">
                    <h2>お支払い金額</h2>
                    <div class="single singles-height">
                         <!-- アプリプレミアムパスの場合 //-->
                        <?php if ($_POST['pass'] == 2) : ?>
                            <span class="pay-total">14,800円</span>
                        <!-- その他プレミアムパスの場合 //-->
                        <?php elseif ($_POST['pass'] == 4) : ?>
                            <span class="pay-total">29,800円</span>
                        <?php endif; ?>
                    </div>

                    <h2>クレジットカード番号</h2>
                    <div class="single singles-height">
                        <input type="text" name="" placeholder="">
                    </div>
                    <h2>CVC(セキュリティコード) <span class="cvc-information">CVCとは?<span class="cvc-info-popup">CVCとは、クレジットカードの裏面に記載されている3ケタの暗証番号です。Visa、MasterCardでは、ほとんどの場合、カード裏面の署名欄に記載されています。<span class="close">×</span></span></span></h2>
                    <div class="single singles-height">
                        <input type="text" class="cvc-input" name="" placeholder="">
                    </div>
                    <h2>有効期限</h2>
                    <div class="single singles-height">
                        <input class="month-limit" type="text" name="" placeholder="MM">月 / <input class="year-limit" type="text" name="" placeholder="YY">年
                    </div>
                    <h2>領収書宛名(カード名義と共通でなくてかまいません)</h2>
                    <div class="single singles-height">
                        <input type="text" name="" placeholder="例：株式会社ネクストマーケティング">
                    </div>
                </div>

                <div class="invoice-use">
                    <h2>お支払い金額</h2>
                    <div class="single singles-height">
                        <!-- アプリプレミアムパスの場合 //-->
                        <?php if ($_POST['pass'] == 2) : ?>
                            <span class="pay-total">14,800円</span>
                        <!-- その他プレミアムパスの場合 //-->
                        <?php elseif ($_POST['pass'] == 4) : ?>
                            <span class="pay-total">29,800円</span>
                        <?php endif; ?>                   
                    </div>

                    <h2>請求書・領収書宛名(カード名義と共通でなくてかまいません)</h2>
                    <div class="single singles-height">
                        <input type="text" name="receipt_address" placeholder="例：株式会社ネクストマーケティング">
                        <span class="error-type02"><?php echo form_error('receipt_address'); ?></span>
                    </div>
                </div>


            </div>

            <div class="tc">
                <input type="submit" class="submit-button" name="submit" value="申込む">
            </div>
        </article>
    </form>

</div>

</body>
</html>
   
