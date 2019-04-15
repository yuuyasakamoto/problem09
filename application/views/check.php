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
    <form>

        <article class="main-article cool-forms">
            <header>
                <h1 class="title page-title"><span>選択したパス</span></h1>
            </header>

            <div class="position-basic mb45">
                <table class="form01">
                    <!-- 招待コードない場合 //-->
                    <tr>
                        <td class="td-left">プレミアムパス</td>
                        <td class="td-right">29,800円</td>
                    </tr>

                    <!-- 招待コードある場合 //-->
                    <tr>
                        <td class="td-left" style="padding-bottom:0;">プレミアムパス(招待)</td>
                        <td class="td-right" style="padding-bottom:0;">0円</td>
                    </tr>
                    <tr>
                        <td colspan="2">　└ 招待コード： 123456</td>
                    </tr>

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
                    株式会社ネクストマーケティング
                </div>
                <h3>部署名</h3>
                <div class="single confirm">
                    メディア戦略部
                </div>
                <h3>役職名</h3>
                <div class="single confirm">
                    <span>未入力</span>
                </div>

                <h3>ご利用者氏名</h3>
                <div class="double confirm">
                    一二三 四五郎
                </div>
                <h3>ご利用者氏名(よみ)</h3>
                <div class="double confirm">
                    ひふみ しごろう
                </div>
                <h3>メールアドレス</h3>
                <div class="single confirm">
                    sample@example.co.jp
                </div>

                <h3>電話番号</h3>
                <div class="single confirm">
                    0355551234
                </div>

                <h3>属性</h3>
                <div class="single confirm singles-height mb20">
                    アプリ事業者：ゲーム
                </div>

            </div>


            <header>
                <h1 class="title page-title"><span>選択したセッション</span></h1>
            </header>
            <div class="position-basic">
                <h2>11:00 ～ 12:00</h2>
                <div class="single singles-height mb45">
                    <span class="confirm"><strong>B会場</strong> ファンを増やす「コミュニティ作り」や「ユーザーとの向き合い方」</span>
                </div>

                <h2>12:30 ～ 14:00</h2>
                <div class="single singles-height mb45">
                    <span class="confirm"><strong>A会場</strong> ファンを増やす「コミュニティ作り」や「ユーザーとの向き合い方」</span> <span class="admission-fee">プレミアム</span>
                </div>


                <div class="tc">
                    <input type="button" class="submit" name="back" value="修正する">
                </div>

            </div>

            <header>
                <h1 class="title page-title"><span>支払情報</span></h1>
            </header>
            <div class="position-basic">
                <h2>お支払い方法</h2>
                <div class="single singles-height mb20">
                    <label><input type="radio" class="credit-radio" name="sample02" value=""> クレジットカード</label>  <img src="./img/viza.png" title="VISA" class="credit-icon-v-min" /><img src="./img/master.png" title="Mastercard" class="credit-icon-m-min" /><br />
                    <label><input type="radio" class="invoice-radio" name="sample02" value=""> 請求書</label><br />
                </div>

                <div class="credit-use">
                    <h2>お支払い金額</h2>
                    <div class="single singles-height">
                        <span class="pay-total">2,488,000 円</span>
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
                        <span class="pay-total">2,488,000 円</span>
                    </div>

                    <h2>請求書・領収書宛名(カード名義と共通でなくてかまいません)</h2>
                    <div class="single singles-height">
                        <input type="text" name="" placeholder="例：株式会社ネクストマーケティング">
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
   
