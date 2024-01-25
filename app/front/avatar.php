<?php require_once("./header.php"); ?>

<?php
if ($_POST == []) {
    //処理なし
} else {
    setAvatarIdToPlayers($_POST);
    $selectedAvatar = isset($_POST['avatar']) ? $_POST['avatar'] : '';
}
?>

<div class="c-wrapper">
    <div class="c-nav-breadcrumb">
        <ol>
            <li><a href="../front">TOP</a></li>
            <li>アバター 一覧</li>
        </ol>
    </div>
    <form  action="" method="post" class="p-avatar">
        <h2 class="c-heading">アバター 一覧</h2>
        <div class="p-avatar__wrap">
            <ul class="p-avatar__wrap-list">
                <li>
                    <button name="avatar" value="king" class="c-avatar <?php echo ($selectedAvatar === 'king') ? 'selected' : ''; ?>">
                        <div class="c-avatar__img">
                            <img src="./img/avatar/king.png" alt="">
                        </div>
                        <p>王様</p>
                    </button>
                </li>
                <li>
                    <button name="avatar" value="tengu" class="c-avatar <?php echo ($selectedAvatar === 'tengu') ? 'selected' : ''; ?>">
                        <div class="c-avatar__img">
                            <img src="./img/avatar/tengu.png" alt="">
                        </div>
                        <p>天狗</p>
                    </button>
                </li>
                <li>
                    <button name="avatar" value="kappa" class="c-avatar <?php echo ($selectedAvatar === 'kappa') ? 'selected' : ''; ?>">
                        <div class="c-avatar__img">
                            <img src="./img/avatar/kappa.png" alt="">
                        </div>
                        <p>かっぱ</p>
                    </button>
                </li>
            </ul>
            <ul class="p-avatar__wrap-list">
                <li>
                    <button name="avatar" value="gitHubNeko" class="c-avatar <?php echo ($selectedAvatar === 'gitHubNeko') ? 'selected' : ''; ?>">
                        <div class="c-avatar__img">
                            <img src="./img/avatar/gitHubNeko.png" alt="">
                        </div>
                        <p>G◯tHubネコ</p>
                    </button>
                </li>
                <li>
                    <button name="avatar" value="capybara" class="c-avatar <?php echo ($selectedAvatar === 'capybara') ? 'selected' : ''; ?>">
                        <div class="c-avatar__img">
                            <img src="./img/avatar/capybara.png" alt="">
                        </div>
                        <p>カピバラ</p>
                    </button>
                </li>
                <li>
                    <button name="avatar" value="dockerWhale" class="c-avatar <?php echo ($selectedAvatar === 'dockerWhale') ? 'selected' : ''; ?>">
                        <div class="c-avatar__img">
                            <img src="./img/avatar/dockerWhale.png" alt="">
                        </div>
                        <p>D◯ckerくじら</p>
                    </button>
                </li>
                <li>
                    <button name="avatar" value="phpElephant" class="c-avatar <?php echo ($selectedAvatar === 'phpElephant') ? 'selected' : ''; ?>">
                        <div class="c-avatar__img">
                            <img src="./img/avatar/phpElephant.png" alt="">
                        </div>
                        <p>P◯Pゾウ</p>
                    </button>
                </li>
                <li>
                    <button name="avatar" value="alpaca" class="c-avatar <?php echo ($selectedAvatar === 'alpaca') ? 'selected' : ''; ?>">
                        <div class="c-avatar__img">
                            <img src="./img/avatar/alpaca.png" alt="">
                        </div>
                        <p>アルパカ</p>
                    </button>
                </li>
                <li>
                    <button name="avatar" value="dog" class="c-avatar <?php echo ($selectedAvatar === 'dog') ? 'selected' : ''; ?>">
                        <div class="c-avatar__img">
                            <img src="./img/avatar/dog.png" alt="">
                        </div>
                        <p>犬</p>
                    </button>
                </li>
            </ul>
            <ul class="p-avatar__wrap-list">
                <li>
                    <button name="avatar" value="officeWorker1" class="c-avatar <?php echo ($selectedAvatar === 'officeWorker1') ? 'selected' : ''; ?>">
                        <div class="c-avatar__img">
                            <img src="./img/avatar/officeWorker1.png" alt="">
                        </div>
                        <p>サラリーマン1</p>
                    </button>
                </li>
                <li>
                    <button name="avatar" value="officeWorker2" class="c-avatar <?php echo ($selectedAvatar === 'officeWorker2') ? 'selected' : ''; ?>">
                        <div class="c-avatar__img">
                            <img src="./img/avatar/officeWorker2.png" alt="">
                        </div>
                        <p>サラリーマン2</p>
                    </button>
                </li>
                <li>
                    <button name="avatar" value="student" class="c-avatar <?php echo ($selectedAvatar === 'student') ? 'selected' : ''; ?>">
                        <div class="c-avatar__img">
                            <img src="./img/avatar/student.png" alt="">
                        </div>
                        <p>学生</p>
                    </button>
                </li>
                <li>
                    <button name="avatar" value="child" class="c-avatar <?php echo ($selectedAvatar === 'child') ? 'selected' : ''; ?>">
                        <div class="c-avatar__img">
                            <img src="./img/avatar/child.png" alt="">
                        </div>
                        <p>園児</p>
                    </button>
                </li>
                <li>
                    <button name="avatar" value="windowsXpDolphin" class="c-avatar <?php echo ($selectedAvatar === 'windowsXpDolphin') ? 'selected' : ''; ?>">
                        <div class="c-avatar__img">
                            <img src="./img/avatar/dolphin.png" alt="">
                        </div>
                        <p>Wind◯wsXPイルカ</p>
                    </button>
                </li>
            </ul>
            <ul class="p-avatar__wrap-list">
                <li>
                    <button name="avatar" value="primitiveMan" class="c-avatar <?php echo ($selectedAvatar === 'primitiveMan') ? 'selected' : ''; ?>">
                        <div class="c-avatar__img">
                            <img src="./img/avatar/primitive-man.png" alt="">
                        </div>
                        <p>原始人</p>
                    </button>
                </li>
            </ul>
        </div>
    </form>
</div>

<?php require_once("./footer.php"); ?>
