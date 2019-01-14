<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>ECSHOP 管理中心 - 添加分类 </title>
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="/css/general.css" rel="stylesheet" type="text/css" />
<link href="/css/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="../js/transport.js"></script><script type="text/javascript" src="js/common.js"></script>
<style>
  .panel-icloud .panel-right iframe {
    height: 300px;
    margin-top: 15px;
  }
  .panel-hint{
    top: 0%;
  }
</style>

<script>
<!--
// 这里把JS用到的所有语言都赋值到这里
var process_request = "正在处理您的请求...";
var todolist_caption = "记事本";
var todolist_autosave = "自动保存";
var todolist_save = "保存";
var todolist_clear = "清除";
var todolist_confirm_save = "是否将更改保存到记事本？";
var todolist_confirm_clear = "是否清空内容？";
var catname_empty = "分类名称不能为空!";
var unit_empyt = "数量单位不能为空!";
var is_leafcat = "您选定的分类是一个末级分类。\r\n新分类的上级分类不能是一个末级分类";
var not_leafcat = "您选定的分类不是一个末级分类。\r\n商品的分类转移只能在末级分类之间才可以操作。";
var filter_attr_not_repeated = "筛选属性不可重复";
var filter_attr_not_selected = "请选择筛选属性";
//-->
/*关闭按钮*/
  function get_certificate(){
	  var panel = document.getElementById('panelCloud');
	  var mask  = document.getElementById('CMask')||null;
	  var frame = document.getElementById('CFrame');
	  if(panel&&CMask&&frame){
	      panel.style.display = 'block';
	      mask.style.display = 'block';
	      frame.src = 'https://openapi.shopex.cn/oauth/authorize?response_type=code&client_id=yogfss4l&redirect_uri=http%3A%2F%2Fecshop%2Fecshop%2Fadmin%2Fcertificate.php%3Fact%3Dget_certificate%26type%3Dindex&view=auth_ecshop';
	    }
	}

	/*关闭按钮*/
	function btnCancel(item){
	  var par  = item.offsetParent;
	  var mask  = document.getElementById('CMask')||null;
	  var frame = document.getElementById('CFrame');
	  par.style.display = 'none';
	  if(mask){mask.style.display = 'none';}
	  frame.src = '';
	}
</script>
</head>
<body>
<!--云起激活系统面板-->
<div class="panel-hint panel-icloud" id="panelCloud">
  <div class="panel-cross"><span onclick="btnCancel(this)">Ｘ</span></div>
  <div class="panel-title">
    <span class="tit">您需要激活系统</span>
    <p>用云起账号激活您的系统，享受物流查询，天工收银，手机短信等更多应用和服务</p>
  </div>
  <div class="panel-left">
    <span>没有云起账号吗？</span>
    <p>点击下列按钮一步完成注册激活！</p>
    <a href="https://account.shopex.cn/reg?refer=yunqi_ecshop" target="_blank" class="btn btn-yellow">免费注册云起账号</a>
  </div>
  <div class="panel-right">
    <h5 class="logo">云起</h5>
    <p>正在激活中</p>
    <iframe src="" frameborder="0" id="CFrame"></iframe>
    <div class="cloud-passw">
      <a target="_blank" href="https://account.shopex.cn/forget?">忘记密码？</a>
    </div>
  </div>
</div>
<!--云起激活系统面板-->
<!--遮罩-->
<div class="mask-black" id="CMask"></div>
<!--遮罩-->
<h1>
      <a class="btn btn-right" href="/admin/category>商品分类</a>
  
    <span class="action-span1"><a href="index.php?act=main">ECSHOP 管理中心</a> </span><span id="search_id" class="action-span1">&nbsp;&nbsp;>&nbsp;&nbsp;添加分类 </span>
  <div style="clear:both"></div>
