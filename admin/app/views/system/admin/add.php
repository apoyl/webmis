<form action="<?php echo base_url('sys_admin/addData.html');?>" method="post" id="adminForm">
<table class="table_add">
	<tr>
		<td class="add_width add_right">状态:</td>
		<td>
			<select name="state">
				<option value="1">启用</option>
				<option value="2">禁用</option>
			</select>
			<span class="1">&nbsp;</span>
		</td>
	</tr>
	<tr>
		<td class="add_right">用户名:</td>
		<td>
			<input type="text" name="uname" class="input" style="width: 80px;" datatype="*3-16" errormsg="3~16位之间！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="add_right">密码:</td>
		<td>
			<input type="password" name="passwd" class="input" style="width: 180px;" datatype="*6-16" errormsg="6~16位之间！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="add_right">确认密码:</td>
		<td>
			<input type="password" class="input" style="width: 180px;" datatype="*" errormsg="密码不一致！" recheck="passwd" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td class="add_right">邮箱:</td>
		<td>
			<input type="text" name="email" class="input" style="width: 180px;" datatype="e" errormsg="格式有误！" />
			<span class="Validform_checktip"></span>
		</td>
	</tr>
	<tr>
		<td colspan="2"><b>详细信息</b></td>
	</tr>
	<tr>
		<td class="add_right">姓名:</td>
		<td>
			<input type="text" name="name" class="input" style="width: 80px;" />
		</td>
	</tr>
	<tr>
		<td class="add_right">部门:</td>
		<td>
			<input type="text" name="department" class="input" style="width: 120px;" />
		</td>
	</tr>
	<tr>
		<td class="add_right">职务:</td>
		<td>
			<input type="text" name="position" class="input" style="width: 120px;" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="submit" id="addSub" value="添加" />
		</td>
	</tr>
</table>
</form>