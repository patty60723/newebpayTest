<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>測試藍新金流單筆訂單頁面</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h3>測試藍新金流單筆訂單頁面</h3>
    <form action="./newebpayForm" method="post">
      <input type="hidden" name="TradeInfo">
      <div class="form-group">
        <label for="MerchantID" class="form-label">MerchantID<span style="color: red">*</span></label>
        <input class="form-control" type="text" name="MerchantID" id="MerchantID" value="MS318433486">
      </div>
      <div class="form-group">
        <label for="HashKey" class="form-label">HashKey<span style="color: red">*</span></label>
        <input class="form-control" type="text" name="HashKey" id="HashKey" value="LDab8DaFga7tStd6tniuHlsR0tUK6w9v">
      </div>
      <div class="form-group">
        <label for="HashIV" class="form-label">HashIV<span style="color: red">*</span></label>
        <input class="form-control" type="text" name="HashIV" id="HashIV" value="Cv7Ek1qTnN6bOrQP">
      </div>
      <div class="form-group">
        <label for="LangType" class="form-label">語系<span style="color: red">*</span></label>
        <select class="form-control" name="LangType" id="LangType">
          <option value="zh-tw" selected>zh-tw 中文</option>
          <option value="en">en English</option>
          <option value="jp">jp 日本語</option>
        </select>
      </div>
      <div class="form-group">
        <label for="OrderComment" class="form-label">商店備註</label>
        <textarea class="form-control" name="OrderComment" id="OrderComment" maxlength="300" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="ReturnURL" class="form-label">支付完成返回商店網址</label>
        <input type="text" class="form-control" name="ReturnURL" id="ReturnURL" maxlength="50">
      </div>
      <div class="form-group">
        <label for="NotifyURL" class="form-label">支付通知網址</label>
        <input type="text" class="form-control" name="NotifyURL" id="NotifyURL" maxlength="50">
      </div>
      <div class="form-group">
        <label for="CustomerURL" class="form-label">商店取號網址</label>
        <input type="text" class="form-control" name="CustomerURL" id="CustomerURL" maxlength="50">
      </div>
      <div class="form-group">
        <label for="ClientBackURL" class="form-label">返回商店網址</label>
        <input type="text" class="form-control" name="ClientBackURL" id="ClientBackURL" maxlength="50">
      </div>
      <div class="form-group">
        <label for="ItemDesc" class="form-label">商品資訊<span style="color: red">*</span></label>
        <input type="text" class="form-control" name="ItemDesc" id="ItemDesc" maxlength="50" value="Unittest">
      </div>
      <div class="form-group">
        <label for="Amt" class="form-label">訂單金額(新台幣)</label>
        <input type="number" class="form-control" name="Amt" id="Amt" value="100">
      </div>
      <div class="form-group">
        <label for="TradeLimit" class="form-label">即時交易交易限制秒數(最多為900秒，最少為60秒)</label>
        <input type="number" class="form-control" name="TradeLimit" id="TradeLimit" max="900" min="60" placeholder="秒">
      </div>
      <div class="form-group">
        <label for="ExpireDate" class="form-label">非即時交易繳費有效期限(最多為180天，最少為1天)</label>
        <input type="number" class="form-control" name="ExpireDate" id="ExpireDate" max="180" min="1" placeholder="天">
      </div>
      <div class="form-group">
        <label for="Email" class="form-label">付款人電子信箱<span style="color: red">*</span></label>
        <input type="text" class="form-control" name="Email" id="Email">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="EmailModify" id="EmailModify" value="1">
        <label for="EmailModify" class="form-check-label">付款人電子信箱是否開放修改</label>
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="LoginType" id="LoginType" value="1">
        <label for="LoginType" class="form-check-label">需登入藍新金流會員<span style="color: red">*</span></label>
      </div>
      <div class="form-group">
        <h5>啟用付款方式</h5>
      </div>
      <div class="form-group">
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[]" id="Payments_CREDIT" value="CREDIT">
          <label for="Payments_CREDIT" class="form-check-label">信用卡一次付清</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[]" id="Payments_CreditRed" value="CreditRed">
          <label for="Payments_CreditRed" class="form-check-label">信用卡紅利</label>
        </div>
      </div>
      <div class="form-group">
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[InstFlag][]" id="Payments_InstFlag_3" value="3">
          <label for="Payments_InstFlag_3" class="form-check-label">信用卡分期付款分 3 期</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[InstFlag][]" id="Payments_InstFlag_6" value="6">
          <label for="Payments_InstFlag_6" class="form-check-label">信用卡分期付款分 6 期</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[InstFlag][]" id="Payments_InstFlag_12" value="12">
          <label for="Payments_InstFlag_12" class="form-check-label">信用卡分期付款分 12 期</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[InstFlag][]" id="Payments_InstFlag_18" value="18">
          <label for="Payments_InstFlag_18" class="form-check-label">信用卡分期付款分 18 期</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[InstFlag][]" id="Payments_InstFlag_24" value="24">
          <label for="Payments_InstFlag_24" class="form-check-label">信用卡分期付款分 24 期</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[InstFlag][]" id="Payments_InstFlag_36" value="36">
          <label for="Payments_InstFlag_36" class="form-check-label">信用卡分期付款分 36 期</label>
        </div>
      </div>
      <div class="form-group">
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[]" id="Payments_ANDROIDPAY" value="ANDROIDPAY">
          <label for="Payments_ANDROIDPAY" class="form-check-label">Google Pay</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[]" id="Payments_SAMSUNGPAY" value="SAMSUNGPAY">
          <label for="Payments_SAMSUNGPAY" class="form-check-label">Samsung Pay</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[]" id="Payments_LINEPAY" value="LINEPAY">
          <label for="Payments_LINEPAY" class="form-check-label">LINE Pay</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[]" id="Payments_CREDITAE" value="CREDITAE">
          <label for="Payments_CREDITAE" class="form-check-label">美國運通卡</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[]" id="Payments_UNIONPAY" value="UNIONPAY">
          <label for="Payments_UNIONPAY" class="form-check-label">銀聯卡</label>
        </div>
      </div>
      <div class="form-group">
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[]" id="Payments_WEBATM" value="WEBATM">
          <label for="Payments_WEBATM" class="form-check-label">WEBATM</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[]" id="Payments_VACC" value="VACC">
          <label for="Payments_VACC" class="form-check-label">ATM 轉帳</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[]" id="Payments_CVS" value="CVS">
          <label for="Payments_CVS" class="form-check-label">超商代碼繳費</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[]" id="Payments_BARCODE" value="BARCODE">
          <label for="Payments_BARCODE" class="form-check-label">超商條碼繳費</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="checkbox" class="form-check-input" name="Payments[]" id="Payments_P2G" value="P2G">
          <label for="Payments_P2G" class="form-check-label">ezPay 電子錢包</label>
        </div>
      </div>
      <div class="form-group">
        <h5>支付寶設定</h5>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" name="Payments[]" id="Payments_ALIPAY" value="ALIPAY">
          <label for="Payments_ALIPAY" class="form-check-label">啟用支付寶</label>
        </div>
        <div id="ALIPAY_INFO" style="display: none;">
          <div class="form-group">
            <label class="form-label" for="Receiver">收貨人姓名</label>
            <input class="form-control" type="text" name="ALIPAY[Receiver]" id="Receiver">
          </div>
          <div class="form-group">
            <label class="form-label" for="Tel1">收貨人主要聯絡電話</label>
            <input class="form-control" type="text" name="ALIPAY[Tel1]" id="Tel1">
          </div>
          <div class="form-group">
            <label class="form-label" for="Tel2">收貨人次要聯絡電話</label>
            <input class="form-control" type="text" name="ALIPAY[Tel2]" id="Tel2">
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">啟用物流選項</h5>
        <select class="form-control" name="CVSCOM" id="CVSCOM">
          <option value="0">不啟用</option>
          <option value="1">啟用超商取貨不付款</option>
          <option value="2">啟用超商取貨付款</option>
          <option value="3">啟用超商取貨不付款及超商取貨付款</option>
        </select>
      </div>
      <div class="mt-3">
        <button class="btn btn-primary" type="submit" name="submit" value="submit">Send</button>
      </div>
     
      
    </form>
  </div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script>
var el = document.getElementById("Payments_ALIPAY");
el.addEventListener(
  "click",
  function(e) {
    if (this.checked) {
      document.getElementById("ALIPAY_INFO").style.display = '';
    } else {
      document.getElementById("ALIPAY_INFO").style = "display: none;";
    }
  }
)
</script>
</html>