</h1><!-- start add new category form -->
<div class="main-div">
  <form action="/admin/category/update" method="post" name="theForm" enctype="multipart/form-data" onsubmit="return validate()">
   {{ csrf_field() }}
   <table width="100%" id="general-table">
      <tr>
        <td class="label">分类名称:</td>
        <td>
          <input type='hidden' name='id' maxlength="20" value='{{$category['cat_id']}}' size='27' />
          <input type='text' name='cat_name' maxlength="20" value='{{$category['cat_name']}}' size='27' /> 
          <font color="red">*</font>
        </td>
      </tr>
      <tr>
        <td class="label">上级分类:</td>
        <td>
            <select name="parent_id" >
                     <option value="0">顶级分类</option>
                      @foreach ($category_list as $cate)
                      
                     
                      @if ($cate['cat_id'] == $category['parent_id'] )
                      <option selected value="{{ $cate['cat_id'] }}" >{{ $cate['cat_name'] }}</option>
                      @else
                      <option value="{{ $cate['cat_id'] }}" >{{ $cate['cat_name'] }}</option>                      
                      @endif
                     @endforeach
                </select>
            
         </td>
      </tr>

      <tr id="measure_unit">
        <td class="label">数量单位:</td>
        <td>
          <input type="text" name='measure_unit' value='{{$category['measure_unit']}}' size="12" />
        </td>
      </tr>
      <tr>
        <td class="label">排序:</td>
        <td>
          <input type="text" name='sort_order'  value="{{$category['sort_order']}}" size="15" />
        </td>
      </tr>

      <tr>
        <td class="label">是否显示:</td>
        <td>
                                
             
          <input type="radio" name="is_show" value="1"  @if ($category['is_show'] ==  1) checked="true" @endif /> 是      
          <input type="radio" name="is_show" value="0"   @if ($category['is_show'] ==  0) checked="true" @endif /> 否      
        
        </td>
      </tr>
      <tr>
        <td class="label">是否显示在导航栏:</td>
        <td>
            <input type="radio" name="show_in_nav" value="1"  @if ($category['show_in_nav'] ==  1) checked="true" @endif /> 是      
          <input type="radio" name="show_in_nav" value="0"   @if ($category['show_in_nav'] ==  0) checked="true" @endif /> 否      
    
         </tr>
      <tr>
        <td class="label">设置为首页推荐:</td>
        <td>
          <input type="checkbox" name="cat_recommend[]" value="1" /> 精品          <input type="checkbox" name="cat_recommend[]" value="2"  /> 最新          <input type="checkbox" name="cat_recommend[]" value="3"  /> 热门        </td>
      </tr>
      <tr>
        <td class="label"><a href="javascript:showNotice('noticeFilterAttr');" title="点击此处查看提示信息"><img src="images/notice.svg" width="16" height="16" border="0" alt="您可以为每一个商品分类指定一个样式表文件。例如文件存放在 themes 目录下则输入：themes/style.css"></a>筛选属性:</td>
        <td>
          <script type="text/javascript">
          var arr = new Array();
          var sel_filter_attr = "请选择筛选属性";
                      arr[1] = new Array();
                                          arr[1][0] = ["版次", 9];
                                                        arr[1][1] = ["开本", 5];
                                                        arr[1][2] = ["作者", 1];
                                                        arr[1][3] = ["所属分类", 12];
                                                        arr[1][4] = ["图书规格", 8];
                                                        arr[1][5] = ["出版日期", 4];
                                                        arr[1][6] = ["字数", 11];
                                                        arr[1][7] = ["图书装订", 7];
                                                        arr[1][8] = ["图书书号/ISBN", 3];
                                                        arr[1][9] = ["印张", 10];
                                                        arr[1][10] = ["图书页数", 6];
                                                        arr[1][11] = ["出版社", 2];
                                                arr[2] = new Array();
                                          arr[2][0] = ["歌词", 24];
                                                        arr[2][1] = ["导演/指挥", 20];
                                                        arr[2][2] = ["介质/格式", 16];
                                                        arr[2][3] = ["版权号", 31];
                                                        arr[2][4] = ["发行公司", 27];
                                                        arr[2][5] = ["长度", 23];
                                                        arr[2][6] = ["语种", 19];
                                                        arr[2][7] = ["商品别名", 15];
                                                        arr[2][8] = ["引进号", 30];
                                                        arr[2][9] = ["ISRC码", 26];
                                                        arr[2][10] = ["所属类别", 22];
                                                        arr[2][11] = ["国家地区", 18];
                                                        arr[2][12] = ["英文片名", 14];
                                                        arr[2][13] = ["出版号", 29];
                                                        arr[2][14] = ["碟片代码", 25];
                                                        arr[2][15] = ["主唱", 21];
                                                        arr[2][16] = ["片装数", 17];
                                                        arr[2][17] = ["中文片名", 13];
                                                        arr[2][18] = ["出版", 28];
                                                arr[3] = new Array();
                                          arr[3][0] = ["语种/配音", 39];
                                                        arr[3][1] = ["引进号", 54];
                                                        arr[3][2] = ["介质/格式", 35];
                                                        arr[3][3] = ["ISRC码", 50];
                                                        arr[3][4] = ["年份", 46];
                                                        arr[3][5] = ["中文字幕", 42];
                                                        arr[3][6] = ["国家地区", 38];
                                                        arr[3][7] = ["出版号", 53];
                                                        arr[3][8] = ["商品别名", 34];
                                                        arr[3][9] = ["碟片代码", 49];
                                                        arr[3][10] = ["所属类别", 45];
                                                        arr[3][11] = ["色彩", 41];
                                                        arr[3][12] = ["片装数", 37];
                                                        arr[3][13] = ["出版 ", 52];
                                                        arr[3][14] = ["英文片名", 33];
                                                        arr[3][15] = ["区码", 48];
                                                        arr[3][16] = ["表演者", 44];
                                                        arr[3][17] = ["字幕", 40];
                                                        arr[3][18] = ["版权号", 55];
                                                        arr[3][19] = ["碟片类型", 36];
                                                        arr[3][20] = ["发行公司", 51];
                                                        arr[3][21] = ["中文片名", 32];
                                                        arr[3][22] = ["音频格式", 47];
                                                        arr[3][23] = ["导演", 43];
                                                arr[4] = new Array();
                                          arr[4][0] = ["WAP上网", 73];
                                                        arr[4][1] = ["操作系统", 69];
                                                        arr[4][2] = ["宽度", 65];
                                                        arr[4][3] = ["红外/蓝牙", 80];
                                                        arr[4][4] = ["副屏参数/外屏参数", 61];
                                                        arr[4][5] = ["随机配件", 76];
                                                        arr[4][6] = ["支持频率/网络频率", 57];
                                                        arr[4][7] = ["标准配置", 72];
                                                        arr[4][8] = ["内存容量", 68];
                                                        arr[4][9] = ["长度", 64];
                                                        arr[4][10] = ["彩信/彩e", 79];
                                                        arr[4][11] = ["主屏参数/内屏参数", 60];
                                                        arr[4][12] = ["天线位置", 75];
                                                        arr[4][13] = ["网络制式", 56];
                                                        arr[4][14] = ["待机时间", 71];
                                                        arr[4][15] = ["屏幕材质", 67];
                                                        arr[4][16] = ["色数/灰度", 63];
                                                        arr[4][17] = ["摄像头", 78];
                                                        arr[4][18] = ["外观样式/手机类型", 59];
                                                        arr[4][19] = ["数据业务", 74];
                                                        arr[4][20] = ["通话时间", 70];
                                                        arr[4][21] = ["厚度", 66];
                                                        arr[4][22] = ["价格等级", 81];
                                                        arr[4][23] = ["清晰度", 62];
                                                        arr[4][24] = ["铃声", 77];
                                                        arr[4][25] = ["尺寸体积", 58];
                                                arr[5] = new Array();
                                          arr[5][0] = ["系统总线", 88];
                                                        arr[5][1] = ["笔记本尺寸", 84];
                                                        arr[5][2] = ["电池容量", 99];
                                                        arr[5][3] = ["标称频率", 95];
                                                        arr[5][4] = ["内存类型", 91];
                                                        arr[5][5] = ["二级缓存", 87];
                                                        arr[5][6] = ["详细规格", 83];
                                                        arr[5][7] = ["光驱类型", 98];
                                                        arr[5][8] = ["显示芯片", 94];
                                                        arr[5][9] = ["内存容量", 90];
                                                        arr[5][10] = ["处理器最高主频", 86];
                                                        arr[5][11] = ["型号", 82];
                                                        arr[5][12] = ["显卡类型", 97];
                                                        arr[5][13] = ["屏幕尺寸", 93];
                                                        arr[5][14] = ["主板芯片组", 89];
                                                        arr[5][15] = ["处理器类型", 85];
                                                        arr[5][16] = ["其他配置", 100];
                                                        arr[5][17] = ["显卡显存", 96];
                                                        arr[5][18] = ["硬盘", 92];
                                                arr[6] = new Array();
                                          arr[6][0] = ["电池使用时间", 137];
                                                        arr[6][1] = ["有效像素", 103];
                                                        arr[6][2] = ["旋转液晶屏", 118];
                                                        arr[6][3] = ["场景模式", 133];
                                                        arr[6][4] = ["传感器尺寸", 114];
                                                        arr[6][5] = ["拍摄范围", 129];
                                                        arr[6][6] = ["感光器件尺寸", 110];
                                                        arr[6][7] = ["白平衡", 125];
                                                        arr[6][8] = ["标准配件", 140];
                                                        arr[6][9] = ["操作模式", 106];
                                                        arr[6][10] = ["影像格式", 121];
                                                        arr[6][11] = ["电源", 136];
                                                        arr[6][12] = ["最大像素/总像素  ", 102];
                                                        arr[6][13] = ["焦距", 117];
                                                        arr[6][14] = ["测光模式", 132];
                                                        arr[6][15] = ["传感器类型", 113];
                                                        arr[6][16] = ["闪光灯", 128];
                                                        arr[6][17] = ["感光器件", 109];
                                                        arr[6][18] = ["曝光补偿", 124];
                                                        arr[6][19] = ["标配软件", 139];
                                                        arr[6][20] = ["数字变焦倍数", 105];
                                                        arr[6][21] = ["存储卡", 120];
                                                        arr[6][22] = ["外接接口", 135];
                                                        arr[6][23] = ["类型", 101];
                                                        arr[6][24] = ["光圈", 116];
                                                        arr[6][25] = ["ISO感光度", 131];
                                                        arr[6][26] = ["图像分辨率", 112];
                                                        arr[6][27] = ["快门速度", 127];
                                                        arr[6][28] = ["显示屏尺寸", 108];
                                                        arr[6][29] = ["曝光模式", 123];
                                                        arr[6][30] = ["外形尺寸", 138];
                                                        arr[6][31] = ["光学变焦倍数", 104];
                                                        arr[6][32] = ["存储介质", 119];
                                                        arr[6][33] = ["短片拍摄", 134];
                                                        arr[6][34] = ["镜头", 115];
                                                        arr[6][35] = ["自拍定时器", 130];
                                                        arr[6][36] = ["最高分辨率", 111];
                                                        arr[6][37] = ["连拍", 126];
                                                        arr[6][38] = ["兼容操作系统", 141];
                                                        arr[6][39] = ["显示屏类型", 107];
                                                        arr[6][40] = ["曝光控制", 122];
                                                arr[7] = new Array();
                                          arr[7][0] = ["像素范围", 152];
                                                        arr[7][1] = ["显示屏尺寸及类型", 148];
                                                        arr[7][2] = ["电池类型", 163];
                                                        arr[7][3] = ["外型尺寸", 144];
                                                        arr[7][4] = ["对焦方式", 159];
                                                        arr[7][5] = ["水平清晰度", 155];
                                                        arr[7][6] = ["感光器件数量", 151];
                                                        arr[7][7] = ["数字变焦倍数", 147];
                                                        arr[7][8] = ["随机存储", 162];
                                                        arr[7][9] = ["类型", 143];
                                                        arr[7][10] = ["镜头性能", 158];
                                                        arr[7][11] = ["传感器尺寸", 154];
                                                        arr[7][12] = ["感光器件尺寸", 150];
                                                        arr[7][13] = ["光学变焦倍数", 146];
                                                        arr[7][14] = ["其他接口", 161];
                                                        arr[7][15] = ["编号", 142];
                                                        arr[7][16] = ["数码效果", 157];
                                                        arr[7][17] = ["传感器数量", 153];
                                                        arr[7][18] = ["感光器件", 149];
                                                        arr[7][19] = ["电池供电时间", 164];
                                                        arr[7][20] = ["最大像素数", 145];
                                                        arr[7][21] = ["曝光控制", 160];
                                                        arr[7][22] = ["取景器", 156];
                                                arr[8] = new Array();
                                          arr[8][0] = ["主要原料", 167];
                                                        arr[8][1] = ["适合肤质", 170];
                                                        arr[8][2] = ["产品规格/容量", 166];
                                                        arr[8][3] = ["使用部位", 169];
                                                        arr[8][4] = ["产地", 165];
                                                        arr[8][5] = ["所属类别", 168];
                                                        arr[8][6] = ["适用人群", 171];
                                                arr[9] = new Array();
                                          arr[9][0] = ["变焦模式", 201];
                                                        arr[9][1] = ["操作系统", 182];
                                                        arr[9][2] = ["办公功能", 197];
                                                        arr[9][3] = ["蓝牙接口", 193];
                                                        arr[9][4] = ["闪光灯", 208];
                                                        arr[9][5] = ["屏幕大小", 189];
                                                        arr[9][6] = ["视频播放", 204];
                                                        arr[9][7] = ["颜色", 185];
                                                        arr[9][8] = ["传感器", 200];
                                                        arr[9][9] = ["内存容量", 181];
                                                        arr[9][10] = ["网络链接", 192];
                                                        arr[9][11] = ["耳机接口", 207];
                                                        arr[9][12] = ["屏幕分辨率", 188];
                                                        arr[9][13] = ["MP3播放器", 203];
                                                        arr[9][14] = ["尺寸体积", 184];
                                                        arr[9][15] = ["像素", 199];
                                                        arr[9][16] = ["存储卡格式", 180];
                                                        arr[9][17] = ["电子邮件", 195];
                                                        arr[9][18] = ["配件", 210];
                                                        arr[9][19] = ["情景模式", 191];
                                                        arr[9][20] = ["收音机", 206];
                                                        arr[9][21] = ["上市日期", 172];
                                                        arr[9][22] = ["屏幕材质", 187];
                                                        arr[9][23] = ["视频拍摄", 202];
                                                        arr[9][24] = ["K-JAVA", 183];
                                                        arr[9][25] = ["数码相机", 198];
                                                        arr[9][26] = ["数据线接口", 194];
                                                        arr[9][27] = ["浏览器", 209];
                                                        arr[9][28] = ["中文输入法", 190];
                                                        arr[9][29] = ["CPU频率", 205];
                                                        arr[9][30] = ["屏幕颜色", 186];
                                                        arr[9][31] = ["手机制式", 173];
                                                        arr[9][32] = ["理论通话时间", 174];
                                                        arr[9][33] = ["理论待机时间", 175];
                                                        arr[9][34] = ["铃声", 176];
                                                        arr[9][35] = ["铃声格式", 177];
                                                        arr[9][36] = ["外观样式", 178];
                                                        arr[9][37] = ["中文短消息", 179];
                                                        arr[9][38] = ["闹钟", 196];
                                    
          function changeCat(obj)
          {
            var key = obj.value;
            var sel = window.ActiveXObject ? obj.parentNode.childNodes[4] : obj.parentNode.childNodes[5];
            sel.length = 0;
            sel.options[0] = new Option(sel_filter_attr, 0);
            if (arr[key] == undefined)
            {
              return;
            }
            for (var i= 0; i < arr[key].length ;i++ )
            {
              sel.options[i+1] = new Option(arr[key][i][0], arr[key][i][1]);
            }

          }

          </script>

         
          <table width="100%" id="tbody-attr" align="center">
                        <tr>
              <td>   
                   <a href="javascript:;" onclick="addFilterAttr(this)">[+]</a> 
                   <select onChange="changeCat(this)"><option value="0">请选择商品类型</option><option value='1'>书</option><option value='2'>音乐</option><option value='3'>电影</option><option value='4'>手机</option><option value='5'>笔记本电脑</option><option value='6'>数码相机</option><option value='7'>数码摄像机</option><option value='8'>化妆品</option><option value='9'>精品手机</option></select>&nbsp;&nbsp;
                   <select name="filter_attr[]"><option value="0">请选择筛选属性</option></select><br />                   
              </td>
            </tr> 
                       
                      </table>

          <span class="notice-span" style="display:block"  id="noticeFilterAttr">筛选属性可在前分类页面筛选商品</span>
        </td>
      </tr>
      <tr>
        <td class="label"><a href="javascript:showNotice('noticeGrade');" title="点击此处查看提示信息"><img src="images/notice.svg" width="16" height="16" border="0" alt="您可以为每一个商品分类指定一个样式表文件。例如文件存放在 themes 目录下则输入：themes/style.css"></a>价格区间个数:</td>
        <td>
          <input type="text" name="grade" value="{{$category['grade']}}" size="40" /> <br />
          <span class="notice-span" style="display:block"  id="noticeGrade">该选项表示该分类下商品最低价与最高价之间的划分的等级个数，填0表示不做分级，最多不能超过10个。</span>
        </td>
      </tr>
      <tr>
        <td class="label"><a href="javascript:showNotice('noticeGoodsSN');" title="点击此处查看提示信息"><img src="images/notice.svg" width="16" height="16" border="0" alt="您可以为每一个商品分类指定一个样式表文件。例如文件存放在 themes 目录下则输入：themes/style.css"></a>分类的样式表文件:</td>
        <td>
          <input type="text" name="style" value="{{$category['style']}}" size="40" /> <br />
          <span class="notice-span" style="display:block"  id="noticeGoodsSN">您可以为每一个商品分类指定一个样式表文件。例如文件存放在 themes 目录下则输入：themes/style.css</span>
        </td>
      </tr>
      <tr>
        <td class="label">关键字:</td>
        <td><input type="text" name="keywords" value='{{$category['keywords']}}' size="50">
        </td>
      </tr>

      <tr>
        <td class="label">分类描述:</td>
        <td>
          <textarea name='cat_desc' rows="6" cols="{{$category['cat_desc']}}"></textarea>
        </td>
      </tr>
      </table>
      <div class="button-div">
        <input type="submit" class="btn" value=" 确定 " />
        <input type="reset" class="btn btn-def" value=" 重置 " />
      </div>
    <input type="hidden" name="act" value="insert" />
    <input type="hidden" name="old_cat_name" value="" />
    <input type="hidden" name="cat_id" value="" />
  </form>
