<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title></title>
    <link rel="stylesheet" type="text/css" href="/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css" >
    <script type="text/javascript"></script>
</head>
<body>
<div class="entry-form-header">
Next Marketing Summit 2019
</div>
<div class="process">
    <div class="action now"><span class="circle">1</span>パス種類の選択</div>
    <div class="action"><span class="circle">2</span>参加者情報入力、希望セッション選択</div>
    <div class="action"><span class="circle">3</span>確認、支払情報の入力</div>
    <div class="action"><span class="circle">4</span>申込み完了</div>
</div>

<div class="form-wrap">
<?php echo form_open(); ?>
    <article class="main-article cool-forms">
        <header>
            <h1 class="title page-title"><span>パス種類</span></h1>
        </header>

        <p class="main-text">なぜそんな無闇をしたと聞く人があるかも知れぬ。<br />別段深い理由でもない。<br />新築の二階から首を出していたら、同級生の一人が冗談に、いくら威張っても、そこから飛び降りる事は出来まい。</p>

        <div class="position-basic mb45">
            <?php echo form_open('/marketing_summit/input'); ?>
            <table class="form01">
                <tr>
                    <td class="td-left"><label><input type="radio" name="pass" value=1> ビジターパス</label></td>
                    <td class="td-right">0円</td>
                </tr>
                <tr>
                    <td class="td-left"><label><input type="radio" name="pass" value=2> プレミアムパス</label></td>
                    <td class="td-right">14,800円</td>
                </tr>
                <tr>
                    <td class="td-left" style="padding-bottom:0;"><label><input type="radio" name="pass" value=3> プレミアムパス(招待)</label></td>
                    <td class="td-right" style="padding-bottom:0;">0円</td>
                </tr>
                <tr>
                    <td colspan="2">　└ 招待コード <input type="text" class="invite-code" name="code"
                                                    placeholder="招待コードを入力"/>
                        <span class="error-type01"><?php if (isset($_GET['applicant_code'])){ echo "※招待コードが違います。";}?></span></td>
                        <span class="error-type01"><?php echo form_error('pass'); ?></span>
                </tr>
            </table>
        </div>
        <div class="tc">
            <input type="submit" class="submit-button" name="submit" value="申込む">
        </div>
        <div class="tc">
            <p>以下のお支払い方法がご利用できます。<br />いずれもメールにて領収書を発行いたします。</p>
            <img src="/img/viza.png" title="VISA" class="credit-icon-v" /><img src="/img/master.png" title="Mastercard" class="credit-icon-m" /><span class="invoice">請求書</span>
        </div>
    </article>
</form>
<div class="tr">
    <a href="ticket_b">アプリのマーケッター・プロデューサー以外の方の申込みはこちらから &gt;&gt;</a>
</div>

</div>

</body>
</html>
   