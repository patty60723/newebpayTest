<?php

/**
 * 模擬唯一值訂單編號
 */
function getTempRandomOrderNo()
{
    return 'test_' . time();
}

/**
 * 取得資料 AES 加密字串
 * @param array $datas
 * @param string $key
 * @param string $iv
 * @return string
 */
function getMpgAESEncrypted($datas, $key, $iv)
{
    if (!empty($datas)) {
        return trim(bin2hex(openssl_encrypt(addPadding(http_build_query($datas)), 'aes-256-cbc', $key, OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING, $iv)));
    } else {
        return "";
    }
}

/**
 * @param string $input
 * @param int $blockSize
 */
function addPadding($input, $blockSize=32)
{
    $padLen = $blockSize - (strlen($input) % $blockSize);
    $padding = str_repeat(chr($padLen), $padLen);
    return $input . $padding;
}

/**
 * @param string $input
 * @param string $key
 * @param string $iv
 */
function getMpgSHAEncrypted($input, $key, $iv)
{
    $dataString = implode('&', [http_build_query(['HashKey' => $key]), $input, http_build_query(['HashIV' => $iv])]);
    return strtoupper(hash('sha256', $dataString));
}

/**
 * 產生金流表格資料
 * @param array $tradeInfo
 * @param string $key
 * @param string $iv
 */
function generateMetadata($tradeInfo, $key, $iv)
{
    $tradeInfoString = getMpgAESEncrypted($tradeInfo, $key, $iv);
    return [
        'MerchantID' => $tradeInfo['MerchantID'],
        'TradeInfo' => $tradeInfoString,
        'TradeSha' => getMpgSHAEncrypted($tradeInfoString, $key, $iv),
        'Version' => $tradeInfo['Version'],
    ];
}

/**
 * 產生sumit JS
 */
function generateSubmitJs()
{
    echo <<<JS
<script>
    setTimeout(function(){
        document.getElementById('pb_neweb_form').submit();
    }, 500);
</script>
JS;
}

/**
 * 產生金流表格
 * @param array $metaData
 */
function generateForm($metaData)
{
    $hiddenInput = "";
    foreach($metaData as $key => $value) {
        $hiddenInput .= "<input type='hidden' name='$key' value='$value'>";
    }
    echo <<<HTML
<form id="pb_neweb_form" action="https://ccore.newebpay.com/MPG/mpg_gateway" method="post">
    $hiddenInput
</form>
HTML;
}

if (isset($_POST['submit'])) {
    // https://ccore.newebpay.com/MPG/mpg_gateway
    // Key: LDab8DaFga7tStd6tniuHlsR0tUK6w9v
    // IV: Cv7Ek1qTnN6bOrQP
    foreach($_POST as $type => $value) {
        $$type = $value;
    }
    $tempRandomOrderNo = getTempRandomOrderNo();

    $tradeInfo = [
        'MerchantID' => (isset($MerchantID) ? $MerchantID : 'MS318433486'), //Required
        'RespondType' => 'JSON', //Required
        'TimeStamp' => time(), //Required
        'Version' => '1.5', //Required
        'LangType' => (isset($LangType) ? $LangType : null),
        'MerchantOrderNo' => $tempRandomOrderNo, //Required
        'Amt' => (isset($Amt) ? $Amt : 100), //Required
        'ItemDesc' => utf8_encode((isset($ItemDesc) ? $ItemDesc : 'Unittest')), //Required
        'TradeLimit' => (isset($TradeLimit) ? $TradeLimit : null),
        'ExpireDate' => (isset($ExpireDate) && $ExpireDate > 0 ? date('Ymd', strtotime("+" . (int)$ExpireDate . "day")) : null),
        'ReturnURL' => (isset($ReturnURL) ? $ReturnURL : null),
        'NotifyURL' => (isset($NotifyURL) ? $NotifyURL : null),
        'CustomerURL' => (isset($CustomerURL) ? $CustomerURL : null),
        'ClientBackURL' => (isset($ClientBackURL) ? $ClientBackURL : null),
        'Email' => (isset($Email) ? $Email : 'awesome61004@gmail.com'), //Required
        'EmailModify' => (isset($EmailModify) ? $EmailModify : 1),
        'LoginType' => (isset($LoginType) ? $LoginType : 0), //Required
        'OrderComment' => (isset($OrderComment) ? $OrderComment : null),
        'CVSCOM' => (isset($CVSCOM) ? $CVSCOM : 0),
    ];

    $payments = isset($_POST['Payments']) ? $_POST['Payments'] : [];
    foreach ($payments as $index => $type)
    {
        if ((string)$index == 'InstFlag') {
            $value = $type == 1 ? $type : implode(',', $type);
            $tradeInfo[$index] = $value;
        } else {
            if ($type == 'ALIPAY') {
                $ALIPAY_info = isset($ALIPAY) ? $ALIPAY : [];
                foreach ($ALIPAY_info as $k => $v) {
                    $tradeInfo[$k] = $v;
                }
                $product_info = [
                    'Count' => 1,
                    'Pid1' => $tempRandomOrderNo,
                    'Title1' => $ItemDesc,
                    'Desc1' => $ItemDesc,
                    'Price1' => $Amt,
                    'Qty1' => 1,
                ];
                $tradeInfo = array_merge($tradeInfo, $product_info);
            }
            $tradeInfo[$type] = 1;
        }
    }
    generateForm(generateMetadata($tradeInfo, $HashKey, $HashIV));
    generateSubmitJs();
}
