<html>
	<head>
		<meta charset='UTF-8'>
		<title>新闻管理系统</title>
	</head>
	<body>
		<div class='container'>
			<div id='head'>
				这里放管理员用户名和返回主界面的按钮和退出按钮
				<span>管理员用户名</span>
				<a>返回主页面</a>
				<a>推出登录</a>
			</div>
		</div>
		<div id='wrapper'>
			<div id="title">
				<input type="text">放入要修改的标题</input>
				<input type="button" value="修改标题"></input>
			</div>
			<div id="content">
				<input type="textarea">放入要修改的内容</input>
				<input type="button" value="修改内容"></input>
			</div>
			<div id="comment">
				<table>
					<tr>
						<td>该评论的发布者</td>
						<td>该评论内容</td>
						<td>该评论时间</td>
						<td><input type="button" value="删除该评论"></input></td>
					</tr>
				</table>
			</div>
		</div>
		
	</body>
</html>