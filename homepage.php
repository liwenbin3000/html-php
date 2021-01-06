<?php
include "database.php";
$hostname='localhost';
$username='root';
$password='';
$dbname='class';

$db = new database();
$db->connect($hostname,$username,$password,$dbname);
if (isset($_COOKIE["ID"]))	{	
			ini_set("session.cookie_lifetime","3600");
			session_start();
		echo"
		<html>
			<head>
				<meta charset='UTF-8'>
				<title>新闻管理系统</title>
				<link rel='stylesheet' type='text/css' href='homepagestyle.css?v=2'>
			</head>
			<body>
			<div class='container'>
				<div id='head'>
					<div id='user'>
						<div id='login'>
							<span>"."{$_SESSION["username"]}"."</span>
							<a href='quit.php'><button id='logbutt'>退出登录</button></a>
						</div>
					</div>
				</div>
				<div id='wrapper'>
					<div id='today'>
						今日要闻<br/>";
						
						$db->getNewsTitle();
	echo"	
					</div>
				</div>
							<div id='picturejs'>
    <div id='wrap'>
      <!-- 图片列表 -->
      <div class='img-list'>
        <img src='https://s1.ax1x.com/2020/09/26/0irm1P.jpg' alt='' />
        <img src='https://s1.ax1x.com/2020/09/26/0irQ0g.jpg' alt='' />
        <img src='https://s1.ax1x.com/2020/09/26/0ir8ts.jpg' alt='' />
        <img src='https://s1.ax1x.com/2020/10/11/0gbKoV.jpg' alt='' />
        <img src='https://s1.ax1x.com/2020/10/11/0gb7Os.jpg' alt='' />
      </div>

      <!-- 小箭头 -->
      <div class='arrow'>
        <a href='javascript:;' class='left'>&lt;</a>
        <a href='javascript:;' class='right'>&gt;</a>
      </div>
    </div>
  </div>

    <script>
      // 获取左右按钮和图片列表
      let oLeft = document.querySelector('.left');
      let oRight = document.querySelector('.right');
      let oImgList = document.querySelector('.img-list');

      //克隆了第一张图片
      let cloneImg = oImgList.firstElementChild.cloneNode();
      //把第一张图片放入图片列表中
      oImgList.appendChild(cloneImg);

      //index表示当前显示到第几张
      let index = 0;

      //  设置函数节流锁
      let lock = true;
      //右按钮的点击事件
      oRight.onclick = function () {
        //  判断锁的状态  是关闭直接结束函数
        if (!lock) return;

        index++;
        // 为什么加过渡 因为最后一张图片会将过渡去掉
        oImgList.style.transition = '0.5s ease';
        
        if (index === 5) {
          setTimeout(function () {
            oImgList.style.left = 0;
            index = 0;
            // 取消过渡  500毫秒之后瞬间移动到第一张
            oImgList.style.transition = 'none';
          }, 500);
        }

        oImgList.style.left = -index * 200 + 'px';

        // 关锁
        lock = false;

        // 500毫秒之后打开
        setTimeout(function () {
          lock = true;
        }, 500);
      };

      //左按钮的点击事件
      oLeft.onclick = function () {
        //  判断锁的状态  是关闭直接结束函数
        if (!lock) return;

        if (index === 0) {
          oImgList.style.transition = 'none';
          oImgList.style.left = -5 * 200 + 'px';

          // 设置延时器的目的是 可以让我们过渡瞬间取消然后加上
          setTimeout(function () {
            // 加过渡
            oImgList.style.transition = '0.5s ease';
            // 真正的最后一张图片
            index = 4;

            oImgList.style.left = -4 * 200 + 'px';
          }, 0);
        } else {
          index--;
          oImgList.style.left = -index * 200 + 'px';
        }

        // 关锁
        lock = false;
        // 500毫秒之后打开
        setTimeout(function () {
          lock = true;
        }, 500);
      };
    </script>
				</div>
			</body>
		</html>	
		"	;
}
else{
echo "<html>
		<head>
			<meta charset='UTF-8'>
			<title>新闻管理系统</title>
			<link rel='stylesheet' type='text/css' href='homepagestyle.css?v=2'>
		</head>
		<body>
		<div class='container'>
			<div id='head'>
				<div id='user'>
					<div id='login'>
						<a href='login.php'><button id='logbutt'>登录</button></a>
					</div>
				</div>
			</div>
			<div id='wrapper'>
				<div id='today'>
					今日要闻<br/>";
					$db->getNewsTitle();
	echo"				
				</div>
				
			</div>
            			<div id='picturejs'>
    <div id='wrap'>
      <!-- 图片列表 -->
      <div class='img-list'>
        <img src='https://s1.ax1x.com/2020/09/26/0irm1P.jpg' alt='' />
        <img src='https://s1.ax1x.com/2020/09/26/0irQ0g.jpg' alt='' />
        <img src='https://s1.ax1x.com/2020/09/26/0ir8ts.jpg' alt='' />
        <img src='https://s1.ax1x.com/2020/10/11/0gbKoV.jpg' alt='' />
        <img src='https://s1.ax1x.com/2020/10/11/0gb7Os.jpg' alt='' />
      </div>

      <!-- 小箭头 -->
      <div class='arrow'>
        <a href='javascript:;' class='left'>&lt;</a>
        <a href='javascript:;' class='right'>&gt;</a>
      </div>
    </div>
  </div>

    <script>
      // 获取左右按钮和图片列表
      let oLeft = document.querySelector('.left');
      let oRight = document.querySelector('.right');
      let oImgList = document.querySelector('.img-list');

      //克隆了第一张图片
      let cloneImg = oImgList.firstElementChild.cloneNode();
      //把第一张图片放入图片列表中
      oImgList.appendChild(cloneImg);

      //index表示当前显示到第几张
      let index = 0;

      //  设置函数节流锁
      let lock = true;
      //右按钮的点击事件
      oRight.onclick = function () {
        //  判断锁的状态  是关闭直接结束函数
        if (!lock) return;

        index++;
        // 为什么加过渡 因为最后一张图片会将过渡去掉
        oImgList.style.transition = '0.5s ease';
        
        if (index === 5) {
          setTimeout(function () {
            oImgList.style.left = 0;
            index = 0;
            // 取消过渡  500毫秒之后瞬间移动到第一张
            oImgList.style.transition = 'none';
          }, 500);
        }

        oImgList.style.left = -index * 200 + 'px';

        // 关锁
        lock = false;

        // 500毫秒之后打开
        setTimeout(function () {
          lock = true;
        }, 500);
      };

      //左按钮的点击事件
      oLeft.onclick = function () {
        //  判断锁的状态  是关闭直接结束函数
        if (!lock) return;

        if (index === 0) {
          oImgList.style.transition = 'none';
          oImgList.style.left = -5 * 200 + 'px';

          // 设置延时器的目的是 可以让我们过渡瞬间取消然后加上
          setTimeout(function () {
            // 加过渡
            oImgList.style.transition = '0.5s ease';
            // 真正的最后一张图片
            index = 4;

            oImgList.style.left = -4 * 200 + 'px';
          }, 0);
        } else {
          index--;
          oImgList.style.left = -index * 200 + 'px';
        }

        // 关锁
        lock = false;
        // 500毫秒之后打开
        setTimeout(function () {
          lock = true;
        }, 500);
      };
    </script>
			</div>
		</body>
	</html>";

	$db->close();
}
