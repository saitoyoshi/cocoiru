
    <main>
        <div class="position-relative">
            <img src="../img/pastel.jpg" alt="パステル背景" width="1929" height="1071" class="pastel-img ">
            <div class="pastel-front-text-container position-absolute pt-5 pt-sm-0">
                <h1 class="fs-1 mb-5"><span class="yellow-marker">こ・こいるTOYOMAでは</span></h1>
                <h3 class="ms-5 ps-5 fs-1"><span class="yellow-marker ">ご高齢者の方</span></h3>
                <h3 class="ms-5 ps-5 fs-1"><span class="yellow-marker ">障害をお持ちの方</span></h3>
                <h3 class="ms-5 ps-5 fs-1"><span class="yellow-marker ">子育て世代</span></h3>
                <h3 class="ms-5 ps-5 fs-1"><span class="yellow-marker ">保証人がいない</span></h3>
            </div>
        </div>
        <div class="pastel-below-texts text-center py-4 mw-100">
            <h5 class="fs-3 mb-4">などの理由で住まいの確保にお困りの方に
            </h5>
            <h5 class="fs-3">安心して暮らせるサービスをご提供します！</h5>
        </div>
        <div class="position-relative py-4 px-3" style="background-image: url(../img/green.jpg);">
            <div class="bg-white container text-center p-4 consultation-max-width">
                <h1 class="fs-1 mb-4" style="color:#fab30b;">相談費用は一切かかりません</h1>
                <p class="p-font">賃貸住宅のご紹介</p>
                <p class="p-font">入居のサポート</p>
                <p class="p-font">シェアハウスのご紹介</p>
                <p class="p-font mb-4">グループホームのご紹介</p>
                <p class="p-font pt-3">本人様の状況に応じた住まい方を</p>
                <p class="p-font mb-4 pb-3">ご提案、ご紹介させていただきます</p>
                <a href="index.php#contact" class="btn btn-lg contact-button text-dark">お問い合わせ</a>
            </div>
        </div>
        <div class="row justify-align-content-md-center mx-0">
            <img src="../img/my-p.png" alt="人々" srcset="" class="col-md-6 px-0 people-img" width="632" height="601">
            <div class="col-md-6 bg-white py-4 px-3 d-md-flex align-items-md-center">
                <div class="container p-4 main-background-color">
                    <h4 class="fs-3 mb-3">サポートについて</h4>
                    <h1 class="fs-2 mb-3">入居、入居後のサポート</h1>
                    <ul>
                        <li class="p-font">不動産店舗と調整</li>
                        <li class="p-font">案内物件への見学同行</li>
                        <li class="p-font">契約手続きのお手伝い</li>
                        <li class="p-font">入居準備の支援</li>
                        <li class="p-font">見守りサービス</li>
                        <li class="p-font">緊急連絡先対応</li>
                        <li class="p-font">生活相談・トラブル対応</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="ours-background-color text-center d-md-none pt-4" id="ours">
            <div class=""><img src="../img/logo_lg.png" alt="" srcset="" class="big-logo" width="333" height="305">
            </div>
            <div class="mx-auto">

                <h4 class="fs-1 mb-3 mt-4">私たちの活動</h4>
                <h6 class="fs-4">こ・こいるTOYOMAの住宅支援<h6 class="fs-4 mb-0">サービス</h6>
                </h6>
            </div>
        </div>
        <div class="d-none ours-background-color d-md-block text-center pt-4 " id="ours2">
            <h4 class="fs-1 mb-3">私たちの活動</h4>
            <h6 class="fs-4 mb-0"><img src="../img/logo_sm.png" alt="" srcset="" class="logo" width="185" height="169"><span class="ps-3">こ・こいるTOYOMAの住宅支援サービス</span></h6>
        </div>
        <div class="ours-background-color text-center pt-4"><img src="../img/overview_diagram.png" class="overview-img" alt="概要図" srcset="" width="824" height="456"></div>
        <div class="ours-background-color py-4 text-center">
            <p class="p-font">住まいに関すること、生活に関すること、様々なお悩みを多方面から支援する</p>
            <p class="p-font mb-0">​その為に各機関、機構と連携し、対応にあたっていきます。</p>
        </div>
        <form action="index.php#contact" method="post" class="contact-form-background-colo pt-4 pb-5">
            <div class="contact-form-container px-4 mx-auto" id="contact">
                <h4 class="fs-2 text-center">お問い合わせ</h4>
                <?php if (count($errors) !== 0) : ?>
                    <ul class="mt-3">
                        <?php foreach ($errors as $error) : ?>
                            <li class="text-danger"><?php echo $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <?php if ($sendSuccess) : ?>
                    <p class="text-primary mt-3">メールが送信されました</p>
                <?php endif; ?>
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">氏名</label>
                    <input type="text" class="form-control " name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label fw-bold">メールアドレス</label>
                    <input type="text" class="form-control" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label fw-bold">内容</label>
                    <textarea name="content" class="form-control" id="content" cols="30" rows="7"></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-lg text-white mt-4 submit-button" onclick="return confirmMessage('メールを送信してもよろしいですか？')">送信</button>
                </div>
            </div>
        </form>
