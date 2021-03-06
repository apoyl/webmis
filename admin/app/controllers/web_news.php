<?php
class Web_news extends MY_Controller {
	//首页
	public function index(){
		$data = $this->Page('web_news/index.html','web_news_m','page',array('in'=>array('0','1','2')),'id desc');
		$data['js'] = array(
			'../webmis/plugin/highcharts/highcharts.js',
			'../webmis/plugin/jquery/ajaxfileupload.js',
			'../webmis/plugin/ueditor/editor_all.js',
			'js/inc/ueditor_web.js',
			'js/web/web_news.js'
		);
		//分类信息
		$this->load->model('web_class_m');
		$data['class'] = $this->web_class_m->getClass();
		
		$this->MyView('web/news/index',$data);
	}
	//搜索
	public function search(){
		$this->load->view('web/news/sea');
	}
	//添加
	public function add(){
		$this->load->view('web/news/add');
	}
	public function addData(){
		$this->load->model('web_news_m');
		if(isset($_POST['content'])) {
			echo $this->web_news_m->add()?'{"status":"y"}':'{"status":"n"}';
		}
	}
	//查询菜单
	public function getMenu(){
		$this->load->model('web_class_m');
		$fid = $this->input->post('fid');
		$data = $this->web_class_m->getMenus($fid);
		echo json_encode($data);
	}
	//编辑
	public function edit(){
		$this->load->model('web_news_m');
		$menus = $this->web_news_m->getOne();
		$data = $menus[0];
		$this->load->view('web/news/edit',$data);
	}
	public function editData(){
		$this->load->model('web_news_m');
		if(isset($_POST['content'])) {
			echo $this->web_news_m->update()?'{"status":"y"}':'{"status":"n"}';
		}
	}
	//删除
	public function delData(){
		$this->load->model('web_news_m');
		echo $this->web_news_m->del();
	}
	//审核
	public function auditData(){
		$this->load->model('web_news_m');
		echo $this->web_news_m->audit();
	}
	//图表
	public function chartData() {
		$this->load->model('web_class_m');
		$this->load->model('web_news_m');
		$html = '[';
		$menus = $this->web_class_m->getMenus('2');
		foreach($menus as $val){
			$num = $this->web_news_m->count_all(array('class' =>':'.$val->id.':'));
			$html .= '["'.$val->title.'",'.$num.']';
			if($val!=end($menus)) {$html .= ',';}
		}
		$html .= ']';
		echo $html;
		//echo '[["分类1",0],["分类2",0],["分类3",0],["分类4",0]]';
	}
	//预览
	public function show(){
		$this->load->model('web_news_m');
		$menus = $this->web_news_m->getOne();
		$data['show'] = $menus[0];
		
		$this->load->view('web/news/show',$data);
	}
	//文件上传
	function upload($type='none'){
		$this->load->library('upload_web');
		$this->load->library('image');
		
		//上传
		$this->upload_web->upload('../upload/web/images');
		//规格大小
		if($type == '1'){
			$width = 110;
			$height = 100;
		}
		//缩略图
		$imgInfo = $this->image->Info($this->upload_web->url);
		$this->image->thumb($this->upload_web->url,$width,$height);
	}
}
?>