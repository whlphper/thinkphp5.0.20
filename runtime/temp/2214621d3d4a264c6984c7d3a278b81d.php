<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:89:"D:\phpStudy\PHPTutorial\WWW\payment\public/../application/manager\view\index\welcome.html";i:1535871932;s:84:"D:\phpStudy\PHPTutorial\WWW\payment\application\common\view\public\admin-header.html";i:1535871932;s:84:"D:\phpStudy\PHPTutorial\WWW\payment\application\common\view\public\admin-script.html";i:1535871932;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>商户后台管理</title>
    <link type="text/css" rel="stylesheet" href="/static/vendor/bootstrap/css/bootstrap.css"/>
    <link type="text/css" rel="stylesheet" href="/static/fontsawesome/css/font-awesome.css"/>
    <link rel="stylesheet" href="/static/vendor/bootstrap-validate/css/bootstrapValidator.css">
    <link rel="stylesheet" href="/static/vendor/icheck/skins/flat/blue.css">
    <link rel="stylesheet" href="/static/vendor/datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/static/vendor/select/css/bootstrap-select.min.css">
    <link type="text/css" rel="stylesheet" href="/static/css/style.css"/>
    <script src="/static/js/jquery-2.2.1.min.js"></script>
    <script src="/static/vendor/bootstrap/js/bootstrap.js"></script>
    <script src="/static/vendor/layer/layer.js"></script>
    <script src="/static/vendor/bootstrap-validate/js/bootstrapValidator.js"></script>
    <script src="/static/vendor/bootstrap-validate/js/language/zh_CN.js"></script>
    <script src="/static/vendor/cxselect/jquery.cxselect.min.js"></script>
    <script src="/static/vendor/icheck/icheck.min.js"></script>
    <script type="text/javascript" src="/static/vendor/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="/static/vendor/select/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="/static/vendor/datepicker/locales/bootstrap-datepicker.zh-CN.min.js"></script>
    <script src="/static/js/tipSuppliers.js"></script>
    <script src="/static/system/core.js"></script>
    <script src="/static/system/vendor.js"></script>
    <script>
        $(document).ready(function () {
            $("#apitoken").val("<?php echo $api_token; ?>");
        });
    </script>
</head>
<body>
<input type="hidden" id="apitoken" value="">

<body>
<!--商户基本信息-->
<div class="hello_box hello_order">
    <h2><span></span>系统信息</h2>
    <div class="hello_info">
        <table border="0" cellspacing="0" cellpadding="0">
            <thead>
            <tr>
                <th>LNMP</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>PHP</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<!--技术支持-->
<div class="hello_box hello_opera">
    <h2><span></span>技术支持</h2>
    <div class="hello_info">
        <ul>
            <li>
                <label>QQ：</label>
                <span>761243073</span>
            </li>
        </ul>
    </div>
</div>
<!--javascript include-->

</body>
</html>