</div>
<script type="text/javascript" src="../js/utils.js"></script><script type="text/javascript" src="js/validator.js"></script>
<script language="JavaScript">
<!--
document.forms['theForm'].elements['cat_name'].focus();
/**
 * 检查表单输入的数据
 */
function validate()
{
  validator = new Validator("theForm");
  validator.required("cat_name",      catname_empty);
  if (parseInt(document.forms['theForm'].elements['grade'].value) >10 || parseInt(document.forms['theForm'].elements['grade'].value) < 0)
  {
    validator.addErrorMsg('价格分级数量只能是0-10之内的整数');
  }
  return validator.passed();
}
onload = function()
{
  // 开始检查订单
  startCheckOrder();
}

/**
 * 新增一个筛选属性
 */
function addFilterAttr(obj)
{
  var src = obj.parentNode.parentNode;
  var tbl = document.getElementById('tbody-attr');

  var validator  = new Validator('theForm');
  var filterAttr = document.getElementsByName("filter_attr[]");

  if (filterAttr[filterAttr.length-1].selectedIndex == 0)
  {
    validator.addErrorMsg(filter_attr_not_selected);
  }
  
  for (i = 0; i < filterAttr.length; i++)
  {
    for (j = i + 1; j <filterAttr.length; j++)
    {
      if (filterAttr.item(i).value == filterAttr.item(j).value)
      {
        validator.addErrorMsg(filter_attr_not_repeated);
      } 
    } 
  }

  if (!validator.passed())
  {
    return false;
  }

  var row  = tbl.insertRow(tbl.rows.length);
  var cell = row.insertCell(-1);
  cell.innerHTML = src.cells[0].innerHTML.replace(/(.*)(addFilterAttr)(.*)(\[)(\+)/i, "$1removeFilterAttr$3$4-");
  filterAttr[filterAttr.length-1].selectedIndex = 0;
}

/**
 * 删除一个筛选属性
 */
function removeFilterAttr(obj)
{
  var row = rowindex(obj.parentNode.parentNode);
  var tbl = document.getElementById('tbody-attr');

  tbl.deleteRow(row);
}
//-->
</script>

<div id="footer">
共执行 5 个查询，用时 0.059607 秒，Gzip 已禁用，内存占用 1.594 MB<br />
版权所有 &copy; 2005-2019 上海商派软件有限公司，并保留所有权利。</div>
<!-- 新订单提示信息 -->
<div id="popMsg">
  <table cellspacing="0" cellpadding="0" width="100%" bgcolor="#cfdef4" border="0">
  <tr>
    <td style="color: #0f2c8c" width="30" height="24"></td>
    <td style="font-weight: normal; color: #1f336b; padding-top: 4px;padding-left: 4px" valign="center" width="100%"> 新订单通知</td>
    <td style="padding-top: 2px;padding-right:2px" valign="center" align="right" width="19"><span title="关闭" style="cursor: hand;cursor:pointer;color:red;font-size:12px;font-weight:bold;margin-right:4px;" onclick="Message.close()" >×</span><!-- <img title=关闭 style="cursor: hand" onclick=closediv() hspace=3 src="msgclose.jpg"> --></td>
  </tr>
  <tr>
    <td style="padding-right: 1px; padding-bottom: 1px" colspan="3" height="70">
    <div id="popMsgContent">
      <p>您有 <strong style="color:#ff0000" id="spanNewOrder">1</strong> 个新订单以及       <strong style="color:#ff0000" id="spanNewPaid">0</strong> 个新付款的订单</p>
      <p align="center" style="word-break:break-all"><a href="order.php?act=list"><span style="color:#ff0000">点击查看新订单</span></a></p>
    </div>
    </td>
  </tr>
  </table>
</div>

<!--
<embed src="images/online.wav" width="0" height="0" autostart="false" name="msgBeep" id="msgBeep" enablejavascript="true"/>
-->
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://active.macromedia.com/flash2/cabs/swflash.cab#version=4,0,0,0" id="msgBeep" width="1" height="1">
  <param name="movie" value="images/online.swf">
  <param name="quality" value="high">
  <embed src="images/online.swf" name="msgBeep" id="msgBeep" quality="high" width="0" height="0" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?p1_prod_version=shockwaveflash">
  </embed>
</object>

<script language="JavaScript">
document.onmousemove=function(e)
{
  var obj = Utils.srcElement(e);
  if (typeof(obj.onclick) == 'function' && obj.onclick.toString().indexOf('listTable.edit') != -1)
  {
    obj.title = '点击修改内容';
    obj.style.cssText = 'background-color: #eee;';
    obj.onmouseout = function(e)
    {
      this.style.cssText = '';
    }
  }
  else if (typeof(obj.href) != 'undefined' && obj.href.indexOf('listTable.sort') != -1)
  {
    obj.title = '点击对列表排序';
  }
}
<!--


var MyTodolist;
function showTodoList(adminid)
{
  if(!MyTodolist)
  {
    var global = $import("../js/global.js","js");
    global.onload = global.onreadystatechange= function()
    {
      if(this.readyState && this.readyState=="loading")return;
      var md5 = $import("js/md5.js","js");
      md5.onload = md5.onreadystatechange= function()
      {
        if(this.readyState && this.readyState=="loading")return;
        var todolist = $import("js/todolist.js","js");
        todolist.onload = todolist.onreadystatechange = function()
        {
          if(this.readyState && this.readyState=="loading")return;
          MyTodolist = new Todolist();
          MyTodolist.show();
        }
      }
    }
  }
  else
  {
    if(MyTodolist.visibility)
    {
      MyTodolist.hide();
    }
    else
    {
      MyTodolist.show();
    }
  }
}

if (Browser.isIE)
{
  onscroll = function()
  {
    //document.getElementById('calculator').style.top = document.body.scrollTop;
    document.getElementById('popMsg').style.top = (document.body.scrollTop + document.body.clientHeight - document.getElementById('popMsg').offsetHeight) + "px";
  }
}

if (document.getElementById("listDiv"))
{
  document.getElementById("listDiv").onmouseover = function(e)
  {
    obj = Utils.srcElement(e);

    if (obj)
    {
      if (obj.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode;
      else if (obj.parentNode.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode.parentNode;
      else return;

      for (i = 0; i < row.cells.length; i++)
      {
        if (row.cells[i].tagName != "TH") row.cells[i].style.backgroundColor = '#F4FAFB';
      }
    }

  }

  document.getElementById("listDiv").onmouseout = function(e)
  {
    obj = Utils.srcElement(e);

    if (obj)
    {
      if (obj.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode;
      else if (obj.parentNode.parentNode.tagName.toLowerCase() == "tr") row = obj.parentNode.parentNode;
      else return;

      for (i = 0; i < row.cells.length; i++)
      {
          if (row.cells[i].tagName != "TH") row.cells[i].style.backgroundColor = '#FFF';
      }
    }
  }

  document.getElementById("listDiv").onclick = function(e)
  {
    var obj = Utils.srcElement(e);

    if (obj.tagName == "INPUT" && obj.type == "checkbox")
    {
      if (!document.forms['listForm'])
      {
        return;
      }
      var nodes = document.forms['listForm'].elements;
      var checked = false;

      for (i = 0; i < nodes.length; i++)
      {
        if (nodes[i].checked)
        {
           checked = true;
           break;
         }
      }

      if(document.getElementById("btnSubmit"))
      {
        document.getElementById("btnSubmit").disabled = !checked;
      }
      for (i = 1; i <= 10; i++)
      {
        if (document.getElementById("btnSubmit" + i))
        {
          document.getElementById("btnSubmit" + i).disabled = !checked;
        }
      }
    }
  }

}

//-->
</script>
</body>
</html>