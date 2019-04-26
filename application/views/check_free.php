<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title></title>
    <link rel="stylesheet" type="text/css" href="/css/normalize.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <script type="text/javascript"></script>
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
    <?php echo form_open('/Marketing_summit/free_complete'); ?>
    <?php echo form_hidden('key', TRUE) ?>
    <?php echo form_hidden('pass', $_POST['pass']) ?>
        <article class="main-article cool-forms">
            <header>
                <h1 class="title page-title"><span>選択したパス</span></h1>
            </header>

            <div class="position-basic mb45">
                <table class="form01">
                    <!-- ビジターの場合 //-->
                    <?php if ($_POST['pass'] == 1) : ?>
                    <tr>
                        <td class="td-left">ビジターパス</td>
                        <td class="td-right">0円</td>
                    </tr>
                    <!-- 招待コードの場合 //-->
                    <?php else : ?>
                    <tr>
                        <td class="td-left" style="padding-bottom:0;">プレミアムパス(招待)</td>
                        <td class="td-right" style="padding-bottom:0;">0円</td>
                    </tr>
                    <tr>
                        <td colspan="2">　└ 招待コード： <?php echo $_POST['code'] ?></td>
                    </tr>
                    <?php echo form_hidden('code', $_POST['code']) ?>
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
            <?php echo form_hidden('session01', $session01) ?>
            <?php echo form_hidden('session02', $session02) ?>
            <?php echo form_hidden('session03', $session03) ?>
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
                
            </div>

            <header>
                <h1 class="title page-title"><span>支払情報</span></h1>
            </header>
            <div class="position-basic">
                <div class="single singles-height">
                    <span class="pay-total">お支払はありません。</span>
                </div>
            </div>

            <div class="tc">
                <a href="javascript:history.back()" class="submit">修正する</a>
                <input type="submit" class="submit-button" value="申し込む">
            </div>
        </article>
    </form>

</div>

</body>
</html>
   