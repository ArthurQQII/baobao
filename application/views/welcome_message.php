<input type="file" name="file123[]" id="txt_file" multiple class="file-loading" />


<script>
$('#txt_file').fileinput({
    language: 'en',
    uploadUrl: '<?php echo base_url()?>welcome/upload/',
    showCaption: true,//是否显示被选文件的简介
    showUpload: true,//是否显示上传按钮
    showRemove: true,//是否显示删除按钮
    showClose: true,//是否显示关闭按钮
    enctype: 'multipart/form-data',
    uploadAsync:false, //false 同步上传，后台用数组接收，true 异步上传，每次上传一个file,会调用多次接口 
    layoutTemplates: {
      actionUpload: ''//就是让文件上传中的文件去除上传按钮
//      actionDelete: '',//去除删除按钮
    },
	fileActionSettings: {
		showRemove: true,
		removeIcon: '<i class="fa fa-trash" style="font-size:20px;"></i>',
		removeClass: 'btn btn-xs btn-default',
		removeTitle: 'Remove file',
		zoomIcon: '<i class="fa fa-info" style="font-size:20px;"></i>',
		zoomClass: 'btn btn-xs btn-default',
		zoomTitle: 'View details',
	},
	previewZoomButtonIcons: {
		toggleheader: '<i class="fa fa-arrows-v"></i>',
		fullscreen: '<i class="fa fa-tv "></i>',
		borderless: '<i class="fa fa-arrows-alt"></i>',
		close: '<i class="fa fa-times-circle"></i>'
	},
	previewZoomButtonClasses: {
		toggleheader: 'btn btn-default btn-header-toggle',
		fullscreen: 'btn btn-default',
		borderless: 'btn btn-default',
		close: 'btn btn-default'
	},
    browseClass: 'btn btn-primary',
    maxFileCount: 9,
    minFileCount : 0,
  }).on('filebatchuploadsuccess',function(event, data) {
	$.each(data.files, function(key, file) {
		console.log(file.name);
	});
	
  });

</script>