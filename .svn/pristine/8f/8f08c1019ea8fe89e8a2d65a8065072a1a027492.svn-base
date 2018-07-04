<template>
		<el-upload
				class="upload-demo"
				name="file"
				action="http://homestead.app/api/upload"
				:on-preview="handlePreview"
				:on-remove="handleRemove"
				:on-success="handleSuccess"
				:file-list="fileList2"
				list-type="picture">
			<el-button size="small" type="primary">点击上传</el-button>
			<div slot="tip" class="el-upload__tip">只能上传jpg/png文件，且不超过500kb</div>
		</el-upload>
</template>

<script>
    export default {
        data() {
            return {
                fileList2: [
                    {name: 'food.jpeg', url: 'https://fuss10.elemecdn.com/3/63/4e7f3a15429bfda99bce42a18cdd1jpeg.jpeg?imageMogr2/thumbnail/360x360/format/webp/quality/100'},
					{name: 'food2.jpeg', url: 'https://fuss10.elemecdn.com/3/63/4e7f3a15429bfda99bce42a18cdd1jpeg.jpeg?imageMogr2/thumbnail/360x360/format/webp/quality/100'}]
              };
          },
        methods: {
            handleSuccess(response, file, fileList){
                if(response.code == 0){
                    this.$message({message: response.msg, type: 'success'});
                }else{
                    this.$message({message: response.msg, type: 'error'});
                }
            },
            handleRemove(file, fileList) {
                console.log(file, fileList);
            },
            handlePreview(file) {
                console.log(file);
            }
        }
    }
</script>
